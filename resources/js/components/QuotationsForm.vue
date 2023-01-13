<template>
  <v-container class="mb-4" ref="top" data-app>
    <v-row class="justify-content-center">
      <v-col cols="12" md="10" sm="12">
        <v-card class="card-body shadow-lg p-5">
          <alert
            :text="textAlert"
            :event="alertEvent"
            :show="showAlert"
            @show-alert="updateAlert($event)"
            class="mb-2"
          />
          <div class="auth">
            <div data-app>
              <v-container width="100%">
                <!-- Form -->
                <v-row>
                  <!-- Name -->
                  <v-col cols="12" xs="12" sm="12" md="12">
                    <base-input
                      label="Name"
                      v-model.trim="$v.user.name.$model"
                      :validation="$v.user.name"
                      validationTextType="default"
                      :validationsInput="{
                        required: true,
                        format: false,
                        minLength: true,
                        maxLength: true,
                      }"
                    />
                  </v-col>
                  <!-- Name -->

                  <!-- Email -->
                  <v-col cols="12" xs="12" sm="12" md="12">
                    <base-input
                      label="Email Address"
                      v-model.trim="$v.user.email.$model"
                      :validation="$v.user.email"
                      validationTextType="none"
                      :validationsInput="{
                        required: true,
                        minLength: false,
                        maxLength: false,
                        email: true,
                      }"
                    />
                  </v-col>
                  <!-- Email -->

                  <!-- Phone -->
                  <v-col cols="12" xs="12" sm="12" md="12">
                    <base-input
                      label="Phone"
                      v-model="$v.user.phone.$model"
                      :validation.sync="$v.user.phone"
                      validationTextType="only-numbers"
                      :validationsInput="{
                        required: true,
                        minLength: true,
                        maxLength: true,
                      }"
                    />
                  </v-col>
                  <!-- Phone -->
                  <!-- Area -->
                  <v-col cols="12" xs="12" sm="12" md="12">
                    <base-input
                      label="Area"
                      v-model="$v.user.area.$model"
                      :validation.sync="$v.user.area"
                      validationTextType="only-numbers"
                      type="number"
                      :validationsInput="{
                        required: true,
                        minLength: true,
                        maxLength: true,
                      }"
                    />
                  </v-col>
                  <!-- Area -->
                </v-row>
                <!-- Form -->
                <v-row>
                  <v-col
                    cols="12"
                    sm="12"
                    md="12"
                    class="text-center"
                    @click="save()"
                  >
                    <v-btn
                      class="btn btn-quotes text-capitalize fs-5 w-100"
                      style=""
                    >
                      SEND
                    </v-btn>
                  </v-col>
                </v-row>
              </v-container>
            </div>
          </div>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>


<script>
import axios from "axios";
import {
  required,
  minLength,
  maxLength,
  email,
} from "vuelidate/lib/validators";

export default {
  data() {
    return {
      textAlert: "",
      alertEvent: "",
      counterAlert: 0,
      showAlert: false,
      user: {
        name: "",
        email: "",
        phone: "",
        area: "",
      },
    };
  },
  validations: {
    user: {
      name: {
        required,
        minLength: minLength(1),
        maxLength: maxLength(150),
      },
      email: {
        required,
        email,
      },
      phone: {
        required,
        minLength: minLength(1),
        maxLength: maxLength(15),
      },
      area: {
        required,
        minLength: minLength(1),
        maxLength: maxLength(10),
      },
    },
  },
  methods: {
    async save() {
      this.$v.$touch();
      if (this.$v.$invalid) {
        this.updateAlert(true, "Required fields.", "fail");
        return;
      }

      //Creating user
      const res = await axios.post(`/register`, this.user).catch((error) => {
        this.textAlert = "No fue posible crear el registro.";

        if (error.response.data.errors.email) {
          this.textAlert = error.response.data.errors.email[0];
        }

        if (error.response.data.errors.dui) {
          this.textAlert = error.response.data.errors.dui[0];
        }

        this.updateAlert(true, this.textAlert, "fail");
        this.$refs.top.scrollIntoView();
      });

      if (res.data.length == []) {
        this.updateAlert(true, "Usuario creado correctamente.", "success");

        setTimeout(() => {
          window.location = "/home";
        }, 3000);
      } else {
        this.updateAlert(true, "El usuario no pudo ser creado.", "fail");
      }

      this.$refs.top.scrollIntoView();
    },

    updateAlert(show = false, text = "Alerta", event = "success") {
      this.textAlert = text;
      this.alertEvent = event;
      this.showAlert = show;
    },
  },
};
</script>
