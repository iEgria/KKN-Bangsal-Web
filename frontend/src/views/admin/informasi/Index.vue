<template>
    <div class="card card-body shadow">
        <form method="post" @submit.prevent="submit()">
            <div class="form-group">
                <label>No Telp</label>
                <input type="text" name="phone" class="form-control" :class="this.errors.phone ? 'is-invalid' : ''" v-model="this.data.phone">
                <div class="invalid-feedback"> {{ this.errors.phone }}</div>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control" :class="this.errors.email ? 'is-invalid' : ''" v-model="this.data.email">
                <div class="invalid-feedback"> {{ this.errors.email }}</div>
            </div>
            <div class="form-group">
                <label>Instagram</label>
                <input type="text" name="instagram" class="form-control" :class="this.errors.instagram ? 'is-invalid' : ''" v-model="this.data.instagram">
                <div class="invalid-feedback"> {{ this.errors.instagram }}</div>
            </div>
            <div class="form-group">
                <label>Luas Wilayah</label>
                <input type="text" name="luas_wilayah" class="form-control" :class="this.errors.luas_wilayah ? 'is-invalid' : ''" v-model="this.data.luas_wilayah">
                <div class="invalid-feedback"> {{ this.errors.luas_wilayah }}</div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>Penduduk Pria</label>
                        <input type="text" name="penduduk_pria" class="form-control" :class="this.errors.penduduk_pria ? 'is-invalid' : ''" v-model="this.data.penduduk_pria">
                        <div class="invalid-feedback"> {{ this.errors.penduduk_pria }}</div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Penduduk Wanita</label>
                        <input type="text" name="penduduk_wanita" class="form-control" :class="this.errors.penduduk_wanita ? 'is-invalid' : ''" v-model="this.data.penduduk_wanita">
                        <div class="invalid-feedback"> {{ this.errors.penduduk_wanita }}</div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end">
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
                instagram: '@'
            },
            roles: {},
            errors: {}
        }
    },
    methods: {
        submit() {
            this.axios.post('information', this.data).then((response) => {
                if (!response.data.error) {
                    this.$swal.fire({
                        icon: 'success',
                        title: response.data.message,
                        showConfirmButton: false,
                        timer: 1500
                    });
                } else {
                    this.errors = response.data.message;
                }
            });
        }
    },
    mounted() {
        this.axios.get('information').then((response) => {
            if (response.data.data) {
                this.data = response.data.data;
            }
        });
    }
}
</script>