<template>
    <div class="container my-5">
        <h4 class="text-center text-gradient text-primary py-3 fw-bold">{{ this.pelayanans[this.$route.params.id].text }}</h4>
        <div class="card card-body">
            <ul>
                <li v-for="pelayanan in this.pelayanans[this.$route.params.id].syarat" v-bind:key="pelayanan">{{ pelayanan }}</li>
            </ul>
            <div class="fw-bold" v-if="this.pelayanans[this.$route.params.id].nb">Catatan : {{ this.pelayanans[this.$route.params.id].nb }}</div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Pelayanan",
    data() {
        return {
            pelayanans: {
                'kk-hilang': {
                    text: 'KK Hilang',
                    syarat: [
                        'Surat Pengantar RT - RW',
                        'Surat Kehilangan (Kepolisian / Kelurahan)',
                        'Fc.KK / Fc.KTP',
                        'Surat Pernyataan(Format di Kantor Kelurahan)',
                    ],
                    nb: 'Fotocopy Rangkap 2 Lembar'
                },
                'kk-perubahan': {
                    text: 'KK Perubahan',
                    syarat: [
                        'Surat Pengantar RT - RW',
                        'KK ASLI & Fotocopy',
                        'Fc.KTP',
                        'Fc.Surat Nikah / Cerai',
                        'Fc.Akta Kelahiran Anak',
                        'Fc.Akta Kematian',
                        'Fc.ljazah Terakhir (Bila ada Perubahan)',
                    ],
                    nb: 'Fotocopy Rangkap 2 Lembar'
                },
                'ktp-hilang': {
                    text: 'KTP Hilang',
                    syarat: [
                        "Surat Pengantar RT - RW",
                        "Surat Kehilangan (Kepolisian / Kelurahan)",
                        "Fc.KK / Fc.KTP",
                        "Surat Pernyataan(Format di Kantor Kelurahan)"
                    ],
                    nb: ''
                },
                'ktp-baru': {
                    text: 'KTP Baru',
                    syarat: [],
                    nb: ''
                },
                'surat-keterangan-tidak-mampu': {
                    text: 'Surat Keterangan Tidak Mampu',
                    syarat: [],
                    nb: ''
                },
                'surat-keterangan-usaha': {
                    text: 'Surat Keterangan Usaha',
                    syarat: [],
                    nb: ''
                },
                'surat-domisili-perusahaan': {
                    text: 'Surat Domisili Perusahaan',
                    syarat: [],
                    nb: ''
                },
                'surat-domisili-perorangan': {
                    text: 'Surat Domisili Perorangan',
                    syarat: [],
                    nb: ''
                },
                'surat-boro-berpergian': {
                    text: 'Surat Boro / Berpergian',
                    syarat: [],
                    nb: ''
                },
                'skck': {
                    text: 'SKCK',
                    syarat: [],
                    nb: ''
                },
                'akta-kelahiran': {
                    text: 'Akta Kelahiran',
                    syarat: [],
                    nb: ''
                },
                'akta-kematian': {
                    text: 'Akta Kematian',
                    syarat: [],
                    nb: ''
                },
                'pindah-masuk': {
                    text: 'Pindah Masuk',
                    syarat: [],
                    nb: ''
                },
                'pindah-keluar': {
                    text: 'Pindah Keluar',
                    syarat: [],
                    nb: ''
                },
                'santunan-kematian': {
                    text: 'Santunan Kematian',
                    syarat: [],
                    nb: ''
                },
                'pengajuan-bansos-dtks': {
                    text: 'Pengajuan Bansos & DTKS',
                    syarat: [],
                    nb: ''
                },
            }
        };
    }
};
</script>