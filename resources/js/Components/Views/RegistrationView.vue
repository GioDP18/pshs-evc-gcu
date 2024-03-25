<template>
    <div class="register-container">
        <div class="register-content">
            <div class="register-left">
                <div class="white-box">
                    <div class="register-text">
                        <h1>Register</h1>
                    </div>
                    <form class="register-inputs" @submit.prevent="submitForm">
                        <div v-show="currentStep === 1">
                            <div class="mb-3 form-input" :class="{ 'has-error': errors.firstname }">
                                <label for="exampleInputEmail1" class="form-label">First Name</label>
                                <input type="text" class="form-control" v-model="formData.firstname">
                                <span class="error-message" v-if="errors.firstname">
                                    <i class="fa fa-info-circle"></i> {{ errors.firstname }}
                                </span>
                            </div>
                            <div class="mb-3 form-input" :class="{ 'has-error': errors.middlename }">
                                <label for="exampleInputEmail1" class="form-label">Middle Name</label>
                                <input type="text" class="form-control" v-model="formData.middlename">
                                <span class="error-message" v-if="errors.middlename">
                                    <i class="fa fa-info-circle"></i> {{ errors.middlename }}
                                </span>
                            </div>
                            <div class="mb-3 form-input" :class="{ 'has-error': errors.lastname }">
                                <label for="exampleInputEmail1" class="form-label">Last Name</label>
                                <input type="text" class="form-control" v-model="formData.lastname">
                                <span class="error-message" v-if="errors.lastname">
                                    <i class="fa fa-info-circle"></i> {{ errors.lastname }}
                                </span>
                            </div>
                            <div class="mb-3 form-input" :class="{ 'has-error': errors.email }">
                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                <input type="email" class="form-control" v-model="formData.email">
                                <span class="error-message" v-if="errors.email">
                                    <i class="fa fa-info-circle"></i> {{ errors.email }}
                                </span>
                            </div>
                        </div>
                        <div v-show="currentStep === 2">
                            <div class="mb-3 form-input" :class="{ 'has-error': errors.sex }">
                                <label for="sex" class="form-label">Sex</label>
                                <select id="sex" class="form-select" v-model="formData.sex">
                                    <option value="" selected disabled>Select sex</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                                <span class="error-message" v-if="errors.sex">
                                    <i class="fa fa-info-circle"></i> {{ errors.sex }}
                                </span>
                            </div>
                            <div class="mb-3 form-input" :class="{ 'has-error': errors.date_of_birth }">
                                <label for="exampleInputEmail1" class="form-label">Date of Birth</label>
                                <input type="date" class="form-control" v-model="formData.date_of_birth">
                                <span class="error-message" v-if="errors.date_of_birth">
                                    <i class="fa fa-info-circle"></i> {{ errors.date_of_birth }}
                                </span>
                            </div>
                            <div class="mb-3 form-input" :class="{ 'has-error': errors.contact_number }">
                                <label for="exampleInputEmail1" class="form-label">Contact Number</label>
                                <input type="text" class="form-control" v-model="formData.contact_number">
                                <span class="error-message" v-if="errors.contact_number">
                                    <i class="fa fa-info-circle"></i> {{ errors.contact_number }}
                                </span>
                            </div>
                            <div class="mb-3 form-input" :class="{ 'has-error': errors.signature }">
                                <label for="exampleInputPassword" class="form-label">Signature Image</label>
                                <input type="file" class="form-control" @change="chooseSignature">
                                <span class="error-message" v-if="errors.signature">
                                    <i class="fa fa-info-circle"></i> {{ errors.signature }}
                                </span>
                            </div>
                        </div>
                        <div v-show="currentStep === 3">
                            <div class="mb-3 form-input" :class="{ 'has-error': errors.password }">
                                <label for="exampleInputPassword" class="form-label">Password</label>
                                <div class="password-input-wrapper">
                                    <input :type="showPassword ? 'text' : 'password'" class="form-control"
                                        v-model="formData.password">
                                    <i class="password-toggle-icon"
                                        :class="showPassword ? 'fa fa-eye-slash' : 'fa fa-eye'"
                                        @click="toggleShowPassword"></i>
                                </div>
                                <span class="error-message" v-if="errors.password">
                                    <i class="fa fa-info-circle"></i> {{ errors.password }}
                                </span>
                            </div>
                            <div class="mb-3 form-input" :class="{ 'has-error': errors.password_confirmation }">
                                <label for="exampleInputPassword" class="form-label">Confirm Password</label>
                                <div class="password-input-wrapper">
                                    <input :type="showPassword ? 'text' : 'password'" class="form-control"
                                        v-model="formData.password_confirmation">
                                    <i class="password-toggle-icon"
                                        :class="showPassword ? 'fa fa-eye-slash' : 'fa fa-eye'"
                                        @click="toggleShowPassword"></i>
                                </div>
                                <span class="error-message" v-if="errors.password_confirmation">
                                    <i class="fa fa-info-circle"></i> {{ errors.password_confirmation }}
                                </span>
                            </div>
                            <div class="mb-3 form-input" :class="{ 'has-error': errors.role }">
                                <label for="role" class="form-label">Role</label>
                                <select id="role" class="form-select" v-model="formData.role">
                                    <option value="" selected disabled>Select role</option>
                                    <option value="gcu_staff">GCU Staff</option>
                                    <option value="parent">Parent</option>
                                    <option value="teacher">Teacher</option>
                                    <option value="student">Student</option>
                                </select>
                                <span class="error-message" v-if="errors.role">
                                    <i class="fa fa-info-circle"></i> {{ errors.role }}
                                </span>
                            </div>
                            <div v-if="formData.role === 'parent' || formData.role === 'student'"
                                class="mb-3 form-input">
                                <div :class="{ 'has-error': errors.id_number }">
                                    <label for="exampleInputEmail1" class="form-label">Student ID Number</label>
                                    <input type="text" class="form-control" placeholder="xx-xxxx-xxx"
                                        v-model="formData.id_number">
                                    <span class="error-message" v-if="errors.id_number">
                                        <i class="fa fa-info-circle"></i> {{ errors.id_number }}
                                    </span>
                                </div>
                                <div :class="{ 'has-error': errors.id_number }" style="display:flex; margin-top:10px">
                                    <div class="col-6">
                                        <label for="exampleInputEmail1" class="form-label">Grade Level</label>
                                        <select class="form-select" v-model="grade_level"name="" id="">
                                            <option value="" selected disabled>Select..</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                        </select>
                                        <span class="error-message" v-if="errors.id_number">
                                            <i class="fa fa-info-circle"></i> {{ errors.id_number }}
                                        </span>
                                    </div>
                                    <div class="col-6">
                                        <label for="exampleInputEmail1" class="form-label">Section</label>
                                        <select class="form-select" v-model="section" name="" id="">
                                            <option value="" selected disabled>Select..</option>
                                            <option value="aaa">aaa</option>
                                            <option value="bbb">bbb</option>
                                            <option value="ccc">ccc</option>
                                            <option value="ddd">ddd</option>
                                            <option value="eee">eee</option>
                                            <option value="fff">fff</option>
                                        </select>
                                        <span class="error-message" v-if="errors.id_number">
                                            <i class="fa fa-info-circle"></i> {{ errors.id_number }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-buttons mt-1">
                            <button v-if="currentStep > 1" type="button" class="btn btn-primary" @click="prevStep"
                                style="background-color: transparent; color: #2087E4;">Back</button>
                            <button v-if="currentStep < totalSteps" type="button" class="btn btn-primary"
                                @click="nextStep">Next</button>
                            <button v-else type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="register-right">
                <div class="banner">
                    <div class="big-text">
                        <h1>THE PSHS-EVC GCU WELCOMES YOU!</h1>
                    </div>
                    <div class="option-button">
                        <div class="sign-up">
                            <RouterLink to="/">
                                <button>SIGN IN</button>
                            </RouterLink>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import axios from 'axios';
import { ref } from 'vue';
import { useRouter } from 'vue-router';
import store from "../../State/index.js";

const router = useRouter();

const formData = ref({
    firstname: '',
    middlename: '',
    lastname: '',
    email: '',
    sex: '',
    date_of_birth: '',
    contact_number: '',
    signature: '',
    password: '',
    password_confirmation: '',
    role: '',
    id_number: '',
    grade_level: '',
    section: '',
});

const errors = ref({
    firstname: '',
    middlename: '',
    lastname: '',
    email: '',
    sex: '',
    date_of_birth: '',
    contact_number: '',
    signature: '',
    password: '',
    password_confirmation: '',
    role: '',
    id_number: '',
});

const currentStep = ref(1);
const totalSteps = 3;

const showPassword = ref(false);

const validateForm = () => {
    errors.value = {};

    if (!formData.value.firstname) {
        errors.value.firstname = 'First Name is required';
    }

    if (!formData.value.middlename) {
        errors.value.middlename = 'Middle Name is required';
    }

    if (!formData.value.lastname) {
        errors.value.lastname = 'Last Name is required';
    }

    if (!formData.value.sex) {
        errors.value.sex = 'Sex is required';
    }

    if (!formData.value.date_of_birth) {
        errors.value.date_of_birth = 'date_of_birth is required';
    }

    if (!formData.value.contact_number) {
        errors.value.contact_number = 'Contact_number is required';
    }

    // if (!formData.value.id_number) {
    //     errors.value.id_number = 'Student ID Number is required';
    // }

    if (!formData.value.email) {
        errors.value.email = 'Email is required';
    } else if (!isValidEmail(formData.value.email)) {
        errors.value.email = 'Invalid email format';
    }

    if (!formData.value.role) {
        errors.value.role = 'Role is required';
    }

    if (!formData.value.password) {
        errors.value.password = 'Password is required';
    }

    if (!formData.value.password_confirmation) {
        errors.value.password_confirmation = "Confirm Password is required.";
    } else if (formData.value.password_confirmation !== formData.value.password) {
        errors.value.password_confirmation = "Passwords don't match.";
    }
};
const chooseSignature = (event) => {
    const file = event.target.files[0];
    formData.value.signature = file;
    console.log(file.name)
}

const submitForm = async () => {
    validateForm();
    store.commit('setLoading', true)
    if (Object.keys(errors.value).length === 0) {
        // console.log('Form submitted:', formData.value);
        try {
            await axios.post(`${import.meta.env.VITE_BASE_URL}/api/v1/register`, {
                firstname: formData.value.firstname,
                lastname: formData.value.lastname,
                middlename: formData.value.middlename,
                sex: formData.value.sex,
                date_of_birth: formData.value.date_of_birth,
                role: formData.value.role,
                contact_number: formData.value.contact_number,
                signature: formData.value.signature,
                id_number: formData.value.id_number,
                grade_level: formData.value.grade_level,
                section: formData.value.section,
                email: formData.value.email,
                password: formData.value.password,
                password_confirmation: formData.value.password_confirmation,
            },
            {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
            .then((response) => {
                if(response.status === 200){
                    router.push({ name: 'login'})
                }
            })
        }
        catch (error) {
            console.log(error);
        }
        finally{
            store.commit('setLoading', false)
        }
    }
    else {
        console.log(errors.value);
    }
};

const isValidEmail = (email) => {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
};

const toggleShowPassword = () => {
    showPassword.value = !showPassword.value;
};

const nextStep = () => {
    if (currentStep.value < totalSteps) {
        currentStep.value++;
    }
};

const prevStep = () => {
    if (currentStep.value > 1) {
        currentStep.value--;
    }
};
</script>

<style scoped>
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

.register-content {
    width: 100%;
    height: 100vh;
    display: flex;
}

.register-left {
    width: 50%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.white-box {
    border: 1px solid black;
    box-shadow: rgba(0, 0, 0, 0.45) 0px 25px 20px -20px;
    width: 65%;
    border-radius: 20px;
    height: 98%;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}

.white-box .register-text {
    width: 85%;
    margin-bottom: 20px;
}

.register-text h1 {
    font-weight: 700;
    font-size: 31px;
    color: #2087E4;
}

.register-inputs {
    width: 85%;
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.form-input input,
.form-input select {
    border-radius: 20px;
    font-style: italic;
    padding-left: 25px;
    background-color: #f0f0f0;
}

.register-inputs .form-check {
    margin-left: 10px;
}

.register-inputs .form-buttons {
    width: 100%;
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.register-inputs button {
    border-radius: 20px;
    background-color: #2087E4;
    font-weight: 700;
    letter-spacing: 3px;
    box-shadow: rgba(0, 0, 0, 0.15) 0px 15px 25px, rgba(0, 0, 0, 0.05) 0px 5px 10px;
}

.register-inputs .forgot {
    width: 100%;
    text-align: center;
    margin-top: 15px;
    font-size: 15px;
}

.register-right {
    width: 50%;
    height: 100%;
    display: flex;
    align-items: center;
}

.banner {
    width: 80%;
    height: 75%;
    display: flex;
    justify-content: center;
    flex-direction: column;
    text-align: end;
    align-items: end;
    margin-left: 10px;
}

.banner .big-text {
    width: 95%;
    height: 80%;
}

.big-text h1 {
    font-size: 65px;
    color: #2087E4;
    font-weight: 900;
    font-family: Montserrat, sans-serif;
}

.option-button {
    display: flex;
    flex-direction: column;
    width: 60%;
    gap: 10px;
}

.option-button .sign-up button {
    height: 6vh;
    width: 90%;
    border-radius: 20px;
    background-color: #2087E4;
    border: 1px solid #2087E4;
    color: white;
    -webkit-transition: width .5s;
    transition: width .5s;
    width: 90%;
    font-weight: 700;
}

.option-button .sign-up button:hover {
    width: 100%;
}

@media screen and (max-width: 360px) {
    .register-content {
        flex-direction: column;
        height: 100vh;
        width: 100%;
    }

    .register-left {
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
        text-align: center;
        height: 100vh;
        gap: 5px;
        margin: 0;
    }

    .banner .big-text {
        width: 95%;
        height: 70%;
        margin-top: -40px;
    }

    .big-text h1 {
        font-size: 55px;
        width: 100%;
        padding-top: 100px;
        font-weight: 700;
    }

    .option-button {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: 100%;
        gap: 10px;
    }

    .option-button button,
    .option-button .sign-up {
        width: 100%;
    }

    .register-right {
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
