<script setup>
import { ref, onMounted, onBeforeUnmount } from 'vue';
import { useRouter } from 'vue-router'
import axios from 'axios';
import store from '../../State/index.js';

const router = useRouter();

const showSidebar = ref(true);
const showMobileSidebar = ref(false);
const showForms = ref(true); // Control visibility of forms container
const screenWidth = ref(window.innerWidth);

const toggleForms = () => {
    showForms.value = !showForms.value;
};

const updateScreenWidth = () => {
    screenWidth.value = window.innerWidth;
};

const toggleSidebar = () => {
    showSidebar.value = !showSidebar.value;
};

const toggleMobileSidebar = () => {
    showMobileSidebar.value = !showMobileSidebar.value;
    const mobileHamburger = document.querySelector("#mobile-hamburger");
    const searchInput = document.querySelector(".search-input");
    const logoutButton = document.querySelector(".logout-button");

    if (showMobileSidebar.value) {
        mobileHamburger.style.marginLeft = "250px";
        searchInput.style.display = "none";
        logoutButton.style.display = "none";
    } else {
        mobileHamburger.style.marginLeft = "0";
        searchInput.style.display = "block";
        logoutButton.style.display = "block"
    }
};

const initializeHamburgers = () => {
    const hamburgers = document.querySelectorAll(".hamburger");
    if (hamburgers.length > 0) {
        hamburgers.forEach(hamburger => {
            hamburger.addEventListener("click", function () {
                this.classList.toggle("is-active");
            }, false);
        });
    }
};

onMounted(() => {
    window.addEventListener('resize', updateScreenWidth);
    initializeHamburgers();
});
onBeforeUnmount(() => {
    window.removeEventListener('resize', updateScreenWidth);
});


const handleLogout = async () => {
    store.commit('setLoading', true);
}

</script>

