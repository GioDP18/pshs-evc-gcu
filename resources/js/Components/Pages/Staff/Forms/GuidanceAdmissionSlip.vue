<template>
    <div class="main-content">
        <div class="column-1">
            <div class="table-card">
                <div class="sub-header">
                    <div class="content-text">Guidance Admission Slip</div>
                    <div class="buttons">
                        <button class="create" @click="goToInputs"><i
                                style="margin-right: 5px;"><font-awesome-icon
                                    :icon="['fas', 'pen']" /></i>Create New</button>
                        <button class="assign" data-bs-toggle="modal" data-bs-target="#assign"><i
                                style="margin-right: 5px;"><font-awesome-icon
                                    :icon="['fas', 'user-plus']" /></i>Assign</button>
                        <button class="create" @click="goToRequests"><i
                                style="margin-right: 5px;"><font-awesome-icon :icon="['fas', 'bell']" /></i>Requests
                        </button>
                    </div>
                </div>
                <table id="table-guidance-admission" class="table table-striped table-hover" width="100%">
                    <thead>
                        <tr>
                            <th>Campus</th>
                            <th>Name of student</th>
                            <th>Grade & Section</th>
                            <th>Last visited</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="data in all_data" :key="data.id">
                            <td>{{ data.campus }}</td>
                            <td>{{ data.name_of_student }}</td>
                            <td>{{ data.grade_and_section }}</td>
                            <td>{{ data.last_visited_date }} {{ data.lalst_visited_time_start }} - {{
                            data.lalst_visited_time_end }}</td>
                            <td>
                                <div class="dropdown">
                                    <button style="padding-right: 5px;" class="card14 dropdown-toggle" type="button"
                                        id="sendUserCertDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="send-text">Action</span>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="sendUserCertDropdown">
                                        <li><a class="dropdown-item view" href="#"
                                                @click="sendCertificate('certificate1')"><i><font-awesome-icon
                                                        :icon="['fas', 'eye']"
                                                        style="margin-right: 10px;" /></i>View</a></li>
                                        <li><a class="dropdown-item generate" href="#"
                                                @click="generateForm(data.id)"><i><font-awesome-icon
                                                        :icon="['fas', 'file']"
                                                        style="margin-right: 10px;" /></i>Generate</a></li>
                                        <li><a class="dropdown-item delete" href="#"
                                                @click="sendCertificate('certificate2')"><i><font-awesome-icon
                                                        :icon="['fas', 'trash']"
                                                        style="margin-right: 10px;" /></i>Delete</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>


                <!-- Assign Modal -->
                <div class="modal fade" id="assign" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Send By</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Due Date</span>
                                    <input type="date" v-model="due_date"class="form-control" placeholder="" aria-describedby="basic-addon1">
                                </div>
                                <div class="options">
                                    <button class="individual" data-bs-toggle="modal"
                                        data-bs-target="#individual"><i><font-awesome-icon
                                                :icon="['fas', 'user']" /></i>Individual</button>
                                    <button class="section" data-bs-toggle="modal"
                                        data-bs-target="#section"><i><font-awesome-icon
                                                :icon="['fas', 'user-group']" /></i>Section</button>
                                    <button class="batch" data-bs-toggle="modal"
                                        data-bs-target="#batch"><i><font-awesome-icon
                                                :icon="['fas', 'users']" /></i>Batch</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Individual Modal -->
                <div class="modal fade" id="individual" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">By Individual</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <table id="table-guidance-admission" class="table table-striped table-hover" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Name of student</th>
                                            <th>Grade</th>
                                            <th>Section</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="item in users" :key="item.id">
                                            <td>{{ item.firstname }} {{ item.middlename }} {{ item.firstname }}</td>
                                            <td>{{ item.grade }}</td>
                                            <td>{{ item.section }}</td>
                                            <td>
                                                <button style="padding-right: 5px;" class="card14" type="button"
                                                    aria-expanded="false" @click="assign(item.id)">
                                                    <span class="send-text"><i
                                                            style="margin-right: 5px;"><font-awesome-icon
                                                                :icon="['fas', 'paper-plane']" /></i>Send</span>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section Modal -->
                <div class="modal fade" id="section" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">By Section</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="dropdown" style="width: 100%;">
                                    <button style="width: 100%;" class="btn btn-primary dropdown-toggle" type="button"
                                        id="dropdownGrade" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        {{ selectedGrade ? 'Grade ' + selectedGrade : 'Grade' }}
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownGrade" style="width: 100%;">
                                        <a class="dropdown-item" href="#" @click="selectGrade(7)">Grade 7</a>
                                        <a class="dropdown-item" href="#" @click="selectGrade(8)">Grade 8</a>
                                        <a class="dropdown-item" href="#" @click="selectGrade(9)">Grade 9</a>
                                        <a class="dropdown-item" href="#" @click="selectGrade(10)">Grade 10</a>
                                        <a class="dropdown-item" href="#" @click="selectGrade(11)">Grade 11</a>
                                        <a class="dropdown-item" href="#" @click="selectGrade(12)">Grade 12</a>
                                    </div>
                                </div>
                                <div v-if="selectedGrade" class="dropdown" style="width: 100%; margin-top: 20px;">
                                    <button style="width: 100%;" class="btn btn-primary dropdown-toggle" type="button"
                                        id="dropdownSection" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        {{ selectedSection || 'Section' }}
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownSection" style="width: 100%;">
                                        <a class="dropdown-item" href="#" v-for="section in getSections(selectedGrade)"
                                            :key="section" @click="selectSection(section)">{{ section }}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer" style="display: flex; justify-content: center;">
                                <button type="button" class="btn btn-primary" @click="assignBySection">Send</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Batch Modal -->
                <div class="modal fade" id="batch" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">By Batch</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="dropdown" style="width: 100%;">
                                    <button style="width: 100%;" class="btn btn-primary dropdown-toggle" type="button"
                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        {{ selectedGrade || 'Grade' }}
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"
                                        style="width: 100%;">
                                        <a class="dropdown-item" href="#" @click="selectGrade(7)">7</a>
                                        <a class="dropdown-item" href="#" @click="selectGrade(8)">8</a>
                                        <a class="dropdown-item" href="#" @click="selectGrade(9)">9</a>
                                        <a class="dropdown-item" href="#" @click="selectGrade(10)">10</a>
                                        <a class="dropdown-item" href="#" @click="selectGrade(11)">11</a>
                                        <a class="dropdown-item" href="#" @click="selectGrade(12)">12</a>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer" style="display: flex; justify-content: center;">
                                <button type="button" class="btn btn-primary" @click="assignByBatch">Send</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import DataTable from 'datatables.net-vue3';
