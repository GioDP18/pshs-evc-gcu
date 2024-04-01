<template>
    <div class="login-container">
        <div class="login-content">
            <div class="login-left">
                <div class="banner">
                    <RouterLink to="/about" class="about">About</RouterLink>
                    <div class="big-text">
                        <h1>
                            THE PSHS-EVC GCU WELCOMES YOU!
                        </h1>
                    </div>
                    <div class="option-button">
                        <div class="sign-up">
                            <RouterLink to="/register">
                                <button>
                                    SIGN UP
                                </button>
                            </RouterLink>
                        </div>
                        <div class="scroll-message" v-if="showScrollMessage">
                            Scroll down <i><font-awesome-icon :icon="['fas', 'arrow-down']" /></i>
                        </div>
                        <!-- <button @click="viaGoogle">
                            SIGN IN WITH <i class="fa-brands fa-google"
                                style="margin-left: 5px; background-color: #2087E4; border-radius: 50%; color: white; padding: 5px 5px 5px 5px;"></i>
                        </button>
                        <button>
                            SIGN IN WITH <i class="fa-brands fa-facebook"
                                style="margin-left: 5px; background-color: #2087E4; border-radius: 50%; color: white; padding: 5px 5px 5px 5px;"></i>
                        </button> -->
                        <!-- <button>
                            SIGN IN AS GUEST
                        </button> -->
                    </div>
                </div>
            </div>
            <div class="login-right">
                <div class="white-box">
                    <h6 v-if="$store.state.warning !== null" class="text-danger">{{ $store.state.warning }}</h6>
                    <div class="login-text">
                        <h1>Log In</h1>
                    </div>
                    <form class="login-inputs" @submit.prevent="submitForm">
                        <div class="mb-3 form-input" :class="{ 'has-error': errors.email }">
                            <input type="email" class="form-control" placeholder="Email" v-model="formData.email">
                            <span class="error-message" v-if="errors.email">
                                <i class="fa fa-info-circle"></i> {{ errors.email }}
                            </span>
                        </div>
                        <div class="mb-3 form-input" :class="{ 'has-error': errors.password }">
                            <div class="password-input-wrapper">
                                <input :type="showPassword ? 'text' : 'password'" class="form-control"
                                    placeholder="Password" v-model="formData.password">
                                <i class="password-toggle-icon" :class="showPassword ? 'fa fa-eye-slash' : 'fa fa-eye'"
                                    @click="toggleShowPassword"></i>
                            </div>
                            <span class="error-message" v-if="errors.password">
                                <i class="fa fa-info-circle"></i> {{ errors.password }}
                            </span>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Remember Password</label>
                        </div>
                        <button type="submit" class="btn btn-primary">LOG IN</button>
                        <div class="forgot">
                            <RouterLink to="/forgotPassword">Forgot Password?</RouterLink>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import axios from 'axios';
import { ref, computed, onMounted } from 'vue';
import { useRouter } from "vue-router";
import store from "../../State/index.js";

const router = useRouter();

const formData = ref({
    email: '',
    password: ''
});

const errors = ref({
    email: '',
    password: ''
});

const screenWidth = ref(window.innerWidth);

const userHasScrolled = ref(false);

onMounted(() => {
    window.addEventListener('scroll', handleScroll);
});

const handleScroll = () => {
    userHasScrolled.value = true;
};

const showScrollMessage = computed(() => screenWidth.value <= 360 && !userHasScrolled.value);

const showPassword = ref(false);

const validateForm = () => {
    errors.value = {};

    if (!formData.value.email) {
        errors.value.email = 'Email is required';
    } else if (!isValidEmail(formData.value.email)) {
        errors.value.email = 'Invalid email format';
    }

    if (!formData.value.password) {
        errors.value.password = 'Password is required';
    }
};

const submitForm = async () => {
    validateForm();

    if (Object.keys(errors.value).length === 0) {
        // Submit the form
        // console.log('Form submitted:', formData.value);
        store.commit('setLoading', true)
        try {
            await axios.post(`${import.meta.env.VITE_BASE_URL}/api/v1/login`, {
                email: formData.value.email,
                password: formData.value.password
            })
                .then((response) => {
                    if (response.status === 200) {
                        localStorage.setItem('user_id', response.data.user.id);
                        localStorage.setItem('firstname', response.data.user.firstname);
                        localStorage.setItem('middlename', response.data.user.middlename);
                        localStorage.setItem('lastname', response.data.user.lastname);
                        localStorage.setItem('token', response.data.access_token);
                        localStorage.setItem('role', response.data.user.role);
                        localStorage.setItem('valid', true);
                        if(response.data.user.email_verified_at === null){
                            router.push({ name: 'notVerifiedEmail' })

                        }
                        else{
                            switch (response.data.user.role) {
                                case 'gcu_staff':
                                    localStorage.setItem('role', 'gcu_staff');
                                    router.push({ name: 'staff-home' })
                                    break;
                                case 'student':
                                    localStorage.setItem('role', 'student');
                                    router.push({ name: 'student-Home' })
                                    break;
                                case 'teacher':
                                    localStorage.setItem('role', 'teacher');
                                    router.push({ name: 'parentsTeacher-Home' })
                                    break;
                                case 'parent':
                                    localStorage.setItem('role', 'parent');
                                    router.push({ name: 'parentsTeacher-Home' })
                                    break;

                                default:
                                    router.push({ name: 'login' })
                                    break;
                            }
                        }

                        store.commit('setWarning', null)
                    }
                })
        }
        catch (error) {
            console.log(error);
            store.commit('setWarning', 'Invalid Credentials! Please try again.')
        }
        finally {
            store.commit('setLoading', false)
        }
    }
};

