import "./bootstrap";
import "bootstrap/dist/css/bootstrap.css";

import "./Icon/index.js";
import store from "./State/index.js";
import { createApp } from "vue";
import app from "./Components/App.vue";
import router from "./Routes/router.js";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import ElementPlus from 'element-plus'
import 'element-plus/dist/index.css'


createApp(app)
.use(router)
.use(store)
.use(ElementPlus)
.component("font-awesome-icon", FontAwesomeIcon)
.mount("#app");

import "bootstrap/dist/js/bootstrap.js";
