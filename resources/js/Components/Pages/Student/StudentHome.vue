<script setup>
import DataTable from 'datatables.net-vue3';
import DataTablesCore from 'datatables.net-bs5';
import axios from 'axios';
import { ref, onMounted } from 'vue';
import $ from 'jquery';

const totalCertificatesIssued = ref(0);
const totalSeminars = ref(0);
const totalParticipants = ref(0);

onMounted(() => {
    dashboardData();
    initializeDataTable();
});

const initializeDataTable = () => {
    $('#dailyTimeLog').DataTable();
};

const dashboardData = async () => {
    try {
        await axios.get('http://localhost:8000/api/auth/dashboard')
            .then((response) => {
                totalSeminars.value = response.data.totalSeminars;
                totalParticipants.value = response.data.totalParticipants;
                totalCertificatesIssued.value = response.data.totalCertificatesIssued;
            })
    }
    catch (error) {
        console.log(error);
    }
}

</script>

<template>
    <div class="container">
        <div class="main-content">
        </div>
    </div>
</template>

<style>
.dash-pic {
    object-fit: auto;
    object-position: center;
    width: 100%;
    fill: #263238;
    align-self: start;
    margin-top: 35px;
}

.container {
    display: flex;
    flex-direction: column;
    margin-top: 15px;
}

.main-content {
    padding: 0 20px;
    width: 100%;
}

@media (max-width: 991px) {
    .main-content {
        max-width: 100%;
        padding: 0 5px;
    }
}

.column {
    display: flex;
    flex-direction: column;
    width: 100%;
}

@media (max-width: 991px) {
    .column {
        width: 100%;
    }
}

.card1 {
    border-radius: 10px;
    box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
    background-color: #fff;
    display: flex;
    justify-content: space-between;
    gap: 10px;
    width: 100%;
    padding: 15px 35px;
}

@media (max-width: 991px) {
    .card1 {
        margin-top: 30px;
        padding: 2px 20px;
    }
}

.img {
    aspect-ratio: 1;
    object-fit: auto;
    object-position: center;
    width: 42px;
    margin: auto 0;
}

.card-content {
    display: flex;
    flex-grow: 1;
    flex-basis: 0%;
    flex-direction: column;
}

.card-text {
    color: var(--Black, #191919);
    font: 700 28px Inter, sans-serif;
}

.card-subtext {
    color: rgba(60, 54, 51, 0.7);
    margin-top: 23px;
    font: 500 20px Inter, sans-serif;
}

.content-1 {
    margin-top: 20px;
    width: 100%;
    gap: 30px;
    display: flex;
}

@media (max-width: 991px) {
    .content-1 {
        max-width: 100%;
        margin-top: 15px;
        flex-direction: column;
        align-items: stretch;
        gap: 5px;
    }
}

.column-1 {
    display: flex;
    flex-direction: column;
    line-height: normal;
    width: 100%;
    margin-left: 0px;
    margin-top: 30px;
}

@media (max-width: 991px) {
    .column-1 {
        width: 100%;
    }
}

.table-card {
    display: flex;
    margin-top: 5px;
    flex-direction: column;
    font-size: 14px;
    color: #000;
    font-weight: 500;
    white-space: nowrap;
}

@media (max-width: 991px) {
    .table-card {
        max-width: 100%;
        margin-top: 7px;
        white-space: initial;
    }
}

.content-text {
    color: rgba(60, 54, 51, 0.7);
    font: 400 20px Inter, sans-serif;
    margin-bottom: 20px;
}

@media (max-width: 991px) {
    .content-text {
        max-width: 100%;
    }
}

.card14 {
    justify-content: space-between;
    border-radius: 20px;
    box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
    background-color: #fff;
    display: flex;
    gap: 5px;
    align-items: center;
    border: none;
}

@media (max-width: 991px) {
    .card14 {
        white-space: initial;
    }
}

.send-text {
    font-family: Montserrat, sans-serif;
    align-self: start;
    margin-left: 6px;
    margin-top: 6px;
    margin-bottom: 6px;
}

@media (max-width: 991px) {
    .send-text {
        white-space: initial;
    }
}

.img-8 {
    aspect-ratio: 1.1;
    object-fit: auto;
    object-position: center;
    width: 22px;
    margin-right: 6px;
}

.column-2 {
    display: flex;
    flex-direction: column;
    line-height: normal;
    margin-top: 30px;
}

@media (max-width: 991px) {
    .column-2 {
        width: 100%;
    }
}

.card-text0 {
    border-radius: 10px;
    /* box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25); */
    /* background-color: #47555e; */
    width: 315px;
    max-width: 100%;
    height: 340px;
    margin: 0 auto;
}
</style>
