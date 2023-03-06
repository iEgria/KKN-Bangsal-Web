<template>
    <div class="card card-body shadow">
        <table class="table">
            <thead>
                <tr>
                    <td>Pelayanan</td>
                    <td width="1px"></td>
                </tr>
            </thead>
            <tbody>
                <tr v-for="pelayanan in this.formData" v-bind:key="pelayanan">
                    <td> {{ pelayanan.nama }} </td>
                    <td>
                        <router-link :to="{ name: 'admin.persyaratan-pelayanan-edit', params: { id: pelayanan.id } }" class="btn btn-sm px-3 bg-gradient-warning ms-1 mb-0 text-white">
                            <font-awesome-icon icon="pencil"></font-awesome-icon>
                        </router-link>
                        <owl-delete-button class="btn btn-sm px-3 bg-gradient-danger ms-1 mb-0" :url="'pelayanan/' + pelayanan.id" redirectUrl="admin.persyaratan-pelayanan">
                            <font-awesome-icon icon="trash"></font-awesome-icon>
                        </owl-delete-button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <owl-floating-button to="admin-persyaratan-pelayanan-create">
        Tambah
    </owl-floating-button>
</template>

<script>
import OwlFloatingButton from '@/components/OwlFloatingButton.vue';
import OwlDeleteButton from '@/components/OwlDeleteButton.vue'

export default {
    name: 'Master User',
    components: { OwlFloatingButton, OwlDeleteButton },
    data() {
        return {
            formData: {}
        }
    },
    mounted() {
        this.axios.get('pelayanan').then((response) => {
            this.formData = response.data.data;
        })
    },
}
</script>