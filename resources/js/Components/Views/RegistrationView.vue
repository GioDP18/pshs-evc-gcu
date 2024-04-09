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
                        </div>
                        <div v-show="currentStep === 2">
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
                            <div class="mb-3 form-input" :class="{ 'has-error': errors.password }">
                                <label for="exampleInputPassword" class="form-label">Password</label>
                                <div class="password-input-wrapper">
                                    <input :type="showPassword ? 'text' : 'password'" class="form-control"
                                        v-model="formData.password" @input="checkPasswordStrength">
                                    <i class="password-toggle-icon"
                                        :class="showPassword ? 'fa fa-eye-slash' : 'fa fa-eye'"
                                        @click="toggleShowPassword"></i>
                                </div>
                                <div class="password-strength-bar">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar"
                                            :style="{ width: passwordStrength + '%' }" :class="passwordStrengthColor">
                                        </div>
                                    </div>
                                    <small class="password-strength-text">{{ passwordStrengthText }}</small>
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
                        </div>
                        <div v-show="currentStep === 3">
                            <div class="mb-3 form-input" :class="{ 'has-error': errors.signature }">
                                <label for="exampleInputPassword" class="form-label">Signature Image</label>
                                <input type="file" class="form-control" @change="chooseSignature">
                                <span class="error-message" v-if="errors.signature">
                                    <i class="fa fa-info-circle"></i> {{ errors.signature }}
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
                                <div class="mb-3 form-input" :class="{ 'has-error': errors.id_number }">
                                    <label for="exampleInputEmail1" class="form-label">Student ID Number</label>
                                    <input type="text" class="form-control" placeholder="xx-xxxx-xxx"
                                        v-model="formData.id_number">
                                    <span class="error-message" v-if="errors.id_number">
                                        <i class="fa fa-info-circle"></i> {{ errors.id_number }}
                                    </span>
                                </div>
                                <div class="form-select-container">
                                    <div class="form-select-wrapper">
                                        <label for="grade_level" class="form-label">Grade Level</label>
                                        <select id="grade_level" class="form-select" v-model="formData.grade_level"
                                            @change="updateSections">
                                            <option value="" selected disabled>Select grade level</option>
                                            <option value="7">Grade 7</option>
                                            <option value="8">Grade 8</option>
                                            <option value="9">Grade 9</option>
                                            <option value="10">Grade 10</option>
                                            <option value="11">Grade 11</option>
                                            <option value="12">Grade 12</option>
                                        </select>
                                    </div>
                                    <div class="form-select-wrapper">
                                        <label for="section" class="form-label">Section</label>
                                        <select id="section" class="form-select" v-model="formData.section">
                                            <option value="" selected disabled>Select section</option>
                                            <option v-for="section in gradeSections[formData.grade_level]"
                                                :value="section" :key="section">{{ section }}</option>
                                        </select>
                                    </div>
                                </div>
                                <span class="error-message" v-if="errors.id_number">
                                    <i class="fa fa-info-circle"></i> {{ errors.id_number }}
                                </span>
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="termsCheckbox"
                                    v-model="formData.acceptTerms">
                                <label class="form-check-label" for="termsCheckbox">
                                    I accept the <a href="#" data-bs-toggle="modal" data-bs-target="#termsModal">terms
                                        and conditions</a>
                                </label>
                                <span class="error-message" v-if="errors.acceptTerms">
                                    <i class="fa fa-info-circle"></i> {{ errors.acceptTerms }}
                                </span>
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

            <!-- Bootstrap modal for terms and conditions -->
            <div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #2087E4; color: white;">
                            <h5 class="modal-title" id="termsModalLabel">Terms and Conditions</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <p>This privacy policy will help you understand how GRASS uses and protects the data you
                                will provide.</p>
                            <p>We reserve the right to change and update this policy at any given time, of which you
                                will be promptly updated. If you want to make sure that you are up to date with the
                                latest changes, we advise you to visit this page frequently.</p>

                            <h5><strong>What User Data We Collect:</strong></h5>
                            <p>When you visit the website, we may ask you to provide us with certain personally
                                identifiable information that can be used to contact or identify you. Personally
                                Identifiable Information may include, but is not limited to:</p>
                            <ul>
                                <li>Email address</li>
                                <li>First name and Last name</li>
                                <li>Phone number</li>
                            </ul>

                            <h5><strong>Why We Collect Your Data:</strong></h5>
                            <p>We are collecting your data for several reasons:</p>
                            <ul>
                                <li>To provide and maintain our services</li>
                                <li>To improve our services</li>
                                <li>To communicate with you and respond to inquiries and requests</li>
                            </ul>

                            <h5><strong>Data Sharing and Disclosure:</strong></h5>
                            <p>Personal data collected within this service will be utilized by the PSHS-EVC Guidance and
                                Counseling Unit (GCU) for their student profiling and counseling services. However, no
                                personal information will be sold, rented, or leased to other third parties without your
                                explicit consent.</p>

                            <h5><strong>Data Security:</strong></h5>
                            <p>We take appropriate measures to safeguard your personal data against unauthorized access,
                                alteration, disclosure, or destruction. However, no method of transmission over the
                                Internet or electronic storage is 100% secure, and we cannot guarantee absolute
                                security.</p>

                            <h5><strong>User Controls and Rights:</strong></h5>
                            <p>You have the right to access, correct, or delete your personal data held by us. You may
                                also opt-out of certain data processing activities, although this may affect your
                                ability to access certain features or services.</p>

                            <h5><strong>Retention of Data:</strong></h5>
                            <p>We will retain your personal data only for as long as necessary to fulfill the purposes
                                outlined in these terms.</p>

                            <p>If you have any questions, concerns, or requests regarding these terms or our data
                                practices, please contact the developers at <a
                                    href="mailto:gcu.grass@gmail.com">gcu.grass@gmail.com</a>.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" style="background-color: #FF4141; border: none;"
                                class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
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
import { ref, onMounted } from 'vue';
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
    acceptTerms: false,
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

