<template>
    <div>
        <div class="container">
            <h2>Intake Interview Form</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="campus">Campus:</label>
                        <input type="text" class="form-control" id="campus" required>
                    </div>
                    <div class="form-group">
                        <label for="studentName">Name of Student:</label>
                        <input type="text" class="form-control" id="studentName" required>
                    </div>
                    <div class="form-group">
                        <label for="nickname">Nickname:</label>
                        <input type="text" class="form-control" id="nickname" required>
                    </div>
                    <div class="form-group">
                        <label for="elementarySchool">Elementary School Graduated From:</label>
                        <input type="text" class="form-control" id="elementarySchool" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="schoolAddress">School Address:</label>
                        <input type="text" class="form-control" id="schoolAddress" required>
                    </div>
                    <div class="form-group">
                        <label for="age">Age:</label>
                        <input type="text" class="form-control" id="age" required>
                    </div>
                    <div class="form-group">
                        <label for="sex">Sex:</label>
                        <select class="form-control" id="sex" required>
                            <option value="">Select Sex</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="dateOfInterview">Date of Interview:</label>
                        <input type="date" class="form-control" id="dateOfInterview" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="interviewedBy">Interviewed By:</label>
                    <input type="text" class="form-control" id="interviewedBy" required>
                </div>
                <div class="form-group">
                    <label for="comments">Purpose:</label>
                    <textarea class="form-control" id="comments" rows="3" required></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-right">
                    <button type="submit" class="btn btn-primary btn-submit">Submit</button>
                </div>
            </div>
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

.form-group input,
.form-group textarea,
.form-group select {
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
