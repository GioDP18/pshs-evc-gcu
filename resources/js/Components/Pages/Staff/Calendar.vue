<template>
    <div class="d-flex gap-5">
        <div style="width:70%">
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
                    <p style="font-weight:bold; color:gray; font-size:15px; opacity:60%">Appoinment</p>
                    <div class="ml-4">
                        <p style="font-weight:bold; color:#27516B"><i class="fa-regular fa-clock" style="color:#ED9696"></i> 9:30 am - 11:00 am</p>
                        <p style="font-weight:bold; color:#27516B"><i class="fa-solid fa-calendar-days" style="color:#ED9696"></i> Mon, 25 March 2024</p>
                    </div>
                    <button class="text-light" style="width:100%; padding:10px; border-radius:30px; background-color:#ED9696; border:1px solid #fbebeb">Reschedule</button>
                </div>

                <div style="width:100%; padding:10px; border-radius:20px; border:2px solid #fbebeb">
                    <p style="font-weight:bold; color:gray; font-size:15px; opacity:60%">Available Time</p>
                    <div class="ml-4">
                        <p style="font-weight:bold; color:#27516B"><i class="fa-regular fa-clock" style="color:#ED9696"></i> 7:30 am - 8:30 am</p>
                        <p style="font-weight:bold; color:#27516B"><i class="fa-regular fa-clock" style="color:#ED9696"></i> 1:00 am - 2:00 am</p>
                        <p style="font-weight:bold; color:#27516B"><i class="fa-regular fa-clock" style="color:#ED9696"></i> 3:30 am - 4:00 am</p>
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
import { ref, reactive } from 'vue'

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
};
</script>

<style scoped>
.is-selected {
    background-color: #e6f7ff;
    cursor: pointer;
}
</style>
