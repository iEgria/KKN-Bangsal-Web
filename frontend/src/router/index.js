import { createRouter, createWebHistory } from "vue-router";
// import Login from "@/views/layouts/Login.vue";
// import Dashboard from "@/views/Dashboard.vue";
// import Layout from '@/views/layouts/Layout.vue';

import GuestLayout from "@/views/guest/layout/Layout.vue";
import GuestIndex from "@/views/guest/Index.vue";
import GuestBerita from "@/views/guest/Berita.vue";
// import GuestBeritaShow from "@/views/guest/BeritaShow.vue";
// import Maps from "@/views/Maps.vue";
// import JalanIndex from "@/views/jalan/Index.vue";
// import JalanForm from "@/views/jalan/Form.vue";
// import JalanImport from "@/views/jalan/Import.vue";
// import JalanExport from "@/views/jalan/Export.vue";

const routes = [
  { path: '', redirect :'home' },
  {
    component: GuestLayout, children: [
      { path: '/home', component: GuestIndex, name: 'guest.index' },
      { path: '/berita', component: GuestBerita, name: 'guest.berita' },
      { path: '/berita/:id', component: GuestBerita, name: 'guest.berita.show' },
      { path: '/sejarah-desa', component: GuestBerita, name: 'guest.sejarah-desa' },
    ]
  },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL), routes, linkActiveClass: "active",
});

export default router;
