<template>
    <div class="container">
        <div class="main-content">
            <div class="table-card">
                <div class="content-text">Dashboard
                </div>
                <p class="date">Monday, 25 March 2024</p>
                <div class="left-right">
                    <div class="left">
                        <div class="pink-card">
                            <div class="hello-text">
                                <p class="hello">Hello,</p>
                                <p class="name">{{ name }}!</p>
                            </div>
                            <div class="undraw">
                                <img src="../../../../../public/external/undraw_true_friends_c-94-g.svg" alt="">
                            </div>
                        </div>
                        <div class="below-pink">
                            <div class="pink-left">
                                <div class="left-text">Upcoming Events</div>
                                <div class="reminder-container">
                                    <div style="width:100%; padding-left:3rem" v-for="event in events" :key="event.div">
                                        <div class="reminder-content">
                                            <i><font-awesome-icon :icon="['fas', 'calendar']" /></i>
                                            <div class="reminder-info">
                                                <p class="info-title">{{ event.event_name }}</p>
                                                <p class="info-date">{{ event.event_date }}</p>
                                            </div>
                                            <div class="info-time">
                                                <p class="info-time-title">{{ event.event_time }}</p>
                                            </div>
                                        </div>
                                        <hr style="color: black; width: 89%; margin: 2px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="right">
                        <div class="pink-right">
                            <div class="folder">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <!-- Original path -->
                                    <path
                                        d="M20 5h-9.586L8.707 3.293A.997.997 0 0 0 8 3H4c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V7c0-1.103-.897-2-2-2z" />

                                    <!-- Original text -->
                                    <text x="50%" y="60%" fill="#3d4b5f" font-size="4" font-weight="bold"
                                        text-anchor="middle">CRF</text>

                                    <!-- Red circle with number -->
                                    <circle cx="21" cy="5.5" r="2" fill="red" />
                                    <text x="21" y="6.5" fill="white" font-size="3" text-anchor="middle" @click="goToAssCRF" style="cursor:pointer">{{ crf_count }}</text>
                                    <!-- Adjust fill here -->
                                </svg>

                            </div>
                            <div class="folder">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <!-- Original path -->
                                    <path
                                        d="M20 5h-9.586L8.707 3.293A.997.997 0 0 0 8 3H4c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V7c0-1.103-.897-2-2-2z" />

                                    <!-- Original text -->
                                    <text x="50%" y="60%" fill="#3d4b5f" font-size="4" font-weight="bold"
                                        text-anchor="middle">CMF</text>

                                    <!-- Red circle with number -->
                                    <circle cx="21" cy="5.5" r="2" fill="red" />
                                    <text x="21" y="6.5" fill="white" font-size="3" text-anchor="middle" @click="goToAssCMF" style="cursor:pointer">{{ cmf_count }}</text>
                                    <!-- Adjust fill here -->
                                </svg>
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
import { useRouter } from "vue-router";


const router = useRouter();
const name = localStorage.getItem("firstname");
const user_id = localStorage.getItem("user_id");
const events = ref([]);

const crf_count = ref(0);
const cmf_count = ref(0);

onMounted(() => {
    getEvents();
    getCRF();
    getCMF();
});

const getEvents =async () => {
    try{
        const response = await axios.get(`${import.meta.env.VITE_BASE_URL}/api/v1/get-events`)
        events.value = response.data.data
    }
    catch(error){
        console.log(error);
    }
}

const getCRF = async () => {
    try{
        const response = await axios.get(`${import.meta.env.VITE_BASE_URL}/api/v1/get-assigned-forms/${user_id}/${'Cumulative Record Form'}`)
        crf_count.value = response.data.count
        console.log(response.data.data)
    }
    catch(error){
        console.log(error);
    }
}

const getCMF = async () => {
    try{
        const response = await axios.get(`${import.meta.env.VITE_BASE_URL}/api/v1/get-assigned-forms/${user_id}/${'Client Monitoring Form'}`)
        cmf_count.value = response.data.count
        console.log(response.data.data)
    }
    catch(error){
        console.log(error);
    }
}

const goToAssCRF = () => {
    router.push({ name: 'student-assignmentCumulative'})
}