<template>
    <div class="container1">
        <!-- Web Sidebar -->
        <div class="sidebar sticky-top" v-show="screenWidth > 991" :class="{ 'minimized': !showSidebar }">
            <RouterLink to="" class="sidebar-logo" style="text-decoration: none;">
                <img loading="lazy" src="../../../../public/external/C-Logo.png" class="img" />
                <div v-if="showSidebar" class="logo-text">
                    <div class="certicode"><span class="certi">PSHS - </span><span class="code">EVC</span><span
                            class="certi"> - GCU</span></div>
                </div>
            </RouterLink>
            <div class="menu">
                <RouterLink to="home" class="sidebar-menu" active-class="active" style="text-decoration: none;"
                    title="home">
                    <i><font-awesome-icon style="" class="icon" :icon="['fas', 'fa-home']" /></i>
                    <div v-if="showSidebar" class="sidebar-text">Home</div>
                </RouterLink>
                <RouterLink to="calendar" class="sidebar-menu" active-class="active" style="text-decoration: none;"
                    title="calendar">
                    <i><font-awesome-icon class="icon" :icon="['fas', 'calendar']" /></i>
                    <div v-if="showSidebar" class="sidebar-text">Calendar</div>
                </RouterLink>
                <div class="forms">
                    <div class="forms-header" @click="toggleForms"
                        :class="{ 'active': $route.path.startsWith('/staff/intakeInterviewForm') || $route.path.startsWith('/staff/guidanceAdmissionSlip') || $route.path.startsWith('/staff/guidanceCallSlip') || $route.path.startsWith('/staff/parentQuestionnaireForm') || $route.path.startsWith('/staff/referralForm') || $route.path.startsWith('/staff/cumulativeRecordForm') || $route.path.startsWith('/staff/clientMonitoringForm') }">
                        <i><font-awesome-icon class="icon" :icon="['fas', 'file']" /></i>
                        <div v-if="showSidebar" class="sidebar-text">Forms</div>
                        <i v-if="showSidebar" class="icon"
                            :class="['fas', showForms ? 'fa-chevron-up' : 'fa-chevron-down']"></i>
                    </div>
                    <div v-show="showForms">
                        <ul class="menu-option">
                            <li>
                                <RouterLink to="intakeInterviewForm" class="form-sidebar-menu"
                                    active-class="form-active" style="text-decoration: none;" title="participants">
                                    <div class="form-sidebar-text">
                                        <span v-if="!showSidebar">IIF</span>
                                        <span v-else style="display: flex;">
                                            <p style="margin-right: 10px;">•</p>Intake Interview
                                            Form
                                        </span>
                                    </div>
                                </RouterLink>
                            </li>

                            <li>
                                <RouterLink to="guidanceAdmissionSlip" class="form-sidebar-menu"
                                    active-class="form-active" style="text-decoration: none;" title="participants">
                                    <div class="form-sidebar-text">
                                        <span v-if="!showSidebar">GAS</span>
                                        <span v-else style="display: flex;">
                                            <p style="margin-right: 10px;">•</p>Guidance Admission
                                            Slip
                                        </span>
                                    </div>
                                </RouterLink>
                            </li>

                            <li>
                                <RouterLink to="guidanceCallSlip" class="form-sidebar-menu" active-class="form-active"
                                    style="text-decoration: none;" title="participants">
                                    <div class="form-sidebar-text">
                                        <span v-if="!showSidebar">GCS</span>
                                        <span v-else style="display: flex;">
                                            <p style="margin-right: 10px;">•</p>Guidance Call Slip
                                        </span>
                                    </div>
                                </RouterLink>
                            </li>

                            <li>
                                <RouterLink to="parentQuestionnaireForm" class="form-sidebar-menu"
                                    active-class="form-active" style="text-decoration: none;" title="participants">
                                    <div class="form-sidebar-text">
                                        <span v-if="!showSidebar">PQF</span>
                                        <span v-else style="display: flex;">
                                            <p style="margin-right: 10px;">•</p>Parent Questionnaire Form
                                        </span>
                                    </div>
                                </RouterLink>
                            </li>
                            <li>
                                <RouterLink to="referralForm" class="form-sidebar-menu" active-class="form-active"
                                    style="text-decoration: none;" title="participants">
                                    <div class="form-sidebar-text">
                                        <span v-if="!showSidebar">RF</span>
                                        <span v-else style="display: flex;">
                                            <p style="margin-right: 10px;">•</p>Referral Form
                                        </span>
                                    </div>
                                </RouterLink>
                            </li>
                            <li>
                                <RouterLink to="cumulativeRecordForm" class="form-sidebar-menu"
                                    active-class="form-active" style="text-decoration: none;" title="participants">
                                    <div class="form-sidebar-text">
                                        <span v-if="!showSidebar">CRF</span>
                                        <span v-else style="display: flex;">
                                            <p style="margin-right: 10px;">•</p>Cumulative Record Form
                                        </span>
                                    </div>
                                </RouterLink>
                            </li>
                            <li>
                                <RouterLink to="clientMonitoringForm" class="form-sidebar-menu"
                                    active-class="form-active" style="text-decoration: none;" title="participants">
                                    <div class="form-sidebar-text">
                                        <span v-if="!showSidebar">CMF</span>
                                        <span v-else style="display: flex;">
                                            <p style="margin-right: 10px;">•</p>Client Monitoring Form
                                        </span>
                                    </div>
                                </RouterLink>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Mobile Sidebar -->
        <div class="mobile-sidebar sticky-top" v-show="screenWidth < 991" :class="{ 'show': showMobileSidebar }">
            <RouterLink to="" class="sidebar-logo" style="text-decoration: none;">
                <img loading="lazy" src="../../../../public/external/C-Logo.png" class="img" />
                <div class="logo-text">
                    <div class="certicode"><span class="certi">PSHS - </span><span class="code">EVC</span><span
                            class="certi"> - GCU</span></div>
                </div>
            </RouterLink>
            <div class="menu">
                <RouterLink to="home" class="sidebar-menu" active-class="active" style="text-decoration: none;"
                    title="home">
                    <i><font-awesome-icon style="" class="icon" :icon="['fas', 'fa-home']" /></i>
                    <div v-if="showSidebar" class="sidebar-text">Home</div>
                </RouterLink>
                <RouterLink to="calendar" class="sidebar-menu" active-class="active" style="text-decoration: none;"
                    title="calendar">
                    <i><font-awesome-icon class="icon" :icon="['fas', 'calendar']" /></i>
                    <div v-if="showSidebar" class="sidebar-text">Calendar</div>
                </RouterLink>
                <div class="forms">
                    <div class="forms-header" @click="toggleForms"
                        :class="{ 'active': $route.path.startsWith('/staff/intakeInterviewForm') || $route.path.startsWith('/staff/guidanceAdmissionSlip') || $route.path.startsWith('/staff/guidanceCallSlip') }">
                        <i><font-awesome-icon class="icon" :icon="['fas', 'file']" /></i>
                        <div v-if="showSidebar" class="sidebar-text">Forms</div>
                        <i v-if="showSidebar" class="icon"
                            :class="['fas', showForms ? 'fa-chevron-up' : 'fa-chevron-down']"></i>
                    </div>
                    <div v-show="showForms">
                        <ul class="menu-option">
                            <li>
                                <RouterLink to="intakeInterviewForm" class="form-sidebar-menu"
                                    active-class="form-active" style="text-decoration: none;" title="participants">
                                    <div class="form-sidebar-text">
                                        <span v-if="!showSidebar">IIF</span>
                                        <span v-else style="display: flex;">
                                            <p style="margin-right: 10px;">•</p>Intake Interview
                                            Form
                                        </span>
                                    </div>
                                </RouterLink>
                            </li>

                            <li>
                                <RouterLink to="guidanceAdmissionSlip" class="form-sidebar-menu"
                                    active-class="form-active" style="text-decoration: none;" title="participants">
                                    <div class="form-sidebar-text">
                                        <span v-if="!showSidebar">GAS</span>
                                        <span v-else style="display: flex;">
                                            <p style="margin-right: 10px;">•</p>Guidance Admission
                                            Slip
                                        </span>
                                    </div>
                                </RouterLink>
                            </li>

                            <li>
                                <RouterLink to="guidanceCallSlip" class="form-sidebar-menu" active-class="form-active"
                                    style="text-decoration: none;" title="participants">
                                    <div class="form-sidebar-text">
                                        <span v-if="!showSidebar">GCS</span>
                                        <span v-else style="display: flex;">
                                            <p style="margin-right: 10px;">•</p>Guidance Call Slip
                                        </span>
                                    </div>
                                </RouterLink>
                            </li>

                            <li>
                                <RouterLink to="parentQuestionnaireForm" class="form-sidebar-menu"
                                    active-class="form-active" style="text-decoration: none;" title="participants">
                                    <div class="form-sidebar-text">
                                        <span v-if="!showSidebar">PQF</span>
                                        <span v-else style="display: flex;">
                                            <p style="margin-right: 10px;">•</p>Parent Questionnaire Form
                                        </span>
                                    </div>
                                </RouterLink>
                            </li>
                            <li>
                                <RouterLink to="referralForm" class="form-sidebar-menu" active-class="form-active"
                                    style="text-decoration: none;" title="participants">
                                    <div class="form-sidebar-text">
                                        <span v-if="!showSidebar">RF</span>
                                        <span v-else style="display: flex;">
                                            <p style="margin-right: 10px;">•</p>Referral Form
                                        </span>
                                    </div>
                                </RouterLink>
                            </li>
                            <li>
                                <RouterLink to="cumulativeRecordForm" class="form-sidebar-menu"
                                    active-class="form-active" style="text-decoration: none;" title="participants">
                                    <div class="form-sidebar-text">
                                        <span v-if="!showSidebar">CRF</span>
                                        <span v-else style="display: flex;">
                                            <p style="margin-right: 10px;">•</p>Cumulative Record Form
                                        </span>
                                    </div>
                                </RouterLink>
                            </li>
                            <li>
                                <RouterLink to="clientMonitoringForm" class="form-sidebar-menu"
                                    active-class="form-active" style="text-decoration: none;" title="participants">
                                    <div class="form-sidebar-text">
                                        <span v-if="!showSidebar">CMF</span>
                                        <span v-else style="display: flex;">
                                            <p style="margin-right: 10px;">•</p>Client Monitoring Form
                                        </span>
                                    </div>
                                </RouterLink>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-content">
            <nav class="header sticky-top z-1">
                <div class="burger-container" v-show="screenWidth > 991">
                    <button class="hamburger hamburger--collapse" type="button" @click="toggleSidebar">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
                <div class="burger-container" v-show="screenWidth < 991">
                    <button id="mobile-hamburger" class="hamburger hamburger--collapse" type="button"
                        @click="toggleMobileSidebar">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
                <form class="search-input">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search Participant">
                        <div class="input-group-btn">
                            <button style="border: 1.5px solid #EEEEEE;;" class="btn btn-default" type="submit">
                                <i><font-awesome-icon style="color: #000; height: 18px;" class="icon"
                                        :icon="['fas', 'fa-search']" /></i>
                            </button>
                        </div>
                    </div>
                </form>
                <div class="logout-button">
                    <i @click="handleLogout"><font-awesome-icon style="color: #000; height: 18px;" class="icon"
                            :icon="['fas', 'fa-power-off']" /></i>
                </div>
            </nav>
            <div class="wrapper">
                <router-view :class="{ 'sidebar-minimized': !showSidebar }"
                    style="overflow: hidden; overflow-y: auto;"></router-view>
            </div>
        </div>
    </div>
