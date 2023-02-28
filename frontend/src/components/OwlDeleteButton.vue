<template>
    <button type="button" class="btn bg-gradient-danger" :class="this.class" @click="deleteConfirm">
        <slot />
    </button>
</template>

<script>
export default {
    name: "OwlDeleteButton",
    props: {
        url: String,
        class: String,
        redirectUrl: String
    },
    methods: {
        deleteConfirm() {
            let self = this;
            this.$swal.fire({
                icon: 'question',
                title: 'Hapus Data',
                text: "Data yang sudah dihapus tidak dapat dikembalikan",
                showCancelButton: true,
                cancelButtonText: 'Batal'
            }).then(function (result) {
                if (result.isConfirmed) {
                    self.axios.delete(self.url).then((response) => {
                        if (response.data.deleted) {
                            self.$router.push({ name: self.redirectUrl });
                            self.$router.go(0);
                        } else {
                            self.$swal.fire({
                                icon: 'error',
                                text: "Data Gagal Dihapus",
                            });
                        }
                    });
                }
            });
        }
    }
}
</script>