<template>
  <div class="container mb-4" ref="top" data-app>
    <div class="row justify-content-center">
      <div class="col-md-10 col-12">
        <div class="card-body shadow-lg p-5">
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
                      label="Nombre"
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
                      label="Correo electrónico"
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
                      label="Teléfono"
                      v-model="$v.user.phone.$model"
                      :validation.sync="$v.user.phone"
                      validationTextType="only-numbers"
                      :mask="'####-####'"
                      :validationsInput="{
                        required: true,
                        minLength: false,
                        maxLength: false,
                      }"
                    />
                  </v-col>
                  <!-- Phone -->
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
                      SEND!
                    </v-btn>
                  </v-col>
                </v-row>
              </v-container>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>


<script>
import axios from "axios";
import {
  required,
  minLength,
  maxLength,
  email,
  helpers,
  sameAs,
} from "vuelidate/lib/validators";

export default {
  data() {
    return {
      typePassword: "password",
      optionId: "DUI",
      optionsId: ["DUI"],
      textAlert: "",
      alertEvent: "",
      counterAlert: 0,
      user: {
        name: "Leonel",
        last_name: "Lopez",
        email: "lopezleonel192@gmail.com",
        dui: "12345678-3",
        phone: "1234-5678",
        password: "Leonel23",
        password_confirmation: "Leonel23",
      },
      showTextPassword: "Mostrar contraseña",
      showAlert: true,
    };
  },
  validations: {
    user: {
      name: {
        required,
        minLength: minLength(1),
        maxLength: maxLength(150),
      },
      last_name: {
        required,
        minLength: minLength(1),
        maxLength: maxLength(500),
      },
      email: {
        required,
        email,
      },
      phone: {
        required,
      },
      password: {
        required,
        minLength: minLength(8),
        maxLength: maxLength(13),
        isValidPassword: helpers.regex(
          "isValidPassword",
          /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,13}$/
        ),
      },
      password_confirmation: {
        required,
        sameAsPassword: sameAs("password"),
      },
      dui: {
        required,
        isValidDui: helpers.regex("isValidDui", /[0-9]{8}-[0-9]/),
      },
    },
  },
  watch: {
    optionId(val) {
      this.user.dui = "";
      this.$v.$reset();
    },
  },
  methods: {
    async save() {
      this.$v.$touch();
      if (this.$v.$invalid) {
        this.updateAlert(true, "Campos obligatorios.", "fail");
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

    showPassword(e) {
      this.typePassword = e.show;
    },

    updateAlert(show = false, text = "Alerta", event = "success") {
      this.textAlert = text;
      this.alertEvent = event;
      this.showAlert = show;
    },
  },
};
</script>