const isValidEmail = (email) => {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
};

const toggleShowPassword = () => {
    showPassword.value = !showPassword.value;
};

const viaGoogle = async () => {
    try {
        await axios.get(`${import.meta.env.VITE_BASE_URL}/api/v1/oauth/google`)
            .then((response) => {

            })
    }
    catch (error) {
        console.log(error);
    }
}
</script>

<style scoped>
.scroll-message {
    position: fixed;
    bottom: 20px;
    left: 50%;
    transform: translateX(-50%);
    animation: floatAnimation 3s infinite alternate;
    color: #2087E4;
}

@keyframes floatAnimation {
    0% {
        transform: translateX(-50%) translateY(0);
    }

    50% {
        transform: translateX(-50%) translateY(10px);
    }

    100% {
        transform: translateX(-50%) translateY(0);
    }
}

.login-container {
    background-image: url('../../../../public/external/Background.png');
    background-size: cover;
    background-position: center;
    width: 100%;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

.has-error input {
    border-color: red;
}

.error-message {
    color: red;
    font-size: 12px;
    margin-left: 10px;
}

.password-input-wrapper {
    position: relative;
}

.password-toggle-icon {
    position: absolute;
    right: 15px;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
}

.login-content {
    width: 100%;
    height: 100vh;
    display: flex;
}

.login-left {
    width: 50%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: end;
}

.banner {
    width: 80%;
    height: 75%;
    display: flex;
    justify-content: center;
    flex-direction: column;
}

.banner .about {
    font-family: Montserrat, sans-serif;
    color: #2087E4;
    font-weight: 400;
    text-decoration: none;
}

.banner .big-text {
    width: 95%;
    height: 80%;
    display: flex;
    align-items: center;
}

.big-text h1 {
    font-size: 58px;
    color: #2087E4;
    font-weight: 700;
    font-family: Montserrat, sans-serif;
}

.option-button {
    display: flex;
    flex-direction: column;
    width: 60%;
    gap: 10px;
}

.option-button button {
    height: 6vh;
    border-radius: 20px;
    background-color: white;
    border: 1px solid #2087E4;
    font-weight: 700;
    color: #343470;
    -webkit-transition: width .5s;
    transition: width .5s;
    width: 90%;
}

.option-button button:hover {
    width: 100%;
}

.option-button .sign-up button {
    height: 6vh;
    border-radius: 20px;
    background-color: #2087E4;
    border: 1px solid #2087E4;
    color: white;
    -webkit-transition: width .5s;
    transition: width .5s;
    width: 90%;
}

.option-button .sign-up button:hover {
    width: 100%;
}

.login-right {
    width: 50%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.white-box {
    border: 1px solid black;
    box-shadow: rgba(0, 0, 0, 0.45) 0px 25px 20px -20px;
    width: 65%;
    border-radius: 20px;
    background-color: white;
    height: 75%;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}

.white-box .login-text {
    width: 85%;
    margin-bottom: 20px;
}

.login-text h1 {
    font-weight: 700;
    font-size: 31px;
    color: #2087E4;
}

.login-inputs {
    width: 85%;
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.form-input input {
    border-radius: 20px;
    font-style: italic;
    padding-left: 25px;
    background-color: #f0f0f0;
}

.login-inputs .form-check {
    margin-left: 10px;
}

.login-inputs button {
    border-radius: 20px;
    background-color: #2087E4;
    font-weight: 700;
    letter-spacing: 3px;
    box-shadow: rgba(0, 0, 0, 0.15) 0px 15px 25px, rgba(0, 0, 0, 0.05) 0px 5px 10px;
}

.login-inputs .forgot {
    width: 100%;
    text-align: center;
    margin-top: 15px;
    font-size: 15px;
}

@media screen and (max-width: 360px) {
    .login-content {
        flex-direction: column;
        height: 100vh;
        width: 100%;
    }

    .login-left {
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .banner {
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        gap: 50px;
        text-align: center;
    }

    .banner .big-text {
        width: 95%;
        height: 60%;
        margin-top: -30px;
    }

    .big-text h1 {
        font-size: 55px;
        width: 100%;
        font-weight: 700
    }

    .option-button {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: 90%;
        gap: 10px;
    }

    .option-button .sign-up {
        width: 100%;
    }

    .login-right {
        width: 100%;
        height: 100%;
    }

    .white-box {
        width: 100%;
        height: 100vh;
        border-radius: 0%;
    }
}
</style>
