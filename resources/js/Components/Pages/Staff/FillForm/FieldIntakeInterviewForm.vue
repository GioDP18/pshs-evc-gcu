<template>
    <div>
        <div class="container">
            <div class="text-header">
                INTAKE INTERVIEW FORM
            </div>
            <div class="left-right">
                <div class="left">
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
