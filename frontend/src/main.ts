import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";
import store from "./store";

import "@/style/style.css";
import "@/style/normalize.css";
import "@/style/fonts.css";

createApp(App).use(store).use(router).mount("#app");
