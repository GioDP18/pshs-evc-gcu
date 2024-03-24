<template>
    <div class="container">
        <h2>Counseling Information</h2>

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

        <div class="col-md-12 text-end">
            <button type="submit" class="btn btn-primary btn-submit">Submit</button>
        </div>

    </div>
</template>

<script setup>
</script>

<style scoped>
.container h2 {
    margin-bottom: 40px;
    color: #000000b3;
    font: 700 20px Montserrat, sans-serif;
    width: 100%;
    border-bottom-width: 5px;
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

.btn-submit {
    width: 250px;
    margin-bottom: 50px;
}

@media screen and (max-width:360px) {
    .btn-submit {
        width: 100%;
    }
}
</style>
