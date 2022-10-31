<?= $this->extend('layouts/index') ?>
<?= $this->section('tagmeta') ?>
<meta name="description" content="<?= $config['sitedescription'] ?>">
<meta name="keywords" content="<?= $config['sitedescription'] ?>">
<meta name="news_keywords" content="<?= $config['sitedescription'] ?>">

<meta name="language" content="id">
<meta name="geo.country" content="id">
<meta http-equiv="content-language" content="In-Id">
<meta name="geo.placename" content="Indonesia">
<meta name="theme-color" content="#5da5e0">
<!-- s: fb meta -->
<meta property="fb:app_id" content="">
<meta property="fb:pages" content="">
<meta property="og:title" content="<?= $title ?>">
<meta property="og:description" content="<?= $config['sitedescription'] ?>">
<meta property="og:type" content="article">
<meta property="og:url" content="<?= $config['site_domain'] ?>">
<meta property="og:image" content="<?= $config['logo'] ?>">
<meta property="og:image:type" content="image/jpeg">
<meta property="og:image:width" content="457">
<meta property="og:image:height" content="100">
<meta property="og:site_name" content="<?= $config['domainname'] ?>">
<!-- e: fb meta -->
<!-- S:tweeter card -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="<?= $config['domainname'] ?>">
<meta name="twitter:title" content="<?= $title ?>">
<meta name="twitter:description" content="<?= $config['sitedescription'] ?>">
<meta name="twitter:image" content="<?= $config['logo'] ?>">
<meta name="twitter:image:src" content="<?= $config['logo'] ?>">
<!-- E:tweeter card -->
<?= $this->endSection(); ?>
<?= $this->section('content') ?>
<div class="container">
    <div class="error-img content_center">
        <span class="flex_ori">
            <img alt="404" class=" lazyloaded" data-original="<?= getenv('urlassets') ?>404.webp" src="<?= getenv('urlassets') ?>404.webp">
            <div class="error-number content_center"><b>404</b></div>
        </span>
    </div>
    <h1 class="error-label">Halaman Tidak Ditemukan</h1>
    <h2 class="error-desc">Maaf, halaman yang anda cari tidak tersedia atau sudah dipindahkan.</h2>
    <a href="javascript:void(0)" onclick="window.history.go(-1); return false;" class="error-link btn btn-nm">Kembali</a>
</div>
<?= $this->endSection(); ?>