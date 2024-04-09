<template>
    <div class="success-page">
        <div class="cross-container">
            <svg class="thex" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                <circle class="thex__circle" cx="26" cy="26" r="25" fill="none" />
                <path class="thex__x" fill="none" d="M16 16 36 36 M36 16 16 36" />
            </svg>
        </div>
        <h1>Email Not Verified!</h1>
        <p>Please verify your email to continue.</p>
        <button @click="redirectToVerify">Verify</button>
    </div>
</template>

<script setup>
import { useRouter } from 'vue-router';

const router = useRouter();

const redirectToVerify = () => {
    router.push({ name: 'ConfirmEmail' });
};
</script>

<style scoped>
@keyframes stroke {
    100% {
        stroke-dashoffset: 0;
    }
}

@keyframes scale {

    0%,
    100% {
        transform: none;
    }

    50% {
        transform: scale3d(1.1, 1.1, 1);
    }
}

@keyframes fillred {
    100% {
        box-shadow: inset 0px 0px 0px 50px #FFFFFF;
    }
}

.thex__circle {
    stroke-dasharray: 166;
    stroke-dashoffset: 166;
    stroke-width: 2;
    stroke-miterlimit: 10;
    stroke: #FE7575;
    fill: none;
    animation: stroke 0.6s cubic-bezier(0.650, 0.000, 0.450, 1.000) forwards;
}

.thex {
    width: 90px;
    height: 90px;
    border-radius: 50%;
    display: block;
    stroke-width: 2;
    stroke: #FE7575;
    stroke-miterlimit: 10;
    margin: 10% auto;
    box-shadow: inset 0px 0px 0px #FE7575;
    animation: fillred 0.4s ease-in-out 0.4s forwards, scale 0.3s ease-in-out 0.9s both, float 3s ease-in-out infinite;
}

.thex__x {
    transform-origin: 50% 50%;
    stroke-dasharray: 48;
    stroke-dashoffset: 48;
    animation: stroke 0.3s cubic-bezier(0.650, 0.000, 0.450, 1.000) 0.8s forwards;
}

.success-page {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100vh;
    background-color: #FE7575;
    color: #fff;
}

.success-page h1 {
    font-size: 2rem;
}

.success-page p {
    font-size: 1.2rem;
    text-align: center;
    max-width: 80%;
    margin-bottom: 2rem;
}

.check-icon {
    fill: #fff;
    animation: float 3s ease-in-out infinite;
    margin-bottom: 1rem;
}

@keyframes float {
    0% {
        transform: translateY(0);
    }

    50% {
        transform: translateY(-10px);
    }

    100% {
        transform: translateY(0);
    }
}

button {
    font-size: 13px;
    letter-spacing: 2px;
    text-transform: uppercase;
    display: inline-block;
    text-align: center;
    font-weight: bold;
    padding: 0.7em 2em;
    border: 3px solid #FE7575;
    border-radius: 2px;
    position: relative;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.1);
    color: #FE7575;
    text-decoration: none;
    transition: 0.3s ease all;
    z-index: 1;
}

button:before {
    transition: 0.5s all ease;
    position: absolute;
    top: 0;
    left: 50%;
    right: 50%;
    bottom: 0;
    opacity: 0;
    content: '';
    background-color: #FE7575;
    z-index: -1;
}

button:hover,
button:focus {
    color: white;
    border: 3px solid white;
}

button:hover:before,
button:focus:before {
    transition: 0.5s all ease;
    left: 0;
    right: 0;
    opacity: 1;
}

button:active {
    transform: scale(0.9);
}
</style>
