<template>
    <div>
        <div class="container">
            <div class="text-header">PARENT QUESTIONNAIRE FORM</div>
            <div class="left-right">
                <div class="left">
                    <div class="top">
                        <div class="mb-3">
                            <label for="campus" class="form-label">Campus:</label>
                            <input type="text" class="form-control" id="campus" required>
                        </div>

                        <div class="mb-3">
                            <label for="childName" class="form-label">Your Child’s Name:</label>
                            <input type="text" class="form-control" id="childName" required>
                        </div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" :style="{ width: progress + '%' }"
                            aria-valuenow="progress" aria-valuemin="0" aria-valuemax="100">{{ progress }}%</div>
                    </div>
                    <div class="page" v-show="currentPage === 1">
                        <div class="section-title mb-3">
                            <strong>I. INTEGRATION IN THE FAMILY</strong>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">1.1 Did the child grow up with both parents?</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="bothParents" id="bothParentsYes"
                                    value="yes" required>
                                <label class="form-check-label notbold" for="bothParentsYes">Yes</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="bothParents" id="bothParentsNo"
                                    value="no">
                                <label class="form-check-label notbold" for="bothParentsNo">No</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label notbold">If not, with:</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="guardian" id="fatherOnly"
                                    value="father">
                                <label class="form-check-label notbold" for="fatherOnly">Father only</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="guardian" id="motherOnly"
                                    value="mother">
                                <label class="form-check-label notbold" for="motherOnly">Mother only</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col mb-3">
                                <label for="guardianName" class="form-label notbold">Name of the Guardian:</label>
                                <input type="text" class="form-control" id="guardianName">
                            </div>

                            <div class="col  mb-3">
                                <label for="relationship" class="form-label notbold">Relationship:</label>
                                <input type="text" class="form-control" id="relationship">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="yearsWithGuardian" class="form-label">Number of years the child stayed with the
                                guardian:</label>
                            <input type="number" class="form-control" id="yearsWithGuardian" required>
                        </div>
                        <div class="mb-3">
                            <label for="duties" class="form-label">1.2 Does the child have specific duties at
                                home?</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="duties" id="dutiesYes" value="yes">
                                <label class="form-check-label notbold" for="dutiesYes">Yes</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="duties" id="dutiesNo" value="no">
                                <label class="form-check-label notbold" for="dutiesNo">No</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col mb-3">
                                <label for="dutiesDetails" class="form-label notbold">If yes, please enumerate
                                    below:</label>
                                <textarea class="form-control" id="dutiesDetails" rows="3"></textarea>
                            </div>
                            <div class="col mb-3">
                                <label for="dutiesFrequency" class="form-label notbold">How often?</label>
                                <textarea class="form-control" id="dutiesFrequency" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="behavior" class="form-label">1.3 How would you describe your child’s behavior at
                                home?</label>
                            <textarea class="form-control" id="behavior" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="personality" class="form-label">1.4 Personality wise, how would you describe
                                your
                                child?</label>
                            <textarea class="form-control" id="personality" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="goOut" class="form-label">1.5 Do you go out with your child during free
                                time?</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="goOut" id="goOutYes" value="yes">
                                <label class="form-check-label notbold" for="goOutYes">Yes</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="goOut" id="goOutNo" value="no">
                                <label class="form-check-label notbold" for="goOutNo">No</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="goOutFrequency" class="form-label notbold">If yes, how often?</label>
                            <input type="text" class="form-control" id="goOutFrequency">
                        </div>
                    </div>
                    <div class="page" v-show="currentPage === 2">
                        <div class="section-title mb-3">
                            <strong>II. HEALTH AND PHYSICAL DEVELOPMENT</strong>
                        </div>
                    </div>
                    <div class="page" v-show="currentPage === 3">
                        <div class="section-title mb-3">
                            <strong>III. HEALTH AND PHYSICAL DEVELOPMENT</strong>
                        </div>
                    </div>
                    <div class="page" v-show="currentPage === 4">
                        <div class="section-title mb-3">
                            <strong>IV. HEALTH AND PHYSICAL DEVELOPMENT</strong>
                        </div>
                    </div>
                    <div class="page" v-show="currentPage === 5">
                        <div class="section-title mb-3">
                            <strong>V. HEALTH AND PHYSICAL DEVELOPMENT</strong>
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
const totalPages = 5;
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
    border-radius: 10px;
}

.left .top {
    background-color: #0b5dd72d;
    padding: 20px 20px 20px 20px;
    border-radius: 10px;
    margin-bottom: 30px;
}

.left .page {
    background-color: #0b5dd72d;
    padding: 20px 20px 20px 20px;
    border-radius: 10px;
    margin-top: 30px;
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
