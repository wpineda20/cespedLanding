<template>
  <div data-app>
    <v-card class="p-3">
      <v-container>
        <h2>Quotation</h2>
        <div class="options-table">
          <v-btn rounded @click="addRecord()" title="Agregar">
            <v-icon> mdi-plus </v-icon> ADD
          </v-btn>
          <v-icon
            @click="deleteItem()"
            title="Eliminar"
            v-if="selected.length > 0"
          >
            mdi-delete
          </v-icon>
        </div>
        <v-col cols="12" sm="12" md="12" lg="4" xl="4" class="pl-0 pb-0 pr-0">
          <v-text-field
            class="mt-3"
            dense
            label="Search"
            type="text"
            v-model="options.search"
          ></v-text-field>
        </v-col>
      </v-container>
      <v-data-table
        v-model="selected"
        :single-select="false"
        show-select
        :search="options.search"
        :headers="headers"
        :items="recordsFiltered"
        :options.sync="options"
        :loading="loading"
        :server-items-length="total"
        item-key="id"
        sort-by="id"
        :footer-props="{ 'items-per-page-options': [15, 30, 50, 100] }"
      >
        <template v-slot:[`item.actions`]="{ item }">
          <v-icon small class="mr-2" @click="editItem(item)">
            mdi-pencil
          </v-icon>
          <v-icon small class="mr-2" @click="deleteItem(item)">
            mdi-delete
          </v-icon>
        </template>
        <template v-slot:no-data>
          <v-icon small class="mr-2" @click="initialize"> mdi-refresh </v-icon>
        </template>
      </v-data-table>
    </v-card>

    <v-dialog v-model="dialog" max-width="800px" persistent>
      <v-card class="flexcard" height="100%">
        <v-card-title>
          <h1 class="mx-auto pt-3 mb-3 text-center black-secondary">
            {{ formTitle }}
          </h1>
        </v-card-title>

        <v-card-text>
          <v-container>
            <!-- Form -->
            <v-row class="pt-3">
              <!-- name -->
              <v-col cols="12" sm="12" md="6">
                <base-input
                  label="Name"
                  v-model="$v.editedItem.name.$model"
                  :validation="$v.editedItem.name"
                  validationTextType="none"
                />
              </v-col>
              <!-- name -->

              <!-- email -->
              <v-col cols="12" sm="12" md="6">
                <base-input
                  label="Email"
                  v-model="$v.editedItem.email.$model"
                  :validation="$v.editedItem.email"
                  validationTextType="none"
                />
              </v-col>
              <!-- email -->

              <!-- phone -->
              <v-col cols="12" sm="12" md="6">
                <base-input
                  label="Phone"
                  v-model="$v.editedItem.phone.$model"
                  :validation="$v.editedItem.phone"
                  validationTextType="none"
                />
              </v-col>
              <!-- phone -->

              <!-- amount -->
              <v-col cols="12" sm="12" md="6">
                <base-input
                  label="Amount"
                  v-model="$v.editedItem.amount.$model"
                  :validation="$v.editedItem.amount"
                  validationTextType="none"
                  type="number"
                />
              </v-col>
              <!-- amount -->
            </v-row>
            <!-- Form -->
            <v-row>
              <v-col align="center">
                <v-btn
                  color="btn-normal no-uppercase mt-3"
                  rounded
                  @click="save"
                >
                  Save
                </v-btn>
                <v-btn
                  color="btn-normal-close no-uppercase mt-3"
                  rounded
                  @click="close"
                >
                  Cancel
                </v-btn>
              </v-col>
            </v-row>
          </v-container>
        </v-card-text>
      </v-card>
    </v-dialog>

    <v-dialog v-model="dialogDelete" max-width="400px">
      <v-card class="h-100">
        <v-container>
          <h1 class="black-secondary text-center mt-3 mb-3">
            {{
              selected.length > 0 ? "Eliminar registros" : "Eliminar registro"
            }}
          </h1>
          <v-row>
            <v-col align="center">
              <v-btn
                color="btn-normal no-uppercase mt-3 mb-3 pr-5 pl-5 mx-auto"
                rounded
                @click="deleteItemConfirm"
                >Confirmar</v-btn
              >
              <v-btn
                color="btn-normal-close no-uppercase mt-3 mb-3"
                rounded
                @click="closeDelete"
              >
                Cancel
              </v-btn>
            </v-col>
          </v-row>
        </v-container>
      </v-card>
    </v-dialog>
  </div>
</template>

<script>
import quotationApi from "../apis/quotationApi";

import { required, minLength, maxLength } from "vuelidate/lib/validators";

