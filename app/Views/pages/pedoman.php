<?= $this->extend('layouts/index') ?>
<?= $this->section('tagmeta') ?>
<meta name="description" content="Pedoman Media Siber">
<meta name="keywords" content="Pedoman Media Siber">
<meta name="news_keywords" content="Pedoman Media Siber">
<meta name="author" content="">

<meta name="language" content="id">
<meta name="geo.country" content="id">
<meta http-equiv="content-language" content="In-Id">
<meta name="geo.placename" content="Indonesia">
<meta name="theme-color" content="#5da5e0">
<!-- s: fb meta -->
<meta property="fb:app_id" content="">
<meta property="fb:pages" content="">
<meta property="og:title" content="Pedoman Media Siber">
<meta property="og:description" content="Pedoman Media Siber">
<meta property="og:type" content="article">
<meta property="og:url" content="<?= site_url('pedoman-media-siber') ?>">
<meta property="og:image" content="<?= $config['logo'] ?>">
<meta property="og:image:type" content="image/jpeg">
<meta property="og:image:width" content="457">
<meta property="og:image:height" content="100">
<meta property="og:site_name" content="<?= $config['domainname'] ?>">
<!-- e: fb meta -->
<!-- S:tweeter card -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="<?= $config['domainname'] ?>">
<meta name="twitter:title" content="Pedoman Media Siber">
<meta name="twitter:description" content="Pedoman Media Siber">
<meta name="twitter:image" content="<?= $config['logo'] ?>">
<meta name="twitter:image:src" content="<?= $config['logo'] ?>">
<!-- E:tweeter card -->
<meta name="content_PublishedDate" content="">
<meta name="content_Category" content="Pedoman Media Siber">
<meta name="content_Author" content="">
<meta name="content_Editor" content="">
<meta name="content_Tag" content="Pedoman Media Siber">
<?= $this->endSection(); ?>
<?= $this->section('content') ?>
<style>
    /* p,
    strong {
        color: #dee2e6 !important;
    } */

    .content-article {
        line-height: 24px;
        letter-spacing: .5px;
        color: #dee2e6 !important;
    }

    ol {
        margin: 0;
        padding: 0;
        border: 0;
        font: inherit;
        vertical-align: baseline;
    }

    ol,
    ul {
        /* list-style: none; */
        margin: 0 0 20px 0;
    }

    li>ol,
    li>ul {
        margin: 0 0 0 20px;
    }

    .content-article ol {
        margin-left: 33px;
        /* list-style-type: decimal; */
        padding-top: 10px;
    }

    .content-article a {
        color: #dee2e6 !important;
    }

    .content-article a:hover {
        color: #5da5e0 !important;
        text-decoration: none;
    }
</style>
<!-- Breadcrumb Start -->
<div class="container">
    <ul class="breadcrumb bg-transparent m-0 p-0">
        <li class="breadcrumb-item">
            <a href="<?= site_url() ?>" class="content_center">Home</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="<?= site_url('pedoman-media-siber') ?>" class="content_center">Pedoman Media Siber</a>
        </li>
    </ul>
