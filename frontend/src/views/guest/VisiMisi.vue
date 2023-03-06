<template>
    <div class="container my-5">
        <h4 class="text-center text-gradient text-primary py-3">Visi Misi Kelurahan</h4>
        <div class="card card-body" v-html="this.data.visi_misi"> </div>
    </div>
</template>

<script>
export default {
    name: 'Visi Misi Kelurahan',
    data() {
        return {
            data: {}
        }
    },
    mounted() {
        this.axios.get('information').then((response) => {
            if (response.data.data) {
                this.data.visi_misi = response.data.data.visi_misi;
            }
        });
    }
}
</script>