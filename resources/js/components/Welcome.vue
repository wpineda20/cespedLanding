<template>
  <div div-app>
    <div class="container" id="galery">
      <div class="pt-5">
        <!-- Card -->
        <div class="card-body rounded shadow-lg p-5">
          <!-- Title -->
          <div class="text-center mb-5 mb-lg-10">
            <h3 class="fs-1 text-dark mb-5">Galery</h3>
          </div>
          <!-- /.Title -->
          <!-- Tabs-->
          <div
            class="text-center d-flex justify-content-center text-center mb-5"
          >
            <ul class="nav border-transparent flex-center fs-5 fw-bold">
              <li class="nav-item">
                <a
                  class="
                    nav-link
                    text-gray-500 text-active-success
                    fw-normal
                    active
                  "
                  href="#"
                  data-bs-toggle="tab"
                  data-bs-target="#kt_landing_projects_latest"
                  >Lorem</a
                >
              </li>
              <li class="nav-item">
                <a
                  class="nav-link text-gray-500 text-active-success fw-normal"
                  href="#"
                  data-bs-toggle="tab"
                  data-bs-target="#kt_landing_projects_web_design"
                  >Dolor Sit</a
                >
              </li>
              <li class="nav-item">
                <a
                  class="nav-link text-gray-500 text-active-success fw-normal"
                  href="#"
                  data-bs-toggle="tab"
                  data-bs-target="#kt_landing_projects_mobile_apps"
                  >Animi Dolorum</a
                >
              </li>
              <li class="nav-item">
                <a
                  class="nav-link text-gray-500 text-active-success fw-normal"
                  href="#"
                  data-bs-toggle="tab"
                  data-bs-target="#kt_landing_projects_development"
                  >Consectetur</a
                >
              </li>
            </ul>
          </div>
          <!-- /.Tabs -->

          <!-- Tab content -->
          <div class="tab-content">
            <!-- Tab Pane -->
            <div
              class="tab-pane fade show active"
              id="kt_landing_projects_latest"
            >
              <div class="card-images">
                <div class="row">
                  <div class="col-lg-6">
                    <v-img
                      style="cursor: pointer"
                      @click="img1 = !img1"
                      src="/stock/600x600/img-23.jpg"
                      class="rounded overlay cursor-pointer"
                    ></v-img>
                    <FsLightbox
                      :toggler="img1"
                      :sources="['/stock/600x600/img-23.jpg']"
                    />
                  </div>
                  <div class="col-lg-6">
                    <div class="row">
                      <div class="col-lg-6">
                        <v-img
                          style="cursor: pointer"
                          @click="img2 = !img2"
                          src="/stock/600x600/img-22.jpg"
                          class="rounded"
                        ></v-img>
                        <FsLightbox
                          :toggler="img2"
                          :sources="['/stock/600x600/img-22.jpg']"
                        />
                      </div>
                      <div class="col-lg-6">
                        <v-img
                          style="cursor: pointer"
                          @click="img3 = !img3"
                          src="/stock/600x600/img-21.jpg"
                          class="rounded"
                        ></v-img>
                        <FsLightbox
                          :toggler="img3"
                          :sources="['/stock/600x600/img-21.jpg']"
                        />
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-12">
                        <v-img
                          style="cursor: pointer"
                          @click="img4 = !img4"
                          src="/stock/600x600/img-20.jpg"
                          class="rounded"
                          height="250"
                        ></v-img>
                        <FsLightbox
                          :toggler="img4"
                          :sources="['/stock/600x600/img-20.jpg']"
                        />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.Tab Pane -->

            <!-- Tab Pane -->
            <div class="tab-pane fade" id="kt_landing_projects_web_design">
              <div class="card-images">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="row">
                      <div class="col-lg-6">
                        <v-img
                          @click="img5 = !img5"
                          style="cursor: pointer"
                          src="/stock/600x600/img-3.jpg"
                          class="rounded"
                        ></v-img>
                        <FsLightbox
                          :toggler="img5"
                          :sources="['/stock/600x600/img-3.jpg']"
                        />
                      </div>
                      <div class="col-lg-6">
                        <v-img
                          @click="img6 = !img6"
                          style="cursor: pointer"
                          src="/stock/600x600/img-4.jpg"
                          class="rounded"
                        ></v-img>
                        <FsLightbox
                          :toggler="img6"
                          :sources="['/stock/600x600/img-4.jpg']"
                        />
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-12">
                        <v-img
                          @click="img7 = !img7"
                          style="cursor: pointer"
                          src="/stock/600x600/img-5.jpg"
                          class="rounded"
                          height="250"
                        ></v-img>
                        <FsLightbox
                          :toggler="img7"
                          :sources="['/stock/600x600/img-5.jpg']"
                        />
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <v-img
                      @click="img8 = !img8"
                      style="cursor: pointer"
                      src="/stock/600x600/img-2.jpg"
                      class="rounded"
                    ></v-img>
                    <FsLightbox
                      :toggler="img8"
                      :sources="['/stock/600x600/img-2.jpg']"
                    />
                  </div>
                </div>
              </div>
            </div>
            <!-- /.Tab Pane -->

            <!-- Tab Pane -->
            <div class="tab-pane fade" id="kt_landing_projects_mobile_apps">
              <div class="card-images">
                <div class="row">
                  <div class="col-lg-6">
                    <v-img
                      @click="img9 = !img9"
                      style="cursor: pointer"
                      src="/stock/600x600/img-7.jpg"
                      class="rounded"
                    ></v-img>
                    <FsLightbox
                      :toggler="img9"
                      :sources="['/stock/600x600/img-7.jpg']"
                    />
                  </div>
                  <div class="col-lg-6">
                    <div class="row">
                      <div class="col-lg-6">
                        <v-img
                          @click="img10 = !img10"
                          style="cursor: pointer"
                          src="/stock/600x600/img-8.jpg"
                          class="rounded"
                        ></v-img>
                        <FsLightbox
                          :toggler="img10"
                          :sources="['/stock/600x600/img-8.jpg']"
                        />
                      </div>
                      <div class="col-lg-6">
                        <v-img
                          @click="img11 = !img11"
                          style="cursor: pointer"
                          src="/stock/600x600/img-9.jpg"
                          class="rounded"
                        ></v-img>
                        <FsLightbox
                          :toggler="img11"
                          :sources="['/stock/600x600/img-9.jpg']"
                        />
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-12">
                        <v-img
                          @click="img12 = !img12"
                          style="cursor: pointer"
                          src="/stock/600x600/img-10.jpg"
                          class="rounded"
                          height="250"
                        ></v-img>
                        <FsLightbox
                          :toggler="img12"
                          :sources="['/stock/600x600/img-10.jpg']"
                        />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.Tab Pane -->

            <!-- Tab Pane -->
            <div class="tab-pane fade" id="kt_landing_projects_development">
              <div class="card-images">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="row">
                      <div class="col-lg-6">
                        <v-img
                          @click="img13 = !img13"
                          style="cursor: pointer"
                          src="/stock/600x600/img-13.jpg"
                          class="rounded"
                        ></v-img>
                        <FsLightbox
                          :toggler="img13"
                          :sources="['/stock/600x600/img-13.jpg']"
                        />
                      </div>
                      <div class="col-lg-6">
                        <v-img
                          @click="img14 = !img14"
                          style="cursor: pointer"
                          src="/stock/600x600/img-14.jpg"
                          class="rounded"
                        ></v-img>
                        <FsLightbox
                          :toggler="img14"
                          :sources="['/stock/600x600/img-14.jpg']"
                        />
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-12">
                        <v-img
                          @click="img15 = !img15"
                          style="cursor: pointer"
                          src="/stock/600x600/img-15.jpg"
                          class="rounded"
                          height="250"
                        ></v-img>
                        <FsLightbox
                          :toggler="img15"
                          :sources="['/stock/600x600/img-15.jpg']"
                        />
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <v-img
                      @click="img16 = !img16"
                      style="cursor: pointer"
                      src="/stock/600x600/img-12.jpg"
                      class="rounded"
                    ></v-img>
                    <FsLightbox
                      :toggler="img16"
                      :sources="['/stock/600x600/img-12.jpg']"
                    />
                  </div>
                </div>
              </div>
            </div>
            <!-- /.Tab Pane -->
          </div>
          <!-- /.Tab content -->
        </div>
        <!-- /.Card -->
      </div>
    </div>
    <!-- Quotations -->
    <div class="pt-5" id="quotations">
      <div class="container">
        <div class="d-flex flex-column container pt-lg-20">
          <!-- Title -->
          <div class="text-center mb-3">
            <h3 class="fs-1">Quotations</h3>
          </div>
          <!-- /.Title -->
          <div class="text-gray-700 text-center fw-normal fs-5">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. <br />
            Inventore, animi dolorum dolore aut doloremque asperiores tempore
            eius libero.
          </div>
        </div>
      </div>
    </div>
    <!-- Quotations -->

    <!-- Form -->
    <quotations-form />
    <!-- /.Form -->
  </div>
</template>

<script>
import FsLightbox from "fslightbox-vue";
import QuotationsForm from "./QuotationsForm.vue";
export default {
  components: { QuotationsForm, FsLightbox },

  data() {
    return {
      img1: false,
      img2: false,
      img3: false,
      img4: false,
      img5: false,
      img6: false,
      img7: false,
      img8: false,
      img9: false,
      img10: false,
      img11: false,
      img12: false,
      img13: false,
      img14: false,
      img15: false,
      img16: false,
    };
  },
};
</script>

<style scoped>
.landing {
  width: 100vw;
  height: calc(100vh - 6rem);
  background: red;
}

h1 {
  color: white;
  font-family: Arial, Helvetica, sans-serif;
  font-size: 48px !important;
}
</style>
