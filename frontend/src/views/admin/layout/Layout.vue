<template>
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-white" @click="showSidebar(false)">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" :href="this.data.baseUrl">
                <img :src="this.data.baseUrl + 'favicon.png'" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-1 font-weight-bold">{{ this.data.appTitle }}</span>
            </a>
            <hr class="horizontal dark mt-0">
            <sidebar></sidebar>
        </div>
    </aside>
    <main class="main-content position-relative max-height-vh-100 border-radius-lg">
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow bg-white m-3 border-radius-xl" navbar-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">Dashboard</h6>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <ul class="navbar-nav ms-auto justify-content-end">
                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" @click="this.showSidebar()">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item dropdown pe-2 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body" @click="this.config.navbarDropDownShow = !this.config.navbarDropDownShow">
                                <font-awesome-icon icon="user" class="me-2"></font-awesome-icon>{{ this.data.name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end p-1" :class="this.config.navbarDropDownShow ? 'show' : ''">
                                <li class="m-1">
                                    <router-link to="admin-setting" class="dropdown-item border-radius-md">
                                        <div class="d-flex flex-column justify-content-center pt-1">
                                            <h6 class="text-sm font-weight-normal">
                                                <font-awesome-icon icon="cog" class="me-1"></font-awesome-icon> Pengaturan
                                            </h6>
                                        </div>
                                    </router-link>
                                </li>
                                <li class="m-1">
                                    <div class="dropdown-item border-radius-md" @click="signOut">
                                        <div class="d-flex flex-column justify-content-center pt-1">
                                            <h6 class="text-sm font-weight-normal">
                                                <font-awesome-icon icon="sign-out" class="me-1"></font-awesome-icon> Keluar
                                            </h6>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
            <div class="min-vh-80">
                <router-view></router-view>
            </div>
            <footer class="footer pt-3">
                <div class="container-fluid">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col-lg-12 mb-lg-0 mb-4">
                            <div class="copyright text-center text-sm text-muted text-lg-start">
                                Dibuat dengan penuh <font-awesome-icon icon="heart" class="text-gradient text-danger"></font-awesome-icon> oleh <a href="https://www.instagram.com/kkn.bangsal033" class="font-weight-bold" target="_blank">Kelompok 33 KKN Tematik</a> Universitas Nusantara PGRI Kediri
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </main>
</template>

<script>
import Sidebar from './Sidebar.vue';

export default {
    name: 'Layout',
    components: { Sidebar },
    data() {
        return {
            data: {
                baseUrl: process.env.VUE_APP_URL,
                appTitle: process.env.VUE_APP_TITLE,
                name: window.localStorage.name
            },
            config: {
                navbarDropDownShow: false,
                showSidebar: false,
            }
        }
    },
    methods: {
        showSidebar() {
            this.config.showSidebar = !this.config.showSidebar;
            if (this.config.showSidebar) {
                document.body.classList.add('g-sidenav-pinned');
                document.body.classList.add('g-sidenav-show');
            } else {
                document.body.classList.remove('g-sidenav-pinned');
                document.body.classList.remove('g-sidenav-show');
            }
        },
        signOut() {
            let self = this;
            this.$swal.fire({
                icon: 'question',
                title: 'Keluar',
                text: "Keluar dari Aplikasi?",
                showCancelButton: true,
                cancelButtonText: 'Batal'
            }).then(function (result) {
                if (result.isConfirmed) {
                    self.axios.post('auth/logout').then((response) => {
                        self.$swal.fire({
                            icon: 'success',
                            text: response.data.message,
                        });
                        self.$router.push({ name: 'auth.login' });
                    });
                }
            });
        }
    }
}
</script>