</template>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
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

.active {
    background-color: #2087E4;
    color: #ffffff !important;
    font-weight: 600 !important;
}

.form-active {
    font-weight: 600 !important;
    color: #474747 !important;
}

.forms.active {
    background-color: #2087E4;
}

.container1 {
    display: flex;
}

.sidebar {
    box-shadow: 4px 0px 10px 2px rgba(0, 0, 0, 0.25);
    background-color: #ffffff;
    display: flex;
    max-width: 255px;
    height: 100vh;
    flex-direction: column;
    padding: 0px;
    margin: 0px;
    overflow-y: auto;
    max-height: 100vh;
    overflow-x: hidden;
}

.mobile-sidebar {
    box-shadow: 4px 0px 10px 2px rgba(0, 0, 0, 0.25);
    background-color: #ffffff !important;
    display: flex;
    max-width: 250px;
    height: 100vh;
    flex-direction: column;
    padding: 0px;
    margin: 0px;
    position: fixed;
    top: 0;
    left: -250px;
    /* Initial position off-screen */
    z-index: 1000;
    /* Ensure it's above other content */
    transition: left 0.3s ease;
    overflow-y: auto;
    max-height: 100vh;
    /* Add a smooth transition */
}

.show {
    left: 0;
}

.main-content {
    margin-left: 0;
    transition: margin-left 0.3s ease;
    overflow: hidden;
}

