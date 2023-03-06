<template>
    <div class="container my-5">
        <h4 class="text-center text-gradient text-primary py-3 fw-bold">{{ this.data.nama }}</h4>
        <div class="card card-body" v-html="this.data.syarat"></div>
    </div>
</template>

<script>
export default {
    name: "Pelayanan",
    data() {
        return {
            data: {}
        };
    },
    mounted() {
        this.axios.get('pelayanan/' + this.$route.params.id).then((response) => {
            this.data = response.data.data;
        });
    }
};
</script>