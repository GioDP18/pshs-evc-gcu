<template>
    <div>
        <div class="container">
            <div class="text-header">REFERRAL FORM</div>
            <form>
                <div class="left-right">
                    <div class="left">
                        <div class="progress mb-4">
                            <div class="progress-bar" role="progressbar" :style="{ width: progress + '%' }"
                                aria-valuenow="progress" aria-valuemin="0" aria-valuemax="100">{{ progress }}%</div>
                        </div>
                        <div class="page" v-show="currentPage === 1">
                            <div class="mb-3">
                                <label for="campus" class="form-label">Campus:</label>
                                <input type="text" v-model="campus" class="form-control" id="campus" required>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="studentName" class="form-label">Name of Student:</label>
                                    <input type="text" v-model="name_of_student" class="form-control" id="studentName" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="gradeSection" class="form-label">Grade & Section:</label>
                                    <input type="text" v-model="grade_and_section" class="form-control" id="gradeSection" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="date" class="form-label">Date:</label>
                                    <input type="date" v-model="date" class="form-control" id="date" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="gradeSection" class="form-label">Start:</label>
                                    <input type="text" v-model="selected_time" list="reserve-time" class="form-control" id="gradeSection" required>
                                    <datalist id="reserve-time">
                                        <option v-for="item in time" :key="item" :value="item"></option>
                                    </datalist>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Concern:</label>
                                <div class="concern-options">
                                    <div class="form-check form-check-inline checkbox">
                                        <input class="form-check-input" v-model="concern" type="checkbox" id="academic" value="Academic">
                                        <label class="form-check-label notbold" for="academic">Academic</label>
                                    </div>
                                    <div class="form-check form-check-inline checkbox">
                                        <input class="form-check-input" v-model="concern" type="checkbox" id="behavior" value="Behavior">
                                        <label class="form-check-label notbold" for="behavior">Behavior</label>
                                    </div>
                                    <div class="form-check form-check-inline checkbox">
                                        <input class="form-check-input" v-model="concern" type="checkbox" id="personal" value="Personal">
                                        <label class="form-check-label notbold" for="personal">Personal/Social</label>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Brief Description:</label>
                                <textarea class="form-control" v-model="brief_description" id="description" rows="3" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="intervention" class="form-label">Intervention/s Done:</label>
                                <textarea class="form-control" v-model="intervention_done" id="intervention" rows="3" required></textarea>
                            </div>

                        <div class="mb-3 d-flex align-items-center">
                            <label class="form-label me-3">Requires Follow-up?</label>
                            <div class="form-check me-3">
                                <input class="form-check-input" v-model="follow_up" type="radio" id="followupYes"
                                    value="true" required>
                                <label class="form-check-label notbold" for="followupYes">Yes</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" v-model="follow_up" type="radio" id="followupNo" value="false"
                                    required>
                                <label class="form-check-label notbold" for="followupNo">No</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Referred by:</label>
                            <div class="row fulldes">
                                <div class="col">
                                    <label class="form-label notbold">Full Name:</label>
                                    <input type="text" v-model="referrer_name" class="form-control mb-3" required>
                                </div>
                                <div class="col">
                                    <label class="form-label notbold">Designation:</label>
                                    <input type="text" v-model="designation" class="form-control mb-3" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="page" v-show="currentPage === 2">
                        <div class="mb-3">
                            <label class="form-label">Behavior Spotted:</label>
                            <div class="behavior-options">
                                <div class="form-check">
                                    <input class="form-check-input" v-model="b_1" type="checkbox" id="depressed" value="true">
                                    <label class="form-check-label notbold" for="depressed">Depressed or apathetic
                                        mood.</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" v-model="b_2" type="checkbox" id="helplessness"
                                        value="true">
                                    <label class="form-check-label notbold" for="helplessness">Expression of
                                        helplessness,
                                        hopelessness, worthlessness.</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" v-model="b_3" type="checkbox" id="crying" value="true">
                                    <label class="form-check-label notbold" for="crying">Evidence of crying.</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" v-model="b_4" type="checkbox" id="suicide" value="true">
                                    <label class="form-check-label notbold" for="suicide">Verbal expressions or gestures
                                        of
                                        suicide.</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" v-model="b_5" type="checkbox" id="mood_changes"
                                        value="true">
                                    <label class="form-check-label notbold" for="mood_changes">Noticeable changes in
                                        mood and/or
                                        sudden outburst.</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" v-model="b_6" type="checkbox" id="inappropriate_reaction"
                                        value="true">
                                    <label class="form-check-label notbold" for="inappropriate_reaction">Inappropriate
                                        or
                                        exaggerated emotional reactions to situations, including a lack of emotional
                                        response to stressful events.</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" v-model="b_7" type="checkbox" id="dependency" value="true">
                                    <label class="form-check-label notbold" for="dependency">Excessive dependency on
                                        others or
                                        extreme withdrawal and isolation from others.</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" v-model="b_8" type="checkbox" id="activity" value="true">
                                    <label class="form-check-label notbold" for="activity">Excessive activity or
                                        talkativeness.</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" v-model="b_9" type="checkbox" id="interaction_patterns"
                                        value="true">
                                    <label class="form-check-label notbold" for="interaction_patterns">Unusual or
                                        noticeable
                                        changed interaction patterns with friends or classmates.</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" v-model="b_10" type="checkbox" id="behavior_changes"
                                        value="true">
                                    <label class="form-check-label notbold" for="behavior_changes">New or continuous
                                        behavior
                                        which disrupts the class.</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" v-model="b_11" type="checkbox" id="physical_appearance"
                                        value="true">
                                    <label class="form-check-label notbold" for="physical_appearance">Noticeable changes
                                        in
                                        physical appearance (weight, dress, hygiene).</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" v-model="b_12" type="checkbox" id="academic_performance"
                                        value="true">
                                    <label class="form-check-label notbold" for="academic_performance">Extremely poor
                                        academic
                                        performance, or a drastic decline in grades.</label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3" style="margin-left:20px;">
                            <input class="form-check-input" v-model="b_13" type="checkbox" id="academic_performance"
                                        value="academic_performance">
                            <label class="form-label notbold">Others, please specify:</label>
                            <textarea class="form-control" v-model="others" rows="3" id="other_behaviors"></textarea>
                        </div>
                    </div>
                </div>
                <div class="right d-flex flex-column align-items-end bts">
                    <!-- If it's not the last page, show the next button -->
                    <div v-if="currentPage < totalPages" class="col-md-6 mb-2">
                        <button @click="nextPage" class="btn btn-primary btn-submit">Next</button>
                    </div>
                    <!-- If it's the last page, show the submit button -->
                    <div v-else class="col-md-6 mb-2">
                        <button type="button" @click="handleSubmit" class="btn btn-primary btn-submit">Submit</button>
                    </div>
                    <!-- Back button -->
                    <div class="col-md-6">
                        <button @click="prevPage" class="btn btn-outline-primary btn-back">Back</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</template>

