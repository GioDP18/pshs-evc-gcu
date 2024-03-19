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
                <div><b>Choose Available Time:</b></div>
                <div class="ml-4 mt-2 d-flex gap-4" style="flex-wrap:wrap;">
                    <div class="d-flex" style="width:6rem" v-for="timeSlot in fixedTimeSlots" :key="timeSlot">
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
