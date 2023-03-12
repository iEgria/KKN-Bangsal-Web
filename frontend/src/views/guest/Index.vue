<template>
    <section class="py-7" id="content">
        <div class="container">
            <div class="row align-items-top">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-12 col-lg-5">
                            <div class="card card-body bg-gradient-info p-3 mb-3">
                                <h5 class="text-white text-center h1 font-weight-bolder mb-2 p-2">{{ parseInt((this.informations.penduduk_pria + this.informations.penduduk_wanita)).toLocaleString('id') }}</h5>
                                <p class="text-white text-center">Jumlah Penduduk</p>
                                <div class="row">
                                    <div class="col">
                                        <div class="card card-body text-center p-2">
                                            <div class="text-nowrap">
                                                <font-awesome-icon icon="mars" class="text-gradient text-info"></font-awesome-icon> <span class="text-dark">{{ parseInt(this.informations.penduduk_pria).toLocaleString('id') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card card-body text-center p-2">
                                            <div class="text-nowrap">
                                                <font-awesome-icon icon="venus" class="text-gradient text-danger"></font-awesome-icon> <span class="text-dark">{{ parseInt(this.informations.penduduk_wanita).toLocaleString('id') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <router-link to="rt-rw" class="col-12 col-lg-5">
                            <div class="card card-body bg-gradient-warning p-3 mb-3">
                                <h5 class="text-white text-center h1 font-weight-bolder mb-2 p-2">{{ this.informations.luas_wilayah }}</h5>
                                <p class="text-white text-center">Luas Wilayah</p>
                                <div class="row">
                                    <div class="col">
                                        <div class="card card-body text-center p-2">
                                            <div class="text-nowrap"> {{ this.informations.jumlahRt }} RT </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card card-body text-center p-2">
                                            <div class="text-nowrap"> {{ informations.jumlahRw }} RW </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </router-link>
                    </div>
                    <div class="row" style="cursor: pointer;" @click="this.showUmkm = true">
                        <router-link to="umkm" class="col-12 col-lg-5 offset-lg-2">
                            <div class="card card-body bg-gradient-danger p-4 mb-3">
                                <h5 class="text-white text-center h1 font-weight-bolder mt-2">0</h5>
                                <p class="text-white text-center m-2">Jumlah UMKM</p>
                            </div>
                        </router-link>
                        <router-link to="kelembagaan" class="col-12 col-lg-5">
                            <div class="card card-body bg-gradient-success p-4 mb-3">
                                <h5 class="text-white text-center h1 font-weight-bolder mt-2">{{ this.beritas.length }}</h5>
                                <p class="text-white text-center m-2">Jumlah Berita</p>
                            </div>
                        </router-link>
                    </div>
                </div>
                <div class="col-lg-4 ms-auto mt-lg-0">
                    <div class="card shadow-lg">
                        <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                            <div class="d-block blur-shadow-image">
                                <img :src="this.baseUrl + 'storage/kantor-kelurahan.jpeg'" alt="img-blur-shadow" class="img-fluid shadow rounded-3">
                            </div>
                            <div class="colored-shadow" :style="'background-image: url(`' + this.baseUrl + 'storage/kantor-kelurahan.jpeg`)'"></div>
                        </div>
                        <div class="card-body">
                            <a href="javascript:;">
                                <h5 class="mt-0"> Kantor Kelurahan Bangsal </h5>
                            </a>
                            <p> Kecamatan Pesantren, Kota Kediri, Provinsi Jawa Timur </p>
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
                <div class="col-lg-6 col-12 mb-4" v-for="(berita, index) in this.beritas" v-bind:key="index" style="z-index:2">
                    <template v-if="index < 4">
                        <div class="card card-profile overflow-hidden">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-12 pe-lg-0">
                                    <a href="javascript:;">
                                        <div class="p-md-3 pt-3 px-3">
                                            <div class="card card-body p-5" style="background-position: center; background-size: cover;" :style="'background-image: url(' + berita.cover + ')'">
                                                <span class="m-4 m-md-2"></span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-8 col-md-6 col-12 ps-lg-0 my-auto">
                                    <div class="card-body">
                                        <router-link :to="{ name: 'guest.berita.show', params: { id: berita.slug } }" class="text-primary">
                                            <h5 class="mb-0 text-truncate">{{ berita.title }}</h5>
                                        </router-link>
                                        <small class="text-dark">{{ berita.published_at_human_date }}</small>
                                        <p class="mb-0">{{ berita.content_short }}
                                            <router-link :to="{ name: 'guest.berita.show', params: { id: berita.slug } }" class="text-primary">
                                                Baca Selengkapnya
                                            </router-link>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>
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
    <section class="pt-5">
        <div class="container">
            <h3 class="text-gradient text-primary text-center mb-4">Galeri</h3>
            <div class="d-flex">
                <div class="w-1 pt-3">
                    <font-awesome-icon icon="chevron-left" class="text-primary cursor-pointer mt-5" @click="(this.startPhotos > 0 ? changeGaleryPage(this.startPhotos - 1) : '')" />
                </div>
                <div class="w-100 mx-3">
                    <div class="row" id="images">
                        <template v-for="(photo, index) in photos" v-bind:key="index">
                            <div class="col-12 col-md-3 d-md-block" :class="index != this.startPhotos ? 'd-none' : ''" v-if="index >= this.startPhotos && index <= this.startPhotos + 3">
                                <img class="mb-3 w-100 shadow rounded-3 cursor-pointer" :src="photo.image" style="height: 150px; object-fit: cover;">
                            </div>
                        </template>
                    </div>
                </div>
                <div class="w-1 pt-3">
                    <font-awesome-icon icon="chevron-right" class="text-primary cursor-pointer mt-5" @click="(this.startPhotos < this.photos.length - 1 ? changeGaleryPage(this.startPhotos + 1) : '')" />
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import Viewer from 'viewerjs';
export default {
    name: 'GuestIndex',
    data() {
        return {
            showRtRw: false,
            showUmkm: false,
            baseUrl: process.env.VUE_APP_URL,
            startPhotos: 0,
            photos: {},
            viewer: null,
            beritas: [],
            informations: {},
        }
    },
    methods: {
        changeGaleryPage(number) {
            this.startPhotos = number;
            setTimeout(() => {
                this.viewer.update();
            }, 10);
        },
    },
    mounted() {
        this.axios.get('galery').then((response) => {
            if (response.data.data.length > 0) {
                this.photos = response.data.data;
                setTimeout(() => {
                    this.viewer = new Viewer(document.getElementById('images'));
                }, 100);
            }
        });
        this.axios.get('berita?limit=4').then((response) => {
            this.beritas = response.data.data;
        });
        this.axios.get('information').then((response) => {
            if (response.data.data) {
                this.informations.penduduk_pria = response.data.data.penduduk_pria;
                this.informations.penduduk_wanita = response.data.data.penduduk_wanita;
                this.informations.luas_wilayah = response.data.data.luas_wilayah;
            }
        });
        this.axios.get('rt_rw').then((response) => {
            this.informations.jumlahRt = 0;
            this.informations.jumlahRw = response.data.data.length;
            response.data.data.forEach((row) => {
                this.informations.jumlahRt += row.rt.length;
            });
        });
    },
}
</script>