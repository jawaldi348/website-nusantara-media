<?= $this->extend('layouts/index') ?>
<?= $this->section('tagmeta') ?>
<meta name="description" content="Site Map">
<meta name="keywords" content="Site Map">
<meta name="news_keywords" content="Site Map">
<meta name="author" content="">

<meta name="language" content="id">
<meta name="geo.country" content="id">
<meta http-equiv="content-language" content="In-Id">
<meta name="geo.placename" content="Indonesia">
<meta name="theme-color" content="#5da5e0">
<!-- s: fb meta -->
<meta property="fb:app_id" content="">
<meta property="fb:pages" content="">
<meta property="og:title" content="Site Map">
<meta property="og:description" content="Site Map">
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
<meta name="twitter:title" content="Site Map">
<meta name="twitter:description" content="Site Map">
<meta name="twitter:image" content="<?= $config['logo'] ?>">
<meta name="twitter:image:src" content="<?= $config['logo'] ?>">
<!-- E:tweeter card -->
<meta name="content_PublishedDate" content="">
<meta name="content_Category" content="Site Map">
<meta name="content_Author" content="">
<meta name="content_Editor" content="">
<meta name="content_Tag" content="Site Map">
<?= $this->endSection(); ?>
<?= $this->section('content') ?>
<!-- Breadcrumb Start -->
<div class="container">
    <ul class="breadcrumb bg-transparent m-0 p-0">
        <li class="breadcrumb-item">
            <a href="<?= site_url() ?>" class="content_center">Home</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="<?= site_url('sitemap') ?>" class="content_center">Site Map</a>
        </li>
    </ul>
</div>
<!-- Breadcrumb End -->
<!-- Site Map Start -->
<div class="container-fluid py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h3 class="py-2 section-title">
                    <span>Site Map</span>
                </h3>
                <div class="sitemap">
                    <div class="menu-main">
                        <ul>
                            <li>
                                <a aria-label="terbaru" class="menu-main-link menu-main-home content_center" href="<?= site_url() ?>">
                                    <span>
                                        <b class="mobile-only">Halaman Utama</b>
                                    </span>
                                </a>
                            </li>
                            <?php foreach ($data['dataKategori'] as $cat) { ?>
                                <li class="menu-parent">
                                    <a aria-label="<?= $cat['kategori'] ?>" class="menu-main-link content_center" href="<?= $cat['url'] ?>">
                                        <span><?= $cat['kategori'] ?></span>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Sidebar Start -->
            <?= $this->include('layouts/sidebar') ?>
            <!-- Sidebar End -->
        </div>
    </div>
</div>
<!-- Site Map Start -->
<?= $this->endSection(); ?>