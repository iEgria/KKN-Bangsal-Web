<template>
    <div class="card card-body shadow">
        <form method="post" @submit.prevent="submit()">
            <div class="form-group">
                <label>Cover | <code>Max 2MB</code></label>
                <input type="file" name="cover" class="form-control" :class="this.errors.cover ? 'is-invalid' : ''" @change="submitFile">
                <div class="invalid-feedback"> {{ this.errors.cover }}</div>
            </div>
            <div class="form-group">
                <label>Judul</label>
                <input type="text" name="title" class="form-control" :class="this.errors.title ? 'is-invalid' : ''" v-model="this.data.title">
                <div class="invalid-feedback"> {{ this.errors.title }}</div>
            </div>
            <div class="form-group">
                <label>Beritas</label>
                <ckeditor :editor="editor" v-model="this.data.content" :config="editorConfig"></ckeditor>
                <div class="invalid-feedback"> {{ this.errors.content }}</div>
            </div>
            <div class="form-group">
                <label>Tanggal Terbit</label>
                <input type="date" name="published_at" class="form-control" :class="this.errors.published_at ? 'is-invalid' : ''" v-model="this.data.published_at">
                <div class="invalid-feedback"> {{ this.errors.published_at }}</div>
            </div>
            <div class="d-flex justify-content-between">
                <router-link to="/admin-berita" class="btn bg-gradient-secondary mb-0">
                    Kembali
                </router-link>
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
            data: {
                published_at: new Date().getFullYear() + '-' + ("0" + new Date().getMonth()).slice(-2) + '-' + ("0" + new Date().getDate()).slice(-2)
            },
            errors: {},
            editor: ClassicEditor,
            editorConfig: {
                toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', 'outdent', 'indent', '|', 'blockQuote', 'undo', 'redo'],
            }
        }
    },
    methods: {
        submitFile(event) {
            this.data.cover = event.target.files[0];
        },
        submit() {
            if (this.$route.params.id) {
                this.axios.put('berita/' + this.$route.params.id, this.data).then((response) => {

                    if (!response.data.error) {
                        this.$router.push({ name: 'admin.berita' });
                    } else {
                        this.errors = response.data.message;
                    }
                });
            } else {
                this.axios.post('berita', this.data, { headers: { 'Content-Type': 'multipart/form-data' } }).then((response) => {
                    if (!response.data.error) {
                        this.$router.push({ name: 'admin.berita' });
                    } else {
                        this.errors = response.data.message;
                    }
                });
            }
        }
    },
    mounted() {
        if (this.$route.params.id) {
            this.axios.get('berita/' + this.$route.params.id + '/edit').then((response) => {
                this.data = {
                    title: response.data.data.title,
                    content: response.data.data.content,
                    published_at: response.data.data.published_at,
                }
            });
        }
    }
}
</script>