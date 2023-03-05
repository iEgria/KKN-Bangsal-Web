<template>
    <div class="card card-body shadow">
        <table class="table">
            <thead>
                <tr>
                    <td>Nama Pengguna</td>
                    <td>Nama Lengkap</td>
                    <td>Hak Akses</td>
                    <td width="1px"></td>
                </tr>
            </thead>
            <tbody>
                <tr v-for="user in this.formData" v-bind:key="user">
                    <td>{{ user.email }}</td>
                    <td>{{ user.name }}</td>
                    <td>
                        <span class="badge bg-gradient-primary ms-1" v-for="role in user.roles" v-bind:key="role">{{ role }}</span>
                    </td>
                    <td>
                        <button class="btn btn-sm px-3 bg-gradient-info ms-1 mb-0" @click="this.resetPassword(user.id)"><font-awesome-icon icon="refresh"></font-awesome-icon></button>
                        <router-link :to="{ name: 'admin.master.pengguna-edit', params: { id: user.id } }" class="btn btn-sm px-3 bg-gradient-warning ms-1 mb-0 text-white">
                            <font-awesome-icon icon="pencil"></font-awesome-icon>
                        </router-link>
                        <owl-delete-button class="btn btn-sm px-3 bg-gradient-danger ms-1 mb-0" :url="'master/user/' + user.id" redirectUrl="admin.master.pengguna">
                            <font-awesome-icon icon="trash"></font-awesome-icon>
                        </owl-delete-button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <owl-floating-button to="admin-master-pengguna-create">
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
        this.axios.get('master/user').then((response) => {
            this.formData = response.data.data;
        })
    },
    methods: {
        resetPassword(id) {
            let self = this;
            this.$swal.fire({
                icon: 'question',
                title: 'Reset Password',
                text: "Password akan direset menjadi sama seperti username pengguna",
                showCancelButton: true,
                cancelButtonText: 'Batal'
            }).then(function (result) {
                if (result.isConfirmed) {
                    self.axios.post('master/user/resetPassword', { id: id }).then((response) => {
                        if (response.data) {
                            self.$swal.fire({
                                icon: 'success',
                                text: response.data.message,
                            });
                            self.$router.push({ name: 'admin.master.pengguna' });
                        }
                    });
                }
            });
        }
    }
}
</script>