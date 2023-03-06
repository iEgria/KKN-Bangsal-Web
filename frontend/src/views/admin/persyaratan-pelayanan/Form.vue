<template>
    <div class="card card-body shadow">
        <form method="post" @submit.prevent="submit()">
            <div class="form-group">
                <label>Nama Pelayanan</label>
                <input type="text" name="nama" class="form-control" :class="this.errors.nama ? 'is-invalid' : ''" v-model="this.data.nama">
                <div class="invalid-feedback"> {{ this.errors.nama }}</div>
            </div>
            <div class="form-group">
                <label>Persyaratan Pelayanan</label>
                <ckeditor :editor="editor" v-model="this.data.syarat" :config="editorConfig"></ckeditor>
                <div class="invalid-feedback"> {{ this.errors.syarat }}</div>
            </div>
            <div class="d-flex justify-content-between">
                <router-link to="/admin-persyaratan-pelayanan" class="btn bg-gradient-secondary mb-0"> Kembali </router-link>
                <button type="submit" class="btn bg-gradient-success mb-0">Simpan</button>
            </div>
        </form>
    </div>
</template>

<script>
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
export default {
    url: 'Dashboard',
    data() {
        return {
            data: {},
            errors: {},
            editor: ClassicEditor,
            editorConfig: {
                toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', 'outdent', 'indent', '|', 'blockQuote', 'undo', 'redo'],
            }
        }
    },
    methods: {
        submitFile(event) {
            this.data.logo = event.target.files[0];
        },
        submit() {
            if (this.$route.params.id) {
                this.axios.put('pelayanan/' + this.$route.params.id, this.data).then((response) => {

                    if (!response.data.error) {
                        this.$router.push({ name: 'admin.persyaratan-pelayanan' });
                    } else {
                        this.errors = response.data.message;
                    }
                });
            } else {
                this.axios.post('pelayanan', this.data, { headers: { 'Content-Type': 'multipart/form-data' } }).then((response) => {
                    if (!response.data.error) {
                        this.$router.push({ name: 'admin.persyaratan-pelayanan' });
                    } else {
                        this.errors = response.data.message;
                    }
                });
            }
        }
    },
    mounted() {
        if (this.$route.params.id) {
            this.axios.get('pelayanan/' + this.$route.params.id).then((response) => {
                this.data = response.data.data;
            });
        }
    }
}
</script>