import { createRouter, createWebHistory } from "vue-router";

import auth from '@/router/middleware.js';

import Login from "@/views/Login.vue";

import GuestLayout from "@/views/guest/layout/Layout.vue";
import GuestIndex from "@/views/guest/Index.vue";
import GuestBerita from "@/views/guest/Berita.vue";
import GuestSejarah from "@/views/guest/Sejarah.vue";
import GuestPelayanan from "@/views/guest/Pelayanan.vue";
import GuestStrukturOrganisasi from "@/views/guest/StrukturOrganisasi.vue";

import AdminLayout from "@/views/admin/layout/Layout.vue";
import AdminDashboard from "@/views/admin/Dashboard.vue";
import AdminSetting from "@/views/admin/Setting.vue";
import AdminMasterPengguna from "@/views/admin/master/user/Index.vue";
import AdminMasterPenggunaForm from "@/views/admin/master/user/Form.vue";


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
  {
    component: AdminLayout, children: [
      { path: '/admin-setting', component: AdminSetting, name: 'admin.setting', meta: {middleware: auth} },
      { path: '/admin-dashboard', component: AdminDashboard, name: 'admin.dashboard', meta: {middleware: auth} },

      { path: '/admin-master-pengguna', component: AdminMasterPengguna, name: 'admin.master.pengguna', meta: {middleware: auth} },
      { path: '/admin-master-pengguna-create', component: AdminMasterPenggunaForm, name: 'admin.master.pengguna.create', meta: {middleware: auth} },
      { path: '/admin-master-pengguna-edit/:id', component: AdminMasterPenggunaForm, name: 'admin.master.pengguna.edit', meta: {middleware: auth} },
    ]
  }
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL), routes, linkActiveClass: "text-primary active",
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
