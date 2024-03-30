<template>
    <div class="container1">
        <!-- Web Sidebar -->
        <div class="sidebar sticky-top" v-show="screenWidth > 991" :class="{ 'minimized': !showSidebar }">
            <RouterLink to="" class="sidebar-logo">
                <div style="display: flex;">
                    <img loading="lazy" src="../../../../public/external/logo-g.png" class="img"
                        :class="{ 'img-small': !showSidebar }" />
                    <div v-if="showSidebar" class="logo-text">
                        <div class="phs"><span class="code">RASS</span></div>
                    </div>
                </div>
            </RouterLink>
            <div class="menu">
                <RouterLink to="home" class="sidebar-menu" active-class="active" style="text-decoration: none;"
                    title="Home">
                    <i><font-awesome-icon class="icon" :icon="['fas', 'chart-simple']" /></i>
                    <div v-if="showSidebar" class="sidebar-text">Dashboard</div>
                </RouterLink>
                <RouterLink to="calendar" class="sidebar-menu" active-class="active" style="text-decoration: none;"
                    title="Calendar">
                    <i><font-awesome-icon class="icon" :icon="['fas', 'calendar']" /></i>
                    <div v-if="showSidebar" class="sidebar-text">Calendar</div>
                </RouterLink>
                <div class="forms">
                    <div class="forms-header" @click="toggleForms"
                        :class="{ 'active': $route.path.startsWith('/staff/intakeInterviewForm') || $route.path.startsWith('/staff/guidanceAdmissionSlip') || $route.path.startsWith('/staff/guidanceCallSlip') || $route.path.startsWith('/staff/parentQuestionnaireForm') || $route.path.startsWith('/staff/referralForm') || $route.path.startsWith('/staff/cumulativeRecordForm') || $route.path.startsWith('/staff/clientMonitoringForm') }">
                        <i><font-awesome-icon class="icon" :icon="['fas', 'file']" /></i>
                        <div v-if="showSidebar" class="sidebar-text" title="Forms">Forms</div>
                        <i v-if="showSidebar" class="icon"
                            :class="['fas', showForms ? 'fa-chevron-up' : 'fa-chevron-down']"></i>
                    </div>
                    <div v-show="showForms">
                        <ul class="menu-option" :class="{ 'centered': !showSidebar }">
                            <li>
                                <RouterLink to="intakeInterviewForm" class="form-sidebar-menu"
                                    active-class="form-active"
                                    :class="{ 'form-active': $route.path.startsWith('/staff/requestIntakeInterview') || $route.path.startsWith('/staff/fieldIntakeInterview') }"
                                    style="text-decoration: none;" title="Intake Interview Form">
                                    <div class="form-sidebar-text">
                                        <span v-if="!showSidebar">IIF</span>
                                        <span v-else style="display: flex;">
                                            <p style="margin-right: 10px;">•</p>Intake Interview Form
                                        </span>
                                    </div>
                                </RouterLink>
                            </li>

                            <li>
                                <RouterLink to="guidanceAdmissionSlip" class="form-sidebar-menu"
                                    active-class="form-active"
                                    :class="{ 'form-active': $route.path.startsWith('/staff/requestGuidanceAdmission') || $route.path.startsWith('/staff/fieldGuidanceAdmission') }"
                                    style="text-decoration: none;" title="Guidance Admission">
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
                                    :class="{ 'form-active': $route.path.startsWith('/staff/requestGuidanceCall') || $route.path.startsWith('/staff/fieldGuidanceCall') }"
                                    style="text-decoration: none;" title="Guidance Call Slip">
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
                                    active-class="form-active"
                                    :class="{ 'form-active': $route.path.startsWith('/staff/requestParentQuestionnaire') || $route.path.startsWith('/staff/fieldParentQuestionnaire') }"
                                    style="text-decoration: none;" title="Parent Questionnaire Form">
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
                                    :class="{ 'form-active': $route.path.startsWith('/staff/requestReferralForm') || $route.path.startsWith('/staff/fieldReferralForm') }"
                                    style="text-decoration: none;" title="Referral Form">
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
                                    active-class="form-active"
                                    :class="{ 'form-active': $route.path.startsWith('/staff/requestCumulativeRecord') || $route.path.startsWith('/staff/fieldCumulativeRecord') }"
                                    style="text-decoration: none;" title="Cumulative Record Form">
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
                                    active-class="form-active"
                                    :class="{ 'form-active': $route.path.startsWith('/staff/requestClientMonitoring') || $route.path.startsWith('/staff/fieldClientMonitoring') }"
                                    style="text-decoration: none;" title="Client Monitoring Form">
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
                <div style="display: flex;">
                    <img loading="lazy" src="../../../../public/external/logo-g.png" class="img"
                        :class="{ 'img-small': !showSidebar }" />
                    <div v-if="showSidebar" class="logo-text">
                        <div class="phs"><span class="code">RASS</span></div>
                    </div>
                </div>
            </RouterLink>
            <div class="menu">
                <RouterLink to="home" class="sidebar-menu" active-class="active" style="text-decoration: none;"
                    title="home">
                    <i><font-awesome-icon class="icon" :icon="['fas', 'chart-simple']" /></i>
                    <div v-if="showSidebar" class="sidebar-text">Dashboard</div>
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
                                    active-class="form-active"
                                    :class="{ 'form-active': $route.path.startsWith('/staff/requestIntakeInterview') || $route.path.startsWith('/staff/fieldIntakeInterview') }"
                                    style="text-decoration: none;" title="Intake Interview Form">
                                    <div class="form-sidebar-text">
                                        <span v-if="!showSidebar">IIF</span>
                                        <span v-else style="display: flex;">
                                            <p style="margin-right: 10px;">•</p>Intake Interview Form
                                        </span>
                                    </div>
                                </RouterLink>
                            </li>

                            <li>
                                <RouterLink to="guidanceAdmissionSlip" class="form-sidebar-menu"
                                    active-class="form-active"
                                    :class="{ 'form-active': $route.path.startsWith('/staff/requestGuidanceAdmission') || $route.path.startsWith('/staff/fieldGuidanceAdmission') }"
                                    style="text-decoration: none;" title="Guidance Admission">
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
                                    :class="{ 'form-active': $route.path.startsWith('/staff/requestGuidanceCall') || $route.path.startsWith('/staff/fieldGuidanceCall') }"
                                    style="text-decoration: none;" title="Guidance Call Slip">
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
                                    active-class="form-active"
                                    :class="{ 'form-active': $route.path.startsWith('/staff/requestParentQuestionnaire') || $route.path.startsWith('/staff/fieldParentQuestionnaire') }"
                                    style="text-decoration: none;" title="Parent Questionnaire Form">
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
                                    :class="{ 'form-active': $route.path.startsWith('/staff/requestReferralForm') || $route.path.startsWith('/staff/fieldReferralForm') }"
                                    style="text-decoration: none;" title="Referral Form">
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
                                    active-class="form-active"
                                    :class="{ 'form-active': $route.path.startsWith('/staff/requestCumulativeRecord') || $route.path.startsWith('/staff/fieldCumulativeRecord') }"
                                    style="text-decoration: none;" title="Cumulative Record Form">
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
                                    active-class="form-active"
                                    :class="{ 'form-active': $route.path.startsWith('/staff/requestClientMonitoring') || $route.path.startsWith('/staff/fieldClientMonitoring') }"
                                    style="text-decoration: none;" title="Client Monitoring Form">
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
            <nav class="header" :class="{ 'sticky': isSticky }">
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
                <div class="dropdown dropdown-hide dropdown-image" :class="{ 'hidden': showMobileSidebar }"
                    style="display: flex; justify-content: center; align-items: center;">
                    <button class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"
                        style="display: flex; justify-content: center; align-items: center;">
                        <span class="dropdown-text">{{ firstname }}</span>
                        <i class="icon fas fa-chevron-down"></i>
                        <div class="image-container">
                            <img src="../../../../public/external/user.png" alt="Avatar">
                        </div>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <RouterLink to="profilePage" class="dropdown-item"><i><font-awesome-icon :icon="['fas', 'user']"
                                    style="margin-right: 15px;" /></i>View Profile</RouterLink>
                        <button style="color: #a5000e;" @click="handleLogout" class="dropdown-item"
                            href="#"><i><font-awesome-icon class="icon" :icon="['fas', 'fa-power-off']"
                                    style="margin-right: 15px;" /></i>Logout</button>
                    </div>
                </div>
            </nav>
            <div class="wrapper">
                <router-view :class="{ 'sidebar-minimized': !showSidebar }"
                    style="overflow: hidden; overflow-y: auto;"></router-view>
            </div>
        </div>
    </div>
