<template>
    <div class="container my-5">
        <h4 class="text-center text-gradient text-primary py-3">Data RT RW</h4>
        <div class="card card-body">
            <table class="table">
                <thead>
                    <tr>
                        <td class="w-10">RW</td>
                        <td class="w-10">RT</td>
                        <td>Nama</td>
                    </tr>
                </thead>
                <tbody>
                    <template v-for="rw in this.formData" v-bind:key="rw">
                        <tr>
                            <td>{{ rw.rw_number.toString().padStart(2, "0") }}</td>
                            <td></td>
                            <td>{{ rw.nama }}</td>
                        </tr>
                        <template v-for="rt in rw.rt" v-bind:key="rt">
                            <tr>
                                <td></td>
                                <td>{{ rt.rt_number.toString().padStart(2, "0") }}</td>
                                <td>{{ rt.nama }}</td>
                            </tr>
                        </template>
                    </template>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
export default {
    name: "RT RW",
    data() {
        return {
            formData: {}
        }
    },
    mounted() {
        this.axios.get('rt_rw').then((response) => {
            this.formData = response.data.data;
        })
    },
}
</script>