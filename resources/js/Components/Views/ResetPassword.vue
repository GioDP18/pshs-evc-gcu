<template>
    <div class="main-container">
        <div class="form-gap"></div>
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-4 col-md-offset-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="text-center">
                                <h3><i class="fa fa-unlock fa-3x mb-3"></i></h3>
                                <h2 class="text-center">Reset Password</h2>
                                <div class="panel-body mt-4">
                                    <form @submit.prevent="validatePasswords" id="register-form" role="form" autocomplete="off" class="form">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input id="password" v-model="password" name="password" placeholder="Password" class="form-control" type="password" required>
                                            </div>
                                        </div>
                                        <div class="form-group mb-4">
                                            <div class="input-group">
                                                <input id="confirmPassword" v-model="confirmPassword" name="confirmPassword" placeholder="Confirm Password" class="form-control" type="password" required>
                                            </div>
                                            <small v-if="passwordMismatch" class="text-danger d-block text-start">Passwords do not match!</small>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
                                    </form>
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
import { ref, computed } from 'vue';

const password = ref('');
const confirmPassword = ref('');
const errorMessage = ref('');

const passwordMismatch = computed(() => password.value !== confirmPassword.value && confirmPassword.value !== '');

const validatePasswords = () => {
    if (passwordMismatch.value) {
        errorMessage.value = "Passwords do not match!";
    } else {
        errorMessage.value = "";
        // Proceed with form submission or further processing
        alert('Passwords match! Form submitted.');
    }
};
</script>

<style scoped>
.main-container {
    background: #2087E4;
    width: 100%;
    height: 100vh;
}

.form-gap {
    padding-top: 100px;
}

.panel {
    background: white;
    width: 100%;
    padding: 40px;
    border-radius: 8px;
}
</style>
