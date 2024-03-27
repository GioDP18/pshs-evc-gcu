<template>
    <div class="container">
        <div class="main-content">
            <div class="table-card">
                <div class="content-text">Dashboard
                </div>
                <p class="date">Monday, 25 March 2024</p>
                <div class="left-right">
                    <div class="left">
                    </div>
                    <div class="right">
                        <div class="event-card" style="padding-bottom: 1rem;">
                            <div class="event-text">Events</div>
                            <div class="event-content">
                                <div class="event-info">
                                    <i><font-awesome-icon :icon="['fas', 'calendar']" /></i>
                                    <div class="info-text">
                                        <p class="info-title">Career Talk</p>
                                        <p class="info-date">February 2024, Monday</p>
                                    </div>
                                </div>
                                <div class="event-info">
                                    <i><font-awesome-icon :icon="['fas', 'calendar']" /></i>
                                    <div class="info-text">
                                        <p class="info-title">Love and Relationship</p>
                                        <p class="info-date">February 2024, Monday</p>
                                    </div>
                                </div>
                                <div class="event-info">
                                    <i><font-awesome-icon :icon="['fas', 'calendar']" /></i>
                                    <div class="info-text">
                                        <p class="info-title">Women's Month Celebration</p>
                                        <p class="info-date">February 2024, Monday</p>
                                    </div>
                                </div>
                                <div class="event-info">
                                    <i><font-awesome-icon :icon="['fas', 'calendar']" /></i>
                                    <div class="info-text">
                                        <p class="info-title">Foundation Day</p>
                                        <p class="info-date">February 2024, Monday</p>
                                    </div>
                                </div>
                                <div class="event-info">
                                    <i><font-awesome-icon :icon="['fas', 'calendar']" /></i>
                                    <div class="info-text">
                                        <p class="info-title">Birthday ni Pufferfish</p>
                                        <p class="info-date">February 2024, Monday</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="reminder-card">
                            <div class="reminder-text">Reminders</div>
                            <div class="reminder-content">
                                <div class="reminder-info">
                                    <i><font-awesome-icon :icon="['fas', 'user-clock']" /></i>
                                    <div class="info-text">
                                        <p class="info-title">Career Talk</p>
                                        <p class="info-date">February 2024, Monday</p>
                                    </div>
                                </div>
                                <div class="reminder-info">
                                    <i><font-awesome-icon :icon="['fas', 'user-clock']" /></i>
                                    <div class="info-text">
                                        <p class="info-title">Consultation</p>
                                        <p class="info-date">February 2024, Monday</p>
                                    </div>
                                </div>
                                <div class="reminder-info">
                                    <i><font-awesome-icon :icon="['fas', 'user-clock']" /></i>
                                    <div class="info-text">
                                        <p class="info-title">Movie Date</p>
                                        <p class="info-date">February 2024, Monday</p>
                                    </div>
                                </div>
                                <div class="reminder-info">
                                    <i><font-awesome-icon :icon="['fas', 'user-clock']" /></i>
                                    <div class="info-text">
                                        <p class="info-title">Reminer 1</p>
                                        <p class="info-date">February 2024, Monday</p>
                                    </div>
                                </div>
                                <div class="reminder-info">
                                    <i><font-awesome-icon :icon="['fas', 'user-clock']" /></i>
                                    <div class="info-text">
                                        <p class="info-title">Reminder 2</p>
                                        <p class="info-date">February 2024, Monday</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>

<script setup>


</script>

<style scoped>
.main-content {
    width: 100%;
    padding: 0 20px;
    height: 103vh
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
    color: #000000b3;
    font: 700 20px Montserrat, sans-serif;
    margin-bottom: 20px;
    border-bottom: 1px solid #2087E4;
    width: 114px;
    border-bottom-width: 5px;
}

.date {
    margin-top: -20px;
    color: #6b6b6b;
}

@media (max-width: 991px) {
    .content-text {
        max-width: 100%;
        width: 100%;
        border: none;
    }
}

.card14 {
    justify-content: space-between;
    border-radius: 20px;
    box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
    background-color: #fff;
    display: flex;
    gap: 5px;
    align-items: center;
    border: none;
}

@media (max-width: 991px) {
    .card14 {
        white-space: initial;
    }
}

@media screen and (max-width: 360px) {
    .main-content {
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
        width: 100%;
    }
}