const checkPasswordStrength = () => {
    const password = formData.value.password;
    let strength = 0;

    if (password.length >= 8) strength += 1;
    if (password.match(/[a-z]/)) strength += 1;
    if (password.match(/[A-Z]/)) strength += 1;
    if (password.match(/[0-9]/)) strength += 1;
    if (password.match(/[$&+,:;=?@#|'<>.^*()%!-]/)) strength += 1;

    passwordStrength.value = (strength / 5) * 100;
    setPasswordStrengthText();
};

const setPasswordStrengthText = () => {
    if (passwordStrength.value < 20) {
        passwordStrengthText.value = "Weak";
        passwordStrengthColor.value = "bg-danger";
    } else if (passwordStrength.value < 60) {
        passwordStrengthText.value = "Medium";
        passwordStrengthColor.value = "bg-warning";
    } else {
        passwordStrengthText.value = "Strong";
        passwordStrengthColor.value = "bg-success";
    }
};

const passwordStrength = ref(0);
const passwordStrengthText = ref("");
const passwordStrengthColor = ref("");

onMounted(() => {
    checkPasswordStrength();
});

// Define sections for each grade level
const gradeSections = {
    '7': ['Diamond', 'Emerald', 'Ruby'],
    '8': ['Sampaguita', 'Jasmine', 'Camia'],
    '9': ['Sodium', 'Rubidium', 'Potassium'],
    '10': ['Proton', 'Electron', 'Neutron'],
    '11': ['A', 'B', 'C'],
    '12': ['A', 'B', 'C']
};

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

    if (!formData.value.acceptTerms) {
        errors.value.acceptTerms = 'You must accept the terms and conditions';
    }
};

const updateSections = () => {
    const selectedGrade = formData.value.grade_level;
    formData.value.section = '';
    if (selectedGrade && gradeSections[selectedGrade]) {
        formData.value.section = gradeSections[selectedGrade][0];
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
                if (response.status === 200) {
                    router.push({ name: 'ConfirmEmail' });
                }
            })
        }
        catch (error) {
            console.log(error);
        }
        finally {
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
.password-strength-bar {
    margin-top: 5px;
    position: relative;
}

.progress {
    height: 5px;
}

.progress-bar {
    border-radius: 5px;
}

.password-strength-text {
    position: absolute;
    bottom: -15px;
    right: 0;
    font-size: 10px;
    color: #6c757d;
}

.bg-danger {
    background-color: #dc3545;
}

.bg-warning {
    background-color: #ffc107;
}

.bg-success {
    background-color: #28a745;
}

.form-select-container {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    width: 100%;
}

.form-select-wrapper {
    width: calc(50% - 10px);
}

.form-select {
    width: 100%;
}

.register-container {
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
    background-color: white;
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
    /* padding: 0 30px 0 25px; */
    padding-left: 25px;
    padding-right: 40px;
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
