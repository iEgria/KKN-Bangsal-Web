<template>
    <div class="container my-5">
        <h4 class="text-center text-gradient text-primary py-3">Data UMKM</h4>
        <div class="row">
            <div class="col-12 col-md-4" v-for="umkm in this.formData" v-bind:key="umkm">
                <div class="card card-body shadow">
                    <div class="card card-body shadow" :style="'background-image: url(' + umkm.photo + '); background-size: cover; height: 200px;'"></div>
                    <table>
                        <tr>
                            <td class="text-nowrap w-1">Nama UMKM</td>
                            <td class="w-1 px-2">:</td>
                            <td class="text-wrap">{{ umkm.usaha }}</td>
                        </tr>
                        <tr>
                            <td class="text-nowrap w-1">Nama Pemilik</td>
                            <td class="w-1 px-2">:</td>
                            <td class="text-wrap">{{ umkm.pemilik }}</td>
                        </tr>
                        <tr>
                            <td class="text-nowrap w-1">Kontak</td>
                            <td class="w-1 px-2">:</td>
                            <td class="text-wrap">{{ umkm.no_telp }}</td>
                        </tr>
                        <tr>
                            <td class="text-nowrap w-1">Alamat</td>
                            <td class="w-1 px-2">:</td>
                            <td class="text-wrap">{{ umkm.alamat }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "UMKM",
    data() {
        return {
            formData: {}
        }
    },
    mounted() {
        this.axios.get('umkm').then((response) => {
            this.formData = response.data.data;
        })
    },
}
</script>