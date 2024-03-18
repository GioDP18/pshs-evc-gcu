import './bootstrap';
import { createApp } from 'vue';
import app from './Components/App.vue';
import router from './Routes/router.js';


createApp(app)
.use(router)
.mount("#app")
