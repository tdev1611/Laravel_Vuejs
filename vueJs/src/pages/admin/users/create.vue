<template>
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
              <span>Tình Trạng:</span>
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
            >
            </a-select>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-12 col-sm-3 text-start text-sm-end">
            <label for="">
              <span class="text-danger me-2">*</span>
              <span>Tên tài khoản:</span>
            </label>
          </div>
          <div class="col-12 col-sm-6">
            <a-input
              placeholder="Tài khoản"
              allow-clear
              :rules="[{ required: true }]"
            />
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-12 col-sm-3 text-start text-sm-end">
            <label for="">
              <span class="text-danger me-2">*</span>
              <span>Họ và Tên:</span>
            </label>
          </div>
          <div class="col-12 col-sm-6">
            <a-input placeholder="Họ và Tên" allow-clear />
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-12 col-sm-3 text-start text-sm-end">
            <label for="">
              <span class="text-danger me-2">*</span>
              <span>Email:</span>
            </label>
          </div>
          <div class="col-12 col-sm-6">
            <a-input placeholder="Email" allow-clear />
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-12 col-sm-3 text-start text-sm-end">
            <label for="">
              <span class="text-danger me-2">*</span>
              <span>Mật khẩu:</span>
            </label>
          </div>
          <div class="col-12 col-sm-6">
            <a-input-password placeholder="Mật khẩu" allow-clear />
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
            <a-input-password placeholder="Xác nhập mật khẩu" allow-clear />
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-12 col-sm-3 text-start text-sm-end">
            <label for="">
              <span class="text-danger me-2">*</span>
              <span>Phòng ban:</span>
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
            >
            </a-select>
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
        <a-button type="primary">
          <span>Lưu</span>
        </a-button>
      </div>
    </div>
  </a-card>
</template>

<script>
import { defineComponent, ref } from "vue";
import { useMenu } from "../../../stores/use-menu.js";
import axios from "axios";
export default defineComponent({
  setup() {
    useMenu().onselectedKeys(["admin-users"]);
    const departments = ref([]);
    const users_status = ref([]);

    const getUsersCreaet = () => {
      axios
        .get("http://127.0.0.1:8000/api/users/create")
        .then(function (response) {
          users_status.value = response.data.user_status;
          departments.value = response.data.departments;
          console.log(response.data.departments);
        })
        .catch(function (error) {
          console.log(error);
        });
    };
    const filterOption = (input, option) => {
      return option.label.toLowerCase().indexOf(input.toLowerCase()) >= 0;
    };

    getUsersCreaet();
    return {
      users_status,
      departments,
      filterOption,
    };
  },
});
</script>
