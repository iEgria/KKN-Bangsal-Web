<template>
    <div class="row">
        <div class="col-4" v-for="galeri in this.formData" v-bind:key="galeri">
            <owl-delete-button :id="galeri.id" :url="'galery/' + galeri.id" class="p-0 w-100 rounded-3">
                <div class="card card-body shadow m-0 rounded-3" :style="'height: 200px; background-image: url(' + galeri.image + '); background-size: cover; background-position: center;'"> </div>
            </owl-delete-button>
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
import OwlDeleteButton from '@/components/OwlDeleteButton.vue';
export default {
    name: 'Galeri',
    components: { OwlDeleteButton },
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
            this.axios.post('galery', { image: event.target.files[0] }, { headers: { 'Content-Type': 'multipart/form-data' } }).then((response) => {
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
            })
        },
        refreshData() {
            this.axios.get('galery').then((response) => {
                this.formData = response.data.data;
                console.log(this.formData);
            });
        },
    },
    mounted() {
        this.refreshData();
    }
}
</script>