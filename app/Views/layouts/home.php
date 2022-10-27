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
<!-- Headline News Slider Start -->
<div class="owl-carousel owl-carousel-2 carousel-item-1 position-relative mb-3">
    <?php foreach ($data['dataHeadline'] as $headline) { ?>
        <div class="position-relative overflow-hidden thumb-big-carousel-widget media_image" style="height: 435px;">
            <img class="img-fluid h-100" src="<?= $headline['mainMedia']['path_media'] ?>" style="object-fit: cover;" alt="<?= $headline['mainMedia']['title_media'] ?>">
            <div class="position-absolute b-0 w-100 bg-lg-shadow">
                <div class="article-list-info content_center">
                    <span>
                        <a title="<?= $headline['title'] ?>" class="article-list-title" href="<?= $headline['url'] ?>">
                            <h2><?= $headline['title'] ?></h2>
                        </a>
                        <a class="article-list-cate content_center" href="<?= $headline['urlKategori'] ?>">
                            <h3><?= $headline['kategori'] ?></h3>
                        </a>
                        <div class="article-list-date content_center">
                            <span><?= $headline['date_publish'] ?></span>
                        </div>
                    </span>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<!-- Headline News Slider End -->
<?= $this->endSection(); ?>