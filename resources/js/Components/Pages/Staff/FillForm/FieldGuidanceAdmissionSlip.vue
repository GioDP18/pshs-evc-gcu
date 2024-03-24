<template>
    <div class="container">
        <div class="text-header">Counseling Information</div>
        <div class="left-right">
            <div class="left">
                <div class="mb-3">
                    <label for="campus" class="form-label">Campus:</label>
                    <input type="text" class="form-control" id="campus" required>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="date" class="form-label">Date:</label>
                        <input type="date" class="form-control" id="date" required>
                    </div>
                    <div class="col-md-6">
                        <label for="time" class="form-label">Time:</label>
                        <input type="time" class="form-control" id="time" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="counselingType" class="form-label">Type of Counseling:</label>
                    <select class="form-select" id="counselingType" required>
                        <option value="" selected disabled>Select Counseling Type</option>
                        <option value="routine">Routine</option>
                        <option value="referral">Referral</option>
                        <option value="individual">Individual</option>
                        <option value="group">Group</option>
                    </select>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="studentsName" class="form-label">Name of Student/s:</label>
                        <input type="text" class="form-control mb-3" id="requestedBy" required>
                        <input type="text" class="form-control mb-3" id="requestedBy">
                        <input type="text" class="form-control mb-3" id="requestedBy">
                        <input type="text" class="form-control mb-3" id="requestedBy">
                        <input type="text" class="form-control mb-3" id="requestedBy">
                    </div>

                    <div class="col-md-6">
                        <label for="gradeSection" class="form-label">Grade & Section:</label>
                        <input type="text" class="form-control mb-3" id="gradeSection1" required>
                        <input type="text" class="form-control mb-3" id="gradeSection1">
                        <input type="text" class="form-control mb-3" id="gradeSection1">
                        <input type="text" class="form-control mb-3" id="gradeSection1">
                        <input type="text" class="form-control mb-3" id="gradeSection1">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="counselingType" class="form-label">Counseling Session Time:</label>
                    <div class="col-md-6">
                        <label for="startTime" class="form-label notbold">Start:</label>
                        <input type="time" class="form-control" id="startTime" required>
                    </div>
                    <div class="col-md-6">
                        <label for="endTime" class="form-label notbold">End:</label>
                        <input type="time" class="form-control" id="endTime" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="requestedBy" class="form-label">Requested by:</label>
                        <input type="text" class="form-control" id="requestedBy" required>
                    </div>
                    <div class="col-md-6">
                        <label for="notedBy" class="form-label">Noted by:</label>
                        <input type="text" class="form-control" id="notedBy" required>
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
</template>

<script setup>
</script>

<style scoped>
.container {
    width: 100%;
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
        margin-bottom: 10px;
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
