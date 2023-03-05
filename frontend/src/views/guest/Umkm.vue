<template>
    <div class="container my-5">
        <h4 class="text-center text-gradient text-primary py-3">Data UMKM</h4>
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="card card-body shadow">
                    <div class="card card-body shadow" style="background-image: url(http://127.0.0.1:8000/storage/header-1.jpg); background-size: cover; height: 200px;"></div>
                    <table>
                        <tr>
                            <td class="text-nowrap w-1">Nama UMKM</td>
                            <td class="w-1 px-2">:</td>
                            <td class="text-wrap"></td>
                        </tr>
                        <tr>
                            <td class="text-nowrap w-1">Nama Pemilik</td>
                            <td class="w-1 px-2">:</td>
                            <td class="text-wrap"></td>
                        </tr>
                        <tr>
                            <td class="text-nowrap w-1">Kontak</td>
                            <td class="w-1 px-2">:</td>
                            <td class="text-wrap"></td>
                        </tr>
                        <tr>
                            <td class="text-nowrap w-1">Alamat</td>
                            <td class="w-1 px-2">:</td>
                            <td class="text-wrap"></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "UMKM",
}
</script>