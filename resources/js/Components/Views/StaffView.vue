<script setup>
import { ref, onMounted, onBeforeUnmount } from 'vue';
import { useRouter } from 'vue-router'
import axios from 'axios';
import store from '../../State/index.js';

const router = useRouter();

const showSidebar = ref(true);
const showMobileSidebar = ref(false);
const screenWidth = ref(window.innerWidth);

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
                    <div class="certicode"><span class="certi">Certi</span><span class="code">Code</span></div>
                </div>
            </RouterLink>
            <div class="menu">
                <RouterLink to="home" class="sidebar-menu" active-class="active" style="text-decoration: none;"
                    title="home">
                    <i><font-awesome-icon style="" class="icon" :icon="['fas', 'fa-home']" /></i>
                    <div v-if="showSidebar" class="sidebar-text">Home</div>
                </RouterLink>
                <RouterLink to="intakeInterviewForm" class="sidebar-menu" style="text-decoration: none;"
                    title="participants">
                    <i><font-awesome-icon class="icon" :icon="['fas', 'file']" /></i>
                    <div v-if="showSidebar" class="sidebar-text">Intake Interview Form</div>
                </RouterLink>
                <RouterLink to="guidanceAdmissionSlip" class="sidebar-menu" style="text-decoration: none;"
                    title="participants">
                    <i><font-awesome-icon class="icon" :icon="['fas', 'file']" /></i>
                    <div v-if="showSidebar" class="sidebar-text">Guidance Admission Slip</div>
                </RouterLink>
                <RouterLink to="guidanceCallSlip" class="sidebar-menu" style="text-decoration: none;"
                    title="participants">
                    <i><font-awesome-icon class="icon" :icon="['fas', 'file']" /></i>
                    <div v-if="showSidebar" class="sidebar-text">Guidance Call Slip</div>
                </RouterLink>
            </div>
        </div>
        <!-- Mobile Sidebar -->
        <div class="mobile-sidebar sticky-top" v-show="screenWidth < 991" :class="{ 'show': showMobileSidebar }">
            <RouterLink to="" class="sidebar-logo" style="text-decoration: none;">
                <img loading="lazy" src="../../../../public/external/C-Logo.png" class="img" />
                <div class="logo-text">
                    <div class="certicode"><span class="certi">Certi</span><span class="code">Code</span></div>
                </div>
            </RouterLink>
            <div class="menu">
                <RouterLink to="dashboard" class="sidebar-menu" active-class="active" style="text-decoration: none;"
                    title="home">
                    <i><font-awesome-icon style="" class="icon" :icon="['fas', 'fa-home']" /></i>
                    <div class="sidebar-text">Home</div>
                </RouterLink>
                <RouterLink to="participants" class="sidebar-menu" style="text-decoration: none;" title="participants">
                    <i><font-awesome-icon style="" class="icon" :icon="['fas', 'fa-table-list']" /></i>
                    <div class="sidebar-text">Participants</div>
                </RouterLink>
                <RouterLink to="archive" class="sidebar-menu" style="text-decoration: none;" title="participants">
                    <i><font-awesome-icon style="" class="icon" :icon="['fas', 'box-archive']" /></i>
                    <div class="sidebar-text">Archive</div>
                </RouterLink>
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

.container1 {
    display: flex;
}

.sidebar {
    box-shadow: 4px 0px 10px 2px rgba(0, 0, 0, 0.25);
    background-color: #303841;
    display: flex;
    max-width: 250px;
    height: 100vh;
    flex-direction: column;
    padding: 0px;
    margin: 0px;
}

.mobile-sidebar {
    box-shadow: 4px 0px 10px 2px rgba(0, 0, 0, 0.25);
    background-color: #303841;
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
    /* Add a smooth transition */
}

.show {
    left: 0;
}

.main-content {
    margin-left: 0;
    transition: margin-left 0.3s ease;
}

.show-mobile-sidebar {
    margin-left: 250px;
}

.sidebar-logo {
    background-color: #303841;
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
}

.logo-text {
    font-family: Inter, sans-serif;
    flex-grow: 1;
    margin: auto 0;
}

.logo-text .certicode {
    margin-top: 3px;
}

.logo-text .certi {
    color: #ffffff;
    font-size: 25px;
    font-weight: bolder;
}

.logo-text .code {
    font-size: 25px;
    color: #7AA5D2;
    font-weight: 400;
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

.sidebar-menu {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 15px;
    gap: 20px;
    font-size: 16px;
    color: #fff;
    padding: 8px 25px;
    cursor: pointer;
}

.sidebar-text {
    font-family: Inter, sans-serif;
    align-self: start;
    margin-top: 4px;
    flex-grow: 1;
    flex-basis: auto;
}

.add-button {
    border-radius: 8px;
    border: 1.5px solid #fff;
    align-self: center;
    display: flex;
    margin-bottom: 0px;
    justify-content: center;
    align-items: center;
    margin-top: 40px;
    font-size: 16px;
    color: #fff;
    padding: 5px 45px;
    flex-direction: column;
    cursor: pointer;
}

.add {
    border-radius: 8px;
    background-color: #fff;
    align-self: center;
    z-index: 10;
    display: flex;
    width: 109px;
    max-width: 100%;
    justify-content: center;
    align-items: center;
    margin: 10px 0 -21px;
    padding: 4px 45px;
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
