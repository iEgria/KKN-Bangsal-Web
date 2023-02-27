import { createRouter, createWebHistory } from "vue-router";

import Login from "@/views/Login.vue";

import GuestLayout from "@/views/guest/layout/Layout.vue";
import GuestIndex from "@/views/guest/Index.vue";
import GuestBerita from "@/views/guest/Berita.vue";
import GuestSejarah from "@/views/guest/Sejarah.vue";
import GuestPelayanan from "@/views/guest/Pelayanan.vue";
import GuestStrukturOrganisasi from "@/views/guest/StrukturOrganisasi.vue";

// import AdminLayout from "@/views/admin/layout/Layout.vue";

const routes = [
  { path: '/login', component: Login, name: 'auth.login' },
  { path: '', redirect :'home' },
  {
    component: GuestLayout, children: [
      { path: '/home', component: GuestIndex, name: 'guest.index' },
      { path: '/berita', component: GuestBerita, name: 'guest.berita' },
      { path: '/berita/:id', component: GuestBerita, name: 'guest.berita.show' },
      { path: '/berita/:id', component: GuestBerita, name: 'guest.berita.show' },
      { path: '/sejarah-desa', component: GuestSejarah, name: 'guest.sejarah-desa' },
      { path: '/pelayanan/:id', component: GuestPelayanan, name: 'guest.pelayanan.show' },
      { path: '/struktur-organisasi', component: GuestStrukturOrganisasi, name: 'guest.struktur-organisasi' },
    ]
  },
  // {
  //   component: AdminLayout, children: [
  //     { path: '/home', component: GuestIndex, name: 'guest.index' },
  //     { path: '/berita', component: GuestBerita, name: 'guest.berita' },
  //     { path: '/berita/:id', component: GuestBerita, name: 'guest.berita.show' },
  //     { path: '/berita/:id', component: GuestBerita, name: 'guest.berita.show' },
  //     { path: '/sejarah-desa', component: GuestSejarah, name: 'guest.sejarah-desa' },
  //     { path: '/pelayanan/:id', component: GuestPelayanan, name: 'guest.pelayanan.show' },
  //     { path: '/struktur-organisasi', component: GuestStrukturOrganisasi, name: 'guest.struktur-organisasi' },
  //   ]
  // },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL), routes, linkActiveClass: "active",
});

export default router;
