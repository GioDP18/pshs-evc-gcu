<template>
    <div class="d-flex gap-5 mb-5 container">
        <div class="calendar">
            <el-calendar v-model="value">
                <template #date-cell="{ data }">
                    <p :class="data.isSelected ? 'is-selected' : ''" @click="handleDateClick(data)">
                        {{ data.day.split('-')[2] }}
                    </p>
                </template>
            </el-calendar>
            <!-- Modal -->
            <el-dialog v-model="modalVisible" title="Reserve Consultation">
                <hr>
                <form @submit.prevent="reserveConsultation">
                    <p class="mt-3"><b>Date:</b> {{ selectedDate }}</p>
                    <div class="mb-4">
                        <div><b>Choose Time:</b></div>
                        <small v-if="!no_available_time">Note: Red means time is already reserved</small>
                        <div class="ml-3 mt-2 d-flex gap-4" style="flex-wrap:wrap;">
                            <div class="radio-input">
                                <div class="radio-container" v-for="item in available_time" :key="item.id">
                                    <input v-model="chosen_time" :value="item" name="value-radio"
                                        :id="'value-' + item" type="radio">
                                    <label :for="'value-' + item">{{ item }}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-primary" type="submit">Reserve</button>
                    </div>
                </form>

            </el-dialog>
        </div>

        <div class="details">
            <div class="d-flex flex-column gap-3">
                <div style="width:100%; padding:10px; border-radius:20px; border:2px solid #fbebeb">
                    <p style="font-weight:bold; color:gray; font-size:15px; opacity:60%">Your appoinment for today</p>
                    <div class="ml-4" v-for="appointment in appointments_today" :key="appointment.index">
                        <p style="font-weight:bold; color:#27516B"><i class="fa-regular fa-clock"
                                style="color:#ED9696"></i>
                            {{ appointment.time }}</p>
                        <p style="font-weight:bold; color:#27516B"><i class="fa-solid fa-calendar-days"
                                style="color:#ED9696"></i>{{ formattedDateFE(appointment.date) }}</p>
                    </div>
                    <button class="text-light" v-if="appointments_today.length > 0"
                        style="width:100%; padding:10px; border-radius:30px; background-color:#ED9696; border:1px solid #fbebeb">Reschedule
                    </button>
                </div>

                <div
                    style="width:100%; padding:10px; border-radius:20px; border:2px solid #fbebeb; max-height: 295px; overflow-y: auto;">
                    <p style="font-weight:bold; color:gray; font-size:15px; opacity:60%">Available time for today</p>
                    <div class="ml-4">
                        <p style="font-weight:bold; color:#27516B" v-for="item in available_time_today" :key="item.id">
                            <i class="fa-regular fa-clock" style="color:#ED9696"></i> {{ item }}
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>

</template>

<script setup>
import axios from 'axios';
import { ref, onMounted } from 'vue'

const value = ref(new Date())
const modalVisible = ref(false)
const selectedDate = ref(null)
const notAvailableTimeSlots = ref([])
const not_available_time_today = ref([])
const chosen_time = ref(null)
const currentIndex = ref('');
const no_available_time = ref(false)
const appointments_today = ref([])
const currentTime = new Date();
const currentHour = currentTime.getHours();
const currentMinute = currentTime.getMinutes();
const checked_time_passed = ref([]);
const fixedTimeSlots = [
    '7:30 AM - 8:00 AM',
    '8:00 AM - 8:30 AM',
    '8:30 AM - 9:00 AM',
    '9:00 AM - 9:30 PM',
    '9:30 AM - 10:00 AM',
    '10:00 AM - 10:30 AM',
    '10:30 AM - 11:00 AM',
    '11:00 AM - 11:30 AM',
    '11:30 AM - 12:00 PM',
    '12:00 PM - 12:30 PM',
    '12:30 PM - 1:00 PM',
    '1:00 PM - 1:30 PM',
    '1:30 PM - 2:00 PM',
    '2:00 PM - 2:30 PM',
    '2:30 PM - 3:00 PM',
    '3:00 PM - 3:30 PM',
    '3:30 PM - 4:00 PM',
    '4:00 PM - 4:30 PM',
]
const formatTime = (hour, minute) => {
    const meridiem = hour >= 12 ? 'PM' : 'AM';
    const formattedHour = hour % 12 === 0 ? 12 : hour % 12;
    const formattedMinute = minute < 10 ? '0' + minute : minute;
    return `${formattedHour}:${formattedMinute} ${meridiem}`;
};

const currentFormattedTime = formatTime(currentMinute < 30 ? currentHour : currentHour + 1, currentMinute > 30 ? 0 : 30);
const filteredTimeSlots = ref([]);

const available_time = ref([]);
const available_time_today = ref([]);

onMounted(() => {
    getTimeNotAvailableToday();
    getAppointmentsToday();
})

