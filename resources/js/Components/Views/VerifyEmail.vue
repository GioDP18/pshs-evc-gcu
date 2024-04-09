<template>

</template>

<script setup>
import axios from 'axios';
import { ref, onMounted, computed } from 'vue';
import { useRouter } from 'vue-router';
import store from "../../State/index.js";

const router = useRouter();
const response = ref([]);
const email = ref('');
const token = ref('');

onMounted(async () => {
    parseUrlParams();
    verifyEmail();

});

const verifyEmail = async () => {
    store.commit('setLoading', true)
    console.log(email.value)
    console.log(token.value)
    try {
        const resp = await axios.post(`${import.meta.env.VITE_BASE_URL}/api/v1/verify-user-email`, {
            email: email.value,
            token: token.value
        })

        response.value = resp.data;
        router.push({ name: 'verifiedEmail' })
    }
    catch (error) {
        console.log(error);
    }
    finally {
        store.commit('setLoading', false)
    }
}

const parseUrlParams = async () => {
      const params = new URLSearchParams(window.location.search);
      email.value = params.get('email') || '';
      token.value = params.get('token') || '';
}
</script>
