<template>
    <div class="main-content">
        <div class="content">
            <div class="table-card">
                <div class="sub-header">
                    <div class="content-text">Assignment Client Monitoring Form</div>
                </div>
                <table id="table-cmf" class="table table-striped table-hover" width="100%">
                    <thead>
                        <tr>
                            <th>Due Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="assignment in assignments" :key="assignment.id">
                            <td>{{ assignment.due_date }}</td>
                            <td>
                                <div class="dropdown">
                                    <button style="padding-right: 10px;" class="card14" type="button"
                                        id="sendUserCertDropdown" @click="sign">
                                        <span class="send-text">Sign</span>
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
import $ from 'jquery';

const user_id = localStorage.getItem('user_id');
const status = ref(null);
const router = useRouter();
const assignments = ref([]);

onMounted(async () => {
    // await getUsers();
    initializeDataTable();
    getCMF();
});

const initializeDataTable = () => {
    $('#table-cmf').DataTable();
};

const getCMF = async () => {
    try{
        const response = await axios.get(`${import.meta.env.VITE_BASE_URL}/api/v1/get-assigned-forms/${user_id}/${'Client Monitoring Form'}`)
        assignments.value = response.data.data
        console.log(response.data.data)
    }
    catch(error){
        console.log(error);
    }
}

const sign = async () => {
    try{
        const response = await axios.post(`${import.meta.env.VITE_BASE_URL}/api/v1/sign-form/${user_id}/${'Client Monitoring Form'}`)
        if(response.status === 200){
            swal({
                title: response.data.message,
                icon: "success",
                button: "Okay",
            });
        }
        console.log(response.data.data)
    }
    catch(error){
        console.log(error);
    }
}
</script>


<style scoped>
.main-content {
    width: 100%;
}

.content {
    background-color: transparent;
    padding: 20px;
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
    width: 60px;
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
