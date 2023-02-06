<template>
  <div>
    <a href="#" @click="clickInputFile()" class="button-center">
      <i class="material-icons icon-center">folder</i> Adjuntar anexo
    </a>
    <span v-if="fileName.length > 0">Nombre de archivo: {{ fileName }}</span>
    <input
      type="file"
      ref="inputFile"
      class="d-none p-3"
      @change="updateImage"
      accept="application/msword,.docx"
    />
    <v-container v-if="showViewer">
      <a @click="openFile()" class="pt-3 pointer">Visualizar archivo</a>
    </v-container>
    <v-container class="mb-0 pt-0 my-auto orange-text">
      <template v-if="!validation.$params.required">
        <v-row class="pt-0">
          <p class="mb-0 mt-1 text-muted">(Campo opcional)</p>
        </v-row>
      </template>
      <template>
        <v-row
          v-if="validation.$error && validation.$params.required"
          class="pt-0"
        >
          <p class="mb-0 mt-1">
            <i class="material-icons">error_outline</i> Campo requerido.
          </p>
        </v-row>
      </template>
    </v-container>
  </div>
</template>

<script>
export default {
  data() {
    return {
      imagePreview: "/img/default_image.svg",
      fileName: "",
      sizeFile: "",
      showViewer: false,
      showName: false,
      nameFile: "",
    };
  },

  updated() {
    this.image = this.validation.$model;
    // console.log(this.image);
  },

  props: {
    validation: {
      type: Object,
      default: "",
    },
    validationsInput: {
      type: Object,
      default: () => {
        return {
          required: true,
        };
      },
    },
    image: {
      type: String,
      default: "/img/default_image.svg",
    },
  },

  watch: {
    image(val) {
      //   console.log(val);\
      this.imagePreview = this.image;
    },
  },

  update() {
    this.imagePreview = this.image;
    this.validateUrl();
  },

  mounted() {
    this.imagePreview = this.image;
    this.validateUrl();
  },

  methods: {
    async updateImage(e) {
      const image = await this.toBase64(e.target.files[0]);
      this.fileName = e.target.files[0].name;
      console.log(this.fileName);
      this.$emit("update-image", image);
      this.imagePreview = image;
      //   this.validation.$model = image;
    },

    async toBase64(file) {
      return new Promise((resolve, reject) => {
        const reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = () => resolve(reader.result);
        reader.onerror = (error) => reject(error);
      });
    },

    clickInputFile() {
      this.$refs.inputFile.click();
    },

    validateUrl() {
      const fileUrl = this.validation.$model;

      this.showViewer = fileUrl.substring(0, 7) == "http://" ? true : false;
    },

    openFile() {
      window.open(this.validation.$model);
    },
  },
};
</script>

<style scoped>
.icon-center {
  vertical-align: middle;
}

.button-center {
  display: flex;
  align-items: center;
}

a.pointer {
  cursor: pointer;
}
</style>
