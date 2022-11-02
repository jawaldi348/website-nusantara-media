<?= $this->extend('layouts/index') ?>
<?= $this->section('tagmeta') ?>
<meta name="description" content="Redaksi">
<meta name="keywords" content="Redaksi">
<meta name="news_keywords" content="Redaksi">
<meta name="author" content="">

<meta name="language" content="id">
<meta name="geo.country" content="id">
<meta http-equiv="content-language" content="In-Id">
<meta name="geo.placename" content="Indonesia">
<meta name="theme-color" content="#5da5e0">
<!-- s: fb meta -->
<meta property="fb:app_id" content="">
<meta property="fb:pages" content="">
<meta property="og:title" content="Redaksi">
<meta property="og:description" content="Redaksi">
<meta property="og:type" content="article">
<meta property="og:url" content="<?= site_url('sitemap') ?>">
<meta property="og:image" content="<?= $config['logo'] ?>">
<meta property="og:image:type" content="image/jpeg">
<meta property="og:image:width" content="457">
<meta property="og:image:height" content="100">
<meta property="og:site_name" content="<?= $config['domainname'] ?>">
<!-- e: fb meta -->
<!-- S:tweeter card -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="<?= $config['domainname'] ?>">
<meta name="twitter:title" content="Redaksi">
<meta name="twitter:description" content="Redaksi">
<meta name="twitter:image" content="<?= $config['logo'] ?>">
<meta name="twitter:image:src" content="<?= $config['logo'] ?>">
<!-- E:tweeter card -->
<meta name="content_PublishedDate" content="">
<meta name="content_Category" content="Redaksi">
<meta name="content_Author" content="">
<meta name="content_Editor" content="">
<meta name="content_Tag" content="Redaksi">
<?= $this->endSection(); ?>
<?= $this->section('content') ?>
<!-- Breadcrumb Start -->
<div class="container">
    <ul class="breadcrumb bg-transparent m-0 p-0">
        <li class="breadcrumb-item">
            <a href="<?= site_url() ?>" class="content_center">Home</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="<?= site_url('sitemap') ?>" class="content_center">Redaksi</a>
        </li>
    </ul>
</div>
<!-- Breadcrumb End -->
<!-- Redaksi Start -->
<div class="container-fluid py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h3 class="py-2 section-title">
                    <span>Redaksi</span>
                </h3>
                <div class="style-list left">
                    <h5>Penasehat Hukum</h5>
                    <ul>
                        <li><i class="fa fa-user"></i> Dr. Suharizal, S.H., M.H., CMED., CLA</li>
                    </ul>
                    <h5>Pemimpin Redaksi</h5>
                    <ul>
                        <li><i class="fa fa-user"></i> Darlinsah, SH</li>
                    </ul>
                    <h5>Pemimpin Perusahaan</h5>
                    <ul>
                        <li><i class="fa fa-user"></i> Ahmad Husein</li>
                    </ul>
                    <h5>Redaktur</h5>
                    <ul>
                        <li><i class="fa fa-user"></i> Icuk RZ</li>
                    </ul>
                    <h5>Reporter</h5>
                    <ul>
                        <li><i class="fa fa-user"></i> Nuzul Ramadana</li>
                        <li><i class="fa fa-user"></i> Zulkifli</li>
                        <li><i class="fa fa-user"></i> Hendra Jetri</li>
                    </ul>
                    <h5>Tim Liputan</h5>
                    <ul>
                        <li><i class="fa fa-user"></i> Darlinsah</li>
                        <li><i class="fa fa-user"></i> Icuk RZ</li>
                        <li><i class="fa fa-user"></i> Ahmad Husein</li>
                        <li><i class="fa fa-user"></i> Nuzul Ramadana Zulkifli</li>
                        <li><i class="fa fa-user"></i> Hendra Jetri</li>
                        <li><i class="fa fa-user"></i> Lisa Oktafiyani</li>
                        <li><i class="fa fa-user"></i> Alfa Rezi</li>
                        <li><i class="fa fa-user"></i> Arman</li>
                    </ul>
                    <h5>IT Redaksi</h5>
                    <ul>
                        <li><i class="fa fa-user"></i> Berlian Novallino</li>
                        <li><i class="fa fa-user"></i> Jawaldi</li>
                    </ul>
                    <h5>Sekretaris Redaksi & Kantor</h5>
                    <ul>
                        <li><i class="fa fa-user"></i> Lisa Oktafiyani</li>
                    </ul>
                </div>
            </div>
            <!-- Sidebar Start -->
            <?= $this->include('layouts/sidebar') ?>
            <!-- Sidebar End -->
        </div>
    </div>
</div>
<!-- Redaksi Start -->
<?= $this->endSection(); ?>