</template>

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
const firstname = ref('');

const toggleForms = () => {
    showForms.value = !showForms.value;
};

const updateScreenWidth = () => {
    screenWidth.value = window.innerWidth;
    // Update showSidebar to true if screen width becomes less than 360px
    if (screenWidth.value < 360) {
        showSidebar.value = true;
    }
};

const toggleSidebar = () => {
    showSidebar.value = !showSidebar.value;
};

const toggleMobileSidebar = () => {
    showMobileSidebar.value = !showMobileSidebar.value;
    const mobileHamburger = document.querySelector("#mobile-hamburger");
    const logoutButton = document.querySelector(".dropdown-image");

    if (showMobileSidebar.value) {
        mobileHamburger.style.marginLeft = "250px";
        logoutButton.style.display = "none";
    } else {
        mobileHamburger.style.marginLeft = "0";
        logoutButton.style.display = "block";
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

const isSticky = ref(false);
let lastScrollPosition = 0;

const handleScroll = () => {
    const scrollPosition = window.scrollY || window.pageYOffset;
    if (scrollPosition > lastScrollPosition) {
        isSticky.value = true;
    } else {
        isSticky.value = false;
    }
    lastScrollPosition = scrollPosition;
};

onMounted(() => {
    window.addEventListener('resize', updateScreenWidth);
    window.addEventListener('scroll', handleScroll);
    initializeHamburgers();
    getUserProfile();
});
onBeforeUnmount(() => {
    window.removeEventListener('resize', updateScreenWidth);
    window.removeEventListener('scroll', handleScroll);
});

const getUserProfile = async () => {
    try {
        const user_id = localStorage.getItem('user_id');
        const response = await axios.get(`${import.meta.env.VITE_BASE_URL}/api/v1/get-user-data/${user_id}`)
        console.log(response.data.data.firstname)
        firstname.value = response.data.data.firstname
    }
    catch (error) {
        console.log(error);
    }
}

const handleLogout = async () => {
    store.commit('setLoading', true);
    try {
        const token = localStorage.getItem('token');
        const headers = { Authorization: `Bearer ${token}` };

        const response = await axios.post(`${import.meta.env.VITE_BASE_URL}/api/v1/logout`, {}, { headers });

        if (response.status === 200) {
            localStorage.removeItem('token');
            localStorage.setItem('valid', false);
            router.push({ name: 'login' })
        }
    }
    catch (error) {
        console.log(error);
    }
    finally {
        store.commit('setLoading', false);
    }
}

</script>

<style scoped>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.sticky .dropdown-hide {
    display: none !important;
}

.sticky {
    animation: slideDown 0.3s ease;
}

.sticky {
    position: fixed;
    top: 0;
    z-index: 1000;
    width: 100%;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-toggle {
    background-color: transparent;
    border: none;
    cursor: pointer;
    display: flex;
    align-items: center;
    font-weight: 600
}

.dropdown-toggle::after {
    display: none;
}

.dropdown-toggle img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    margin-right: 10px;
    border: 3px solid #2087E4;
}

.dropdown-toggle .icon {
    margin-left: 5px;
    font-size: 10px;
    margin-right: 10px;
}

.dropdown-menu {
    position: absolute;
    top: 100%;
    left: 0;
    display: none;
    min-width: 160px;
    padding: 10px 0;
    margin: 2px 0 0;
    font-size: 14px;
    text-align: left;
    background-color: #ffffff;
    border: 1px solid rgba(0, 0, 0, 0.15);
    border-radius: 4px;
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
}

.dropdown-menu.show {
    display: block;
}

.dropdown-item {
    display: block;
    width: 100%;
    padding: 3px 20px;
    clear: both;
    font-weight: 400;
    color: #212529;
    text-align: inherit;
    white-space: nowrap;
    background-color: transparent;
    border: 0;
    cursor: pointer;
    transition: background-color 0.15s ease-in-out;
}

.dropdown-item:hover {
    background-color: #f8f9fa;
}

@media (max-width: 360px) {
    .dropdown-text {
        display: none;
    }

    .dropdown-toggle .icon {
        display: none;
    }

    .dropdown-toggle img {
        margin-left: 20px;
    }
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
    max-width: 340px;
    width: 320px;
    height: 100vh;
    flex-direction: column;
    padding: 0px;
    margin: 0px;
    overflow-y: auto;
    max-height: 100vh;
    overflow-x: hidden;
}

.sidebar-text {
    font-family: Montserrat, sans-serif;
    align-self: start;
    margin-top: 4px;
    flex-grow: 1;
    flex-basis: auto;
}

.mobile-sidebar {
    box-shadow: 4px 0px 10px 2px rgba(0, 0, 0, 0.25);
    background-color: #ffffff !important;
    display: flex;
    max-width: 250px;
    width: 250px;
    height: 100vh;
    flex-direction: column;
    padding: 0px;
    margin: 0px;
    position: fixed;
    top: 0;
    left: -250px;
    z-index: 1000;
    transition: left 0.3s ease;
    overflow-y: auto;
    max-height: 100vh;
}

.show {
    left: 0;
}

.main-content {
    margin-left: 0;
    transition: margin-left 0.3s ease;
    overflow: hidden;
    width: 100%;
    padding: 0 20px;
}

@media screen and (max-width:360px) {
    .main-content {
        padding: 0 5px;
    }
}

.show-mobile-sidebar {
    margin-left: 250px;
}

.sidebar-logo {
    background-color: #ffffff !important;
    display: flex;
    align-items: center;
    justify-content: center;
    padding-bottom: 30px;
    padding-top: 40px;
    width: 100%;
    height: 10%;
    text-decoration: none;
}

.sidebar-logo img {
    width: 55px;
    height: 50px;
    border-radius: 5px;
}

.sidebar-logo .img-small {
    width: 45px;
    height: 40px;
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

.logo-text .phs {
    margin-top: 3px;
    font-family: "Montserrat", sans-serif;
}

.logo-text .phs .certi {
    color: #000000;
    font-size: 20px;
}

.logo-text .phs .code {
    font-size: 30px;
    color: #3EA1E0;
}

.logout-button {
    border-radius: 8px;
    border: 1.5px solid #EEEEEE;
    background-color: #2087E4;
    align-self: center;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 8px 10px;
    cursor: pointer;
}

.logout-button:hover {
    border: 1px solid #929699;
    background-color: #ff2222;
}

.menu .sidebar-menu {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 15px;
    gap: 20px;
    font-size: 16px;
    color: #2087E4;
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
    color: #2087E4;
    padding: 8px 10px;
    cursor: pointer;
}

.forms {
    margin-top: 15px;
    font-size: 16px;
    color: #2087E4;
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

.forms .centered {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

.forms .menu-option .form-sidebar-text {
    font-family: Inter, sans-serif;
    margin-top: 5px;
    flex-grow: 1;
    flex-basis: auto;
}

.minimized {
    width: 80px;
}

.sidebar-minimized {
    max-width: 100%;
}
</style>
