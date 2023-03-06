import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";
import store from './store';
import axios from 'axios'
import VueAxios from 'vue-axios'
import ArgonDashboard from "./argon-dashboard";
import Sweetalert2 from 'vue-sweetalert2';
import CKEditor from '@ckeditor/ckeditor5-vue';
import { library } from '@fortawesome/fontawesome-svg-core';
import { faInstagram } from "@fortawesome/free-brands-svg-icons";
import { faEye, faEyeSlash, faHeart, faUser, faCog, faSignOut, faPencil, faTrash, faHome, faRefresh, faEnvelope, faAngleDown, faLocationDot, faPhone, faMars, faVenus, faChevronLeft, faChevronRight, faAdd } from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';

library.add(faInstagram, faEye, faEyeSlash, faHeart, faUser, faCog, faSignOut, faPencil, faTrash, faHome, faRefresh, faEnvelope, faAngleDown, faLocationDot, faPhone, faMars, faVenus, faChevronLeft, faChevronRight, faAdd);

axios.defaults.baseURL = process.env.VUE_APP_API_URL;
axios.defaults.headers.common = { Authorization: `Bearer ${localStorage.getItem('bearerToken')}`, Accept : 'application/json'};
axios.interceptors.request.use((config) => {
    document.getElementById("cover-spin").style.display = "block";
    return config;
}, function(error) {
    console.log(error.message);
    return document.getElementById("cover-spin").style.display = "none";
}
);
axios.interceptors.response.use((config) => {
    document.getElementById("cover-spin").style.display = "none";
    return config;
}, function(error) {
    console.log(error.message);
    return document.getElementById("cover-spin").style.display = "none";
}
);

const appInstance = createApp(App);
appInstance.use(store);
appInstance.use(router);
appInstance.use(VueAxios, axios);
appInstance.use(Sweetalert2, {
    customClass: {
        confirmButton: "btn bg-gradient-success m-1",
        cancelButton: "btn bg-gradient-danger m-1",
    },
    buttonsStyling: !1,
});
appInstance.use(CKEditor);
appInstance.use(ArgonDashboard);
appInstance.component('font-awesome-icon', FontAwesomeIcon);

appInstance.mount("#app");