import DataTablesCore from 'datatables.net-bs5';
import axios from 'axios';
import { ref, onMounted } from 'vue';
import { useRouter } from 'vue-router';
import $ from 'jquery';
import store from "../../../../State/index.js";

const router = useRouter();

const all_data = ref([]);
const users = ref([]);
const due_date = ref(null);
const bySection = ref(null);
const byBatch = ref(null);
const selectedGrade = ref(null);
const selectedSection = ref(null);

onMounted(async () => {
    // await getUsers();
    initializeDataTable();
    getAllGuidanceAdmissionSlips();
    getAllUsers();
});

const selectGrade = (grade) => {
    selectedGrade.value = grade;
    selectedSection.value = null;
};

const selectSection = (section) => {
    selectedSection.value = section;
};

const initializeDataTable = () => {
    $('#table-guidance-admission').DataTable();
};

const getSections = (grade) => {
    // Dummy data, replace with actual data retrieval based on grade
    if (grade === 7) {
        return ['Diamond', 'Emerald', 'Ruby'];
    } else if (grade === 8) {
        return ['Sampaguita', 'Jasmine', 'Camia'];
    } else if (grade === 9) {
        return ['Sodium', 'Rubidium', 'Potassium'];
    } else if (grade === 10) {
        return ['Proton', 'Electron', 'Neutron'];
    } else if (grade === 11) {
        return ['A', 'B', 'C'];
    } else if (grade === 12) {
        return ['A', 'B', 'C'];
    } else {
        return [];
    }
};

const getAllGuidanceAdmissionSlips = async () => {
    try {
        const resp = await axios.get(`${import.meta.env.VITE_BASE_URL}/api/v1/get-all-guidance-admission-slips`);

        all_data.value = resp.data.data;
    }
    catch (error) {
        console.log(error);
    }
}

const generateForm = async (form_id) => {
    store.commit('setLoading', true)
    try {
        const resp = await axios.get(`${import.meta.env.VITE_BASE_URL}/api/v1/generate-guidance-admission/${form_id}`, {
            responseType: 'arraybuffer'
        })
        if (resp.status === 200) {
            var newBlob = new Blob([resp.data], { type: 'application/pdf' })

            console.log(resp.data)
            const data = window.URL.createObjectURL(newBlob)
            var link = document.createElement('a')
            link.href = data
            link.download = 'Guidance_Admission_Slip' + '.pdf'
            link.click()
        }
    }
    catch (error) {
        console.log(error);
    }
    finally {
        store.commit('setLoading', false)
    }
}

const getAllUsers = async () => {
    try {
        const resp = await axios.get(`${import.meta.env.VITE_BASE_URL}/api/v1/get-all-users`)

        users.value = resp.data.data;
    }
    catch (error) {
        console.log(error);
    }
}

const assign = async (id) => {
    try {
        const resp = await axios.post(`${import.meta.env.VITE_BASE_URL}/api/v1/assign-form`, {
            assignee: id,
            form_name: 'Guidance Admission Slip',
            due_date: due_date.value
        })
        if (resp.status === 200) {
            console.log(resp.data);
            swal({
                title: "Assigned successfully.",
                icon: "success",
                button: "Okay",
            });
        }
    }
    catch (error) {
        console.log(error);
    }
}

const assignBySection = async () => {
    try {
        const resp = await axios.post(`${import.meta.env.VITE_BASE_URL}/api/v1/bulk-assign-form-by-section`, {
            section: selectedSection.value,
            form_name: 'Guidance Admission Slip',
            due_date: due_date.value
        })
        if (resp.status === 200) {
            console.log(resp.data);
            swal({
                title: "Assigned successfully.",
                icon: "success",
                button: "Okay",
            });
        }
    }
    catch (error) {
        console.log(error);
    }
}

const assignByBatch = async () => {
    try {
        const resp = await axios.post(`${import.meta.env.VITE_BASE_URL}/api/v1/bulk-assign-form-by-grade-level`, {
            grade_level: selectedGrade.value,
            form_name: 'Guidance Admission Slip',
            due_date: due_date.value
        })
        if (resp.status === 200) {
            console.log(resp.data);
            swal({
                title: "Assigned successfully.",
                icon: "success",
                button: "Okay",
            });
        }
    }
    catch (error) {
        console.log(error);
    }
}

const goToInputs = () => {
    router.push({ name: 'staff-fieldGuidanceAdmission' })
}

const goToRequests = () => {
    router.push({ name: 'staff-requestGuidanceAdmission' })
}

</script>


<style scoped>
.main-content {
    width: 100%;
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

.sub-header .assign {
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
    width: 98px;
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