</div>
<!-- Breadcrumb End -->
<!-- Pedoman Media Siber Start -->
<div class="container-fluid py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h3 class="py-2 section-title">
                    <span>Pedoman Media Siber</span>
                </h3>
                <div class="content-article">
                    <p>Kemerdekaan berpendapat, kemerdekaan berekspresi, dan kemerdekaan pers adalah hak asasi manusia yang dilindungi Pancasila, Undang-Undang Dasar 1945, dan Deklarasi Universal Hak Asasi Manusia PBB. Keberadaan media siber di Indonesia juga merupakan bagian dari kemerdekaan berpendapat, kemerdekaan berekspresi, dan kemerdekaan pers.</p>
                    <p>Media siber memiliki karakter khusus sehingga memerlukan pedoman agar pengelolaannya dapat dilaksanakan secara profesional, memenuhi fungsi, hak, dan kewajibannya sesuai Undang-Undang Nomor 40 Tahun 1999 tentang Pers dan Kode Etik Jurnalistik. Untuk itu Dewan Pers bersama organisasi pers, pengelola media siber, dan masyarakat menyusun Pedoman Pemberitaan Media Siber sebagai berikut:</p>
                    <strong>1. Ruang Lingkup</strong>
                    <ol type="a">
                        <li>Media Siber adalah segala bentuk media yang menggunakan wahana internet dan melaksanakan kegiatan jurnalistik, serta memenuhi persyaratan Undang-Undang Pers dan Standar Perusahaan Pers yang ditetapkan Dewan Pers.</li>
                        <li>Isi Buatan Pengguna (User Generated Content) adalah segala isi yang dibuat dan atau dipublikasikan oleh pengguna media siber, antara lain, artikel, gambar, komentar, suara, video dan berbagai bentuk unggahan yang melekat pada media siber, seperti blog, forum, komentar pembaca atau pemirsa, dan bentuk lain.</li>
                    </ol>
                    <strong>2. Verifikasi dan keberimbangan berita</strong>
                    <ol type="a">
                        <li>Pada prinsipnya setiap berita harus melalui verifikasi.</li>
                        <li>Berita yang dapat merugikan pihak lain memerlukan verifikasi pada berita yang sama untuk memenuhi prinsip akurasi dan keberimbangan</li>
                        <li>Ketentuan dalam butir (a) di atas dikecualikan, dengan syarat:
                            <ol>
                                <li>Berita benar-benar mengandung kepentingan publik yang bersifat mendesak;</li>
                                <li>Sumber berita yang pertama adalah sumber yang jelas disebutkan identitasnya, kredibel dan kompeten;</li>
                                <li>Subyek berita yang harus dikonfirmasi tidak diketahui keberadaannya dan atau tidak dapat diwawancarai;</li>
                                <li>Media memberikan penjelasan kepada pembaca bahwa berita tersebut masih memerlukan verifikasi lebih lanjut yang diupayakan dalam waktu secepatnya. Penjelasan dimuat pada bagian akhir dari berita yang sama, di dalam kurung dan menggunakan huruf miring;</li>
                            </ol>
                        </li>
                        <li>Setelah memuat berita sesuai dengan butir (c), media wajib meneruskan upaya verifikasi, dan setelah verifikasi didapatkan, hasil verifikasi dicantumkan pada berita pemutakhiran (update) dengan tautan pada berita yang belum terverifikasi.</li>
                    </ol>
                    <strong>3. Isi Buatan Pengguna (User Generated Content)</strong>
                    <ol type="a">
                        <li>Media siber wajib mencantumkan syarat dan ketentuan mengenai Isi Buatan Pengguna yang tidak bertentangan dengan Undang-Undang No. 40 tahun 1999 tentang Pers dan Kode Etik Jurnalistik, yang ditempatkan secara terang dan jelas.</li>
                        <li>Media siber mewajibkan setiap pengguna untuk melakukan registrasi keanggotaan dan melakukan proses log-in terlebih dahulu untuk dapat mempublikasikan semua bentuk Isi Buatan Pengguna. Ketentuan mengenai log-in akan diatur lebih lanjut.</li>
                        <li>Dalam registrasi tersebut, media siber mewajibkan pengguna memberi persetujuan tertulis bahwa Isi Buatan Pengguna yang dipublikasikan:
                            <ol>
                                <li>Tidak memuat isi bohong, fitnah, sadis dan cabul;</li>
                                <li>Tidak memuat isi yang mengandung prasangka dan kebencian terkait dengan suku, agama, ras, dan antargolongan (SARA), serta menganjurkan tindakan kekerasan;</li>
                                <li>Tidak memuat isi diskriminatif atas dasar perbedaan jenis kelamin dan bahasa, serta tidak merendahkan martabat orang lemah, miskin, sakit, cacat jiwa, atau cacat jasmani.</li>
                            </ol>
                        </li>
                        <li>Media siber memiliki kewenangan mutlak untuk mengedit atau menghapus Isi Buatan Pengguna yang bertentangan dengan butir (c).</li>
                        <li>Media siber wajib menyediakan mekanisme pengaduan Isi Buatan Pengguna yang dinilai melanggar ketentuan pada butir (c). Mekanisme tersebut harus disediakan di tempat yang dengan mudah dapat diakses pengguna.</li>
                        <li>Media siber wajib menyunting, menghapus, dan melakukan tindakan koreksi setiap Isi Buatan Pengguna yang dilaporkan dan melanggar ketentuan butir (c), sesegera mungkin secara proporsional selambat-lambatnya 2 x 24 jam setelah pengaduan diterima.</li>
                        <li>Media siber yang telah memenuhi ketentuan pada butir (a), (b), (c), dan (f) tidak dibebani tanggung jawab atas masalah yang ditimbulkan akibat pemuatan isi yang melanggar ketentuan pada butir (c).</li>
                        <li>Media siber bertanggung jawab atas Isi Buatan Pengguna yang dilaporkan bila tidak mengambil tindakan koreksi setelah batas waktu sebagaimana tersebut pada butir (f).</li>
                    </ol>
                    <strong>4. Ralat, Koreksi, dan Hak Jawab</strong>
                    <ol type="a">
                        <li>Ralat, koreksi, dan hak jawab mengacu pada Undang-Undang Pers, Kode Etik Jurnalistik, dan Pedoman Hak Jawab yang ditetapkan Dewan Pers.</li>
                        <li>Ralat, koreksi dan atau hak jawab wajib ditautkan pada berita yang diralat, dikoreksi atau yang diberi hak jawab</li>
                        <li>Di setiap berita ralat, koreksi, dan hak jawab wajib dicantumkan waktu pemuatan ralat, koreksi, dan atau hak jawab tersebut</li>
                        <li>Bila suatu berita media siber tertentu disebarluaskan media siber lain, maka:
                            <ol>
                                <li>Tanggung jawab media siber pembuat berita terbatas pada berita yang dipublikasikan di media siber tersebut atau media siber yang berada di bawah otoritas teknisnya;</li>
                                <li>Koreksi berita yang dilakukan oleh sebuah media siber, juga harus dilakukan oleh media siber lain yang mengutip berita dari media siber yang dikoreksi itu;</li>
                                <li>Media yang menyebarluaskan berita dari sebuah media siber dan tidak melakukan koreksi atas berita sesuai yang dilakukan oleh media siber pemilik dan atau pembuat berita tersebut, bertanggung jawab penuh atas semua akibat hukum dari berita yang tidak dikoreksinya itu.</li>
                            </ol>
                        </li>
                        <li>Sesuai dengan Undang-Undang Pers, media siber yang tidak melayani hak jawab dapat dijatuhi sanksi hukum pidana denda paling banyak Rp500.000.000 (Lima ratus juta rupiah).</li>
                    </ol>
                    <strong>5. Pencabutan Berita</strong>
                    <ol type="a">
                        <li>Berita yang sudah dipublikasikan tidak dapat dicabut karena alasan penyensoran dari pihak luar redaksi, kecuali terkait masalah SARA, kesusilaan, masa depan anak, pengalaman traumatik korban atau berdasarkan pertimbangan khusus lain yang ditetapkan Dewan Pers.</li>
                        <li>Media siber lain wajib mengikuti pencabutan kutipan berita dari media asal yang telah dicabut.</li>
                        <li>Pencabutan berita wajib disertai dengan alasan pencabutan dan diumumkan kepada publik.</li>
                    </ol>
                    <strong>6. Iklan</strong>
                    <ol type="a">
                        <li>Media siber wajib membedakan dengan tegas antara produk berita dan iklan.</li>
                        <li>Setiap berita/artikel/isi yang merupakan iklan dan atau isi berbayar wajib mencantumkan keterangan ”advertorial”, ”iklan”, ”ads”, ”sponsored”, atau kata lain yang menjelaskan bahwa berita/artikel/isi tersebut adalah iklan.</li>
                    </ol>
                    <strong>7. Hak Cipta</strong>
                    <br>Media siber wajib menghormati hak cipta sebagaimana diatur dalam peraturan perundang-undangan yang berlaku<br><br>
                    <strong>8. Pencantuman Pedoman</strong>
                    <br>Media siber wajib mencantumkan Pedoman Pemberitaan Media Siber ini di medianya secara terang dan jelas<br><br>
                    <strong>9. Sengketa</strong>
                    <br>Penilaian akhir atas sengketa mengenai pelaksanaan Pedoman Pemberitaan Media Siber ini diselesaikan oleh Dewan Pers<br><br>
                    Jakarta, 3 Februari 2012<br>
                    <em>(Pedoman ini ditandatangani oleh Dewan Pers dan komunitas pers di Jakarta, <br>3 Februari 2012).</em>
                    <br><br>Sumber: <a href="https://dewanpers.or.id/" target="_blank">https://dewanpers.or.id/</a>
                </div>
            </div>
            <!-- Sidebar Start -->
            <?= $this->include('layouts/sidebar') ?>
            <!-- Sidebar End -->
        </div>
    </div>
</div>
<!-- Pedoman Media Siber End -->
<?= $this->endSection(); ?>