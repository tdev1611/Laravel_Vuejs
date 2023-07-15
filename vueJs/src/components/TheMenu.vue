<!-- <template>
    <a-menu v-model:openKeys="openKeys" v-model:selectedKeys="selectedKeys" mode="inline">
        <a-menu-item key="admin-users">
            <router-link :to="{ name: 'admin-user' }">
                <span>
                    <UserOutlined class="me-1" /> Account
                </span>
            </router-link>
        </a-menu-item>
        <a-menu-item key="admin-roles">
            <router-link :to="{ name: 'admin-roles' }">
                <span>
                    <TagOutlined class="me-1" /> Roles
                </span>
            </router-link>
        </a-menu-item>
        <a-menu-item key="admin-settings">
            <router-link :to="{ name: 'admin-settings' }">
                <span>
                    <SettingOutlined class="me-1" />Setting
                </span>
            </router-link>
        </a-menu-item>
    </a-menu>
</template> -->

<template>
  <div>
    <a-menu
      v-model:selectedKeys="selectedKeys"
      style="width: 256px"
      mode="inline"
      :open-keys="openKeys"
    >
      <a-menu-item key="admin-users">
        <router-link :to="{ name: 'admin-user' }">
          <span> <UserOutlined class="me-1" /> Account </span>
        </router-link>
      </a-menu-item>
      <a-menu-item key="admin-roles">
        <router-link :to="{ name: 'admin-roles' }">
          <span> <TagOutlined class="me-1" /> Roles </span>
        </router-link>
      </a-menu-item>
      <a-menu-item key="admin-settings">
        <router-link :to="{ name: 'admin-settings' }">
          <span> <SettingOutlined class="me-1" />Setting </span>
        </router-link>
      </a-menu-item>
      <a-sub-menu key="sub1">
        <template #title>Navigation One</template>
        <a-menu-item key="1">Option 1</a-menu-item>
      </a-sub-menu>
    </a-menu>
  </div>
</template>

<script>
import { defineComponent } from "vue";
import { storeToRefs } from "pinia";
import {
  UserOutlined,
  TagOutlined,
  SettingOutlined,
} from "@ant-design/icons-vue";
import { useMenu } from "../stores/use-menu.js";
export default defineComponent({
  components: {
    UserOutlined,
    TagOutlined,
    SettingOutlined,
  },

  setup() {
    const store = useMenu();
    return {
      ...storeToRefs(store),
     
    };
  },
});
</script>
