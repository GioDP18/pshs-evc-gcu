<template>
    <div>
        <div class="container">
            <div class="text-header">
                INTAKE INTERVIEW FORM
            </div>
            <form @submit.prevent="submitIntakeInterview">
                <div class="left-right">
                    <div class="left">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="campus">Campus:</label>
                                    <input type="text" v-model="campus" class="form-control" id="campus" required>
                                </div>
                                <div class="form-group">
                                    <label for="studentName">Name of Student:</label>
                                    <input type="text" v-model="name_of_student" class="form-control" id="studentName" required>
                                </div>
                                <div class="form-group">
                                    <label for="nickname">Nickname:</label>
                                    <input type="text" v-model="nickname" class="form-control" id="nickname" required>
                                </div>
                                <div class="form-group">
                                    <label for="elementarySchool">Elementary School Graduated From:</label>
                                    <input type="text" v-model="elementary_school_graduated" class="form-control" id="elementarySchool" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="schoolAddress">School Address:</label>
                                    <input type="text" v-model="school_address" class="form-control" id="schoolAddress" required>
                                </div>
                                <div class="form-group">
                                    <label for="age">Age:</label>
                                    <input type="text" v-model="age" class="form-control" id="age" required>
                                </div>
                                <div class="form-group">
                                    <label for="sex">Sex:</label>
                                    <select class="form-control" v-model="sex" id="sex" required>
                                        <option value="">Select Sex</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="dateOfInterview">Date of Interview:</label>
                                    <input type="date" v-model="date_of_interview" class="form-control" id="dateOfInterview" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Interviewer:</label>
                                <div class="custom-dropdown">
                                    <input type="text" v-model="searchInput" class="form-control">
                                    <div class="dropdown-options" v-show="isDropdownOpen">
                                        <div v-for="staff in filteredStaffs" :key="staff.id" @click="selectStaff(staff)">
                                        {{ staff.firstname }} {{ staff.middlename }} {{ staff.lastname }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="comments">Notes:</label>
                                <textarea class="form-control" v-model="notes" id="comments" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="right d-flex flex-column align-items-end bts">
                        <div class="col-md-6 mb-2">
                            <button type="submit" class="btn btn-primary btn-submit">Submit</button>
                        </div>
                        <div class="col-md-6">
                            <button type="button" class="btn btn-outline-primary btn-back">Back</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script setup>
import axios from "axios";
import { ref, onMounted, watch } from "vue";
import { useRouter } from "vue-router";
import store from "../../../../State/index.js"

const router = useRouter();

const campus = ref("");
const name_of_student = ref("");
const nickname = ref("");
const elementary_school_graduated = ref("");
const school_address = ref("");
const age = ref("");
const sex = ref("");
const date_of_interview = ref("");
const notes = ref("");
const interviewer = ref(null);

const searchInput = ref('');
const staffs = ref([]);
const isDropdownOpen = ref(false);

// Function to filter students based on search input
const filteredStaffs = ref([]);

onMounted(() => {
    getStaffs();
})

const selectStaff = (staff) => {
    interviewer.value = staff.id;
    searchInput.value = `${staff.firstname} ${staff.middlename} ${staff.lastname}`;
    isDropdownOpen.value = false;
};

const getStaffs = async () => {
    const response = await axios.get(`${import.meta.env.VITE_BASE_URL}/api/v1/get-all-staffs`)
    staffs.value = response.data.data;
    console.log(response.data.data);
}

watch(searchInput, (newValue) => {
    if (newValue) {
        filteredStaffs.value = staffs.value.filter(staff =>
            (staff.firstname.toLowerCase().includes(newValue.toLowerCase())) ||
            (staff.middlename.toLowerCase().includes(newValue.toLowerCase())) ||
            (staff.lastname.toLowerCase().includes(newValue.toLowerCase()))
        );
        isDropdownOpen.value = true;
    } else {
        filteredStaffs.value = [];
        isDropdownOpen.value = false;
    }
});

const submitIntakeInterview = async () => {
    store.commit('setLoading', true)
    try{
        const result = await axios.post(`${import.meta.env.VITE_BASE_URL}/api/v1/submit-intake-interview`, {
            campus: campus.value,
            name_of_student: name_of_student.value,
            nickname: nickname.value,
            elementary_school_graduated: elementary_school_graduated.value,
            school_address: school_address.value,
            age: age.value,
            sex: sex.value,
            date_of_interview: date_of_interview.value,
            notes: notes.value,
            interviewer: interviewer.value,
        })
        if(result.status === 200){
            router.push({name: 'staff-intakeInterviewForm'})
        }
    }
    catch(error){
        console.log(error);
    }
    finally{
        store.commit('setLoading', false)
    }
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
    display: flex;
}

.container .left {
    width: 70%;
    background-color: #0b5dd72d;
    padding: 20px 20px 20px 20px;
    border-radius: 10px;
}

.container .right {
    width: 10%;
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
