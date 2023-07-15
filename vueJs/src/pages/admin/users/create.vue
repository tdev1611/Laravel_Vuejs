<template>
  <form @submit.prevent="creatUsers()">
    <a-card title="Tạo mới tài khoản " style="width: 100%">
      <div class="row">
        <!-- avt -->
        <div class="col-12 col-sm-4">
          <div class="row">
            <div class="col-12 d-flex justify-content-center mb-3">
              <a-avatar shape="square" :size="190">
                <template #icon>
                  <img src="../../../assets/user.jpg" alt="" />
                </template>
              </a-avatar>
            </div>
            <div class="col-12 d-flex justify-content-center">
              <a-button type="primary">
                <font-awesome-icon :icon="['fas', 'plus']" class="me-2" />
                <span> Chọn ảnh </span>
              </a-button>
            </div>
          </div>
        </div>
        <!-- info -->
        <div class="col-12 col-sm-8">
          <div class="row mb-3">
            <div class="col-12 col-sm-3 text-start text-sm-end">
              <label for="">
                <span class="text-danger me-2">*</span>
                <span :class="{ 'text-danger': errors.status_id }">
                  Tình Trạng:</span
                >
              </label>
            </div>
            <div class="col-12 col-sm-6">
              <a-select
                show-search
                placeholder="Select a person"
                style="width: 100%"
                :options="users_status"
                :filter-option="filterOption"
                allow-clear
                v-model:value="status_id"
                :class="{ 'select-danger': errors.status_id }"
              >
              </a-select>
              <div class="w-100"></div>
              <small class="text-danger" v-if="errors.status_id">{{
                errors.status_id[0]
              }}</small>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-12 col-sm-3 text-start text-sm-end">
              <label for="">
                <span class="text-danger me-2">*</span>
                <span :class="{ 'text-danger': errors.username }"
                  >Tên tài khoản:</span
                >
              </label>
            </div>
            <div class="col-12 col-sm-6">
              <a-input
                placeholder="Tài khoản"
                allow-clear
                v-model:value="username"
                :class="{ 'input-danger': errors.username }"
              />
              <div class="w-100"></div>
              <small class="text-danger" v-if="errors.username">{{
                errors.username[0]
              }}</small>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-12 col-sm-3 text-start text-sm-end">
              <label for="">
                <span class="text-danger me-2">*</span>
                <span :class="{ 'text-danger': errors.name }">Họ và Tên:</span>
              </label>
            </div>
            <div class="col-12 col-sm-6">
              <a-input
                placeholder="Họ và Tên"
                allow-clear
                v-model:value="name"
                :class="{ 'input-danger': errors.username }"
              />
              <div class="w-100"></div>
              <small class="text-danger" v-if="errors.name">{{
                errors.name[0]
              }}</small>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-12 col-sm-3 text-start text-sm-end">
              <label for="">
                <span class="text-danger me-2">*</span>
                <span :class="{ 'text-danger': errors.email }">Email:</span>
              </label>
            </div>
            <div class="col-12 col-sm-6">
              <a-input
                placeholder="Email"
                allow-clear
                v-model:value="email"
                :class="{ 'input-danger': errors.username }"
              />
              <div class="w-100"></div>
              <small class="text-danger" v-if="errors.email">{{
                errors.email[0]
              }}</small>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-12 col-sm-3 text-start text-sm-end">
              <label for="">
                <span class="text-danger me-2">*</span>
                <span :class="{ 'text-danger': errors.password }"
                  >Mật khẩu:</span
                >
              </label>
            </div>
            <div class="col-12 col-sm-6">
              <a-input-password
                placeholder="Mật khẩu"
                allow-clear
                v-model:value="password"
                :class="{ 'input-danger': errors.username }"
              />
              <div class="w-100"></div>
              <small class="text-danger" v-if="errors.password">{{
                errors.password[0]
              }}</small>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-12 col-sm-3 text-start text-sm-end">
              <label for="">
                <span class="text-danger me-2">*</span>
                <span>Xác nhập mật khẩu:</span>
              </label>
            </div>
            <div class="col-12 col-sm-6">
              <a-input-password
                placeholder="Xác nhập mật khẩu"
                allow-clear
                v-model:value="password_confirmation"
              />
              <div class="w-100"></div>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-12 col-sm-3 text-start text-sm-end">
              <label for="">
                <span class="text-danger me-2">*</span>
                <span :class="{ 'text-danger': errors.department_id }"
                  >Phòng ban:</span
                >
              </label>
            </div>
            <div class="col-12 col-sm-6">
              <a-select
                show-search
                placeholder="Select a person"
                style="width: 100%"
                :options="departments"
                :filter-option="filterOption"
                allow-clear
                v-model:value="department_id"
                :class="{ 'select-danger': errors.department_id }"
              >
              </a-select>
              <div class="w-100"></div>
              <small v-if="errors.department_id" class="text-danger">{{
                errors.department_id[0]
              }}</small>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12 d-grid d-sm-flex justify-content-sm-end mx-auto">
          <a-button class="me-0 me-sm-2 mb-3 mb-sm-0">
            <router-link :to="{ name: 'admin-user' }">
              <span>Huỷ</span>
            </router-link>
          </a-button>
          <a-button type="primary" html-type="submit">
            <span>Lưu</span>
          </a-button>
        </div>
      </div>
    </a-card>
  </form>
</template>
<script>
import { defineComponent, ref, reactive, toRefs } from "vue";
import { useMenu } from "../../../stores/use-menu.js";
import { message } from "ant-design-vue";
import { useRouter } from "vue-router";
import axios from "axios";
export default defineComponent({
  setup() {
    useMenu().onselectedKeys(["admin-users"]);

    const router = useRouter();
    const departments = ref([]);
    const users_status = ref([]);
    const users = reactive({
      username: "",
      name: "",
      email: "",
      password: "",
      password_confirmation: "",
      department_id: [],
      status_id: [],
    });
    const errors = ref([]);
    const getUsersCreaet = () => {
      axios
        .get("http://127.0.0.1:8000/api/users/create")
        .then(function (response) {
          users_status.value = response.data.user_status;
          departments.value = response.data.departments;
          // console.log(response.data.departments);
        })
        .catch(function (error) {
          console.log(error);
        });
    };
    const filterOption = (input, option) => {
      return option.label.toLowerCase().indexOf(input.toLowerCase()) >= 0;
    };
    const creatUsers = () => {
      axios
        .post("http://127.0.0.1:8000/api/users/", users)
        .then(function (response) {
          if (response) {
            message.success("Tạo mới tài khoản thành công");
            // router.push({ name: "admin-user-create" });
            location.reload();
          }
        })
        .catch((error) => {
          errors.value = error.response.data.errors;
        });
    };
    getUsersCreaet();
    return {
      users_status,
      departments,
      filterOption,
      creatUsers,
      errors,
      ...toRefs(users),
    };
  },
});
</script>

<style>
.select-danger {
  border: 1px solid red;
}
.input-danger {
  border-color: red;
}
</style>
