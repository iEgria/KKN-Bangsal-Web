<template>
    <div class="container my-5">
        <div class="row">
            <div class="col-12 col-md-8 mb-3">
                <div class="input-group shadow mb-3">
                    <input type="text" class="form-control" placeholder="Pencarian">
                    <button class="btn bg-gradient-primary mb-0" type="button">Cari</button>
                </div>
                <template v-if="!this.$route.params.id">
                    <div class="card card-profile shadow mb-3" v-for="berita in this.beritas" v-bind:key="berita">
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
                                <div class="card-body ">
                                    <router-link :to="{ name: 'guest.berita.show', params: { id: berita.slug } }" class="text-primary" @click="this.refreshData()">
                                        <h5 class="mb-0">{{ berita.title }}</h5>
                                    </router-link>
                                    <small>{{ berita.published_at_human_date }}</small>
                                    <small class="text-dark">{{ berita.tanggal }}</small>
                                    <p class="mb-0">{{ berita.content_short }}
                                        <router-link :to="{ name: 'guest.berita.show', params: { id: berita.slug } }" class="text-primary" @click="this.refreshData()"> Baca Selengkapnya </router-link>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
                <template v-if="this.$route.params.id">
                    <div class="card card-body">
                        <h4>{{ berita.title }}</h4>
                        <small class="text-dark mb-1">23 Februari 2023 | Dilihat {{ berita.view }} Kali</small>
                        <img :src="berita.cover" class="img-responsive border-radius-md shadow">
                        <div v-html="berita.content"> </div>
                    </div>
                </template>
            </div>
            <div class="col-12 col-md-4">
                <div class="card">
                    <div class="card-header bg-gradient-primary">
                        <span class="text-white">Paling Banyak Dilihat</span>
                    </div>
                    <div class="card-body">
                        <template v-for="popular in this.populars" v-bind:key="popular">
                            <router-link :to="{ name: 'guest.berita.show', params: { id: popular.slug } }" class="text-primary" @click="this.refreshData()">
                                <div class="card card-body shadow mb-3">
                                    <h5 class="mb-0">{{ popular.title }}</h5>
                                    <small class="text-muted">{{ popular.published_at_human_date }} | <font-awesome-icon icon="eye" /> {{ popular.view }} </small>
                                </div>
                            </router-link>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Berita",
    data() {
        return {
            beritas: {},
            berita: {},
            populars: {},
        }
    },
    methods: {
        refreshData() {
            setTimeout(() => {
                this.axios.get('berita/' + this.$route.params.id).then((response) => {
                    this.berita = response.data.data[0];
                });
                this.axios.get('berita').then((response) => {
                    this.beritas = response.data.data;
                });
                this.axios.get('berita?popular=true').then((response) => {
                    this.populars = response.data.data;
                });
            }, 20);
        },
    },
    mounted() {
        this.refreshData();
    },
}
</script>