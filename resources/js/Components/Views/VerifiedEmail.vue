<template>
    <div class="success-page">
        <svg class="check-icon" width="100px" height="100px" viewBox="0 0 133 133" version="1.1"
            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <g id="check-group" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <circle id="filled-circle" fill="#FFFFFF" cx="66.5" cy="66.5" r="54.5" />
                <circle id="white-circle" fill="#2087E4" cx="66.5" cy="66.5" r="55.5" />
                <circle id="outline" stroke="#FFFFFF" stroke-width="4" cx="66.5" cy="66.5" r="54.5" />
                <polyline id="check" stroke="#2087E4" stroke-width="5.5" points="41 70 56 85 92 49" />
            </g>
        </svg>
        <h1>Verified Successfully!</h1>
        <p>Your email has been successfully verified.</p>
        <button @click="redirectToHomepage">Continue</button>
    </div>
</template>

<script setup>
import { useRouter } from 'vue-router';

const router = useRouter();
const role = localStorage.getItem('role');

const redirectToHomepage = () => {
    switch(role){
        case 'gcu_staff':
            router.push({ name: 'staff-home' });
            break;
        case 'student':
            router.push({ name: 'student-Home' });
            break;
        case 'teacher':
            router.push({ name: 'parentsTeacher-Home' });
            break;
        case 'parent':
            router.push({ name: 'parentsTeacher-Home' });
            break;

        default:
            router.push('/');
            break;
    }
    router.push('/');
};
</script>

<style scoped>
#check-group {
    animation: 0.32s ease-in-out 1.03s check-group;
    transform-origin: center;

}

#check-group #check {
    animation: 0.34s cubic-bezier(0.65, 0, 1, 1) 0.8s forwards check;
    stroke-dasharray: 0, 75px;
    stroke-linecap: round;
    stroke-linejoin: round;
}

#check-group #outline {
    animation: 0.38s ease-in outline;
    transform: rotate(0deg);
    transform-origin: center;
}

#check-group #white-circle {
    animation: 0.35s ease-in 0.35s forwards circle;
    transform: none;
    transform-origin: center;
}

@keyframes outline {
    from {
        stroke-dasharray: 0, 345.576px;
    }

    to {
        stroke-dasharray: 345.576px, 345.576px;
    }
}

@keyframes circle {
    from {
        transform: scale(1);
    }

    to {
        transform: scale(0);
    }
}

@keyframes check {
    from {
        stroke-dasharray: 0, 75px;
    }

    to {
        stroke-dasharray: 75px, 75px;
    }
}

@keyframes check-group {
    from {
        transform: scale(1);
    }

    50% {
        transform: scale(1.09);
    }

    to {
        transform: scale(1);
    }
}

.success-page {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100vh;
    background-color: #2087E4;
    /* Blue color theme */
    color: #fff;
    /* White text */
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
    border: 3px solid #2087E4;
    border-radius: 2px;
    position: relative;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.1);
    color: #2087E4;
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
    background-color: #2087E4;
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
