<template>
  <v-card class="p-4 mt-5">
    <h1>Settings</h1>
    <hr />
    <v-container>
      <v-row>
        <v-col cols="12" sm="12" md="6">
          <base-input
            label="Tariff"
            v-model="$v.settings.tariff.$model"
            :validation="$v.settings.tariff"
            valid
            type="number"
          />

          <a href="#" class="btn btn-normal mt-3" @click="save">Save</a>
        </v-col>
      </v-row>
    </v-container>
  </v-card>
</template>

<script>
import settingApi from "../apis/settingApi";
import { required, minValue, maxLength } from "vuelidate/lib/validators";

export default {
  data: () => ({
    settings: {
      id: 1,
      tariff: 0,
    },
  }),

  validations: {
    settings: {
      tariff: {
        required,
        minValue: minValue(0),
      },
    },
  },

  mounted() {
    this.initialize();
  },

  methods: {
    async initialize() {
      const { data } = await settingApi
        .get(null, {
          params: this.options,
        })
        .catch((error) => {
          this.$toastr.e("No fue posible realizar la búsqueda.", "Error");
        });

      this.settings = data.setting;
    },
    async save() {
      this.$v.$touch();
      if (this.$v.$invalid) {
        this.$toastr.e("Fields required.", "Error");
        return;
      }

      //save setting
      const { data } = await settingApi
        .post(null, this.settings)
        .catch((err) => {
          this.$toastr.e("Settings not updated.", "Error");
        });

      if (data.success) {
        this.$toastr.s("Settings updated.", "Error");
      }
    },
  },
};
</script>

<style>
</style>
