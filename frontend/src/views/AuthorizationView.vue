<template>
  <section id="auth">
    <el-form class="auth-form">
      <el-form-item>
        <el-input placeholder="Логин" v-model="authForm.login" />
      </el-form-item>

      <el-form-item>
        <el-input
          placeholder="Пароль"
          v-model="authForm.password"
          type="password"
          autocomplete="off"
          clearable
        />
      </el-form-item>

      <el-form-item>
        <el-button type="primary" @click="onSubmit">Войти</el-button>
      </el-form-item>
    </el-form>
  </section>
</template>

<script lang="ts" setup>
import { reactive } from "vue";

const authForm = reactive({
  login: "",
  password: "",
});

const onSubmit = () => {
  console.log("authBtn");
};
</script>

<style scoped>
#auth {
  height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
}

.auth-form {
  width: 300px;
}
</style>
