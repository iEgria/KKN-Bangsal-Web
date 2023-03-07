<template>
    <div class="row">
        <div class="col-12">
            <div class="p-0 w-100 rounded-3">
                <div class="card card-body shadow m-0 rounded-3 min-vh-80" :style="'height: 200px; background-image: url(' + this.formData.image + '); background-size: cover; background-position: center;'"> </div>
            </div>
        </div>
    </div>
    <div class="position-fixed" style="bottom: 20px; right: 20px;">
        <input type="file" id="input-file" hidden ref="data.file" @change="StoreData" accept="image/*">
        <button class="btn btn-lg bg-gradient-success px-4 py-3 shadow" @click="SelectFile">
            <font-awesome-icon icon="add"></font-awesome-icon>
        </button>
    </div>
</template>

<script>
export default {
    name: 'Galeri',
    data() {
        return {
            formData: {},
            data: {},
            errors: {}
        }
    },
    methods: {
        SelectFile() {
            document.getElementById('input-file').click();
        },
        StoreData(event) {
            this.axios.post('struktur_organisasi', { image: event.target.files[0] }, { headers: { 'Content-Type': 'multipart/form-data' } }).then((response) => {
                if (!response.data.error) {
                    this.$swal.fire({
                        icon: 'success',
                        title: response.data.message
                    }).then(() => {
                        event.target.value = '';
                        this.refreshData();
                    });
                } else {
                    this.$swal.fire({
                        icon: 'error',
                        title: response.data.message.image[0]
                    })
                }
            });
        },
        refreshData() {
            this.axios.get('struktur_organisasi').then((response) => {
                this.formData = response.data.data;
            });
        },
    },
    mounted() {
        this.refreshData();
    }
}
</script>