const handleDateClick = async (data) => {
    chosen_time.value = null;
    try {
        const response = await axios.get(`${import.meta.env.VITE_BASE_URL}/api/v1/get-not-available-time/${data.day}`);
        console.log(response.data.schedule);

        // Extract times from the API response
        const notAvailableTimes = response.data.schedule.map(slot => slot.time);

        // Filter out not available times from fixedTimeSlots
        available_time.value = fixedTimeSlots.filter(slot => !notAvailableTimes.includes(slot));


        const response2 = await axios.get(`${import.meta.env.VITE_BASE_URL}/api/v1/get-reserved-time/${data.day}`);
        // Extract times from the API response
        const notAvailableTimes2 = response2.data.schedule.map(slot => slot.time);

        // Filter out not available times from fixedTimeSlots
        available_time.value = fixedTimeSlots.filter(slot => !notAvailableTimes2.includes(slot));

        console.log(available_time.value);
        selectedDate.value = data.day
        modalVisible.value = true
        if (response.data.schedule.length == 0) {
            no_available_time.value = true
        }
        else {
            no_available_time.value = false
        }
    } catch (error) {
        console.error(error);
    }
}

const getAppointmentsToday = async () => {
    try {
        const result = await axios.get(`${import.meta.env.VITE_BASE_URL}/api/v1/get-appointments-today`)
        console.log(result.data)
        appointments_today.value = result.data.appointments
    }
    catch (error) {
        console.error(error);
    }
}

const getTimeNotAvailableToday = async () => {
    try {
        const response = await axios.get(`${import.meta.env.VITE_BASE_URL}/api/v1/get-not-available-time-today`)
        // Extract times from the API response
        const notAvailableTimes = response.data.schedule.map(slot => slot.time);

        currentIndex.value = fixedTimeSlots.findIndex(slot => slot.startsWith(currentFormattedTime));

        if (currentIndex.value === -1) {
            currentIndex.value = 100; 
        }

        // Filter out not available times from fixedTimeSlots
        filteredTimeSlots.value = fixedTimeSlots.slice(currentIndex.value);
        checked_time_passed.value = fixedTimeSlots.slice(0, 15 + 1);
        available_time_today.value = filteredTimeSlots.value;

        
        console.log(available_time_today.value)
        not_available_time_today.value = response.data.schedule
    }
    catch (error) {
        console.error(error);
    }
}

const reserveConsultation = async () => {
    try {
        const result = await axios.post(`${import.meta.env.VITE_BASE_URL}/api/v1/reserve-consultation`, {
            time: chosen_time.value,
            date: selectedDate.value,
            user_id: localStorage.getItem('user_id')
        });
        if (result) {
            swal({
                title: result.data.message,
                icon: "success",
                button: "Okay",
            });
        }
        modalVisible.value = false
        chosen_time.value = null;
        getTimeNotAvailableToday();
        getAppointmentsToday();
    }
    catch (error) {
        console.error(error);
    }
}

const formattedDateFE = (dateToFormat) => {
    return new Date(dateToFormat).toLocaleDateString('en-US', {
        month: 'long',
        day: '2-digit',
        year: 'numeric'
    });
};
</script>

<style scoped>
.is-selected {
    background-color: #e6f7ff;
    cursor: pointer;
}

.radio-input {
    display: flex;
    flex-wrap: wrap;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    font-size: 16px;
    font-weight: 600;
    color: white;
    gap: 1rem;
    width: 100%;
}

.radio-input .radio-container {
    width: 30%;
}

.radio-input .radio-container input[type="radio"] {
    display: none;
}

.radio-input .radio-container label {
    display: flex;
    align-items: center;
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    background-color: transparent;
    color: #4169E1;
    border-radius: 5px;
    margin-right: 12px;
    cursor: pointer;
    position: relative;
    transition: all 0.3s ease-in-out;
}

.radio-input .radio-container label:before {
    content: "";
    display: block;
    position: absolute;
    top: 50%;
    left: 0;
    transform: translate(-50%, -50%);
    width: 10px;
    height: 10px;
    border-radius: 50%;
    background-color: #fff;
    border: 2px solid #ccc;
    transition: all 0.3s ease-in-out;
}

.radio-input .radio-container input[type="radio"]:checked+label:before {
    background-color: green;
    top: 0;
}

.radio-input .radio-container input[type="radio"]:checked+label {
    background-color: royalblue;
    color: #fff;
    border-color: rgb(129, 235, 129);
    animation: radio-translate 0.5s ease-in-out;
}

@keyframes radio-translate {
    0% {
        transform: translateX(0);
    }

    50% {
        transform: translateY(-10px);
    }

    100% {
        transform: translateX(0);
    }
}

.calendar {
    width: 70%;
    border: 2px solid #67a5fc;
    border-radius: 20px 20px 0 0;
    overflow: hidden;
}

.details {
    width: 30%
}

@media screen and (max-width:360px) {
    .calendar {
        width: 100%;
    }

    .container {
        flex-direction: column;
        width: 100%;
    }

    .details {
        width: 100%;
    }
}
</style>
