<template>
    <div class="container light-style flex-grow-1 container-p-y">
        <h4 class="font-weight-bold py-3 mb-4 header">
            Account settings
        </h4>
        <div class="card overflow-hidden">
            <div class="row no-gutters row-bordered row-border-light">
                <div class="col-md-3 pt-0">
                    <div class="list-group list-group-flush account-settings-links">
                        <a class="list-group-item list-group-item-action active" data-toggle="list"
                            href="#account-general">General</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-info">Account Info</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="account-general">
                            <div class="card-body media align-items-center mr-2" style="background-color: white;">
                                <div class="image-container">
                                    <img :src="image_preview" v-if="image_preview" alt="Preview" class="d-block ui-w-80">
                                </div>
                                <div class="media-body ml-4">
                                    <label class="btn btn-outline-primary">
                                        Upload new photo
                                        <input type="file" class="account-settings-fileinput" @change="previewImage">
                                    </label> &nbsp;
                                    <button type="button" class="btn btn-default md-btn-flat"
                                        @click="resetImage">Reset</button>
                                    <div class="text-light small mt-1">Allowed JPG, GIF or PNG. Max size of 800K</div>
                                </div>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body mr-2" style="background-color: white; color: black;">
                                <div class="form-group">
                                    <label class="form-label">First Name</label>
                                    <input type="text" class="form-control" value="Nelle Maxwell">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Middle Name</label>
                                    <input type="text" class="form-control" value="Nelle Maxwell">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" class="form-control" value="Nelle Maxwell">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Email</label>
                                    <input type="text" class="form-control mb-1" value="nmaxwell@mail.com">
                                    <div class="alert alert-warning mt-3">
                                        Your email is not confirmed. Please check your inbox.<br>
                                        <a href="javascript:void(0)">Resend confirmation</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-change-password">
                            <div class="card-body pb-2 mr-2" style="background-color: white; color: black;">
                                <div class="form-group">
                                    <label class="form-label">Current password</label>
                                    <div class="input-group">
                                        <input :type="show_current_password ? 'text' : 'password'" class="form-control"
                                            v-model="current_password">
                                        <div class="input-group-append">
                                            <span class="input-group-text" @click="toggleCurrent_passwordVisibility">
                                                <i v-if="show_current_password" class="fa fa-eye-slash"></i>
                                                <i v-else class="fa fa-eye"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">New password</label>
                                    <input type="password" class="form-control" v-model="new_password">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Repeat new password</label>
                                    <input type="password" class="form-control" v-model="repeat_password"
                                        @input="checkPasswordMatch">
                                    <small v-if="passwords_match === false" class="text-danger">Passwords do not
                                        match</small>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-info">
                            <div class="card-body pb-2 mr-2" style="background-color: white; color: black;">
                                <div class="form-group">
                                    <label class="form-label">Signature Image</label>
                                    <input type="file" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Sex</label>
                                    <select class="form-control">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Birthday</label>
                                    <input type="text" class="form-control" value="May 3, 1995">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Contact Number</label>
                                    <input type="number" class="form-control" value="0909099009">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-right mt-3 pb-5 button-container">
            <button type="button" class="btn btn-primary">Save changes</button>&nbsp;
        </div>
    </div>
</template>

<script setup>
import axios from "axios";
import { ref, onMounted } from 'vue';

const firstname = ref('');
const middlename = ref('');
const lastname = ref('');
const sex = ref('');
const date_of_birth = ref('');
const role = ref('');
const contact_number = ref('');
const signature = ref('');
const id_number = ref('');
const grade_level = ref('');
const section = ref('');
const email = ref('');
const current_password = ref('');
const new_password = ref('');
const repeat_password = ref('');
const passwords_match = ref(true);
const show_current_password = ref(false);
const image_preview = ref(null);
const file_inputRef = ref(null);

onMounted(() => {
    getUserProfile();
})

function previewImage(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = () => {
            image_preview.value = reader.result;
        };
        reader.readAsDataURL(file);
    }
}

function resetImage() {
    image_preview.value = null;
    if (file_inputRef.value) {
        file_inputRef.value.value = '';
    }
}

function toggleCurrent_passwordVisibility() {
    show_current_password.value = !show_current_password.value;
}

function checkPasswordMatch() {
    passwords_match.value = new_password.value === repeat_password.value;
}

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
</script>

<style scoped>
.header {
    font: 700 20px Montserrat, sans-serif;
}

.button-container button {
    width: 280px;
}

.card-body {
    background-color: white;
}

@media screen and (max-width: 360px) {
    .card-body {
        width: 100%;
    }

    .button-container button {
        width: 100%;
    }
}

.image-container {
    border: 3px solid #2087E4;
    width: 86px;
    height: 86px;
    border-radius: 5px;
}

.form-group input,
.form-group select {
    background-color: #F0F0F0;
    border: 1px solid #2087E4;
}

.ui-w-80 {
    width: 80px !important;
    height: auto;
}

.btn-default {
    border-color: rgba(24, 28, 33, 0.1);
    background: rgba(0, 0, 0, 0);
    color: #4E5155;
}

label.btn {
    margin-bottom: 0;
}

.btn-outline-primary {
    border-color: #2087E4;
    background: transparent;
    color: #2087E4;
}

.btn {
    cursor: pointer;
}

.text-light {
    color: #babbbc !important;
}

.card {
    background-clip: padding-box;
    box-shadow: 0 1px 4px rgba(24, 28, 33, 0.012);
}

.row-bordered {
    overflow: hidden;
}

.account-settings-fileinput {
    position: absolute;
    visibility: hidden;
    width: 1px;
    height: 1px;
    opacity: 0;
}

.account-settings-links .list-group-item.active {
    font-weight: bold !important;
    background-color: #2087E4;
    /* New rule to set background color of active item */
}

.account-settings-links .list-group-item.active:hover {
    background-color: #2087E4 !important;
    /* Ensure hover effect retains blue color */
}

.account-settings-links .list-group-item {
    padding: 0.85rem 1.5rem;
    border-color: rgba(24, 28, 33, 0.03) !important;
}

.account-settings-links .list-group-item:hover {
    background-color: #f8f9fa !important;
    /* Hover effect for non-active items */
}
</style>
