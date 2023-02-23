<template>
    <nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3 navbar-transparent ">
        <div class="container">
            <router-link to="/" class="navbar-brand text-white">
                <h5 class="text-white text-uppercase"> Kelurahan Bangsal </h5>
            </router-link>
            <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon mt-2">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </span>
            </button>
            <div class="collapse navbar-collapse w-100 pt-3 pb-2 py-lg-0 ms-lg-12 ps-lg-5" id="navigation">
                <ul class="navbar-nav navbar-nav-hover w-100">
                    <li class="nav-item dropdown dropdown-hover mx-2 ms-lg-auto">
                        <router-link to="/home" class="nav-link ps-2 ">
                            Beranda
                        </router-link>
                    </li>
                    <li class="nav-item dropdown dropdown-hover mx-2">
                        <router-link to="/berita" class="nav-link ps-2 ">
                            Berita
                        </router-link>
                    </li>
                    <li class="nav-item dropdown dropdown-hover mx-2">
                        <router-link to="/sejarah-desa" class="nav-link ps-2 ">
                            Sejarah Desa
                        </router-link>
                    </li>
                    <li class="nav-item dropdown dropdown-hover mx-2">
                        <a class="nav-link ps-2 cursor-pointer" @click="this.showPelayanan = !this.showPelayanan">
                            Persyaratan Pelayanan
                            <font-awesome-icon icon="angle-down" class="ms-2" />
                        </a>
                        <div class="dropdown-menu dropdown-menu-animation p-3" :class="this.showPelayanan ? 'show' : ''" aria-labelledby="dropdownMenuPages8" data-bs-popper="static">
                            <router-link :to="{ name: 'guest.pelayanan.show', params: { id: pelayanan.key } }" class="dropdown-item border-radius-md" v-for="(pelayanan, index) in this.pelayanans" v-bind:key="index" @click="this.showPelayanan = !this.showPelayanan">
                                <span class="ps-3">{{ pelayanan.value }}</span>
                            </router-link>
                        </div>
                    </li>
                    <li class="nav-item dropdown dropdown-hover mx-2">
                        <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center" id="dropdownMenuBlocks" data-bs-toggle="dropdown" aria-expanded="false">
                            Struktur Organisasi
                            <font-awesome-icon icon="angle-down" class="ms-2" />
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <header class="bg-gradient-dark">
        <div class="page-header" :class="this.$route.name == 'guest.index' ? ' min-vh-100' : ' min-vh-15'" :style="'background-image: url(' + this.header[selectedHeader] + ')'">
            <span class="mask bg-gradient-primary opacity-8"></span>
            <div class="container">
                <div v-if="this.$route.name != 'guest.index'" class="p-5"></div>
                <div class="row justify-content-center" v-if="this.$route.name == 'guest.index'">
                    <div class="col-lg-8 text-center mx-auto my-auto">
                        <h1 class="text-white">Kelurahan Bangsal</h1>
                        <p class="lead mb-0 text-white ">Website Resmi Kelurahan Bangsal</p>
                        <p class="lead mb-4 text-white opacity-8">
                            <small>
                                <font-awesome-icon icon="location-dot"></font-awesome-icon> Kec Pesantren, Kota Kediri
                                <font-awesome-icon icon="phone" class="ps-3"></font-awesome-icon> {{ this.phone }}
                            </small>
                        </p>
                        <a href="#content" class="btn bg-white text-dark mb-2 mt-5">Jelajahi</a>
                        <div class="d-flex justify-content-center">
                            <a href="javascript:;"><i class="fab fa-facebook text-lg text-white me-4"></i></a>
                            <a href="javascript:;"><i class="fab fa-instagram text-lg text-white me-4"></i></a>
                            <a href="javascript:;"><i class="fab fa-twitter text-lg text-white me-4"></i></a>
                            <a href="javascript:;"><i class="fab fa-google-plus text-lg text-white"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="position-absolute w-100 z-index-1 bottom-0" v-if="this.$route.name == 'guest.index'">
                <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 40" preserveAspectRatio="none" shape-rendering="auto">
                    <defs>
                        <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
                    </defs>
                    <g class="moving-waves">
                        <use xlink:href="#gentle-wave" x="48" y="-1" fill="rgba(255,255,255,0.40" />
                        <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.35)" />
                        <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.25)" />
                        <use xlink:href="#gentle-wave" x="48" y="8" fill="rgba(255,255,255,0.20)" />
                        <use xlink:href="#gentle-wave" x="48" y="13" fill="rgba(255,255,255,0.15)" />
                        <use xlink:href="#gentle-wave" x="48" y="16" fill="rgba(255,255,255,0.15)" />
                        <use xlink:href="#gentle-wave" x="48" y="16" fill="#F8F9FA" />
                    </g>
                </svg>
            </div>
        </div>
    </header>
    <router-view />
    <footer class="footer">
        <hr class="horizontal dark mb-5">
        <div class="container">
            <div class="row">
                <div class="col-6 col-md-3 mb-3">
                    <h6 class="text-gradient text-primary text-sm">Halaman Terkait</h6>
                    <div>
                        <ul class="d-flex flex-row nav">
                            <li class="nav-item">
                                <a href="https://kedirikota.go.id/">
                                    <img :src="this.baseUrl + 'favicon.png'" class="avatar avatar-xl me-3 shadow-lg" alt="user1">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-6 col-md-3 mb-3">
                    <h6 class="text-gradient text-primary text-sm">Hubungi Kami</h6>
                    <ul class="flex-column ms-n3 nav">
                        <li class="nav-item">
                            <a class="nav-link" :href="'mailto:' + this.email" target="_blank">
                                <font-awesome-icon icon="envelope" class="me-2"></font-awesome-icon>
                                {{ this.email }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" :href="'tel:' + this.phone" target="_blank">
                                <font-awesome-icon icon="phone" class="me-2"></font-awesome-icon>
                                {{ this.phone }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://instagram.com/kelurahan_bangsal" target="_blank">
                                <font-awesome-icon icon="fa-brands fa-instagram" class="me-2"></font-awesome-icon>
                                @kelurahan_bangsal
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-12 col-md-6 mb-3">
                    <h6 class="text-gradient text-primary text-sm">Lokasi</h6>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7905.266978538611!2d112.038906!3d-7.828559449999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78577906fbf313%3A0x39470f5765aaa0b1!2sBangsal%2C%20Kec.%20Pesantren%2C%20Kabupaten%20Kediri%2C%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1677124199591!5m2!1sid!2sid" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col-12">
                    <div class="text-center">
                        <p class="my-4 text-sm">
                            All rights reserved. Copyright © 2023 - <a href="https://kel-bangsal.kedirikota.go.id" target="_blank">Kelurahan Bangsal</a>.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</template>

<script>
export default {
    name: 'GuestIndex',
    data() {
        return {
            baseUrl: process.env.VUE_APP_URL,
            phone: "(0355) xxxx",
            email: "info@kec-bangsal.kedirikota.go.id",
            selectedHeader: 0,
            header: [
                process.env.VUE_APP_URL + 'storage/header-1.jpg',
                process.env.VUE_APP_URL + 'storage/header-2.jpeg',
                process.env.VUE_APP_URL + 'storage/header-3.png',
                process.env.VUE_APP_URL + 'storage/header-4.png',
                process.env.VUE_APP_URL + 'storage/header-5.png',
            ],
            showPelayanan: false,
            pelayanans: [
                {
                    key: 'kk-hilang',
                    value: 'KK Hilang'
                },
                {
                    key: 'kk-perubahan',
                    value: 'KK Perubahan'
                },
                {
                    key: 'ktp-hilang',
                    value: 'KTP Hilang'
                },
                {
                    key: 'ktp-baru',
                    value: 'KTP Baru'
                },
                {
                    key: 'surat-keterangan-tidak-mampu',
                    value: 'Surat Keterangan Tidak Mampu'
                },
                {
                    key: 'surat-keterangan-usaha',
                    value: 'Surat Keterangan Usaha'
                },
                {
                    key: 'surat-domisili-perusahaan',
                    value: 'Surat Domisili Perusahaan'
                },
                {
                    key: 'surat-domisili-perorangan',
                    value: 'Surat Domisili Perorangan'
                },
                {
                    key: 'surat-boro-berpergian',
                    value: 'Surat Boro / Berpergian'
                },
                {
                    key: 'skck',
                    value: 'SKCK'
                },
                {
                    key: 'akta-kelahiran',
                    value: 'Akta Kelahiran'
                },
                {
                    key: 'akta-kematian',
                    value: 'Akta Kematian'
                },
                {
                    key: 'pindah-masuk',
                    value: 'Pindah Masuk'
                },
                {
                    key: 'pindah-keluar',
                    value: 'Pindah Keluar'
                },
                {
                    key: 'santunan-kematian',
                    value: 'Santunan Kematian'
                },
                {
                    key: 'pengajuan-bansos-dtks',
                    value: 'Pengajuan Bansos & DTKS'
                }
            ]

        }
    },
    mounted() {
        const sidenav_show = document.querySelector(".g-sidenav-show");
        sidenav_show.classList.remove("g-sidenav-show");

        setInterval(() => {
            if (this.selectedHeader == (this.header.length - 1)) {
                this.selectedHeader = 0;
            } else {
                this.selectedHeader++;
            }
        }, 10000);

    }
}
</script>