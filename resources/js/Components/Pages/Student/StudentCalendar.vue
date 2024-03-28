<template>
    <div class="d-flex gap-5 mb-5">
        <div style="width:70%; border:2px solid #67a5fc; border-radius:20px 20px 0 0; overflow:hidden;">
            <div style="height:30px; background-color:#67a5fc;"></div>
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
                            <div class="text-center mt-5" style="width:100%;" v-if="no_available_time">
                                <p class="text-dark"><b>No available time.</b></p>
                            </div>
                            <div class="radio-input">
                                <div class="radio-container" v-for="item in availableTimeSlots" :key="item.id">
                                    <input v-model="chosen_time" :value="item.id" name="value-radio" :id="'value-'+item.id" type="radio" :disabled="item.user_id_reserved !== null">
                                    <label :for="'value-'+item.id" :style="'background-color:' + (item.user_id_reserved !== null ? '#ed9696;' : ';')+'color:' + (item.user_id_reserved !== null ? 'white' : '')">{{ item.available_time }}</label>
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

        <div style="width:30%">
            <div class="d-flex flex-column gap-3">
                <div style="width:100%; padding:10px; border-radius:20px; border:2px solid #fbebeb">
                    <p style="font-weight:bold; color:gray; font-size:15px; opacity:60%">Appoinment</p>
                    <div class="ml-4">
                        <p style="font-weight:bold; color:#27516B"><i class="fa-regular fa-clock"
                                style="color:#ED9696"></i>
                            9:30 am - 11:00 am</p>
                        <p style="font-weight:bold; color:#27516B"><i class="fa-solid fa-calendar-days"
                                style="color:#ED9696"></i> Mon, 25 March 2024</p>
                    </div>
                    <button class="text-light"
                        style="width:100%; padding:10px; border-radius:30px; background-color:#ED9696; border:1px solid #fbebeb">Reschedule</button>
                </div>

                <div style="width:100%; padding:10px; border-radius:20px; border:2px solid #fbebeb; max-height: 295px; overflow-y: auto;">
                    <p style="font-weight:bold; color:gray; font-size:15px; opacity:60%">Available time for today</p>
                    <div class="ml-4">
                        <p style="font-weight:bold; color:#27516B" v-if="available_time_today.length === 0">No Available
                            time
                            for today.</p>
                        <p style="font-weight:bold; color:#27516B" v-for="item in available_time_today" :key="item.id">
                            <i class="fa-regular fa-clock" style="color:#ED9696"></i> {{ item.available_time }}</p>
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
import { ref, onMounted } from 'vue'

const value = ref(new Date())
const modalVisible = ref(false)
const selectedDate = ref(null)
const availableTimeSlots = ref([])
const available_time_today = ref([])
const chosen_time = ref(null)
const no_available_time = ref(false)

onMounted(() => {
    getTimeAvailableToday();
})

const handleDateClick = async (data) => {
    try {
        const response = await axios.get(`${import.meta.env.VITE_BASE_URL}/api/v1/get-schedule/${data.day}`)
        availableTimeSlots.value = response.data.schedule
        selectedDate.value = data.day
        modalVisible.value = true
        if(response.data.schedule.length == 0){
            no_available_time.value = true
        }
        else{
            no_available_time.value = false
        }
    } catch (error) {
        console.error(error);
    }
}


const getTimeAvailableToday = async () => {
    try {
        const result = await axios.get(`${import.meta.env.VITE_BASE_URL}/api/v1/get-available-time-today`)
        console.log(result.data)
        available_time_today.value = result.data.schedule
    }
    catch (error) {
        console.error(error);
    }
}

const reserveConsultation = async () => {
    try {
        const result = await axios.post(`${import.meta.env.VITE_BASE_URL}/api/v1/reserve-consultation`, {
            calendar_id: chosen_time.value,
            user_id_reserved: localStorage.getItem('user_id')
        });
        if(result){
            swal({
                title: result.data.message,
                icon: "success",
                button: "Okay",
            });
        }
        modalVisible.value = false
        getTimeAvailableToday();
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

.radio-input .radio-container{
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
</style>
