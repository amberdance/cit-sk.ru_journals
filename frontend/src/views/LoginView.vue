<template>
  <section class="login" id="login-page">
    <div class="login__title">Авторизация</div>
    <div class="login__form form">
      <app-input />

      <app-btn>Вход</app-btn>
    </div>
  </section>
</template>

<script lang="ts">
import { defineComponent } from "vue";
import AppBtn from "@/components/uxui/AppBtn.vue";
import AppInput from "@/components/uxui/AppInput.vue";

export default defineComponent({
  name: "LoginView",
  components: { AppInput, AppBtn },
});
</script>

<style scoped></style>
