<template>
    <div class="card card-body shadow">
        <form method="post" @submit.prevent="submit()">
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <label>RW</label>
                        <input type="text" name="rw_number" class="form-control" :class="this.errors.rw_number ? 'is-invalid' : ''" v-model="this.data.rw_number">
                        <div class="invalid-feedback"> {{ this.errors.rw_number }}</div>
                    </div>
                </div>
                <div class="col-9">
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" :class="this.errors.nama ? 'is-invalid' : ''" v-model="this.data.nama">
                        <div class="invalid-feedback"> {{ this.errors.nama }}</div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <router-link to="/admin-rt-rw" class="btn bg-gradient-secondary mb-0">
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
            data: {},
            errors: {}
        }
    },
    methods: {
        submit() {
            if (this.$route.params.id) {
                this.axios.put('rt_rw/' + this.$route.params.id, this.data).then((response) => {
                    if (!response.data.error) {
                        this.$router.push({ name: 'admin.rt-rw' });
                    } else {
                        this.errors = response.data.message;
                    }
                });
            } else {
                this.axios.post('rt_rw', this.data).then((response) => {
                    if (!response.data.error) {
                        this.$router.push({ name: 'admin.rt-rw' });
                    } else {
                        this.errors = response.data.message;
                    }
                });
            }
        }
    },
    mounted() {
        if (this.$route.params.id) {
            this.axios.get('rt_rw/' + this.$route.params.id).then((response) => {
                this.data = response.data.data;
            });
        }
    }
}
</script>