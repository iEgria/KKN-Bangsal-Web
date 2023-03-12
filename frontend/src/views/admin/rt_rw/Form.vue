<template>
    <div class="card card-body shadow">
        <form method="post" @submit.prevent="submit()">
            <div class="row">
                <div class="col-3" v-if="this.$route.params.rw_id || this.data.rt_number">
                    <div class="form-group">
                        <label>RT</label>
                        <input type="text" name="rt_number" class="form-control" :class="this.errors.rt_number ? 'is-invalid' : ''" v-model="this.data.rt_number">
                        <div class="invalid-feedback"> {{ this.errors.rt_number }}</div>
                    </div>
                </div>
                <div class="col-3" v-if="!this.$route.params.rw_id && !this.data.rt_number">
                    <div class=" form-group">
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
            data: {
                'rt_rw_id': this.$route.params.rw_id,
            },
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
                const data = response.data.data;
                this.data.nama = data.nama;
                if (data.rt_rw_id) {
                    this.data.rt_rw_id = data.rt_rw_id;
                }
                if (data.rt_number) {
                    this.data.rt_number = data.rt_number;
                }
                if (data.rw_number) {
                    this.data.rw_number = data.rw_number;
                }
            });
        }
    }
}
</script>