<script setup>
import axios from "axios";
import { ref, watch } from 'vue';
import { useRouter } from "vue-router";

const router = useRouter();

let currentPage = ref(1);
const totalPages = 2;
let progress = ref((currentPage.value / totalPages) * 100);

const fname = localStorage.getItem("firstname");
const mname = localStorage.getItem("middlename");
const lname = localStorage.getItem("lastname");
const referrer_name = `${fname} ${mname} ${lname}`;

const campus = ref("");
const name_of_student = ref("");
const grade_and_section = ref("");
const date = ref("");
const selected_time = ref("");
const concern = ref([]);
const brief_description = ref("");
const intervention_done = ref("");
const follow_up = ref(null);
const others = ref("");
// const referrer_id = localStorage.getItem("user_id");
const designation = ref("");
const b_1 = ref(false);
const b_2 = ref(false);
const b_3 = ref(false);
const b_4 = ref(false);
const b_5 = ref(false);
const b_6 = ref(false);
const b_7 = ref(false);
const b_8 = ref(false);
const b_9 = ref(false);
const b_10 = ref(false);
const b_11 = ref(false);
const b_12 = ref(false);
const b_13 = ref(false);

const time = [
    '7:30 AM - 8:00 AM',
    '8:00 AM - 8:30 AM',
    '8:30 AM - 9:00 AM',
    '9:00 AM - 9:30 PM',
    '9:30 AM - 10:00 AM',
    '10:00 AM - 10:30 AM',
    '10:30 AM - 11:00 AM',
    '11:00 AM - 11:30 AM',
    '11:30 AM - 12:00 PM',
    '12:00 PM - 12:30 PM',
    '12:30 PM - 1:00 PM',
    '1:00 PM - 1:30 PM',
    '1:30 PM - 2:00 PM',
    '2:00 PM - 2:30 PM',
    '2:30 PM - 3:00 PM',
    '3:00 PM - 3:30 PM',
    '3:30 PM - 4:00 PM',
    '4:00 PM - 4:30 PM',
]

function nextPage() {
    if (currentPage.value < totalPages) {
        currentPage.value++;
    }
}

function prevPage() {
    if (currentPage.value > 1) {
        currentPage.value--;
    }
}

watch(currentPage, (newValue) => {
    progress.value = (newValue / totalPages) * 100;
});

const submitForm = async () => {
    try{
        const followUpValue = follow_up.value === 'true' ? true : false;

        const response = await axios.post(`${import.meta.env.VITE_BASE_URL}/api/v1/submit-referral-form`, {
            campus: campus.value,
            user_id: localStorage.getItem("user_id"),
            name_of_student: name_of_student.value,
            grade_and_section: grade_and_section.value,
            date: date.value,
            selected_time: selected_time.value,
            concern: concern.value,
            brief_description: brief_description.value,
            intervention_done: intervention_done.value,
            follow_up: followUpValue,
            others: others.value,
            designation: designation.value,
            b_1: b_1.value,
            b_2: b_2.value,
            b_3: b_3.value,
            b_4: b_4.value,
            b_5: b_5.value,
            b_6: b_6.value,
            b_7: b_7.value,
            b_8: b_8.value,
            b_9: b_9.value,
            b_10: b_10.value,
            b_11: b_11.value,
            b_12: b_12.value,
            b_13: b_13.value,
        })

        if(response.status === 200){
            swal({
                title: "Form Submitted",
                icon: "success",
                button: "Okay",
            });
           router.push({ name: 'staff-referralForm' })
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
.container {
    width: 100%;
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

.container .notbold {
    font-weight: normal;
}

.container .right {
    width: 10%;
}

.container label {
    font-weight: bold;
}

.container .notbold {
    font-weight: normal;
}

.container input,
.container select {
    border: 1px solid #9e9e9e;
}

.concern-options {
    display: flex;
}

.concern-options .form-check {
    margin-right: 15px;
}

.checkbox {
    display: flex;
    align-items: center;
    padding-right: 30px;
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

    .fulldes {
        flex-direction: column;
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
