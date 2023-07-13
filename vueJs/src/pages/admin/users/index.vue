<template>
  <a-card title="Tài khoản" style="width: 100%">
    <div class="row mb-3">
      <div class="col-12">
        <div class="d-flex justify-content-end">
          <a-button type="primary">
            <router-link :to="{ name: 'admin-user-create' }">
              <font-awesome-icon :icon="['fas', 'plus']" />
            </router-link>
          </a-button>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <a-table :dataSource="users" :columns="columns" :scroll="{ x: 576 }">
          <template #bodyCell="{ column, index, record }">
            <template v-if="column.key === 'index'">
              <span>
                {{ index + 1 }}
              </span>
            </template>
            <template v-if="column.key === 'status'">
              <span v-if="record.status_id == 1" class="text-primary">
                {{ record.status_name }}
              </span>
              <span v-if="record.status_id == 2" class="text-danger">
                {{ record.status_name }}
              </span>
            </template>
            <template v-if="column.key === 'role'">
              <span v-if="record.department_id == 1">
                {{ record.department_name }}
              </span>
              <span v-if="record.department_id == 2">
                {{ record.department_name }}
              </span>
            </template>
          </template>
        </a-table>
      </div>
    </div>
  </a-card>
</template>

<script>
import { defineComponent, ref } from "vue";
import { useMenu } from "../../../stores/use-menu.js";
export default defineComponent({
  setup() {
    useMenu().onselectedKeys(["admin-users"]);

    const users = ref([]);
    const columns = [
      {
        title: "#",
        key: "index",
      },
      {
        title: "Avatar",
        dataIndex: "avatar",
        key: "avatar",
      },
      {
        title: "Name",
        dataIndex: "name",
        key: "name",
      },
      {
        title: "Uername",
        dataIndex: "username",
        key: "username",
      },
      {
        title: "email",
        dataIndex: "email",
        key: "email",
        width: "22%",
      },
      {
        title: "status",
        dataIndex: "status_name",
        key: "status",
      },
      {
        title: "Role",
        dataIndex: "department_name",
        key: "role",
      },
      {
        title: "Công cụ",
        key: "action",
        fixed: "right",
      },
    ];
    const getUsers = () => {
      axios
        .get("http://127.0.0.1:8000/api/users")
        .then(function (response) {
          users.value = response.data;
          console.log(response.data);
          // console.log(response.data[0]['status_id']);
        })
        .catch(function (error) {
          // handle error
          console.log(error);
        });
    };
    getUsers();
    return {
      users,
      columns,
    };
  },
});
</script>
