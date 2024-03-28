<template>
    <div class="container">
        <div class="main-content">
            <div class="table-card">
                <div class="d-flex justify-content-lg-between">
                    <div>
                        <div class="content-text">Dashboard
                        </div>
                        <p class="date">Monday, 25 March 2024</p>
                    </div>
                    <div>
                        <button class="add-event-btn" data-bs-toggle="modal" data-bs-target="#add-event-modal"><i class="fa-solid fa-plus"></i> Add Event</button>
                    </div>
                    <!-- Modal Add Event -->
                    <div class="modal fade" id="add-event-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <form @submit.prevent="handleAddEvent">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel"><i class="fa-solid fa-pen-nib"></i> Add New Event</h1>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="event-name" class="form-label">Event Name</label>
                                            <input type="text" v-model="event_name"class="form-control" id="event-name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="event-date" class="form-label">Event Date</label>
                                            <input type="date" v-model="event_date"class="form-control" id="event-date">
                                        </div>
                                        <div class="mb-3">
                                            <label for="event-time" class="form-label">Event Time</label>
                                            <input type="time" v-model="event_time"class="form-control" id="event-time">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Add</button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="left-right">
                    <div class="left">
                        <div class="pink-card"></div>
                        <div class="below-pink">
                            <div class="pink-left">
                                <div class="left-text">Activities</div>
                                <div class="acts">
                                    <div class="text">['22-'24] CRF</div>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 40%;"
                                            aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="progress-percentage">40%</div>
                                </div>
                                <hr style="width: 90%; margin: 15px auto;">
                                <div class="acts">
                                    <div class="text">['22-'24] CRF</div>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 40%;"
                                            aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="progress-percentage">40%</div>
                                </div>
                                <hr style="width: 90%; margin: 15px auto;">
                                <div class="acts">
                                    <div class="text">['22-'24] CRF</div>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 20%;"
                                            aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="progress-percentage">20%</div>
                                </div>
                                <hr style="width: 90%; margin: 15px auto;">
                                <div class="acts">
                                    <div class="text">['22-'24] CRF</div>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 5%;"
                                            aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="progress-percentage">5%</div>
                                </div>
                                <hr style="width: 90%; margin: 15px auto;">
                                <div class="acts">
                                    <div class="text">['22-'24] CRF</div>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 40%;"
                                            aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="progress-percentage">40%</div>
                                </div>
                                <hr style="width: 90%; margin: 15px auto;">
                                <div class="acts">
                                    <div class="text">['22-'24] CRF</div>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 20%;"
                                            aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="progress-percentage">20%</div>
                                </div>
                                <hr style="width: 90%; margin: 15px auto;">
                                <div class="acts">
                                    <div class="text">['22-'24] CRF</div>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 85%;"
                                            aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="progress-percentage">85%</div>
                                </div>
                            </div>
                            <div class="pink-right">
                                <div class="folder">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path
                                            d="M20 5h-9.586L8.707 3.293A.997.997 0 0 0 8 3H4c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V7c0-1.103-.897-2-2-2z">
                                        </path>
                                        <text x="50%" y="60%">CRF</text>
                                    </svg>
                                </div>
                                <div class="folder">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path
                                            d="M20 5h-9.586L8.707 3.293A.997.997 0 0 0 8 3H4c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V7c0-1.103-.897-2-2-2z">
                                        </path>
                                        <text x="50%" y="60%">PQF</text>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="right">
                        <div class="event-card" style="padding-bottom: 1rem;">
                            <div class="event-text">Events</div>
                            <div class="event-content">
                                <div class="event-info" v-for="event in events" :key="event.id">
                                    <i><font-awesome-icon :icon="['fas', 'calendar']" /></i>
                                    <div class="info-text">
                                        <p class="info-title">{{ event.event_name }}</p>
                                        <p class="info-date">{{ event.event_date }}, {{ event.event_time }}</p>
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
import axios from "axios";
import { ref, onMounted } from "vue";

const events = ref([]);
const event_name = ref("");
const event_date = ref("");
const event_time = ref("");

onMounted(() => {
    getEvents();
})

const getEvents =async () => {
    try{
        const response = await axios.get(`${import.meta.env.VITE_BASE_URL}/api/v1/get-events`)
        events.value = response.data.data
    }
    catch(error){
        console.log(error);
    }
}

const handleAddEvent = async () => {
    try{
        const response = await axios.post(`${import.meta.env.VITE_BASE_URL}/api/v1/add-event`, {
            event_name: event_name.value,
            event_date: event_date.value,
            event_time: event_time.value
        })

        if(response.status === 200){
            swal({
                title: response.data.message,
                icon: "success",
                button: "Okay",
            });
        }
        getEvents();
    }
    catch(error){
        console.log(error);
    }
}
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

.add-event-btn {
  border-radius: .25rem;
  text-transform: uppercase;
  font-style: normal;
  font-weight: bold;
  padding-left: 25px;
  padding-right: 25px;
  color: #fff;
  -webkit-clip-path: polygon(0 0,0 0,100% 0,100% 0,100% calc(100% - 15px),calc(100% - 15px) 100%,15px 100%,0 100%);
  clip-path: polygon(0 0,0 0,100% 0,100% 0,100% calc(100% - 15px),calc(100% - 15px) 100%,15px 100%,0 100%);
  height: 40px;
  font-size: 0.7rem;
  line-height: 14px;
  letter-spacing: 1.2px;
  transition: .2s .1s;
  background-image: linear-gradient(90deg,#04439b,#4587E4);
  border: 0 solid;
  overflow: hidden;
}

.add-event-btn:hover {
  cursor: pointer;
  transition: all .3s ease-in;
  padding-right: 30px;
  padding-left: 30px;
}
</style>
