<template>
    <div class="main-content">
        <div class="column-1">
            <div class="table-card">
                <div class="sub-header">
                    <div class="content-text">Accounts Registration Application</div>
                    <div class="buttons">
                        <button class="rejected" data-bs-toggle="modal" data-bs-target="#rejected"><i
                                style="margin-right: 10px;" @click="getRegistraionApplicationsRejected()"><font-awesome-icon
                                    :icon="['fas', 'user']" /></i>Rejected</button>
                    </div>
                </div>

                <!-- Individual Modal -->
                <div class="modal fade" id="rejected" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Rejected Accounts</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <table id="table-intake" class="table table-striped table-hover" width="100%">
                                    <thead>
                                        <tr>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Role</th>
                                            <th>ID Number</th>
                                            <th>Grade</th>
                                            <th>Section</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="user in rejections" :key="user.id">
                                            <td>{{ user.firstname }}</td>
                                            <td>{{ user.lastname }}</td>
                                            <td>{{ user.role }}</td>
                                            <td>{{ user.id_number }}</td>
                                            <td>{{ user.grade_level }}</td>
                                            <td>{{ user.section }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
                <table id="table-gcs" class="table table-striped table-hover" width="100%">
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Role</th>
                            <th>ID Number</th>
                            <th>Grade</th>
                            <th>Section</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="application in applications" :key="application.id">
                            <td>{{ application.firstname }}</td>
                            <td>{{ application.lastname }}</td>
                            <td>{{ application.role }}</td>
                            <td>{{ application.id_number }}</td>
                            <td>{{ application.grade_level }}</td>
                            <td>{{ application.section }}</td>
                            <td>
                                <div class="actions">
                                    <button style="padding-right: 5px;" class="card14 approve" type="button"
                                        @click="approveApplication(application.id)">
                                        <span class="send-text"><font-awesome-icon :icon="['fas', 'check']" />
                                            Approve</span>
                                    </button>
                                    <button style="padding-right: 5px;" class="card14 reject" type="button"
                                        @click="rejectionApplication(application.id)">
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
import axios from 'axios';
import { ref, onMounted } from 'vue';
import { useRouter } from 'vue-router';
import DataTable from 'datatables.net-vue3';
import DataTablesCore from 'datatables.net-bs5';
import $ from 'jquery';
import store from "../../../State/index.js";

const applications = ref([]);
const rejections = ref([]);

onMounted(async () => {
    initializeDataTable();
    getRegistraionApplications();
    getRegistraionApplicationsRejected(); 
});

const getRegistraionApplications = async () => {
    try {
        const resp = await axios.get(`${import.meta.env.VITE_BASE_URL}/api/v1/accounts`)

        applications.value = resp.data.data;
    }
    catch (error) {
        console.log(error);
    }
}

const getRegistraionApplicationsRejected = async () => {
    try {
        const resp = await axios.get(`${import.meta.env.VITE_BASE_URL}/api/v1/accounts-rejected`)

        rejections.value = resp.data.data;
    }
    catch (error) {
        console.log(error);
    }
}

const approveApplication = async (form_id) => {
    store.commit('setLoading', true)
    try {
        const resp = await axios.put(`${import.meta.env.VITE_BASE_URL}/api/v1/account-approval/${form_id}`)
        if (resp.data.success == true) {
            console.log(resp.data.message);
        }else {
            console.log(resp.data.message);
        }
        getRegistraionApplications(); 
    }
    catch (error) {
        console.log(error);
    }
    finally {
        store.commit('setLoading', false)
    }
}

const rejectionApplication = async (form_id) => {
    store.commit('setLoading', true)
    
    try {
        const resp = await axios.put(`${import.meta.env.VITE_BASE_URL}/api/v1/account-rejection/${form_id}`)
        if (resp.data.success == true) {
            console.log(resp.data.message);
        }else {
            console.log(resp.data.message);
        }
        getRegistraionApplications();
    }
    catch (error) {
        console.log(error);
    }
    finally {
        store.commit('setLoading', false)
    }
}

const initializeDataTable = () => {
    $('#table-intake').DataTable();
};
</script>

<style scoped>
.main-content {
    width: 100%;
}

.table-content {
    width: 100%;
    height: 85%;
}

@media screen and (max-width:360px) {
    .table-content {
        width: 100%;
        overflow-x: auto;
        white-space: nowrap;
    }

    #table-cmf th,
    #table-cmf td {
        min-width: 150px;
        /* Set a minimum width for table cells */
    }
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

.options {
    width: 100%;
    height: 10vh;
    display: flex;
    justify-content: space-evenly;
    align-items: center;
}

.options button {
    width: 30%;
    height: 60px;
    border: none;
    border-radius: 5px;
    color: white;
    font-weight: 500;
    font-size: 15px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

.options .individual,
.options .batch {
    background-color: #2087E4;
}

.options .section {
    background-color: #FE7575;
}

.sub-header {
    display: flex;
    justify-content: space-between;
    padding-bottom: 30px;
    align-items: center;
}

.sub-header .buttons {
    gap: 8px;
    display: flex;
    align-items: center;
    justify-content: end;
    width: 100%;
}

.sub-header button {
    border: none;
    width: 120px;
    border-radius: 5px;
    height: 40px;
    color: white;
    font-weight: 500;
    font-size: 15px;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif
}

@media screen and (max-width: 360px) {
    .sub-header button {
        width: 100%;
    }

    .sub-header .rejected {
        width: 100%;
    }
}

.sub-header a {
    text-decoration: none;
    border: none;
    width: 120px;
    border-radius: 5px;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 40px;
    color: white;
    font-weight: 500;
    font-size: 15px;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif
}

.sub-header .create {
    background-color: #2087E4;
}

.sub-header .rejected {
    background-color: #FE7575;
}

@media screen and (max-width: 360px) {
    .sub-header {
        width: 100%;
        display: flex;
        flex-direction: column;
    }

    .sub-header button {
        width: 80%;
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
        justify-content: center;
        align-items: center;
    }
}

.content-text {
    color: #000000b3;
    font: 700 20px Montserrat, sans-serif;
    margin-bottom: 20px;
    border-bottom: 1px solid #2087E4;
    width: 97px;
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

.dropdown-menu .view {
    color: #0059a7;
}

.dropdown-menu .generate {
    color: #00a11b;
}

.dropdown-menu .delete {
    color: #a5000e;
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
