<template>
    <div>
        <div class="container">
            <div class="text-header">GUIDANCE ADMISSION SLIP</div>
            <div class="left-right">
                <div class="left">
                    <div class="mb-3">
                        <label class="form-label">Campus:</label>
                        <input type="text" class="form-control" required>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">Name of Student:</label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="col">
                            <label class="form-label">Grade & Section:</label>
                            <input type="text" class="form-control" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">Dear:</label>
                            <input type="text" class="form-control" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">Date:</label>
                            <input type="date" class="form-control" required>
                        </div>
                        <div class="col">
                            <label class="form-label">Time Started:</label>
                            <input type="time" class="form-control" required>
                        </div>
                        <div class="col">
                            <label class="form-label">Time Ended:</label>
                            <input type="time" class="form-control" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Guidance Counselor / Life Coaches/ Wellness Facilitator:</label>
                        <input type="text" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Received by:</label>
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control mb-3" required>
                                <input type="file" class="form-control" required>
                            </div>
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
