<template>
  <div class="container mb-4" ref="top" data-app>
    <div class="row justify-content-center">
      <div class="col-md-10 col-12">
        <div class="card-body shadow-lg p-5 bg-white">
          <alert
            :text="textAlert"
            :event="alertEvent"
            :show="showAlert"
            @show-alert="updateAlert($event)"
            class="mb-2"
          />

          <div>
            <div data-app>
              <v-container width="100%">
                <!-- Form -->
                <v-row>
                  <!-- Name -->
                  <v-col cols="12" xs="12" sm="12" md="12">
                    <base-input
                      label="Name"
                      v-model.trim="$v.quotation.name.$model"
                      :validation="$v.quotation.name"
                      validationTextType="default"
                    />
                  </v-col>
                  <!-- Name -->

                  <!-- Email -->
                  <v-col cols="12" xs="12" sm="12" md="12">
                    <base-input
                      label="E-mail"
                      v-model.trim="$v.quotation.email.$model"
                      :validation="$v.quotation.email"
                      validationTextType="none"
                    />
                  </v-col>
                  <!-- Email -->

                  <!-- Phone -->
                  <v-col cols="12" xs="12" sm="12" md="12">
                    <base-input
                      label="Phone"
                      v-model="$v.quotation.phone.$model"
                      :validation.sync="$v.quotation.phone"
                      validationTextType="only-numbers"
                    />
                  </v-col>
                  <!-- Phone -->

                  <!-- Address -->
                  <v-col cols="12" xs="12" sm="12" md="12">
                    <base-text-area
                      label="Address"
                      v-model="$v.quotation.address.$model"
                      :validation.sync="$v.quotation.address"
                    />
                  </v-col>
                  <!-- Address -->

                  <!-- Field size -->
                  <v-col cols="12" xs="12" sm="12" md="12">
                    <base-input
                      label="Field size (ft)"
                      v-model="$v.quotation.field_size.$model"
                      :validation.sync="$v.quotation.field_size"
                      validationTextType="only-numbers"
                    />
                  </v-col>
                  <!-- Field size -->
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
import quotationApi from "../apis/quotationApi";
import BaseTextArea from "./base-components/BaseTextArea.vue";

export default {
  components: { BaseTextArea },
  data() {
    return {
      textAlert: "",
      alertEvent: "",
      quotation: {
        name: "Leonel",
        email: "lopezleonel192@gmail.com",
        phone: "1234-5678",
        address: "1234-5678",
        field_size: 500,
      },
      showAlert: false,
    };
  },
  validations: {
    quotation: {
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
      address: {
        required,
      },
      field_size: {
        required,
        maxLength: maxLength(100),
      },
    },
  },
  watch: {
    optionId(val) {
      this.quotation.dui = "";
      this.$v.$reset();
    },
  },
  methods: {
    async save() {
      this.$v.$touch();
      if (this.$v.$invalid) {
        this.updateAlert(true, "Fields required.", "fail");
        return;
      }

      //Send quotation
      const { data } = quotationApi.post(null, this.quotation).catch((err) => {
        this.updateAlert(true, "Quotation couldn't be sent.", "fail");
      });

      if (data.success) {
        this.updateAlert(true, "Quotation sent.", "fail");
      }
    },

    updateAlert(show = false, text = "Alerta", event = "success") {
      this.textAlert = text;
      this.alertEvent = event;
      this.showAlert = show;
    },
  },
};
</script>
