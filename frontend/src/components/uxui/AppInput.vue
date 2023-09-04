<script setup lang="ts">
import { withDefaults, defineProps } from "vue";

export interface Props {
  type?: string;
  label?: string;
}

const props = withDefaults(defineProps<Props>(), {
  type: "text",
});
</script>

<template>
  <div class="app-input">
    <input :type="props.type" />
  </div>
</template>

<style scoped></style>
