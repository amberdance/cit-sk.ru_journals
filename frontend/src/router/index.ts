import { createRouter, createWebHistory, RouteRecordRaw } from "vue-router";
import HomeView from "@/views/HomeView.vue";
import AuthorizationView from "@/views/AuthorizationView.vue";

const routes: Array<RouteRecordRaw> = [
  {
    path: "/:catchAll(.*)",
    name: "NotFound",
    component: HomeView,
  },
  {
    path: "/",
    name: "Home",
    component: HomeView,
  },
  {
    path: "/auth",
    name: "Auth",
    component: AuthorizationView,
  },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;
