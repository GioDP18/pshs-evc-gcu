<template>
    <div>
        <form @submit.prevent="submitGuidanceCallSlip">
            <div class="container">
                <div class="text-header">GUIDANCE CALL SLIP</div>
                <div class="left-right">
                    <div class="left">
                        <div class="mb-3">
                            <label for="campus" class="form-label">Campus:</label>
                            <input type="text" v-model="campus"class="form-control" id="campus" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="date" class="form-label">Date:</label>
                                <input type="date" v-model="date" class="form-control" id="date" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="time" class="form-label">Time:</label>
                                <input type="time" v-model="time" class="form-control" id="time" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="counselingType" class="form-label">Type of Counseling:</label>
                            <select class="form-select" v-model="type_of_counseling" id="counselingType" required>
                                <option value="" selected disabled>Select Counseling Type</option>
                                <option value="Routine">Routine</option>
                                <option value="Referral">Referral</option>
                                <option value="Individual">Individual</option>
                                <option value="Group">Group</option>
                            </select>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="studentsName" class="form-label">Name of Student/s:</label>
                                <input type="text" v-model="s1" class="form-control mb-3" id="requestedBy" required>
                                <input type="text" v-model="s2" class="form-control mb-3" id="requestedBy">
                                <input type="text" v-model="s3" class="form-control mb-3" id="requestedBy">
                                <input type="text" v-model="s4" class="form-control mb-3" id="requestedBy">
                                <input type="text" v-model="s5" class="form-control mb-3" id="requestedBy">
                            </div>

                            <div class="col-md-6">
                                <label for="gradeSection" class="form-label">Grade & Section:</label>
                                <input type="text" v-model="gs1" class="form-control mb-3" id="gradeSection1" required>
                                <input type="text" v-model="gs2" class="form-control mb-3" id="gradeSection1">
                                <input type="text" v-model="gs3" class="form-control mb-3" id="gradeSection1">
                                <input type="text" v-model="gs4" class="form-control mb-3" id="gradeSection1">
                                <input type="text" v-model="gs5" class="form-control mb-3" id="gradeSection1">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="counselingType" class="form-label">Counseling Session Time:</label>
                            <div class="col-md-6">
                                <label for="startTime" class="form-label notbold">Start:</label>
                                <input type="time" v-model="counseling_time_start" class="form-control" id="startTime" required>
                            </div>
                            <div class="col-md-6">
                                <label for="endTime" class="form-label notbold">End:</label>
                                <input type="time" v-model="counseling_time_end" class="form-control" id="endTime" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="requestedBy" class="form-label">Requested by:</label>
                                <input type="text" v-model="guidance_counselor" class="form-control" id="requestedBy" required>
                            </div>
                            <div class="col-md-6">
                                <label for="notedBy" class="form-label">Noted by:</label>
                                <input type="text" v-model="teacher_in_charge" class="form-control" id="notedBy" required>
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
import store from "../../../../State/index.js"

const router = useRouter();

const campus = ref("");
const date = ref("");
const time = ref("");
const type_of_counseling = ref("");
const counseling_time_start = ref("");
const counseling_time_end = ref("");
const guidance_counselor = ref("");
const teacher_in_charge = ref("");
const s1 = ref(null);
const s2 = ref(null);
const s3 = ref(null);
const s4 = ref(null);
const s5 = ref(null);
const gs1 = ref(null);
const gs2 = ref(null);
const gs3 = ref(null);
const gs4 = ref(null);
const gs5 = ref(null);

const submitGuidanceCallSlip = async () => {
    store.commit('setLoading', true)
    try{
        const resp = await axios.post(`${import.meta.env.VITE_BASE_URL}/api/v1/submit-guidance-call-slip`, {
            campus: campus.value,
            date: date.value,
            time: time.value,
            type_of_counseling: type_of_counseling.value,
            counseling_time_start: counseling_time_start.value,
            counseling_time_end: counseling_time_end.value,
            guidance_counselor: guidance_counselor.value,
            teacher_in_charge: teacher_in_charge.value,
            s1: s1.value,
            s2: s2.value,
            s3: s3.value,
            s4: s4.value,
            s5: s5.value,
            gs1: gs1.value,
            gs2: gs2.value,
            gs3: gs3.value,
            gs4: gs4.value,
            gs5: gs5.value,
        })
        if(resp.status === 200){
            swal({
                title: "Form submitted.",
                icon: "success",
                button: "Okay",
            });

            router.push({name: 'staff-guidanceCallSlip'})
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

.left .notbold {
    font-weight: normal;
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
