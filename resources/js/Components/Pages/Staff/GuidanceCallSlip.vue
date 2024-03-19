<script setup>
import axios from 'axios';
import { ref, onMounted } from 'vue';
import $ from 'jquery';

const allUsers = ref([]);

onMounted(async () => {
    // await getUsers();
    initializeDataTable();
});

const initializeDataTable = () => {
    $('#dailyTimeLog').DataTable();
};

</script>


<template>
    <div class="main-content">
        <div class="content">
            <div class="column-1">
                <div class="table-card">
                    <div class="content-text">Students</div>
                    <table id="dailyTimeLog" class="table table-striped table-hover" width="100%">
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
                                    <div class="dropdown">
                                        <button style="padding-right: 5px;" class="card14 dropdown-toggle" type="button"
                                            id="sendUserCertDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="send-text">Action</span>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="sendUserCertDropdown">
                                            <li><a class="dropdown-item" href="#"
                                                    @click="sendCertificate('certificate1')"><i><font-awesome-icon
                                                            :icon="['fas', 'eye']"
                                                            style="margin-right: 10px;" /></i>View</a></li>
                                            <li><a class="dropdown-item" href="#"
                                                    @click="sendCertificate('certificate2')"><i><font-awesome-icon
                                                            :icon="['fas', 'file']"
                                                            style="margin-right: 10px;" /></i>Generate</a></li>
                                            <li><a class="dropdown-item" href="#"
                                                    @click="sendCertificate('certificate2')"><i><font-awesome-icon
                                                            :icon="['fas', 'trash']"
                                                            style="margin-right: 10px;" /></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>


<style scoped>
.content {
    background-color: transparent;
    padding: 20px;
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

.modal-header {
    background-color: #303841;
    color: #ffffff;
}

.modal-header .button-close {
    color: white !important;
    background-color: transparent;
    border: none;
    font-size: 20px;
}

.list-item {
    position: relative;
}

.list-item p {
    margin-right: 20%;
}

.modal-send {
    position: absolute;
    top: 0;
    right: 0;
    width: 13%;
    border-radius: 20px;
    box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
}

.modal-send button {
    background-color: transparent;
    border: none;
    width: 100%;
}

.modal-send i {
    color: #7AA5D2;
}

.close:hover {
    background-color: #303841;
    color: #ffffff;
}
</style>
