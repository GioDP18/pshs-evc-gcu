import "./bootstrap";
import "bootstrap/dist/css/bootstrap.css";

import "./Icon/index.js";
import store from "./State/index.js";
import { createApp } from "vue";
import app from "./Components/App.vue";
import router from "./Routes/router.js";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";

createApp(app)
    .use(router)
    .use(store)
    .component("font-awesome-icon", FontAwesomeIcon)
    .mount("#app");

import "bootstrap/dist/js/bootstrap.js";
