<template>
  <section class="login" id="login-page">
    <div class="login__title">Авторизация</div>
    <div class="login__form form">
      <app-input />
    </div>
  </section>
</template>

<script lang="ts">
import { defineComponent } from "vue";
import AppInput from "@/components/uxui/AppInput.vue";

export default defineComponent({
  name: "LoginView",
  components: { AppInput },
});
</script>

<style scoped></style>