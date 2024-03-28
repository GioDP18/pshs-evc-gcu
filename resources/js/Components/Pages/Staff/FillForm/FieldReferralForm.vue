<template>
    <div>
        <div class="container">
            <div class="text-header">REFERRAL FORM</div>
            <div class="left-right">
                <div class="left">
                    <div class="progress mb-4">
                        <div class="progress-bar" role="progressbar" :style="{ width: progress + '%' }"
                            aria-valuenow="progress" aria-valuemin="0" aria-valuemax="100">{{ progress }}%</div>
                    </div>
                    <div class="page" v-show="currentPage === 1">
                        <div class="mb-3">
                            <label for="campus" class="form-label">Campus:</label>
                            <input type="text" class="form-control" id="campus" required>
                        </div>

                        <div class="mb-3">
                            <label for="studentName" class="form-label">Name of Student:</label>
                            <input type="text" class="form-control" id="studentName" required>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="gradeSection" class="form-label">Grade & Section:</label>
                                <input type="text" class="form-control" id="gradeSection" required>
                            </div>
                            <div class="col-md-6">
                                <label for="date" class="form-label">Date:</label>
                                <input type="date" class="form-control" id="date" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Concern:</label>
                            <div class="concern-options">
                                <div class="form-check form-check-inline checkbox">
                                    <input class="form-check-input" type="checkbox" id="academic" value="academic">
                                    <label class="form-check-label notbold" for="academic">Academic</label>
                                </div>
                                <div class="form-check form-check-inline checkbox">
                                    <input class="form-check-input" type="checkbox" id="behavior" value="behavior">
                                    <label class="form-check-label notbold" for="behavior">Behavior</label>
                                </div>
                                <div class="form-check form-check-inline checkbox">
                                    <input class="form-check-input" type="checkbox" id="personal" value="personal">
                                    <label class="form-check-label notbold" for="personal">Personal/Social</label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Brief Description:</label>
                            <textarea class="form-control" id="description" rows="3" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="intervention" class="form-label">Intervention/s Done:</label>
                            <textarea class="form-control" id="intervention" rows="3" required></textarea>
                        </div>

                        <div class="mb-3 d-flex align-items-center">
                            <label class="form-label me-3">Requires Follow-up?</label>
                            <div class="form-check me-3">
                                <input class="form-check-input" type="radio" name="followup" id="followupYes"
                                    value="yes" required>
                                <label class="form-check-label notbold" for="followupYes">Yes</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="followup" id="followupNo" value="no"
                                    required>
                                <label class="form-check-label notbold" for="followupNo">No</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Referred by:</label>
                            <div class="row fulldes">
                                <div class="col">
                                    <label class="form-label notbold">Full Name:</label>
                                    <input type="text" class="form-control mb-3" required>
                                </div>
                                <div class="col">
                                    <label class="form-label notbold">Designation:</label>
                                    <input type="text" class="form-control mb-3" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="page" v-show="currentPage === 2">
                        <div class="mb-3">
                            <label class="form-label">Behavior Spotted:</label>
                            <div class="behavior-options">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="depressed" value="depressed">
                                    <label class="form-check-label notbold" for="depressed">Depressed or apathetic
                                        mood.</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="helplessness"
                                        value="helplessness">
                                    <label class="form-check-label notbold" for="helplessness">Expression of
                                        helplessness,
                                        hopelessness, worthlessness.</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="crying" value="crying">
                                    <label class="form-check-label notbold" for="crying">Evidence of crying.</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="suicide" value="suicide">
                                    <label class="form-check-label notbold" for="suicide">Verbal expressions or gestures
                                        of
                                        suicide.</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="mood_changes"
                                        value="mood_changes">
                                    <label class="form-check-label notbold" for="mood_changes">Noticeable changes in
                                        mood and/or
                                        sudden outburst.</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="inappropriate_reaction"
                                        value="inappropriate_reaction">
                                    <label class="form-check-label notbold" for="inappropriate_reaction">Inappropriate
                                        or
                                        exaggerated emotional reactions to situations, including a lack of emotional
                                        response to stressful events.</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="dependency" value="dependency">
                                    <label class="form-check-label notbold" for="dependency">Excessive dependency on
                                        others or
                                        extreme withdrawal and isolation from others.</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="activity" value="activity">
                                    <label class="form-check-label notbold" for="activity">Excessive activity or
                                        talkativeness.</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="interaction_patterns"
                                        value="interaction_patterns">
                                    <label class="form-check-label notbold" for="interaction_patterns">Unusual or
                                        noticeable
                                        changed interaction patterns with friends or classmates.</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="behavior_changes"
                                        value="behavior_changes">
                                    <label class="form-check-label notbold" for="behavior_changes">New or continuous
                                        behavior
                                        which disrupts the class.</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="physical_appearance"
                                        value="physical_appearance">
                                    <label class="form-check-label notbold" for="physical_appearance">Noticeable changes
                                        in
                                        physical appearance (weight, dress, hygiene).</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="academic_performance"
                                        value="academic_performance">
                                    <label class="form-check-label notbold" for="academic_performance">Extremely poor
                                        academic
                                        performance, or a drastic decline in grades.</label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label notbold">Others, please specify:</label>
                            <textarea class="form-control" rows="3" id="other_behaviors"></textarea>
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
                        <button type="submit" class="btn btn-primary btn-submit">Submit</button>
                    </div>
                    <!-- Back button -->
                    <div class="col-md-6">
                        <button @click="prevPage" class="btn btn-outline-primary btn-back">Back</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, watch } from 'vue';

let currentPage = ref(1);
const totalPages = 2;
let progress = ref((currentPage.value / totalPages) * 100);

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
