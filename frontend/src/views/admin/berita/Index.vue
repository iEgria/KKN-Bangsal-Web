<template>
    <div class="card card-body shadow">
        <table class="table">
            <thead>
                <tr>
                    <td width="1px">Judul Berita</td>
                    <td>Url</td>
                    <td width="1px"></td>
                </tr>
            </thead>
            <tbody>
                <tr v-for="berita in this.formData" v-bind:key="berita">
                    <td> <img :src="berita.cover" :alt="berita.title" style="width: 20px;" class="me-2"> {{ berita.title }}</td>
                    <td> <a :href="berita.url" _target="blank">{{ berita.slug }}</a> </td>
                    <td>
                        <router-link :to="{ name: 'admin.berita-edit', params: { id: berita.id } }" class="btn btn-sm px-3 bg-gradient-warning ms-1 mb-0 text-white">
                            <font-awesome-icon icon="pencil"></font-awesome-icon>
                        </router-link>
                        <owl-delete-button class="btn btn-sm px-3 bg-gradient-danger ms-1 mb-0" :url="'berita/' + berita.id" redirectUrl="admin.berita">
                            <font-awesome-icon icon="trash"></font-awesome-icon>
                        </owl-delete-button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <owl-floating-button to="admin-berita-create">
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
        this.axios.get('berita').then((response) => {
            this.formData = response.data.data;
        })
    },
}
</script>