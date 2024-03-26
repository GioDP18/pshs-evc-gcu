<template>
    <div class="main-content">
        <div class="column-1">
            <div class="table-card">
                <div class="sub-header">
                    <div class="content-text">Client Monitoring Form Requests</div>
                </div>
                <table id="table-gcs" class="table table-striped table-hover" width="100%">
                    <thead>
                        <tr>
                            <th>ID Number</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>123</td>
                            <td>Bogart The Explorer</td>
                            <td>Male</td>
                            <td>July 1, 2002</td>
                            <td>
                                <div class="actions">
                                    <button style="padding-right: 5px;" class="card14 approve" type="button">
                                        <span class="send-text"><font-awesome-icon :icon="['fas', 'check']" />
                                            Approve</span>
                                    </button>
                                    <button style="padding-right: 5px;" class="card14 reject" type="button">
                                        <span class="send-text"><font-awesome-icon :icon="['fas', 'xmark']" />
                                            Reject</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script setup>
import DataTable from 'datatables.net-vue3';
import DataTablesCore from 'datatables.net-bs5';
import axios from 'axios';
import { ref, onMounted, computed } from 'vue';
import $ from 'jquery';

const allUsers = ref([]);

onMounted(async () => {
    initializeDataTable();
});

const initializeDataTable = () => {
    $('#dailyTimeLog').DataTable();
};
</script>

<style scoped>
.main-content {
    width: 100%;
}

.actions {
    display: flex;
    align-items: center;
    justify-content: start;
    gap: 15px;
}

.actions .approve {
    background-color: #2087E4;
    color: white;
    font-weight: 400;
}

.actions .reject {
    background-color: #ff4141;
    color: white;
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

.sub-header {
    display: flex;
    justify-content: space-between;
    padding-bottom: 30px;
    align-items: center;
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
        justify-content: center;
        align-items: center;
    }
}

.content-text {
    color: #000000b3;
    font: 700 20px Montserrat, sans-serif;
    margin-bottom: 20px;
    border-bottom: 1px solid #2087E4;
    width: 62px;
    border-bottom-width: 5px;
}

@media (max-width: 991px) {
    .content-text {
        max-width: 100%;
        width: 100%;
        border: none;
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
    margin-right: 6px;
    margin-top: 6px;
    margin-bottom: 6px;
}

.send-text i {
    color: #7AA5D2;
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

@media screen and (max-width: 360px) {
    .main-content {
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
        width: 100%;
    }
}
</style>
