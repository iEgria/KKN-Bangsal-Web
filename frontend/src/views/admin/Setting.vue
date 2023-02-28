<template>
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="card card-body shadow">
                <form method="post" @submit.prevent="changePassword()">
                    <div class="form-group">
                        <label>Password Saat Ini</label>
                        <input type="password" name="password_old" class="form-control" :class="this.errors.password_old ? 'is-invalid' : ''" v-model="this.data.changePassword.password_old">
                        <div class="invalid-feedback"> {{ this.errors.password_old }}</div>
                    </div>
                    <div class="form-group">
                        <label>Password Baru</label>
                        <input type="password" name="password" class="form-control" :class="this.errors.password ? 'is-invalid' : ''" v-model="this.data.changePassword.password">
                        <div class="invalid-feedback"> {{ this.errors.password }}</div>
                    </div>
                    <div class="form-group">
                        <label>Konfirmasi Password Baru</label>
                        <input type="password" name="password_confirmation" class="form-control" :class="this.errors.password_confirmation ? 'is-invalid' : ''" v-model="this.data.changePassword.password_confirmation">
                        <div class="invalid-feedback"> {{ this.errors.password_confirmation }}</div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn bg-gradient-success mb-0">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="card card-body shadow">
                <form method="post" @submit.prevent="updateProfile()">
                    <div class="form-group">
                        <label>Nama Pengguna</label>
                        <input type="text" name="email" class="form-control" :class="this.errors.email ? 'is-invalid' : ''" v-model="this.data.profile.email">
                        <div class="invalid-feedback"> {{ this.errors.email }}</div>
                    </div>
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="name" class="form-control" :class="this.errors.name ? 'is-invalid' : ''" v-model="this.data.profile.name">
                        <div class="invalid-feedback"> {{ this.errors.name }}</div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn bg-gradient-success mb-0">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Dashboard',
    data() {
        return {
            data: {
                changePassword: {},
                profile: {}
            },
            errors: {}
        }
    },
    methods: {
        changePassword() {
            this.axios.post('auth/changePassword', this.data.changePassword).then((response) => {
                if (!response.data.error) {
                    this.$swal.fire({
                        icon: 'success',
                        title: response.data.message,
                    }).then(() => {
                        this.$router.push({ name: 'admin.dashboard' });
                    });
                } else {
                    this.errors = response.data.message;
                }
            })
        },
        updateProfile() {
            this.axios.post('auth/updateProfile', this.data.profile).then((response) => {
                if (!response.data.error) {
                    this.$swal.fire({
                        icon: 'success',
                        title: response.data.message,
                    }).then(() => {
                        this.$router.push({ name: 'admin.dashboard' });
                    });
                } else {
                    this.errors = response.data.message;
                }
            })
        }
    }
}
</script>