<template>
    <div class="d-flex gap-5">
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
            <el-dialog v-model="modalVisible" title="Update Time Availability">
                <hr>
                <p class="mt-3"><b>Date:</b> {{ selectedDate }}</p>
                <div class="mb-4">
                    <div><b>Choose Available Time:</b></div>
                    <div class="ml-4 mt-2 d-flex gap-4" style="flex-wrap:wrap;">
                        <div class="d-flex" style="width:10rem" v-for="timeSlot in fixedTimeSlots" :key="timeSlot">
                            <input
                                type="checkbox"
                                :id="timeSlot"
                                :value="timeSlot"
                                :checked="availableTimeSlots.includes(timeSlot)"
                                @change="handleChange(timeSlot)"

                            >
                            <label :for="timeSlot" class="m-1">{{ timeSlot }}</label>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <el-button type="primary" @click="updateSchedule">Update Schedule</el-button>
                </div>
            </el-dialog>
        </div>
        <div style="width:30%">
            <div class="d-flex flex-column gap-3">
                <div style="width:100%; padding:10px; border-radius:20px; border:2px solid #fbebeb">
                    <p style="font-weight:bold; color:gray; font-size:15px; opacity:60%">Appoinments for today</p>
                    <div class="ml-4" style="overflow-x: auto;">
                        <div class="appointment d-flex">
                           <p style="font-weight:bold; color:#27516B"><i class="fa-regular fa-clock" style="color:#ED9696"></i> 8:00 am - 9:00 am <br> <i class="fa-regular fa-user" style="color:#ED9696"></i> Gio Dela Peña</p>
                        </div>
                        <div class="appointment d-flex">
                           <p style="font-weight:bold; color:#27516B"><i class="fa-regular fa-clock" style="color:#ED9696"></i> 9:00 am - 10:00 am <br> <i class="fa-regular fa-user" style="color:#ED9696"></i> John Vincent Ramada</p>
                        </div>
                        <div class="appointment d-flex">
                           <p style="font-weight:bold; color:#27516B"><i class="fa-regular fa-clock" style="color:#ED9696"></i> 10:00 am - 11:00 am <br> <i class="fa-regular fa-user" style="color:#ED9696"></i> tristan Angelo Narido</p>
                        </div>
                    </div>
                </div>

                <div style="width:100%; padding:10px; border-radius:20px; border:2px solid #fbebeb">
                    <p style="font-weight:bold; color:gray; font-size:15px; opacity:60%">Available time for today</p>
                    <div class="ml-4">
                        <p style="font-weight:bold; color:#27516B" v-if="available_time_today.length === 0">No Available time for today.</p>
                        <p style="font-weight:bold; color:#27516B" v-for="item in available_time_today" :key="item.id"><i class="fa-regular fa-clock" style="color:#ED9696"></i> {{ item.available_time }}</p>
                    </div>
                </div>

                <div style="width:100%; padding:10px; border-radius:20px; border:2px solid #fbebeb">
                    <p style="font-weight:bold; color:gray; font-size:15px; opacity:60%">Participants</p>
                    <div class="d-flex gap-2">
                        <p style="font-weight:bold; color:#27516B; font-size:30px;"><i class="fa-regular fa-circle-user" style="color:#9DCBF3"></i></p>
                        <p style="font-weight:bold; color:#27516B; font-size:30px;"><i class="fa-regular fa-circle-user" style="color:#ED9696"></i></p>
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
const availableTimeSlots = reactive([])
const fixedTimeSlots = [
    '8:00 AM - 9:00 AM', '9:00 AM - 10:00 AM', '10:00 AM - 11:00 AM', '11:00 AM - 12:00 PM',
    '1:00 PM - 2:00 PM', '2:00 PM - 3:00 PM', '3:00 PM - 4:00 PM', '4:00 PM - 5:00 PM'
    // '8AM', '9AM', '10AM', '11AM', '12PM', '1PM', '2PM', '3PM', '4PM', '5PM'
]
const available_time_today = ref([])

onMounted(() => {
    getTimeAvailableToday();
})

const handleDateClick = async (data) => {
    selectedTimeSlots.value = []
    try {
        const response = await axios.get(`${import.meta.env.VITE_BASE_URL}/api/v1/get-schedule/${data.day}`)
        console.log(response.data);
        selectedDate.value = data.day
        modalVisible.value = true
        availableTimeSlots.splice(0, availableTimeSlots.length, ...response.data.schedule.map(schedule => schedule.available_time))
        selectedTimeSlots.value = availableTimeSlots
    } catch (error) {
        console.error(error);
    }
}

const updateSchedule = async () => {
    try {
        const response = await axios.post(`${import.meta.env.VITE_BASE_URL}/api/v1/update-schedule`, {
            available_time: selectedTimeSlots.value,
            date: selectedDate.value
        })
        console.log(response.data);
        modalVisible.value = false
        available_time_today.value = []
        getTimeAvailableToday();
        if(response){
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

const getTimeAvailableToday = async () => {
    try{
        const result = await axios.get(`${import.meta.env.VITE_BASE_URL}/api/v1/get-available-time-today`)
        console.log(result.data)
        available_time_today.value = result.data.schedule
    }
    catch(error){
        console.error(error);
    }
}
</script>

<style scoped>
.is-selected {
    background-color: #e6f7ff;
    cursor: pointer;
}

.appointment::before{
    content: "";
    width: 5px;
    height: 50px;
    background-color: #75a6ea;
    margin-right: 7px
}
</style>
