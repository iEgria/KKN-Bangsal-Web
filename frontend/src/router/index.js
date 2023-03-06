import { createRouter, createWebHistory } from "vue-router";

import auth from '@/router/middleware.js';

import Login from "@/views/Login.vue";

import GuestLayout from "@/views/guest/layout/Layout.vue";
import GuestIndex from "@/views/guest/Index.vue";
import GuestRtRw from "@/views/guest/RtRw.vue";
import GuestVisiMisi from "@/views/guest/VisiMisi.vue";
import GuestUmkm from "@/views/guest/Umkm.vue";
import GuestBerita from "@/views/guest/Berita.vue";
import GuestSejarah from "@/views/guest/Sejarah.vue";
import GuestPelayanan from "@/views/guest/Pelayanan.vue";
import GuestStrukturOrganisasi from "@/views/guest/StrukturOrganisasi.vue";

import AdminLayout from "@/views/admin/layout/Layout.vue";
import AdminDashboard from "@/views/admin/Dashboard.vue";
import AdminSetting from "@/views/admin/Setting.vue";
import AdminMasterPengguna from "@/views/admin/master/user/Index.vue";
import AdminMasterPenggunaForm from "@/views/admin/master/user/Form.vue";
import AdminRtRw from "@/views/admin/rt_rw/Index.vue";
import AdminRtRwForm from "@/views/admin/rt_rw/Form.vue";
import AdminSlider from "@/views/admin/slider/Index.vue";
import AdminGaleri from "@/views/admin/galeri/Index.vue";
import AdminInformasi from "@/views/admin/informasi/Index.vue";
import AdminSejarahDesa from "@/views/admin/sejarah_desa/Index.vue";
import AdminLinkTerkait from "@/views/admin/link_terkait/Index.vue";
import AdminLinkTerkaitForm from "@/views/admin/link_terkait/Form.vue";


const routes = [
  { path: '/auth-login', component: Login, name: 'auth.login' },
  { path: '', redirect :'home' },
  {
    component: GuestLayout, children: [
      { path: '/home', component: GuestIndex, name: 'guest.index' },
      { path: '/rt-rw', component: GuestRtRw, name: 'guest.rtrw' },
      { path: '/umkm', component: GuestUmkm, name: 'guest.umkm' },
      { path: '/berita', component: GuestBerita, name: 'guest.berita' },
      { path: '/visi-misi', component: GuestVisiMisi, name: 'guest.visi-misi' },
      { path: '/berita/:id', component: GuestBerita, name: 'guest.berita.show' },
      { path: '/berita/:id', component: GuestBerita, name: 'guest.berita.show' },
      { path: '/sejarah-desa', component: GuestSejarah, name: 'guest.sejarah-desa' },
      { path: '/pelayanan/:id', component: GuestPelayanan, name: 'guest.pelayanan.show' },
      { path: '/struktur-organisasi', component: GuestStrukturOrganisasi, name: 'guest.struktur-organisasi' },
    ]
  },
  {
    component: AdminLayout, children: [
      { path: '/admin-setting', component: AdminSetting, name: 'admin.setting', meta: {middleware: auth} },
      { path: '/admin-dashboard', component: AdminDashboard, name: 'admin.dashboard', meta: {middleware: auth} },

      { path: '/admin-master-pengguna', component: AdminMasterPengguna, name: 'admin.master.pengguna', meta: {middleware: auth} },
      { path: '/admin-master-pengguna-create', component: AdminMasterPenggunaForm, name: 'admin.master.pengguna-create', meta: {middleware: auth} },
      { path: '/admin-master-pengguna-edit/:id', component: AdminMasterPenggunaForm, name: 'admin.master.pengguna-edit', meta: {middleware: auth} },

      { path: '/admin-halaman-terkait', component: AdminLinkTerkait, name: 'admin.halaman-terkait', meta: {middleware: auth} },
      { path: '/admin-halaman-terkait-create', component: AdminLinkTerkaitForm, name: 'admin.halaman-terkait-create', meta: {middleware: auth} },
      { path: '/admin-halaman-terkait-edit/:id', component: AdminLinkTerkaitForm, name: 'admin.halaman-terkait-edit', meta: {middleware: auth} },

      { path: '/admin-rt-rw', component: AdminRtRw, name: 'admin.rt-rw', meta: {middleware: auth} },
      { path: '/admin-rt-rw-create', component: AdminRtRwForm, name: 'admin.rt-rw-create', meta: {middleware: auth} },
      { path: '/admin-rt-rw-create/:rw_id', component: AdminRtRwForm, name: 'admin.rt-rw-create-rt', meta: {middleware: auth} },
      { path: '/admin-rt-rw-edit/:id', component: AdminRtRwForm, name: 'admin.rt-rw-edit', meta: {middleware: auth} },

      { path: '/admin-slider', component: AdminSlider, name: 'admin.slider', meta: {middleware: auth} },
      { path: '/admin-galeri', component: AdminGaleri, name: 'admin.galeri', meta: {middleware: auth} },

      { path: '/admin-informasi', component: AdminInformasi, name: 'admin.informasi', meta: {middleware: auth} },
      { path: '/admin-sejarah-desa', component: AdminSejarahDesa, name: 'admin.sejarah-desa', meta: {middleware: auth} },

      { path: '/admin-persyaratan-pelayanan', component: AdminMasterPengguna, name: 'admin.data.persyaratan-pelayanan', meta: {middleware: auth} },
      { path: '/admin-persyaratan-pelayanan-create', component: AdminMasterPenggunaForm, name: 'admin.data.persyaratan-pelayanan-create', meta: {middleware: auth} },
      { path: '/admin-persyaratan-pelayanan-edit/:id', component: AdminMasterPenggunaForm, name: 'admin.data.persyaratan-pelayanan-edit', meta: {middleware: auth} },
    ]
  }
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL), routes, linkActiveClass: "fw-bolder active",
});

function nextFactory(context, middleware, index) {
  const subsequentMiddleware = middleware[index];
  if (!subsequentMiddleware) return context.next;

  return (...parameters) => {
    context.next(...parameters);
    const nextMiddleware = nextFactory(context, middleware, index + 1);
    subsequentMiddleware({ ...context, next: nextMiddleware });
  };
}

router.beforeEach((to, from, next) => {
  if (to.meta.middleware) {
    const middleware = Array.isArray(to.meta.middleware) ? to.meta.middleware : [to.meta.middleware];

    const context = { from, next, router, to };
    const nextMiddleware = nextFactory(context, middleware, 1);

    return middleware[0]({ ...context, next: nextMiddleware });
  }

  return next();
});

export default router;
