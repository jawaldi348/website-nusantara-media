<?= $this->extend('layouts/index') ?>
<?= $this->section('tagmeta') ?>
<meta name="description" content="Tentang Kami">
<meta name="keywords" content="Tentang Kami">
<meta name="news_keywords" content="Tentang Kami">
<meta name="author" content="">

<meta name="language" content="id">
<meta name="geo.country" content="id">
<meta http-equiv="content-language" content="In-Id">
<meta name="geo.placename" content="Indonesia">
<meta name="theme-color" content="#5da5e0">
<!-- s: fb meta -->
<meta property="fb:app_id" content="">
<meta property="fb:pages" content="">
<meta property="og:title" content="Tentang Kami">
<meta property="og:description" content="Tentang Kami">
<meta property="og:type" content="article">
<meta property="og:url" content="<?= site_url('about-us') ?>">
<meta property="og:image" content="<?= $config['logo'] ?>">
<meta property="og:image:type" content="image/jpeg">
<meta property="og:image:width" content="457">
<meta property="og:image:height" content="100">
<meta property="og:site_name" content="<?= $config['domainname'] ?>">
<!-- e: fb meta -->
<!-- S:tweeter card -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="<?= $config['domainname'] ?>">
<meta name="twitter:title" content="Tentang Kami">
<meta name="twitter:description" content="Tentang Kami">
<meta name="twitter:image" content="<?= $config['logo'] ?>">
<meta name="twitter:image:src" content="<?= $config['logo'] ?>">
<!-- E:tweeter card -->
<meta name="content_PublishedDate" content="">
<meta name="content_Category" content="Tentang Kami">
<meta name="content_Author" content="">
<meta name="content_Editor" content="">
<meta name="content_Tag" content="Tentang Kami">
<?= $this->endSection(); ?>
<?= $this->section('content') ?>
<style>
    p {
        color: #dee2e6 !important;
    }
</style>
<!-- Breadcrumb Start -->
<div class="container">
    <ul class="breadcrumb bg-transparent m-0 p-0">
        <li class="breadcrumb-item">
            <a href="<?= site_url() ?>" class="content_center">Home</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="<?= site_url('about-us') ?>" class="content_center">Tentang Kami</a>
        </li>
    </ul>
</div>
<!-- Breadcrumb End -->
<!-- About Start -->
<div class="container-fluid py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h3 class="py-2 section-title">
                    <span>Tentang Kami</span>
                </h3>
                <p>Perusahaan kami bernama PT Equator Nusantara Media (ENM) menerbitkan nusantaramedia.co.id. Berdomisili di Lubuk Sikaping, Kabupaten Pasaman. Perusahaaan kami fokus pada bidang pemberitaan portal online website dan podcast yang dimuat di nusantaramedia.co.id, youtube, facebook, tiktok, instagram, dan snack video.</p>
                <p><label class="font-weight-bold">Nusantaramedia.co.id</label> hadir di era digital dengan menyajikan berita-berita sesuai kode etik jurnalistik. Dengan tagline Aktual, Inovatif, Transparan dan Terpercaya menjangkau seluruh daerah Indonesia.</p>
                <p>Kami berdiri sejak tahun 2022 yang sumber daya manusianya diisi oleh berbagai kalangan wartawan yang sudah berpengalaman baik yang berasal dari media cetak dan elektronik.</p>
                <p>Hadir di tengah-tengah gempuran media sosial. Dengan kehadiran media yang diakui publik diharapkan mampu memberikan pencerahan bagi pemerintah dan masyarakat ditengah-tengah gempuran hoax.</p>
                <p>Selain berita-berita aktual. Kami juga menyajikan berita-berita investigatif dalam rangka membuka informasi seluas-luasnya kepada masyarakat, tentunya dengan pemberitaan berimbang.</p>
                <h3 class="py-2 section-title">
                    <span>Visi</span>
                </h3>
                <p>Menjadi perusahaan media yang dipercaya publik.</p>
                <h3 class="py-2 section-title">
                    <span>Misi</span>
                </h3>
                <p>Menyampaikan informasi secara Aktual, Inovatif, Transparan, dan Terpercaya. Membantu dalam mencerdaskan kehidupan bangsa dengan menjangkau seluruh daerah Indoneaia.
                </p>
            </div>
            <!-- Sidebar Start -->
            <?= $this->include('layouts/sidebar') ?>
            <!-- Sidebar End -->
        </div>
    </div>
</div>
<!-- About End -->
<?= $this->endSection(); ?>