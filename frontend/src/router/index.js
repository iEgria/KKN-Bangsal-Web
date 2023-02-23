import { createRouter, createWebHistory } from "vue-router";
// import Login from "@/views/layouts/Login.vue";
// import Dashboard from "@/views/Dashboard.vue";
// import Layout from '@/views/layouts/Layout.vue';

import GuestIndex from "@/views/guest/Index.vue";
// import Maps from "@/views/Maps.vue";
// import JalanIndex from "@/views/jalan/Index.vue";
// import JalanForm from "@/views/jalan/Form.vue";
// import JalanImport from "@/views/jalan/Import.vue";
// import JalanExport from "@/views/jalan/Export.vue";

const routes = [
  { path: '', component: GuestIndex, name: 'guest.index' },
  // { path: '/login', component: Login, name: 'login' },
  // {
    // component: Layout, children: [
      // { path: '/dashboard', component: Dashboard, name: 'dashboard' },
      // { path : '/jalan', component : JalanIndex, name : 'jalan.index' },
      // { path : '/jalan-edit/:id', component : JalanForm, name : 'jalan.edit' },
      // { path : '/jalan-create', component : JalanForm, name : 'jalan.create' },
      // { path : '/jalan-import', component : JalanImport, name : 'jalan.import' },
      // { path : '/jalan-export', component : JalanExport, name : 'jalan.export' }
    // ]
  // },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL), routes, linkActiveClass: "active",
});

export default router;
