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
            id: this.$route.params.id,
            data: {},
            handle: null
        };
    },
    mounted() {
        this.handle = setInterval(() => {
            if (this.id != this.$route.params.id) {
                this.id = this.$route.params.id;
                this.axios.get('pelayanan/' + this.id).then((response) => {
                    this.data = response.data.data;
                });
            }
        }, 500);
    }, unmounted() {
        clearInterval(this.handle);
    }
};
</script>