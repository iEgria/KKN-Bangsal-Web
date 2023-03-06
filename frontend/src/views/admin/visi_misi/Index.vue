<template>
    <div class="card card-body shadow">
        <form method="post" @submit.prevent="submit()">
            <ckeditor :editor="editor" v-model="this.data.visi_misi" :config="editorConfig"></ckeditor>
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
                visi_misi: ''
            },
            roles: {},
            errors: {},
            editor: ClassicEditor,
            editorConfig: {
                alignment: {
                    options: ['left', 'right']
                },
                toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', 'alignment', '|', 'outdent', 'indent', '|', 'blockQuote', 'undo', 'redo'],
            }
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