.show-mobile-sidebar {
    margin-left: 250px;
}

.sidebar-logo {
    background-color: #ffffff !important;
    display: flex;
    justify-content: center;
    color: var(--Black, #191919);
    padding: 18px 40px;
    align-items: center;
    gap: 15px;
    margin-top: 5px;
}

.sidebar-logo img {
    width: 35px;
    border-radius: 5px;
}

.header {
    background-color: #fff;
    display: flex;
    align-items: center;
    justify-content: space-between;
    color: var(--Black, #191919);
    height: 85px;
    padding: 10px;
}

.img {
    aspect-ratio: 1;
    object-fit: auto;
    object-position: center;
}

.menu {
    transition: margin-left 0.3s ease;
    margin-bottom: 30px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

.logo-text {
    font-family: Inter, sans-serif;
    flex-grow: 1;
    margin: auto 0;
}

.logo-text .certicode {
    margin-top: 3px;
}

.logo-text .certicode .certi {
    color: #000000;
    font-size: 20px;
    font-weight: 700;
}

.logo-text .certicode .code {
    font-size: 20px;
    color: #2087E4;
    font-weight: 600;
}

.send-button {
    border-radius: 8px;
    background-color: #ffffff27;
    align-self: center;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 20px;
    font-size: 16px;
    color: #fff;
    padding: 8px 20px 13px;
    cursor: pointer;
}

.send-button i {
    margin-top: 5px;
}

.logout-button {
    border-radius: 8px;
    border: 1.5px solid #EEEEEE;
    align-self: center;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 8px 10px;
    cursor: pointer;
}

.logout-button:hover {
    border: 2px solid #929699;
}

.menu .sidebar-menu {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 15px;
    gap: 20px;
    font-size: 16px;
    color: #9b9b9b;
    padding: 8px 25px 13px;
    cursor: pointer;
    width: 95%;
    border-radius: 8px;
}

.form-sidebar-menu {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 10px;
    font-size: 16px;
    color: #9b9b9b;
    padding: 8px 10px;
    cursor: pointer;
    margin-bottom: -10px;
}

.forms {
    margin-top: 15px;
    font-size: 16px;
    color: #9b9b9b;
    cursor: pointer;
    width: 95%;
    border-radius: 8px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

.forms-header {
    display: flex;
    justify-content: center;
    padding: 8px 25px 13px;
    align-items: center;
    gap: 23px;
    width: 100%;
    border-radius: 8px;
}

.form-sidebar-text {
    font-family: Inter, sans-serif;
    align-self: start;
    font-size: 14px;
    flex-grow: 1;
    flex-basis: auto;
}

.forms ul {
    list-style-type: none;
    display: flex;
    justify-content: center;
    align-items: start;
    flex-direction: column;
    margin: 0;
    padding: 0;
}

.forms .menu-option .sidebar-text {
    font-family: Inter, sans-serif;
    align-self: start;
    margin-top: 4px;
    flex-grow: 1;
    flex-basis: auto;
}

.search-input {
    width: 500px;
}

.minimized {
    width: 80px;
}

.sidebar-minimized {
    max-width: 100%;
}
</style>
