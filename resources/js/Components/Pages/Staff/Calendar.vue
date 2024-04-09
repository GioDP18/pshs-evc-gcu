<template>
    <div class="d-flex gap-5 mb-5 container">
        <div class="calendar">
            <div style="height:30px; background-color:#67a5fc;"></div>
            <el-calendar v-model="value">
                <template #date-cell="{ data }">
                    <p :class="data.isSelected ? 'is-selected' : ''" @click="handleDateClick(data)">
                        {{ data.day.split('-')[2] }}
                    </p>
                </template>
            </el-calendar>
            <!-- Modal -->
            <el-dialog v-model="modalVisible" title="Update Time Availability">
                <hr>
                <p class="mt-3"><b>Date:</b> {{ selectedDate }}</p>
                <div class="mb-4">
                    <div><b>Choose Available Time:</b></div>
                    <small class="ml-4">Note: Red means time is is not available.</small>
                    <div class="ml-4 mt-2 d-flex gap-4" style="flex-wrap:wrap;">
                        <div class="radio-input" style="width:11rem" v-for="timeSlot in fixedTimeSlots" :key="timeSlot">
                            <div class="radio-container">
                                <input type="checkbox" :id="timeSlot" :value="timeSlot"
                                    :checked="availableTimeSlots.includes(timeSlot)" @change="handleChange(timeSlot)">
                                <label :for="timeSlot" class="m-1">{{ timeSlot }}</label>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <el-button type="primary" @click="updateSchedule">Update Schedule</el-button>
                </div>
            </el-dialog>
        </div>
        <div class="details">
            <div class="d-flex flex-column gap-3">
                <div style="width:100%; padding:10px; border-radius:20px; border:2px solid #fbebeb; max-height: 295px; overflow-y: auto;">
                    <p style="font-weight:bold; color:gray; font-size:15px; opacity:60%">Appoinments for today</p>
                    <div class="ml-4" style="overflow-x: auto;">
                        <div class="appointment d-flex" v-for="item in appointments_today" :key="item.id">
                            <p style="font-weight:bold; color:#27516B"><i class="fa-regular fa-clock"
                                    style="color:#ED9696"></i>
                                {{ item.time }} <br> <i class="fa-regular fa-user" style="color:#ED9696"></i>
                                {{ item.reserved_user.firstname }} {{ item.reserved_user.lastname }}</p>
                        </div>
                    </div>
                </div>

                <div style="width:100%; padding:10px; border-radius:20px; border:2px solid #fbebeb; max-height: 295px; overflow-y: auto;">
                    <p style="font-weight:bold; color:gray; font-size:15px; opacity:60%">Available time for today</p>
                    <div class="ml-4">
                        <p style="font-weight:bold; color:#27516B" v-for="item in available_time_today" :key="item.id">
                            <i class="fa-regular fa-clock" style="color:#ED9696"></i> {{ item }}
                        </p>
                    </div>
                </div>

                <div style="width:100%; padding:10px; border-radius:20px; border:2px solid #fbebeb">
                    <p style="font-weight:bold; color:gray; font-size:15px; opacity:60%">Participants</p>
                    <div class="d-flex gap-2">
                        <p style="font-weight:bold; color:#27516B; font-size:30px;"><i class="fa-regular fa-circle-user"
                                style="color:#9DCBF3"></i></p>
                        <p style="font-weight:bold; color:#27516B; font-size:30px;"><i class="fa-regular fa-circle-user"
                                style="color:#ED9696"></i></p>
                    </div>
                </div>
            </div>

        </div>
    </div>

</template>

<script setup>
import axios from 'axios';
import { ref, reactive, onMounted } from 'vue'

const value = ref(new Date())
const modalVisible = ref(false)
const selectedDate = ref(null)
const selectedTimeSlots = ref([])
const user_id_reserved = ref([])
const availableTimeSlots = reactive([])
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
const available_time = ref([]);
const available_time_today = ref([]);
const appointments_today = ref([])

onMounted(() => {
    getTimeNotAvailableToday();
    getAppointmentsToday();
})

const handleDateClick = async (data) => {
    selectedTimeSlots.value = []
    user_id_reserved.value = []
    try {
        const response = await axios.get(`${import.meta.env.VITE_BASE_URL}/api/v1/get-schedule/${data.day}`)
        console.log(response.data);
        selectedDate.value = data.day
        modalVisible.value = true
        availableTimeSlots.splice(0, availableTimeSlots.length, ...response.data.schedule.map(schedule => schedule.time))
        selectedTimeSlots.value = availableTimeSlots
        console.log(selectedTimeSlots.value)
    } catch (error) {
        console.error(error);
    }
}

const updateSchedule = async () => {
    try {
        const response = await axios.post(`${import.meta.env.VITE_BASE_URL}/api/v1/update-schedule`, {
            time: selectedTimeSlots.value,
            date: selectedDate.value,
            user_id: user_id_reserved.value,
        })
        console.log(response.data);
        modalVisible.value = false
        available_time_today.value = []
        getTimeNotAvailableToday();
        if (response) {
            swal({
                title: response.data.message,
                icon: "success",
                button: "Okay",
            });
        }

    } catch (error) {
        console.error(error);
    }
}

const handleChange = (time) => {
    const checkbox = document.getElementById(time);
    if (checkbox.checked) {
        selectedTimeSlots.value.push(time);
    } else {
        selectedTimeSlots.value = selectedTimeSlots.value.filter(slot => slot !== time);
    }
}

const getTimeNotAvailableToday = async () => {
    try {
        const response = await axios.get(`${import.meta.env.VITE_BASE_URL}/api/v1/get-not-available-time-today`)
        // Extract times from the API response
        const notAvailableTimes = response.data.schedule.map(slot => slot.time);

        // Filter out not available times from fixedTimeSlots
        available_time_today.value = fixedTimeSlots.filter(slot => !notAvailableTimes.includes(slot));

        console.log(response.data)
        // not_available_time_today.value = response.data.schedule
    }
    catch (error) {
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
    width: 100%;
}

.radio-input .radio-container input[type="checkbox"] {
    display: none;
}

.radio-input .radio-container label {
    display: flex;
    align-items: center;
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    background-color: #4169E1;
    color: white;
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

.radio-input .radio-container input[type="checkbox"]:checked+label:before {
    background-color: green;
    top: 0;
}

.radio-input .radio-container input[type="checkbox"]:checked+label {
    background-color: #ED969D;
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

.appointment::before {
    content: "";
    width: 5px;
    height: 50px;
    background-color: #75a6ea;
    margin-right: 7px
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
