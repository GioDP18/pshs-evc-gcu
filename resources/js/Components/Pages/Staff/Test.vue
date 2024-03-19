<template>
    <div>
        <el-calendar v-model="value">
            <template #date-cell="{ data }">
                <p :class="data.isSelected ? 'is-selected' : ''" @click="handleDateClick(data)">
                    {{ data.day.split('-')[2] }}
                </p>
            </template>
        </el-calendar>
        <!-- Modal -->
        <el-dialog v-model="modalVisible" title="Update Date Availability">
            <hr>
            <p class="mt-3"><b>Date:</b> {{ selectedDate }}</p>
            <div class="mb-4">
                <p>{{ fixedTimeSlots }}</p>
                <p>{{ availableTimeSlots }}</p>

                <div><b>Choose Available Time:</b></div>
                <div class="ml-4 mt-2 d-flex gap-4" style="flex-wrap:wrap;">
                    <div class="d-flex" style="width:6rem" v-for="timeSlot in fixedTimeSlots" :key="timeSlot">
                        <input
                            type="checkbox"
                            :id="timeSlot"
                            :value="timeSlot"
                            :checked="availableTimeSlots.includes(timeSlot)"
                            v-model="selectedTimeSlots"
                        >
                        <label :for="timeSlot" class="m-1">{{ timeSlot }}</label>
                        {{ availableTimeSlots.includes(timeSlot) }}
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <el-button type="primary" @click="updateSchedule">Update Schedule</el-button>
            </div>
        </el-dialog>
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
    '8AM', '9AM', '10AM', '11AM', '12PM', '1PM', '2PM', '3PM', '4PM', '5PM'
]

const handleDateClick = async (data) => {
    try {
        const response = await axios.get(`${import.meta.env.VITE_BASE_URL}/api/v1/get-schedule/${data.day}`)
        console.log(response.data);
        selectedDate.value = data.day
        modalVisible.value = true
        // Update availableTimeSlots with the time slots fetched from the response
        availableTimeSlots.splice(0, availableTimeSlots.length, ...response.data.schedule.map(schedule => schedule.available_time))
    } catch (error) {
        console.error(error);
    }
}
ss
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
</script>

<style scoped>
.is-selected {
    background-color: #e6f7ff;
    cursor: pointer;
}
</style>