export default {
  data() {
    return {
      search: "",
      selected: [],
      dialog: false,
      dialogDelete: false,
      headers: [
        { text: "Name", value: "name" },
        { text: "Email", value: "email" },
        { text: "Phone", value: "phone" },
        { text: "Amount", value: "amount" },
        { text: "ACTIONS", value: "actions", sortable: false },
      ],
      records: [],
      recordsFiltered: [],
      editedIndex: -1,
      title: "Quotation",
      totalItems: 0,
      options: {},
      editedItem: {
        name: "",
        email: "",
        phone: "",
        amount: "",
      },
      defaultItem: {
        name: "",
        email: "",
        phone: "",
        amount: "",
      },
      selectedTab: 0,
      loading: false,
      debounce: 0,
      total: 0,
    };
  },

  watch: {
    options: {
      handler() {
        this.getDataFromApi();
      },
      deep: true,
    },
    dialogDelete(val) {
      val || this.closeDelete();
    },
  },

  // Validations
  validations: {
    editedItem: {
      name: {
        required,
        minLength: minLength(1),
      },
      email: {
        required,
        minLength: minLength(1),
      },
      phone: {
        required,
        minLength: minLength(1),
      },
      amount: {
        required,
        minLength: minLength(1),
      },
    },
  },

  computed: {
    formTitle() {
      return this.editedIndex === -1 ? "New record" : "Edit record";
    },
  },

  watch: {
    options: {
      handler() {
        this.getDataFromApi();
      },
      deep: false,
      dirty: false,
    },
    dialog(val) {
      val || this.close();
    },
    dialogBlock(val) {
      val || this.closeBlock();
    },
  },

  created() {
    this.initialize();
  },

  methods: {
    async initialize() {
      this.loading = true;
      this.$v.$reset();
      this.records = [];
      this.recordsFiltered = [];

      let requests = [this.getDataFromApi()];

      const responses = await Promise.all(requests).catch((error) => {
        this.$toastr.e("Los Registros obtenidos correctamente.", "Error");
      });

      if (responses) {
      }

      this.loading = false;
    },

    editItem(item) {
      this.editedIndex = this.recordsFiltered.indexOf(item);
      this.editedItem = Object.assign({}, item);
      this.selectedTab = 0;
      this.dialog = true;
    },

    close() {
      this.dialog = false;
      this.$nextTick(() => {
        this.editedItem = Object.assign({}, this.defaultItem);
        this.editedIndex = -1;
      });
    },

    async save() {
      this.$v.$touch();
      if (this.$v.$invalid) {
        this.$toastr.e("Campos obligatorios.", "Error");
        return;
      }

      if (this.editedIndex > -1) {
        const edited = Object.assign(
          this.recordsFiltered[this.editedIndex],
          this.editedItem
        );

        const { data } = await quotationApi
          .put(`/${edited.id}`, edited)
          .catch((error) => {
            this.$toastr.e("Error al actualizar el registro.", "Error");
          });

        if (data.success) {
          this.$toastr.s("Registro actualizado correctamente.", "Éxito");
        }
      } else {
        //Creating user
        const { data } = await quotationApi
          .post(null, this.editedItem)
          .catch((error) => {
            this.$toastr.e("No fue posible crear el registro.", "Error");
          });

        if (data.success) {
          this.$toastr.s("Registro creado correctamente.", "Éxito");
        }
      }

      this.close();
      this.initialize();
      return;
    },

    deleteItem(item = null) {
      console.log(item);
      if (item) {
        this.editedIndex = this.recordsFiltered.indexOf(item);
        this.editedItem = Object.assign({}, item);
        this.selected = [];
      }

      this.dialogDelete = true;
    },

    closeDelete() {
      this.dialogDelete = false;
      this.$nextTick(() => {
        this.editedItem = Object.assign({}, this.defaultItem);
        this.editedIndex = -1;
      });
    },

    async deleteItemConfirm() {
      const { data } = await quotationApi
        .post("/delete", {
          selected: this.selected,
          id: this.editedItem.id,
        })
        .catch((error) => {
          this.$toastr.e("Error al eliminar el registro.", "Error");
          this.close();
        });

      if (data.success) {
        this.$toastr.s("Registro eliminado.", "Éxito");
      }

      this.initialize();
      this.closeDelete();
    },

    getDataFromApi() {
      this.loading = true;
      this.records = [];
      this.recordsFiltered = [];

      //debounce
      clearTimeout(this.debounce);
      this.debounce = setTimeout(async () => {
        const { data } = await quotationApi
          .get(null, {
            params: this.options,
          })
          .catch((error) => {
            this.$toastr.e("No fue posible realizar la búsqueda.", "Error");
          });

        this.records = data.quotation;
        this.recordsFiltered = data.quotation;
        this.total = data.total;
        this.loading = false;
      }, 500);
    },

    addRecord() {
      this.dialog = true;
      this.editedIndex = -1;
      this.selectedTab = 0;
      this.editedItem = Object.assign({}, this.defaultItem);
      this.$v.$reset();
    },
  },
};
</script>
