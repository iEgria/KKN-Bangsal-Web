<template>
    <div class="card card-body shadow">
        <form method="post" @submit.prevent="submit()">
            <div class="form-group">
                <label>Nama Pengguna / Username</label>
                <input type="text" name="email" class="form-control" :class="this.errors.email ? 'is-invalid' : ''" v-model="this.data.email">
                <div class="invalid-feedback"> {{ this.errors.email }}</div>
            </div>
            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="name" class="form-control" :class="this.errors.name ? 'is-invalid' : ''" v-model="this.data.name">
                <div class="invalid-feedback"> {{ this.errors.name }}</div>
            </div>
            <div class="row" v-if="!this.$route.params.id">
                <div class="col">
                    <div class="form-group">
                        <label>Kata Sandi</label>
                        <input type="password" name="password" class="form-control" :class="this.errors.password ? 'is-invalid' : ''" v-model="this.data.password">
                        <div class="invalid-feedback"> {{ this.errors.password }}</div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Ulangi Kata Sandi</label>
                        <input type="password" name="password_confirmation" class="form-control" :class="this.errors.password_confirmation ? 'is-invalid' : ''" v-model="this.data.password_confirmation">
                        <div class="invalid-feedback"> {{ this.errors.password_confirmation }}</div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Hak Akses</label>
                <select name="roles" class="form-select" multiple :class="this.errors.roles ? 'is-invalid' : ''" v-model="this.data.roles">
                    <option :value="role.name" v-for="role in this.roles" v-bind:key="role">{{ role.name }}</option>
                </select>
                <div class="invalid-feedback"> {{ this.errors.roles }}</div>
            </div>
            <div class="d-flex justify-content-between">
                <router-link to="/admin-master-pengguna" class="btn bg-gradient-secondary mb-0">
                    Kembali
                </router-link>
                <button type="submit" class="btn bg-gradient-success mb-0">Simpan</button>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    name: 'Dashboard',
    data() {
        return {
            data: {
                roles: []
            },
            roles: {},
            errors: {}
        }
    },
    methods: {
        submit() {
            if (this.$route.params.id) {
                this.axios.put('master/user/' + this.$route.params.id, this.data).then((response) => {
                    if (!response.data.error) {
                        this.$router.push({ name: 'admin.master.pengguna' });
                    } else {
                        this.errors = response.data.message;
                    }
                });
            } else {
                this.axios.post('master/user', this.data).then((response) => {
                    if (!response.data.error) {
                        this.$router.push({ name: 'admin.master.pengguna' });
                    } else {
                        this.errors = response.data.message;
                    }
                });
            }
        }
    },
    mounted() {
        this.axios.get('master/role').then((response) => {
            this.roles = response.data.data;
        });

        if (this.$route.params.id) {
            this.axios.get('master/user/' + this.$route.params.id).then((response) => {
                this.data = response.data.data;
            });
        }
    }
}
</script>