<template>
    <section>
        <div class="page-header">
            <div class="container min-vh-100">
                <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto p-3">
                        <div class="card blur mt-8 shadow-lg">
                            <div class="card-header pb-0 text-left bg-transparent">
                                <h3 class="font-weight-bolder text-primary text-gradient">Masuk</h3>
                                <p class="mb-0 text-dark">Masukan nama pengguna &amp; kata sandi untuk melanjutkan.</p>
                            </div>
                            <div class="card-body">
                                <form @submit.prevent="login">
                                    <div class="mb-3">
                                        <input type="text" name="email" class="form-control" placeholder="Nama Pengguna" v-model="this.data.email">
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <div class="input-group mb-4">
                                                <input :type="isPasswordShow ? 'text' : 'password'" name="password" class="form-control" placeholder="Kata Sandi" v-model="this.data.password">
                                                <span class="input-group-text" @click="this.isPasswordShow = !this.isPasswordShow">
                                                    <font-awesome-icon :icon="isPasswordShow ? 'eye-slash' : 'eye'" fixed-width />
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn bg-gradient-primary w-100 mb-0">Masuk</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: 'Login',
    data() {
        return {
            data: {},
            isPasswordShow: false,
            baseUrl: process.env.VUE_APP_URL
        };
    },
    methods: {
        login() {
            this.axios.post('auth/login', this.data).then((response) => {
                console.log(response);
            });
        }
    },
    mounted() {
        document.body.classList.add('bg-gradient-primary');
    },
    unmounted() {
        document.body.classList.remove('bg-gradient-primary');
    },
}
</script>