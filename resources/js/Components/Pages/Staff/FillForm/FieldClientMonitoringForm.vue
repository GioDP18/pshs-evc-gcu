<template>
    <div>
        <div class="container">
            <div class="text-header">CLIENT MONITORING FORM</div>
            <div class="left-right">
                <div class="left"><div class="row align">
                        <div class="col mb-3">
                            <label class="form-label">Campus:</label>
                            <input type="text" v-model="campus" class="form-control" required>
                        </div>
                        <div class="col mb-3">
                            <label class="form-label">Adviser:</label>
                            <input type="text" v-model="adviser" class="form-control" required>
                        </div>
                    </div>

                    <div class="row align">
                        <div class="col mb-3">
                            <label class="form-label">Name of Student:</label>
                            <div class="custom-dropdown">
                                <input type="text" v-model="searchInput" class="form-control">
                                <div class="dropdown-options" v-show="isDropdownOpen">
                                    <div v-for="student in filteredStudents" :key="student.id" @click="selectStudent(student)">
                                    {{ student.firstname }} {{ student.middlename }} {{ student.lastname }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col mb-3">
                            <label class="form-label">Grade & Section:</label>
                            <input type="text" v-model="grade_section" class="form-control" required>
                        </div>
                    </div>
                    <hr>

                    <div class="row align">
                        <table>
                            <thead>
                                <tr>
                                    <th scope="col">Date</th>
                                    <th scope="col">Areas of Concern</th>
                                    <th scope="col">Action Taken</th>
                                    <th scope="col">Recommendations</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="date" v-model="date" class="form-control" required></td>
                                    <td><textarea class="form-control" v-model="area_of_concern" id="" cols="30" rows="3"></textarea></td>
                                    <td><textarea class="form-control" v-model="action_taken" id="" cols="30" rows="3"></textarea></td>
                                    <td><textarea class="form-control" v-model="recommendation" id="" cols="30" rows="3"></textarea></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="d-flex flex-column flex-md-row justify-content-center justify-content-md-end gap-2" style="width:100%; margin:1rem 0">
                    <div class="" style="">
                        <button type="button" @click="handleSubmit" class="btn btn-primary btn-submit">Submit</button>
                    </div>
                    <div class="" style="">
                        <button type="button" class="btn btn-outline-primary btn-back">Back</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import axios from 'axios';
import { ref, watch, onMounted } from 'vue';
import { useRouter } from "vue-router";

const router = useRouter();

const campus = ref('');
const adviser = ref('');
const user_id = ref('');
const grade_section = ref('');
const searchInput = ref('');
const date = ref('');
const area_of_concern = ref('');
const action_taken = ref('');
const recommendation = ref('');
const students = ref([]);

const isDropdownOpen = ref(false);

// Function to filter students based on search input
const filteredStudents = ref([]);


onMounted(() => {
    getStudents();
})

// Function to select a student
const selectStudent = (student) => {
    user_id.value = student.id;
    searchInput.value = `${student.firstname} ${student.middlename} ${student.lastname}`;
    grade_section.value = `${student.grade_level} ${student.section}`
    isDropdownOpen.value = false;
};

const getStudents = async () => {
    const response = await axios.get(`${import.meta.env.VITE_BASE_URL}/api/v1/get-all-users`)
    students.value = response.data.data;
    console.log(response.data.data);
}

watch(searchInput, (newValue) => {
    if (newValue) {
        filteredStudents.value = students.value.filter(student =>
            (student.firstname.toLowerCase().includes(newValue.toLowerCase())) ||
            (student.middlename.toLowerCase().includes(newValue.toLowerCase())) ||
            (student.lastname.toLowerCase().includes(newValue.toLowerCase()))
        );
        isDropdownOpen.value = true;
    } else {
        filteredStudents.value = [];
        isDropdownOpen.value = false;
    }
});

const submitForm = async () => {
    try{

        const response = await axios.post(`${import.meta.env.VITE_BASE_URL}/api/v1/submit-client-monitoring-form`, {
            campus: campus.value,
            adviser: adviser.value,
            user_id: user_id.value,
            date: date.value,
            area_of_concern: area_of_concern.value,
            action_taken: action_taken.value,
            recommendation: recommendation.value,
        })

        if(response.status === 200){
            swal({
                title: "Form Submitted",
                icon: "success",
                button: "Okay",
            });
           router.push({ name: 'staff-clientMonitoringForm' })
        }
    }
    catch(error){
        console.log(error);
    }
}

const handleSubmit = () => {
    swal({
        title: "Confirm your submition",
        text: "Please make sure all your information is correct",
        icon: "info",
        buttons: true,
        buttons: {
            cancel: {
                text: "Cancel",
                value: true,
                visible: true,
                closeModal: true
            },
            confirm: {
                text: "Confirm",
                value: true,
                visible: true,
                className: "custom-confirm-button",
                closeModal: true
            }
        }
    })
    .then((willDelete) => {
        if (willDelete) {
            submitForm();
        }
    });
}
</script>

<style scoped>
.custom-dropdown {
  position: relative;
}

.dropdown-options {
  position: absolute;
  top: 100%;
  left: 0;
  width: 100%;
  background-color: #fff;
  border: 1px solid #ccc;
  border-top: none;
  border-radius: 0 0 5px 5px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.dropdown-options > div {
  padding: 8px;
  cursor: pointer;
}

.dropdown-options > div:hover {
  background-color: #f0f0f0;
}

.container {
    margin-bottom: 40px;
}

.container .text-header {
    margin-bottom: 40px;
    color: #000000b3;
    font: 700 25px Montserrat, sans-serif;
    border-bottom-width: 5px;
}

.left-right {
    width: 100%;
    /* display: flex; */
}

.container .left {
    width: 100%;
    background-color: #0b5dd72d;
    padding: 20px 20px 20px 20px;
    border-radius: 10px;
}

.container .right {
    width: 10%;
    display: flex;
}

.container label {
    font-weight: bold;
}

.form-group input,
.form-group textarea,
.form-group select {
    border: 1px solid #9e9e9e;
}

.btns {
    margin-bottom: 50px;
}

.btn-submit {
    width: 250px;
}

.btn-back {
    width: 250px;
    margin-right: 10px;
}

@media screen and (max-width:360px) {
    .container .text-header {
        text-align: center;
        font-size: 20px;
    }

    .left-right {
        flex-direction: column;
        width: 100%;
    }

    .left-right .align {
        flex-direction: column;
    }

    .container .left,
    .container .right {
        width: 100%;
    }

    .container .right {
        margin-top: 20px
    }

    .btn-submit {
        width: 100%;
    }

    .btn-back {
        width: 100%;
    }
}
</style>
