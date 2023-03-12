<template>
    <div class="container my-5">
        <h4 class="text-center text-gradient text-primary py-3">Struktur Organisasi</h4>
        <div class="card card-body p-5">
            <img :src="formData.image" class="w-100" alt="Strutur Organisasi">
        </div>
    </div>
</template>

<script>
export default {
    name: 'StrukturOrganisasi',
    data() {
        return {
            formData: {}
        }
    },
    mounted() {
        this.axios.get('struktur_organisasi').then((response) => {
            this.formData = response.data.data;
        });
    },
}
</script>