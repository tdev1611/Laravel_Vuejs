<template>
    <div class="container-fluid">
        <div class="row text-white" style="background-color: rgb(26 93 26 / 84%); padding: 1rem;">
            <div class="col-1 d-flex d-sm-none align-items-center justify-content-center">
                <span @click="showDrawer()">
                    <MenuOutlined style="cursor: pointer;"/>
                </span>
            </div>
            <div class="col-10 col-sm-9 d-flex  align-items-center justify-content-center justify-content-sm-start">
                <img src="https://duchai.blog/blog-tdev/public/client/images/logo.png" class="me-3 ms-3" alt="Logo"
                    height="auto" width="59">
                <span class="d-none d-sm-flex">
                    <a href="">Quản trị</a>
                </span>
            </div>
            <div class="col-sm-3 d-none d-sm-flex align-items-center justify-content-sm-end " style="padding-right: 39px;">
                <span>Admin</span>
            </div>
            <div class="col-1 d-flex d-sm-none align-items-center justify-content-center">
                <span @click="showDrawerUser()">
                    <font-awesome-icon :icon="['fas', 'user-tie']" style="cursor: pointer;" />
                </span>
            </div>
        </div>
    </div>
    <!-- ant-design drawer -->
    <a-drawer v-model:visible="visible" title="Danh mục" placement="left">
        <Menu />
    </a-drawer>
    <a-drawer v-model:visible="visible_user" title="Admin" placement="right">
        <p>Some contents...</p>
        <p>Some contents...</p>
        <p>Some contents...</p>
    </a-drawer>
</template>

<script>
import {MenuOutlined } from '@ant-design/icons-vue';
import { defineComponent, ref } from 'vue';
import Menu from '../components/TheMenu.vue';
export default defineComponent({
    components: {
        Menu,
        MenuOutlined
    },
    setup() {
        const visible = ref(false);
        const visible_user = ref(false);
        const showDrawer = () => {
            visible.value = true;
        };
        const showDrawerUser = () => {
            visible_user.value = true;
        };
        return {
            Menu,
            visible,
            visible_user,
            showDrawer,
            showDrawerUser
        };
    },
});
</script>