.left-right {
    width: 100%;
    height: 85vh;
    display: flex;
    gap: 5%;
    overflow: hidden;
}

.left {
    width: 65%;
    display: flex;
    flex-direction: column;
    gap: 5%;
}

.left .pink-card {
    width: 100%;
    height: 20%;
    background-color: #FFDDDD;
    border-radius: 15px;
}

.left .below-pink {
    width: 100%;
    height: 75%;
    display: flex;
    gap: 5%;
}

.below-pink .pink-left {
    width: 55%;
    height: 100%;
    border: 1px solid #b1b1b1;
    border-radius: 15px;
    overflow-y: auto;
    padding-bottom: 20px
}

::-webkit-scrollbar {
    width: 2px;
}

/* Handle */
::-webkit-scrollbar-thumb {
    background: #2087E4;
    border-radius: 10px;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
    background: #0088ff;
}

.pink-left .left-text {
    color: #000000d2;
    font: 700 15px Montserrat, sans-serif;
    margin: 10px 0 10px 15px;
    font-style: italic;
    width: 114px;
    border-bottom-width: 5px;
}

.pink-left .acts {
    width: 100%;
    display: flex;
    gap: 5%;
    justify-content: space-evenly;
    align-items: center;
    margin-top: 20px;
}

.acts .text {
    width: 25%;
    font-weight: bold;
    color: #696969;
}

.acts .progress {
    width: 30%;
}

.progress .progress-bar {
    background-color: #f59494;
}

.progress-percentage {
    color: #f59494;
    font-weight: bold;
    width: 10%;
}

.below-pink .pink-right {
    width: 40%;
}

.pink-right .folder {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
}

.folder svg {
    fill: #A1C6FF;
    width: 80%;
    height: 80%;
    margin: 0;
    padding: 0;
}

.folder text {
    text-anchor: middle;
    font-weight: bold;
    font-size: 4px;
    fill: #3d4b5f;
}

.right {
    width: 30%;
    display: flex;
    flex-direction: column;
    gap: 5%;
}

.right .event-card {
    width: 100%;
    height: 50%;
    border: 1px solid #b1b1b1;
    border-radius: 15px;
    overflow-y: auto;
    padding-bottom: 20px;
}

.event-card .event-text {
    color: #000000d2;
    font: 700 15px Montserrat, sans-serif;
    margin: 10px 0 10px 15px;
    font-style: italic;
    width: 114px;
    border-bottom-width: 5px;
}

.event-content,
.reminder-content {
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-self: center;
}

.event-info,
.reminder-info {
    width: 88%;
    display: flex;
    align-items: center;
    justify-content: space-around
}

.event-info i,
.reminder-info i {
    font-size: 30px;
    color: #FE7575;
}

.event-info .info-text,
.reminder-info .info-text {
    width: 80%;
    margin: 0;
    padding: 0;
}

.info-text p {
    margin: -5px auto;
    padding: 0;
}

.info-text .info-title {
    font-weight: 700;
    font-size: 16px;
    color: #3d4b5f;
}

.info-text .info-date {
    color: #949494;
    font-size: 13px;
}

.right .reminder-card {
    width: 100%;
    height: 50%;
    border: 1px solid #b1b1b1;
    border-radius: 15px;
    overflow-y: auto;
    padding-bottom: 20px
}

.reminder-card .reminder-text {
    color: #000000d2;
    font: 700 15px Montserrat, sans-serif;
    margin: 10px 0 10px 15px;
    font-style: italic;
    width: 114px;
    border-bottom-width: 5px;
}

@media screen and (max-width: 360px) {
    .main-content {
        width: 100%;
        height: 100%;
    }

    .table-card {
        width: 100%;
    }

    .left-right {
        width: 100%;
        flex-direction: column;
        height: 100%;
    }

    .left-right .left {
        width: 100%;
        flex-direction: column;
    }

    .left-right .right {
        width: 100%;
        flex-direction: column;
    }

    .left .below-pink {
        width: 100%;
        flex-direction: column !important;
    }

    .below-pink .pink-left {
        width: 100%;
    }

    .below-pink .pink-right {
        display: flex;
        width: 100%;
        align-items: center;
        justify-content: center;
    }

    .pink-right svg {
        width: 130px;
        height: auto;
    }

    .right .event-card {
        margin-bottom: 20px;
    }
}
</style>
