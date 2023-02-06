<template>
  <v-container class="mb-0 pt-0 my-auto orange-text">
    <v-row class="pt-0">
      <p class="mb-0 mt-1">
        <i class="material-icons">error_outline</i> {{ message }}.
      </p>
    </v-row>
  </v-container>
</template>

<script>
export default {
  props: {
    message: {
      type: String,
      required: true,
      default: "",
    },
  },
};
</script>

<style>
</style>
