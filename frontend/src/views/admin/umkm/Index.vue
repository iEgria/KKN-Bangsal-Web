<template>
    <div class="card card-body shadow">
        <table class="table">
            <thead>
                <tr>
                    <td>Pemilik</td>
                    <td>Usaha</td>
                    <td>No. Telp</td>
                    <td>Alamat</td>
                    <td width="1px"></td>
                </tr>
            </thead>
            <tbody>
                <tr v-for="Umkm in this.formData" v-bind:key="Umkm">
                    <td> <img :src="Umkm.photo" :alt="Umkm.usaha" style="width: 20px;" class="me-2"> {{ Umkm.pemilik }} </td>
                    <td>{{ Umkm.usaha }}</td>
                    <td>{{ Umkm.no_telp }}</td>
                    <td>{{ Umkm.alamat }}</td>
                    <td>
                        <router-link :to="{ name: 'admin.umkm-edit', params: { id: Umkm.id } }" class="btn btn-sm px-3 bg-gradient-warning ms-1 mb-0 text-white">
                            <font-awesome-icon icon="pencil"></font-awesome-icon>
                        </router-link>
                        <owl-delete-button class="btn btn-sm px-3 bg-gradient-danger ms-1 mb-0" :url="'related_link/' + Umkm.id" redirectUrl="admin.umkm">
                            <font-awesome-icon icon="trash"></font-awesome-icon>
                        </owl-delete-button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <owl-floating-button to="admin-umkm-create">
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
        this.axios.get('umkm').then((response) => {
            this.formData = response.data.data;
        })
    },
}
</script>