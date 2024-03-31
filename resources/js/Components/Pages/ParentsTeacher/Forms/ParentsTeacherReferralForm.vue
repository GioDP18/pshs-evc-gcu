<script setup>
import axios from 'axios';
import { ref, onMounted } from 'vue';
import { useRouter } from 'vue-router';
import $ from 'jquery';
import store from "../../../../State/index.js";

const status = ref(null);
const router = useRouter();
const all_data = ref([]);
const user_id = localStorage.getItem('user_id');

onMounted(async () => {
    // await getUsers();
    initializeDataTable();
    getMyReferralForms();
    checkRequest();
});

const initializeDataTable = () => {
    $('#dailyTimeLog').DataTable();
};

const getMyReferralForms = async () => {
    try {
        const resp = await axios.get(`${import.meta.env.VITE_BASE_URL}/api/v1/get-my-referral-forms/${user_id}`)

        all_data.value = resp.data.data;
    }
    catch (error) {
        console.log(error);
    }
}

const generateForm = async (form_id) => {
    store.commit('setLoading', true)
    try {
        const resp = await axios.get(`${import.meta.env.VITE_BASE_URL}/api/v1/generate-referral-form/${form_id}`, {
            responseType: 'arraybuffer'
        })
        if (resp.status === 200) {
            var newBlob = new Blob([resp.data], { type: 'application/pdf' })

            console.log(resp.data)
            const data = window.URL.createObjectURL(newBlob)
            var link = document.createElement('a')
            link.href = data
            link.download = 'Referral_Form' + '.pdf'
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

const createRequest = async () => {
    try {
        const response = await axios.post(`${import.meta.env.VITE_BASE_URL}/api/v1/request-form`, {
            form_name: 'Referral Form',
            user_id: localStorage.getItem('user_id')
        });
        console.log(response.data);
        if (response.status === 200) {
            swal({
                title: "Request sent.",
                icon: "success",
                button: "Okay",
            });
        }
        checkRequest();
    }
    catch (error) {
        console.log(error);
    }
}

const handleRequest = () => {
    swal({
        title: "Request Referral Form?",
        icon: "info",
        buttons: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                createRequest();
            }
        });
};

const checkRequest = async () => {
    try{
        const response = await axios.post(`${import.meta.env.VITE_BASE_URL}/api/v1/check-request`, {
            user_id: localStorage.getItem('user_id'),
            form_name: 'Referral Form'
        })
        if(response.status === 200){
            status.value = response.data.data.status
        }
        if(response.status === 201){
            status.value = false
        }


    }
    catch(error){
        console.log(error);
    }
}

const goToFill = () => {
    router.push({ name: 'parentsTeacher-fillReferral'})
}

const goToAss = () => {
    router.push({ name: 'parentsTeacher-assReferral'})
}
</script>


<template>
    <div class="main-content">
        <div class="content">
            <div class="column-1">
                <div class="table-card">
                    <div class="sub-header">
                        <div class="content-text">Referral Form</div>
                        <div class="d-flex flex-column flex-md-row gap-2">
                            <button @click="handleRequest" v-if="status === false">Request</button>
                            <button @click="handleRequest" v-if="status === 'pending'" style="cursor:not-allowed" disabled>Request</button>
                            <button @click="goToFill" v-if="status === 'approved'">Fill Form</button>
                            <button @click="goToAss" style="background-color:#DD6D6D;">Assignments</button>
                        </div>

                    </div>
                    <table id="dailyTimeLog" class="table table-striped table-hover" width="100%">
                        <thead>
                            <tr>
                                <th>Campus</th>
                                <th>Student Referred</th>
                                <th>Date of Interview</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="data in all_data" :key="data.id">
                                <td>{{ data.campus }}</td>
                                <td>{{ data.name_of_student }}</td>
                                <td>{{ data.date }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button style="padding-right: 5px;" class="card14 dropdown-toggle" type="button"
                                            id="sendUserCertDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="send-text">Action</span>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="sendUserCertDropdown">
                                            <!-- <li><a class="dropdown-item view" href="#"
                                                    @click="sendCertificate('certificate1')"><i><font-awesome-icon
                                                            :icon="['fas', 'eye']"
                                                            style="margin-right: 10px;" /></i>View</a></li> -->
                                            <li><a class="dropdown-item generate" href="#"
                                                    @click="generateForm(data.id)"><i><font-awesome-icon
                                                            :icon="['fas', 'file']"
                                                            style="margin-right: 10px;" /></i>Generate</a></li>
                                            <!-- <li><a class="dropdown-item delete" href="#"
                                                    @click="sendCertificate('certificate2')"><i><font-awesome-icon
                                                            :icon="['fas', 'trash']"
                                                            style="margin-right: 10px;" /></i>Delete</a></li> -->
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
.main-content {
    width: 100%;
}

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
    color: #000000b3;
    font: 700 20px Montserrat, sans-serif;
    margin-bottom: 20px;
    border-bottom: 1px solid #2087E4;
    width: 81px;
    border-bottom-width: 5px;
}

.sub-header {
    display: flex;
    justify-content: space-between;
    padding-bottom: 30px;
    align-items: center;
}

.sub-header button {
    border: none;
    background-color: #2087E4;
    width: 180px;
    border-radius: 10px;
    height: 50px;
    color: white;
    font-weight: 500;
    font-size: 15px;
    letter-spacing: 2px;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif
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
