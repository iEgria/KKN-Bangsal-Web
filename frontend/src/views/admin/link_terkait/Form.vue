<template>
    <div class="card card-body shadow">
        <form method="post" @submit.prevent="submit()">
            <div class="form-group">
                <label>Nama Halaman</label>
                <input type="text" name="title" class="form-control" :class="this.errors.title ? 'is-invalid' : ''" v-model="this.data.title">
                <div class="invalid-feedback"> {{ this.errors.title }}</div>
            </div>
            <div class="form-group">
                <label>URL</label>
                <input type="text" name="url" class="form-control" :class="this.errors.url ? 'is-invalid' : ''" v-model="this.data.url">
                <div class="invalid-feedback"> {{ this.errors.url }}</div>
            </div>
            <div class="form-group">
                <label>Logo <code>Max 512px x 512px</code></label>
                <input type="file" name="logo" class="form-control" :class="this.errors.logo ? 'is-invalid' : ''" @change="submitFile">
                <div class="invalid-feedback"> {{ this.errors.logo }}</div>
            </div>
            <div class="d-flex justify-content-between">
                <router-link to="/admin-halaman-terkait" class="btn bg-gradient-secondary mb-0">
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
            this.data.logo = event.target.files[0];
        },
        submit() {
            if (this.$route.params.id) {
                this.axios.post('related_link/' + this.$route.params.id, this.data, { headers: { 'Content-Type': 'multipart/form-data' } }).then((response) => {
                    if (!response.data.error) {
                        this.$router.push({ name: 'admin.halaman-terkait' });
                    } else {
                        this.errors = response.data.message;
                    }
                });
            } else {
                this.axios.post('related_link/', this.data, { headers: { 'Content-Type': 'multipart/form-data' } }).then((response) => {
                    if (!response.data.error) {
                        this.$router.push({ name: 'admin.halaman-terkait' });
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
                    _method: 'put'
                }
            });
        }
    }
}
</script>