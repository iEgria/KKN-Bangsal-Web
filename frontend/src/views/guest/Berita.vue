<template>
    <div class="container my-5">
        <div class="row">
            <div class="col-12 col-md-8">
                <template v-if="!this.$route.params.id">
                    <div class="card card-profile overflow-hidden shadow mb-3" v-for="berita in this.beritas" v-bind:key="berita">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-12 pe-lg-0">
                                <a href="javascript:;">
                                    <div class="p-3 pe-md-0">
                                        <img class="w-100 border-radius-md" :src="berita.url_gambar" alt="image">
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-8 col-md-6 col-12 ps-lg-0 my-auto">
                                <div class="card-body">
                                    <router-link :to="{ name: 'guest.berita.show', params: { id: 'lihat-berita' } }" class="text-primary">
                                        <h5 class="mb-0">{{ berita.judul }}</h5>
                                    </router-link>
                                    <small class="text-dark">{{ berita.tanggal }}</small>
                                    <p class="mb-0">{{ berita.teks }}
                                        <router-link :to="{ name: 'guest.berita.show', params: { id: 'lihat-berita' } }" class="text-primary"> Baca Selengkapnya </router-link>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
                <template v-if="this.$route.params.id">
                    <div class="card card-body">
                        <h4>Inisiasi Pembentukan Forum Data sebagai penunjang Sistem Informasi Desa (SID)</h4>
                        <small class="text-dark mb-1">23 Februari 2023</small>
                        <img src="https://kertamulya-padalarang.desa.id/assets/files/data/website-desa-kertamulya-3217082001/indicatornews_3_800x533_L_141260.jpg" class="img-responsive">
                        <div>
                            <div class="col-md-12">
                                <p></p>
                                <p>Sistem Informasi Desa (SID) adalah sebuah platform teknologi informasi komunikasi untuk mendukung pengelolaan sumber daya komunitas di tingkat desa.&nbsp; Kebijakan dan Strategi pengelolaan Data desa adalah satu Sistem Data dan Informasi Desa, berupa data terintegrasi dari berbagi sumber data melalui perangkat daerah yang membidangi Pemberdayaan Masyarakat.</p>
                                <p>Tentang Forum Data, bahwa fungsi forum data untuk mensinergikan dan mendorong keterbukaan dan pemanfaatan data dan informasi desa serta kawasan perdesaan oleh multipihak.</p>
                                <p>&nbsp;</p>
                                <p>Untuk mempercepat dan memaksimalkan pengembangan SID,&nbsp; Perlu diggagas berdirinya forum data dan di kuatkan dengan regulasinya.&nbsp;Peserta forum data diantaranya DinsosP3AP2KB, Bappelitbangda (Bappeda-red), Diskominfo, BPS, Dinkes, dan Disdukcapil serta Serikat Tani Indonesia. Sedangkan stakeholedrs yang&nbsp; bergabung diantaranya perwakilan perguruan tinggi.</p>
                                <p>Fungsi Forum Data SID&nbsp;diantaranya terbangunnya master data&nbsp;terpadu.&nbsp; “Nanti akan berbagi peran, misal data kemiskinan ada di Bappelitbangda, data kependudukan di Disdukcapil, sedangkan sekretariat Forum data ada di Dinas PMD,”&nbsp;</p>
                                <p>Secara regulasi, anggota Forum Data mendapat surat keputusan Bupati, kemudian memiliki tugas menyusun road map forum data, dan langkah selanjutnya adalah membangun kesepakatan bersama menyusud jadwal pelatihan SID di tingkat Kabupaten dan desa desa.</p>
                                <p>&nbsp;</p>
                                <p>Pemerintah Daerah dan Kabupaten Berkewajiban memfasilitasi proses pengembangan aplikasi kepada seluruh desa. Pengembangan SID meliputi :</p>
                                <ul>
                                    <li>Pengembangan Perangkat Keras yang mencakup komputer, server dan jaringan intranet dan jaringan internet.</li>
                                    <li>Pengembangan perangkat lunak yang mencakup sistem operasi, data base server, panduan penggunaan SID, Tampilan SID dan ruang lingkup SID.</li>
                                    <li>Pengembangan Sumber daya manusia yan mencakup administrator sistem di tingkat Daerah, Kabupaten, Kecamatan, desa dan tenaga pelatih.</li>
                                </ul>
                                <p>&nbsp;</p>
                                <p>&nbsp;</p>
                                <p></p>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
            <div class="col-12 col-md-4">
                <div class="input-group shadow mb-3">
                    <input type="text" class="form-control" placeholder="Pencarian">
                    <button class="btn bg-gradient-primary mb-0" type="button">Cari</button>
                </div>
                <div class="card">
                    <div class="card-header bg-gradient-primary">
                        <span class="text-white">Paling Banyak Dilihat</span>
                    </div>
                    <div class="card-body">
                        <div class="card card-body shadow mb-3">
                            <h5 class="mb-0">Lomba Memasak</h5>
                            <small class="text-dark">21 Feb 2023</small>
                        </div>
                        <div class="card card-body shadow mb-3">
                            <h5 class="mb-0">Lomba Memasak</h5>
                            <small class="text-dark">21 Feb 2023</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Berita",
    data() {
        return {
            beritas: [
                {
                    judul: 'Inisiasi Pembentukan Forum Data sebagai penunjang Sistem Informasi Desa (SID)',
                    tanggal: '21 Februari 2023',
                    url_gambar: 'https://kertamulya-padalarang.desa.id/assets/files/data/website-desa-kertamulya-3217082001/indicatornews_3_800x533_L_141260.jpg',
                    teks: 'Sistem Informasi Desa (SID) adalah sebuah platform teknologi informasi komunikasi untuk mendukung pengelolaan ...'
                },
                {
                    judul: 'Wujudkan Desa Berbasis IT',
                    tanggal: '15 Februari 2023',
                    url_gambar: 'https://kertamulya-padalarang.desa.id/assets/files/data/website-desa-kertamulya-3217082001/jasa_pembuatan_website_desa_1030.jpg',
                    teks: 'Perkembangan teknologi komunikasi dan informasi terutama internet saat ini membawa kemajuan yang sangat ...'
                },
                {
                    judul: 'Pembangunan Indonesia Harus Dimulai dari Desa',
                    tanggal: '05 Februari 2023',
                    url_gambar: 'https://kertamulya-padalarang.desa.id/assets/files/data/website-desa-kertamulya-3217082001/24391a1104f17cf51db1567b5cfe0e2f.jpg',
                    teks: 'Wakil Ketua Komite II DPD RI, Parlindungan Purba mengatakan pembangunan Indonesia harus dimulai dari desa...'
                },
                {
                    judul: 'Kuak Potensi Desa Demi Pembangunan di Indonesia',
                    tanggal: '01 Februari 2023',
                    url_gambar: 'https://kertamulya-padalarang.desa.id/assets/files/data/website-desa-kertamulya-3217082001/desa2.jpg',
                    teks: '“Negara Kepulauan” merupakan salah satu julukan yang dimiliki Indonesia. Ribuan pulau terbentang...',
                },
            ],
        }
    }
}
</script>