<?= $this->extend('layouts/index') ?>
<?= $this->section('tagmeta') ?>
<meta name="description" content="Kontak Kami">
<meta name="keywords" content="Kontak Kami">
<meta name="news_keywords" content="Kontak Kami">
<meta name="author" content="">

<meta name="language" content="id">
<meta name="geo.country" content="id">
<meta http-equiv="content-language" content="In-Id">
<meta name="geo.placename" content="Indonesia">
<meta name="theme-color" content="#5da5e0">
<!-- s: fb meta -->
<meta property="fb:app_id" content="">
<meta property="fb:pages" content="">
<meta property="og:title" content="Kontak Kami">
<meta property="og:description" content="Kontak Kami">
<meta property="og:type" content="article">
<meta property="og:url" content="<?= site_url('contact') ?>">
<meta property="og:image" content="<?= $config['logo'] ?>">
<meta property="og:image:type" content="image/jpeg">
<meta property="og:image:width" content="457">
<meta property="og:image:height" content="100">
<meta property="og:site_name" content="<?= $config['domainname'] ?>">
<!-- e: fb meta -->
<!-- S:tweeter card -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="<?= $config['domainname'] ?>">
<meta name="twitter:title" content="Kontak Kami">
<meta name="twitter:description" content="Kontak Kami">
<meta name="twitter:image" content="<?= $config['logo'] ?>">
<meta name="twitter:image:src" content="<?= $config['logo'] ?>">
<!-- E:tweeter card -->
<meta name="content_PublishedDate" content="">
<meta name="content_Category" content="Kontak Kami">
<meta name="content_Author" content="">
<meta name="content_Editor" content="">
<meta name="content_Tag" content="Kontak Kami">
<?= $this->endSection(); ?>
<?= $this->section('content') ?>
<style>
    h3 {
        color: #fff !important;
    }

    h6,
    p {
        color: #dee2e6 !important;
    }

    .infopage-content a {
        color: #dee2e6 !important;
    }

    .infopage-content a:hover {
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
            <a href="<?= site_url('contact') ?>" class="content_center">Kontak</a>
        </li>
    </ul>
</div>
<!-- Breadcrumb End -->
<!-- Contact Start -->
<div class="container-fluid py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h3 class="py-2 mb-3 section-title">
                    <span>Kontak Kami</span>
                </h3>
                <div class="infopage-content mb-3">
                    <h3 class="font-weight-bold">PT. Equator Nusantara Media </h3>
                    <div class="d-flex mb-3">
                        <i class="fa fa-2x fa-map-marker-alt text-primary mr-3"></i>
                        <div class="d-flex flex-column">
                            <h6 class="font-weight-bold">Alamat</h6>
                            <p class="m-0">Jl. Adam Malik Jarau Buntak No. 105<br>
                                Kec. Lubuk Sikaping<br>
                                Kab. Pasaman, Prov. Sumatera Barat</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <i class="fa fa-2x fa-envelope-open text-primary mr-3"></i>
                        <div class="d-flex flex-column">
                            <h6 class="font-weight-bold">Email</h6>
                            <p class="m-0">
                                <a href="mailto:redaksi@viva.co.id" target="_blank">equatornusantaramedia@gmail.com</a>
                            </p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-2x fa-phone-alt text-primary mr-3"></i>
                        <div class="d-flex flex-column">
                            <h6 class="font-weight-bold">Telepon</h6>
                            <p class="m-0">
                                <a href="tel:62821-6945-4080" target="_blank">+62821-6945-4080</a>
                            </p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="fas fa-2x fa-building text-primary mr-3"></i>
                        <div class="d-flex flex-column">
                            <h6 class="font-weight-bold">Bank Nagari : 08000103008601</h6>
                            <p class="m-0">A/N : EQUATOR NUSANTARA MEDIA PT</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sidebar Start -->
            <?= $this->include('layouts/sidebar') ?>
            <!-- Sidebar End -->
        </div>
    </div>
</div>
<!-- Contact End -->
<?= $this->endSection(); ?>