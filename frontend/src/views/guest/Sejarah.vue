<template>
    <div class="container my-5">
        <h4 class="text-center text-gradient text-primary py-3">Sejarah Desa</h4>
        <div class="card card-body" v-html="this.data.sejarah_desa"> </div>
    </div>
</template>

<script>
export default {
    name: 'Sejarah Desa',
    data() {
        return {
            data: {}
        }
    },
    mounted() {
        this.axios.get('sejarah_desa').then((response) => {
            if (response.data.data) {
                this.data.sejarah_desa = response.data.data.sejarah_desa;
            }
        });
    }
}
</script>