const admin = [
  {
    path: "/admin",
    component: () => import("../layout/admin.vue"),
    children: [
      // Quản lý users
      {
        path: "users",
        name: "admin-user",
        component: () => import("../pages/admin/users/index.vue"),
      },
      {
        path: "users/create",
        name: "admin-user-create",
        component: () => import("../pages/admin/users/create.vue"),
      },
      
      // Quản lý roles
      {
        path: "roles",
        name: "admin-roles",
        component: () => import("../pages/admin/roles/index.vue"),
      },
      // Quản lý settings
      {
        path: "settings",
        name: "admin-settings",
        component: () => import("../pages/admin/settings/index.vue"),
      },
    ],
  },
];

export default admin;
