<template>
    <div>
        <div class="container">
            <div class="text-header">REFERRAL FORM</div>
            <div class="left-right">
                <div class="left">
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
                        <label for="concern" class="form-label">Concern:</label>
                        <select class="form-select" id="concern" required>
                            <option value="" selected disabled>Select Concern</option>
                            <option value="academic">Academic</option>
                            <option value="behavior">Behavior</option>
                            <option value="personal">Personal/Social</option>
                        </select>
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
                            <input class="form-check-input" type="radio" name="followup" id="followupYes" value="yes"
                                required>
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
                        <label for="uploadSignature" class="form-label notbold">Upload Signature:</label>
                        <input class="form-control" type="file" id="uploadSignature" required>
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
    </div>
</template>

<script setup>
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
