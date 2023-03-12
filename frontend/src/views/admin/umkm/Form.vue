<template>
    <div class="card card-body shadow">
        <form method="post" @submit.prevent="submit()">
            <div class="form-group">
                <label>Pemilik</label>
                <input type="text" name="pemilik" class="form-control" :class="this.errors.pemilik ? 'is-invalid' : ''" v-model="this.data.pemilik">
                <div class="invalid-feedback"> {{ this.errors.pemilik }}</div>
            </div>
            <div class="form-group">
                <label>Nama Usaha</label>
                <input type="text" name="usaha" class="form-control" :class="this.errors.usaha ? 'is-invalid' : ''" v-model="this.data.usaha">
                <div class="invalid-feedback"> {{ this.errors.usaha }}</div>
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control" :class="this.errors.alamat ? 'is-invalid' : ''" v-model="this.data.alamat">
                <div class="invalid-feedback"> {{ this.errors.alamat }}</div>
            </div>
            <div class="form-group">
                <label>Telp</label>
                <input type="text" name="no_telp" class="form-control" :class="this.errors.no_telp ? 'is-invalid' : ''" v-model="this.data.no_telp">
                <div class="invalid-feedback"> {{ this.errors.no_telp }}</div>
            </div>
            <div class="form-group">
                <label>Logo <code>Max 2MB</code></label>
                <input type="file" name="photo" class="form-control" :class="this.errors.photo ? 'is-invalid' : ''" @change="submitFile">
                <div class="invalid-feedback"> {{ this.errors.photo }}</div>
            </div>
            <div class="d-flex justify-content-between">
                <router-link to="/admin-umkm" class="btn bg-gradient-secondary mb-0">
                    Kembali
                </router-link>
                <button type="submit" class="btn bg-gradient-success mb-0">Simpan</button>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    url: 'Dashboard',
    data() {
        return {
            data: {},
            errors: {}
        }
    },
    methods: {
        submitFile(event) {
            this.data.photo = event.target.files[0];
        },
        submit() {
            if (this.$route.params.id) {
                this.axios.put('umkm/' + this.$route.params.id, this.data).then((response) => {
                    if (!response.data.error) {
                        this.$router.push({ name: 'admin.umkm' });
                    } else {
                        this.errors = response.data.message;
                    }
                });
            } else {
                this.axios.post('umkm', this.data, { headers: { 'Content-Type': 'multipart/form-data' } }).then((response) => {
                    if (!response.data.error) {
                        this.$router.push({ name: 'admin.umkm' });
                    } else {
                        this.errors = response.data.message;
                    }
                });
            }
        }
    },
    mounted() {
        if (this.$route.params.id) {
            this.axios.get('related_link/' + this.$route.params.id).then((response) => {
                this.data = {
                    title: response.data.data.title,
                    url: response.data.data.url,
                }
            });
        }
    }
}
</script>