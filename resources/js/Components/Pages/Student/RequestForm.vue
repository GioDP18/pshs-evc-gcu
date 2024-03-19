<script setup>
</script>

<template>
    <div class="main-content">
        <form action="">
            <div class="content">
                <div class="column-1">
                    <div class="table-card">
                        <div class="content-text">Students</div>
                        <div class="container">
                            <div class="radio-tile-group">
                                <div class="input-container">
                                    <input id="walk" class="radio-button" type="radio" name="radio">
                                    <div class="radio-tile">
                                        <label for="walk" class="radio-tile-label">Intake Interview Form</label>
                                    </div>
                                </div>

                                <div class="input-container">
                                    <input id="bike" class="radio-button" type="radio" name="radio">
                                    <div class="radio-tile">
                                        <label for="bike" class="radio-tile-label">Guidance Admission Slip</label>
                                    </div>
                                </div>

                                <div class="input-container">
                                    <input id="drive" class="radio-button" type="radio" name="radio">
                                    <div class="radio-tile">
                                        <label for="drive" class="radio-tile-label">Guidance Call Slip</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="submit-button">Submit</button>
        </form>
    </div>
</template>


<style scoped>
.content {
    background-color: transparent;
    padding: 20px;
}

.column-1 {
    display: flex;
    flex-direction: column;
    line-height: normal;
    width: 100%;
    margin-left: 0px;
    margin-top: 30px;
}

@media (max-width: 991px) {
    .column-1 {
        width: 100%;
    }
}

.table-card {
    display: flex;
    margin-top: 5px;
    flex-direction: column;
    font-size: 14px;
    color: #000;
    font-weight: 500;
    white-space: nowrap;
}

@media (max-width: 991px) {
    .table-card {
        max-width: 100%;
        margin-top: 7px;
        white-space: initial;
    }
}

.content-text {
    color: rgba(60, 54, 51, 0.7);
    font: 400 20px Inter, sans-serif;
    margin-bottom: 20px;
}

@media (max-width: 991px) {
    .content-text {
        max-width: 100%;
    }
}

.container {
    display: flex;
    justify-content: center;
    align-items: center;
}

.radio-tile-group {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 50px;
}

.radio-tile-group .input-container {
    position: relative;
    height: 200px;
    width: 270px;
    margin: 0.5rem;
}

.radio-tile-group .input-container .radio-button {
    opacity: 0;
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    margin: 0;
    cursor: pointer;
}

.radio-tile-group .input-container .radio-tile {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    width: 100%;
    height: 100%;
    border: 2px solid #079ad9;
    border-radius: 5px;
    padding: 1rem;
    transition: transform 300ms ease;
    word-wrap: normal;
}

.radio-tile-group .input-container .radio-tile-label {
    text-align: center;
    font-size: 1rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: #079ad9;
}

.radio-tile-group .input-container .radio-button:checked+.radio-tile {
    background-color: #079ad9;
    border: 2px solid #079ad9;
    color: white;
    transform: scale(1.1, 1.1);
}

.radio-tile-group .input-container .radio-button:checked+.radio-tile .icon svg {
    fill: white;
    background-color: #079ad9;
}

.radio-tile-group .input-container .radio-button:checked+.radio-tile .radio-tile-label {
    color: white;
    background-color: #079ad9;
}

.submit-button {
    position: fixed;
    bottom: 20px;
    right: 20px;
    padding: 10px 20px;
    background-color: #079ad9;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    width: 320px;
    font-weight: 600;
    letter-spacing: 5px;
}

.submit-button:hover {
    background-color: #0579a1;
}
</style>