const goToAssCMF = () => {
    router.push({ name: 'student-assignmentClientMonitoring'})
}
</script>

<style scoped>
.pink-left .reminder-container {
    width: 100%;
    display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;
    padding: 0;
    margin: 0;
}

.reminder-container .reminder-content {
    width: 90%;
    display: flex;
    align-items: center;
    padding-left: 20px;
    justify-content: center;
    gap: 30px;
    padding: 0;
    margin: 0;
}

.reminder-content i {
    font-size: 30px;
    color: #FE7575;
}

.reminder-content .reminder-info {
    width: 70%;
    padding: 0;
    margin: 0;
}

.reminder-info .info-title {
    margin: 0;
    padding: 0;
    width: 20%;
    font-size: 20px;
    color: #3D4B5F;
    font-weight: 700;
    font-family: Montserrat, sans-serif;
}

.reminder-info .info-date {
    margin: 0;
    font-size: 12px;
    padding: 0;
    width: 20%;
}

.reminder-content .info-time {
    width: 15%;

}

.info-time p {
    margin-top: 17px;
    font-size: 18px;
    font-weight: 700;
    color: #7a7a7a;
}

.main-content {
    width: 100%;
    padding: 0 20px;
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
    height: 35%;
    background-color: #FFDDDD;
    border-radius: 15px;
    display: flex;
    justify-content: space-between;
}

.pink-card .hello-text {
    width: 50%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    margin: 0;
    padding: 0;
}

.hello-text .hello {
    width: 80%;
    height: 45%;
    font-family: Montserrat, sans-serif;
    font-size: 80px;
    display: flex;
    justify-content: start;
    margin: 0;
    padding: 0;
    color: #4992ff;
}

.hello-text .name {
    width: 80%;
    font-family: Montserrat, sans-serif;
    font-size: 40px;
    display: flex;
    color: #4992ff;
    justify-content: start;
    margin-left: 5px;
}

.pink-card .undraw {
    width: 46.5%;
}

.undraw img {
    width: 100%;
}

.left .below-pink {
    width: 100%;
    display: flex;
    gap: 5%;
}

.below-pink .pink-left {
    width: 100%;
    height: 50vh;
    border: 1px solid #b1b1b1;
    border-radius: 15px;
    overflow-y: auto;
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
    font: 700 18px Montserrat, sans-serif;
    margin: 10px 0 10px 15px;
    font-style: italic;
    width: 95%;
    border-bottom-width: 5px;
    position: sticky;
    top: 0;
    background-color: #fff;
    z-index: 1;
}

.pink-right .folder {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: end;
    position: relative;
    padding: 0;
    margin: 0;
}

.folder svg {
    fill: #A1C6FF;
    width: 300px;
    margin: 0;
    padding: 0;
}

.right {
    width: 30%;
    display: flex;
    flex-direction: column;
    gap: 5%;
}

/* Adjustments for responsiveness */
@media screen and (max-width: 360px) {
    .main-content {
        width: 100%;
        height: auto; /* Change height to auto for responsiveness */
    }

    .left-right {
        flex-direction: column;
        gap: 20px;
        width: 100%;
    }

    .left {
        width: 100%; /* Make the left section full width */
    }

    .pink-card {
        flex-direction: column; /* Stack Hello and undraw vertically */
        align-items: center; /* Center the content horizontally */
        gap: 10px; /* Increase gap for better spacing */
    }

    .pink-card .hello-text {
        width: 100%;
    }

    .hello-text .hello {
        font-size: 50px;
        margin: 0;
        padding: 0;
    }

    .hello-text .name {
        font-size: 30px;
        margin-left: 5px;

    }

    .pink-card .undraw {
        width: 100%;
    }

    .below-pink .pink-left {
        width: 100%;
        margin-top: 25px;
    }

    .reminder-container {
        width: 100%;
    }

    .right {
        width: 100%;
    }

    .pink-right {
        width: 100%;
        justify-content: center;
        align-items: center;
        margin-top: 5px;
        display: flex;
        flex-direction: row;
    }

    .pink-right .folder {
        width: 50%;
        justify-content: center;
        margin-top: 5px;
        border: 1px solid red;
    }
}
</style>
