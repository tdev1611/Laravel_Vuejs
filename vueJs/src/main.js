import { createApp } from "vue";

//axios
import axios from "axios";
window.axios = axios;

// pinia
import { createPinia } from "pinia";
import "./style.css";
import router from "./router/index.js";
import App from "./App.vue";

// ant design
import {
  Drawer,
  Button,
  message,
  List,
  Menu,
  Card,
  Table,
  Avatar,
  Select,
  Input,
  Form,
  

} from "ant-design-vue";
import "ant-design-vue/dist/antd.css";

// boostrap
import "bootstrap/dist/css/bootstrap-grid.min.css";
import "bootstrap/dist/css/bootstrap-utilities.min.css";

// fontawsome
import { library } from "@fortawesome/fontawesome-svg-core";
import { fas } from "@fortawesome/free-solid-svg-icons";
import { fab } from "@fortawesome/free-brands-svg-icons";
import { far } from "@fortawesome/free-regular-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";

library.add(fas, fab, far);

const app = createApp(App);

// fontawsome
app.component("font-awesome-icon", FontAwesomeIcon);

// pinia
const pinia = createPinia();
app.use(pinia);
// router
app.use(router);
// ant design
app.use(Button);
app.use(Select);
app.use(Input);
app.use(Avatar);
app.use(Form);
app.use(Table);
app.use(Card);
app.use(List);
app.use(Menu);
app.use(Drawer);
app.mount("#app");

// ant design
app.config.globalProperties.$message = message;
