<template>
    <div class="card card-body shadow">
        <form method="post" @submit.prevent="submit()">
            <ckeditor :editor="editor" v-model="this.data.sejarah_desa" :config="editorConfig"></ckeditor>
            <div class="d-flex justify-content-end mt-3">
                <button type="submit" class="btn bg-gradient-success mb-0">Simpan</button>
            </div>
        </form>
    </div>
</template>

<script>
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
export default {
    name: 'Dashboard',
    data() {
        return {
            data: {
                sejarah_desa: ''
            },
            roles: {},
            errors: {},
            editor: ClassicEditor,
            editorConfig: {
                toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', 'outdent', 'indent', '|', 'blockQuote', 'undo', 'redo'],
            }
        }
    },
    methods: {
        submit() {
            this.axios.post('sejarah_desa', this.data).then((response) => {
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
        this.axios.get('sejarah_desa').then((response) => {
            if (response.data.data) {
                this.data.sejarah_desa = response.data.data.sejarah_desa;
            }
        });
    }
}
</script>