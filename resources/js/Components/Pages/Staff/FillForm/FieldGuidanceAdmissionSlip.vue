<template>
    <div>
        <form @submit.prevent="submitGuidanceAdmissionSlip">
            <div class="container">
                <div class="text-header">GUIDANCE ADMISSION SLIP</div>
                <div class="left-right">
                    <div class="left">
                        <div class="mb-3">
                            <label class="form-label">Campus:</label>
                            <input type="text" v-model="campus" class="form-control" required>
                        </div>

                        <div class="row align">
                            <div class="col mb-3">
                                <label class="form-label">Name of Student:</label>
                                <input type="text" v-model="name_of_student" class="form-control" required>
                            </div>
                            <div class="col mb-3 ">
                                <label class="form-label">Grade & Section:</label>
                                <input type="text" v-model="grade_and_section" class="form-control" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label">Dear:</label>
                                <input type="text" v-model="dear" class="form-control" required>
                            </div>
                        </div>

                        <div class="row align">
                            <div class="col mb-3">
                                <label class="form-label">Last Visited Date:</label>
                                <input type="date" v-model="last_visited_date" class="form-control" required>
                            </div>
                            <div class="col mb-3">
                                <label class="form-label">Time Started:</label>
                                <input type="time" v-model="last_visited_time_start" class="form-control" required>
                            </div>
                            <div class="col mb-3">
                                <label class="form-label">Time Ended:</label>
                                <input type="time" v-model="last_visited_time_end" class="form-control" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Guidance Counselor / Life Coaches/ Wellness Facilitator:</label>
                            <input type="text" v-model="guidance_counselor" class="form-control" required>
                        </div>

                        <div class="row align">
                            <div class="col mb-3">
                                <label class="form-label">Received by:</label>
                                <input type="text" v-model="recieved_by" class="form-control" required>
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
            </div>
        </form>
    </div>
</template>

<script setup>
import axios from "axios";
import { ref } from "vue";
import { useRouter } from "vue-router";
import store from "../../../../State/index.js";

const router = useRouter();

const campus = ref("");
const name_of_student = ref("");
const grade_and_section = ref("");
const dear = ref("");
const last_visited_date = ref("");
const last_visited_time_start = ref("");
const last_visited_time_end = ref("");
const guidance_counselor = ref("");
const recieved_by = ref("");


const submitGuidanceAdmissionSlip = async () => {
    store.commit('setLoading', true)
    try{
        const resp = await axios.post(`${import.meta.env.VITE_BASE_URL}/api/v1/submit-guidance-admission-slip`, {
            campus: campus.value,
            name_of_student: name_of_student.value,
            grade_and_section: grade_and_section.value,
            dear: dear.value,
            last_visited_date: last_visited_date.value,
            last_visited_time_start: last_visited_time_start.value,
            last_visited_time_end: last_visited_time_end.value,
            guidance_counselor: guidance_counselor.value,
            recieved_by: recieved_by.value,
        })
        if(resp.status === 200){
            swal({
                title: "Form submitted.",
                icon: "success",
                button: "Okay",
            });

            router.push({name: 'staff-guidanceAdmissionSlip'})
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
