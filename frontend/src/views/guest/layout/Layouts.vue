<template>
    <nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3  navbar-transparent ">
        <div class="container">
            <a class="navbar-brand text-white" :href="this.baseUrl" rel="tooltip" title="Kelurahan Bangsal" data-placement="bottom" target="_blank">
                <h5 class="text-white text-uppercase"> Kelurahan Bangsal </h5>
            </a>
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
                        <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center" id="dropdownMenuBlocks" data-bs-toggle="dropdown" aria-expanded="false">
                            Berita
                        </a>
                    </li>
                    <li class="nav-item dropdown dropdown-hover mx-2">
                        <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center" id="dropdownMenuBlocks" data-bs-toggle="dropdown" aria-expanded="false">
                            Sejarah Desa
                        </a>
                    </li>
                    <li class="nav-item dropdown dropdown-hover mx-2">
                        <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center" id="dropdownMenuPages8" data-bs-toggle="dropdown" aria-expanded="false">
                            Pelayanan
                            <font-awesome-icon icon="angle-down" class="ms-2" />
                        </a>
                    </li>
                    <li class="nav-item dropdown dropdown-hover mx-2">
                        <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center" id="dropdownMenuBlocks" data-bs-toggle="dropdown" aria-expanded="false">
                            Struktur Organisasi
                            <font-awesome-icon icon="angle-down" class="ms-2" />
                        </a>
                    </li>
                    <li class="nav-item dropdown dropdown-hover mx-2 ">
                        <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center" id="dropdownMenuDocs" data-bs-toggle="dropdown" aria-expanded="false">
                            Docs
                            <font-awesome-icon icon="angle-down" class="ms-2" />
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <header class="bg-gradient-dark">
        <div class="page-header min-vh-100" :style="'background-image: url(' + this.header[selectedHeader] + ')'">
            <span class="mask bg-gradient-primary opacity-8"></span>
            <div class="container">
                <div class="row justify-content-center">
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
            <div class="position-absolute w-100 z-index-1 bottom-0">
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
    <section class="py-7" id="content">
        <div class="container">
            <div class="row align-items-top">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-12 col-lg-5">
                            <div class="card card-body bg-gradient-info p-3 mb-3">
                                <h5 class="text-white text-center h1 font-weight-bolder mb-2 p-2">6.303</h5>
                                <p class="text-white text-center">Jumlah Penduduk</p>
                                <div class="row">
                                    <div class="col">
                                        <div class="card card-body text-center p-2">
                                            <div class="text-nowrap">
                                                <font-awesome-icon icon="mars" class="text-gradient text-info"></font-awesome-icon> 3.166
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card card-body text-center p-2">
                                            <div class="text-nowrap">
                                                <font-awesome-icon icon="venus" class="text-gradient text-danger"></font-awesome-icon> 3.140
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-5">
                            <div class="card card-body bg-gradient-warning p-3 mb-3">
                                <h5 class="text-white text-center h1 font-weight-bolder mb-2 p-2">11,16 Ha</h5>
                                <p class="text-white text-center">Luas Wilayah</p>
                                <div class="row">
                                    <div class="col">
                                        <div class="card card-body text-center p-2">
                                            <div class="text-nowrap">
                                                36 RT
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card card-body text-center p-2">
                                            <div class="text-nowrap">
                                                6 RW
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-5 offset-lg-2">
                            <div class="card card-body bg-gradient-danger p-3 mb-3">
                                <h5 class="text-white text-center h1 font-weight-bolder mb-2 p-2">900</h5>
                                <p class="text-white text-center">Jumlah UMKM</p>
                                <div class="row">
                                    <div class="col">
                                        <div class="card card-body text-center p-2">
                                            <div class="text-nowrap">
                                                xxxx
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card card-body text-center p-2">
                                            <div class="text-nowrap">
                                                xxxx
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-5">
                            <div class="card card-body bg-gradient-success p-3 mb-3">
                                <h5 class="text-white text-center h1 font-weight-bolder mb-2 p-2">XXXX</h5>
                                <p class="text-white text-center">Lorem Ipsum</p>
                                <div class="row">
                                    <div class="col">
                                        <div class="card card-body text-center p-2">
                                            <div class="text-nowrap">
                                                xxxx
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card card-body text-center p-2">
                                            <div class="text-nowrap">
                                                xxxx
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 ms-auto mt-lg-0">
                    <div class="card shadow-lg">
                        <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                            <div class="d-block blur-shadow-image">
                                <img src="https://harian-news.com/wp-content/uploads/2022/08/Kantor-Bappeda.jpeg" alt="img-blur-shadow" class="img-fluid shadow rounded-3">
                            </div>
                            <div class="colored-shadow" style="background-image: url(&quot;https://harian-news.com/wp-content/uploads/2022/08/Kantor-Bappeda.jpeg&quot;);"></div>
                        </div>
                        <div class="card-body">
                            <a href="javascript:;">
                                <h5 class="mt-3">
                                    Kantor Kelurahan Bangsal
                                </h5>
                            </a>
                            <p>
                                Kantor Kelurahan Bangsal terletak di xxxx lorem ipsum dolor sit amet
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="pt-sm-8 pb-5 position-relative bg-gradient-dark">
        <div class="position-absolute w-100 z-inde-1 top-0 mt-n3">
            <svg width="100%" viewBox="0 -2 1920 157" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>wave-down</title>
                <g stroke="none" stroke-width="1" fill="" fill-rule="evenodd">
                    <g fill="#F8F9FA" fill-rule="nonzero">
                        <g id="wave-down">
                            <path d="M0,60.8320331 C299.333333,115.127115 618.333333,111.165365 959,47.8320321 C1299.66667,-15.5013009 1620.66667,-15.2062179 1920,47.8320331 L1920,156.389409 L0,156.389409 L0,60.8320331 Z" id="Path-Copy-2" transform="translate(960.000000, 78.416017) rotate(180.000000) translate(-960.000000, -78.416017) "></path>
                        </g>
                    </g>
                </g>
            </svg>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 text-start mb-5 mt-5">
                    <h3 class="text-white z-index-1 position-relative">Berita Terbaru</h3>
                    <p class="text-white opacity-8 mb-0">Informasi Terbaru Tentang Kelurahan Bangsal</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-12 mb-4" v-for="data in 4" v-bind:key="data" style="z-index:2">
                    <div class="card card-profile overflow-hidden">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-12 pe-lg-0">
                                <a href="javascript:;">
                                    <div class="p-3 pe-md-0">
                                        <img class="w-100 border-radius-md" src="https://www.tzuchi.or.id/inliners/201810/foto_1_TZC_6585.JPG" alt="image">
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-8 col-md-6 col-12 ps-lg-0 my-auto">
                                <div class="card-body">
                                    <h5 class="mb-0">Lomba Memasak</h5>
                                    <small class="text-dark">21 Feb 2023</small>
                                    <p class="mb-0">Lomba Memasak Tingkat kelurahan dilaksanakan pada... <a href="#" class="text-primary">Baca Selengkapnya </a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="position-absolute w-100 bottom-0 mn-n1">
            <svg width="100%" viewBox="0 -1 1920 166" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>wave-up</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g transform="translate(0.000000, 5.000000)" fill="#FFFFFF" fill-rule="nonzero">
                        <g id="wave-up" transform="translate(0.000000, -5.000000)">
                            <path d="M0,70 C298.666667,105.333333 618.666667,95 960,39 C1301.33333,-17 1621.33333,-11.3333333 1920,56 L1920,165 L0,165 L0,70 Z" fill="#f8f9fa"></path>
                        </g>
                    </g>
                </g>
            </svg>
        </div>
    </section>
    <section class="my-5 pt-5">
        <div class="container">
            <h3 class="text-gradient text-primary text-center mb-4">Galeri</h3>
            <div class="d-flex">
                <div class="w-1">
                    <font-awesome-icon icon="chevron-left" class="text-primary cursor-pointer mt-5" @click="(this.startPhotos > 0 ? this.startPhotos-- : '')" />
                </div>
                <div class="w-100 mx-3">
                    <div class="row">
                        <template v-for="(photo, index) in photos" v-bind:key="index">
                            <div class="col-12 col-md-3 d-md-block" :class="index > 0 ? 'd-none' : ''" v-if="index >= this.startPhotos && index <= this.startPhotos + 3">
                                <div class="card card-body mb-3 py-6" :style="'background-image: url(' + photo + '); background-position: center; background-size: cover;'"></div>
                            </div>
                        </template>
                    </div>
                </div>
                <div class="w-1">
                    <font-awesome-icon icon="chevron-right" class="text-primary cursor-pointer mt-5" @click="(this.startPhotos + 4 < this.photos.length ? this.startPhotos++ : '')" />
                </div>
            </div>
        </div>
    </section>
    <footer class="footer pt-5 mt-5">
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
                process.env.VUE_APP_URL + 'storage/header-3.jpg',
                process.env.VUE_APP_URL + 'storage/header-4.jpeg',
                process.env.VUE_APP_URL + 'storage/header-5.jpg',
            ],
            startPhotos: 0,
            photos: [
                'https://www.tzuchi.or.id/inliners/201810/foto_1_TZC_6585.JPG',
                process.env.VUE_APP_URL + 'storage/header-1.jpg',
                process.env.VUE_APP_URL + 'storage/header-2.jpeg',
                process.env.VUE_APP_URL + 'storage/header-3.jpg',
                process.env.VUE_APP_URL + 'storage/header-4.jpeg',
                process.env.VUE_APP_URL + 'storage/header-5.jpg',
            ],
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