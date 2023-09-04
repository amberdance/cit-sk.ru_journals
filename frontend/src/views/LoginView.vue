<template>
  <section class="login" id="login-page">
    <div class="login__title">Авторизация</div>
    <div class="login__form form">
      <div class="form__login">
        <input name="login" type="text" id="login" />
        <label for="login">Логин</label>
      </div>

      <div class="form__password">
        <input name="password" type="text" id="password" />
        <label for="password">Пароль</label>
      </div>

      <app-btn>Вход</app-btn>
    </div>
  </section>
</template>

<script lang="ts">
import { defineComponent } from "vue";
import AppBtn from "@/components/uxui/AppBtn.vue";

export default defineComponent({
  name: "LoginView",
  components: { AppBtn },
  setup() {
    console.log("LoginPage");
  },
});
</script>

<style scoped></style>
