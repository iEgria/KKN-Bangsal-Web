<template>
    <div class="card card-body shadow">
        <table class="table table-hover">
            <thead>
                <tr>
                    <td class="w-10">RW</td>
                    <td class="w-10">RT</td>
                    <td>Nama</td>
                    <td class="w-1"></td>
                </tr>
            </thead>
            <tbody>
                <template v-for="rw in this.formData" v-bind:key="rw">
                    <tr>
                        <td>{{ rw.rw_number.toString().padStart(2, "0") }}</td>
                        <td></td>
                        <td>{{ rw.nama }}</td>
                        <td class="text-end">
                            <router-link :to="{ name: 'admin.rt-rw-create-rt', params: { rw_id: rw.id } }" class="btn btn-sm px-3 bg-gradient-success ms-1 mb-0 text-white">
                                <font-awesome-icon icon="plus"></font-awesome-icon>
                            </router-link>
                            <router-link :to="{ name: 'admin.rt-rw-edit', params: { id: rw.id } }" class="btn btn-sm px-3 bg-gradient-warning ms-1 mb-0 text-white">
                                <font-awesome-icon icon="pencil"></font-awesome-icon>
                            </router-link>
                            <owl-delete-button class="btn btn-sm px-3 bg-gradient-danger ms-1 mb-0" :url="'rt_rw/' + rw.id" redirectUrl="admin.rt-rw">
                                <font-awesome-icon icon="trash"></font-awesome-icon>
                            </owl-delete-button>
                        </td>
                    </tr>
                    <template v-for="rt in rw.rt" v-bind:key="rt">
                        <tr>
                            <td></td>
                            <td>{{ rt.rt_number.toString().padStart(2, "0") }}</td>
                            <td>{{ rt.nama }}</td>
                            <td class="text-end">
                                <router-link :to="{ name: 'admin.rt-rw-edit', params: { id: rt.id } }" class="btn btn-sm px-3 bg-gradient-warning ms-1 mb-0 text-white">
                                    <font-awesome-icon icon="pencil"></font-awesome-icon>
                                </router-link>
                                <owl-delete-button class="btn btn-sm px-3 bg-gradient-danger ms-1 mb-0" :url="'rt_rw/' + rt.id" redirectUrl="admin.rt-rw">
                                    <font-awesome-icon icon="trash"></font-awesome-icon>
                                </owl-delete-button>
                            </td>
                        </tr>
                    </template>
                </template>
            </tbody>
        </table>
    </div>
    <owl-floating-button to="admin-rt-rw-create">
        Tambah
    </owl-floating-button>
</template>

<script>
import OwlFloatingButton from '@/components/OwlFloatingButton.vue';
import OwlDeleteButton from '@/components/OwlDeleteButton.vue'

export default {
    name: 'Master User',
    components: {
        OwlFloatingButton,
        OwlDeleteButton
    },
    data() {
        return {
            formData: {}
        }
    },
    mounted() {
        this.axios.get('rt_rw').then((response) => {
            this.formData = response.data.data;
        })
    },
    methods: {
    }
}
</script>