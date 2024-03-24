<template>
    <div>
        <el-calendar v-model="value">
            <template #date-cell="{ data }">
                <p :class="data.isSelected ? 'is-selected' : ''" @click="handleDateClick(data)">
                    {{ data.day.split('-')[2] }}
                    <!-- {{ data.isSelected ? '✔️' : '' }} -->
                </p>
            </template>
        </el-calendar>
        <!-- Modal -->
        <el-dialog v-model="modalVisible" title="Consultation Reservation">
            <p>Date: {{ selectedDate }}</p>
            <p>Time slots: </p>
            <el-button type="primary" @click="reserveConsultation">Reserve Consultation</el-button>
        </el-dialog>
    </div>
</template>

<script setup>
import { ref } from 'vue'

const value = ref(new Date())
const modalVisible = ref(false)
const selectedDate = ref(null)

const handleDateClick = (data) => {
    selectedDate.value = data.day
    modalVisible.value = true
}

const reserveConsultation = () => {
    modalVisible.value = false
}
</script>

<style scoped>
.is-selected {
    background-color: #e6f7ff;
    /* Light blue background for selected date */
    cursor: pointer;
    /* Change cursor to pointer on hover */
}
</style>
