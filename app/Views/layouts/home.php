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
<!-- Tranding News Slider Start -->
<div class="container">
    <div class="row">
        <div class="col-2 col-sm-1 col-md-3 col-lg-2 py-1 pe-md-0 mb-md-1">
            <div class="d-inline-block d-md-block bg-primary text-white text-center breaking-caret py-1 px-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="1rem" height="1rem" fill="currentColor" class="bi bi-lightning-fill" viewBox="0 0 16 16">
                    <path d="M11.251.068a.5.5 0 0 1 .227.58L9.677 6.5H13a.5.5 0 0 1 .364.843l-8 8.5a.5.5 0 0 1-.842-.49L6.323 9.5H3a.5.5 0 0 1-.364-.843l8-8.5a.5.5 0 0 1 .615-.09z" />
                </svg>
                <span class="d-none d-md-inline-block">Tranding</span>
            </div>
        </div>
        <div class="col-10 col-sm-11 col-md-9 col-lg-10 ps-1 ps-md-2">
            <!-- <div class="d-flex justify-content-between"> -->
            <div class="breaking-box position-relative py-2">
                <div class="box-carousel" data-flickity='{ "cellAlign": "left", "wrapAround": true, "adaptiveHeight": true, "prevNextButtons": true , "autoPlay": 5000, "pageDots": false, "imagesLoaded": true }'>
                    <?php $limit_terpopular = array_slice($data['dataTerpopular'], 0, 5);
                    foreach ($limit_terpopular as $terpopular) { ?>
                        <div class="col-12 aribudin">
                            <a class="h6 fw-normal" href="<?= $terpopular['url'] ?>" alt="<?= $terpopular['title'] ?>"><?= $terpopular['title'] ?></a>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <!-- </div> -->
        </div>
    </div>
</div>
<!-- Tranding News Slider End -->

<!-- News With Sidebar Start -->
<div class="container py-3">
    <div class="row">
        <div class="col-lg-8">
            <!-- Headline News Slider Start -->
            <div class="owl-carousel owl-carousel-2 carousel-item-1 position-relative mb-3">
                <?php foreach ($data['dataHeadline'] as $headline) { ?>
                    <div class="position-relative overflow-hidden thumb-big-carousel-widget media_image" style="height: 435px;">
                        <img class="img-fluid h-100" src="<?= $headline['mainMedia']['path_media'] ?>" style="object-fit: cover;" alt="<?= $headline['mainMedia']['title_media'] ?>">
                        <div class="position-absolute b-0 w-100 bg-lg-shadow">
                            <div class="article-list-info content_center">
                                <span>
                                    <a class="article-list-title" href="<?= $headline['url'] ?>" alt="<?= $headline['title'] ?>">
                                        <h2><?= $headline['title'] ?></h2>
                                    </a>
                                    <a class="article-list-cate content_center" href="<?= $headline['urlKategori'] ?>" alt="<?= $headline['kategori'] ?>">
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
            <!-- Berita Terkini Start -->
            <div class="row mb-3">
                <div class="col-12">
                    <h3 class="py-2 mb-3 section-title">
                        <span>Berita Terkini</span>
                    </h3>
                </div>
                <div class="col-lg-6">
                    <?php $count = 0;
                    foreach ($data['dataTerkini'] as $terkini) {
                        if ($count >= 1) {
                            echo '</div><div class="col-lg-6">';
                            $count = 0;
                        }
                        $count++;
                    ?>
                        <div class="position-relative mb-3">
                            <div class="article-list-thumb thumb-loading">
                                <a href="<?= $terkini['url'] ?>" class="article-list-thumb-link flex_ori" alt="<?= $terkini['title'] ?>">
                                    <img src="<?= $terkini['mainMedia']['path_media'] ?>" class="img-fluid w-100" alt="<?= $terkini['mainMedia']['title_media'] ?>" style="object-fit: cover;">
                                </a>
                            </div>
                            <div class="position-relative px-0">
                                <div class="article-list-info content_center">
                                    <span>
                                        <a href="<?= $terkini['url'] ?>" class="article-list-title" alt="<?= $terkini['title'] ?>">
                                            <h2><?= $terkini['title'] ?></h2>
                                        </a>
                                        <a href="<?= $terkini['urlKategori'] ?>" class="article-list-cate content_center" alt="<?= $terkini['kategori'] ?>">
                                            <h3><?= $terkini['kategori'] ?></h3>
                                        </a>
                                        <div class="article-list-date content_center">
                                            <span><?= $terkini['date_publish'] ?></span>
                                        </div>
                                    </span>
                                </div>
                                <div class="py-2 m-0">
                                    <div class="article-list-desc"><?= $terkini['summary'] ?></div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="col-12">
                    <button class="btn btn-nm btn-block btn-more content_center">
                        <span>
                            <div>Muat Lainnya</div>
                            <i class="fas fa-angle-double-down"></i>
                        </span>
                    </button>
                </div>
            </div>
            <!-- Berita Terkini End -->
            <!-- Ads Start -->
            <div class="my-3 py-3">
                <a href="#"><img class="img-fluid w-100" src="<?= getenv('urlassets') . 'iklan_manual/jatim2.jpg' ?>" alt=""></a>
            </div>
            <!-- Ads Start -->
            <!-- Category News Slider Start -->
            <div class="row mb-3">
                <?php $count = 0;
                foreach ($data['dataKategori'] as $kategori) {
                    if ($kategori['dataContent'] != null) { ?>
                        <div class="col-12">
                            <h3 class="py-2 mb-3 section-title">
                                <span><?= $kategori['kategori'] ?></span>
                            </h3>
                        </div>
                        <div class="col-lg-6">
                            <?php $count = 0;
                            foreach ($kategori['dataContent'] as $content) {
                                if ($count >= 1) {
                                    echo '</div><div class="col-lg-6">';
                                    $count = 0;
                                }
                                $count++;
                            ?>
                                <div class="position-relative mb-3">
                                    <div class="article-list-thumb thumb-loading">
                                        <a href="<?= $content['url'] ?>" class="article-list-thumb-link flex_ori" title="<?= $content['title'] ?>">
                                            <img src="<?= $content['mainMedia']['path_media'] ?>" class="img-fluid w-100" alt="<?= $content['mainMedia']['title_media'] ?>" style="object-fit: cover;">
                                        </a>
                                    </div>
                                    <div class="position-relative px-0">
                                        <div class="article-list-info content_center">
                                            <span>
                                                <a href="<?= $content['url'] ?>" class="article-list-title" title="<?= $content['title'] ?>">
                                                    <h2><?= $content['title'] ?></h2>
                                                </a>
                                                <a href="<?= $content['urlKategori'] ?>" class="article-list-cate content_center" title="<?= $content['kategori'] ?>">
                                                    <h3><?= $content['kategori'] ?></h3>
                                                </a>
                                                <div class="article-list-date content_center">
                                                    <span><?= $content['date_publish'] ?></span>
                                                </div>
                                            </span>
                                        </div>
                                        <div class="py-2 m-0">
                                            <div class="article-list-desc"><?= $content['summary'] ?></div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-nm btn-block btn-more content_center">
                                <span>
                                    <div>Selengkapnya</div>
                                    <i class="fas fa-angle-double-right"></i>
                                </span>
                            </button>
                        </div>
                <?php }
                } ?>
            </div>
            <!-- Category News Slider End -->
        </div>
        <!-- Sidebar Start -->
        <?= $this->include('layouts/sidebar') ?>
        <!-- Sidebar End -->
    </div>
</div>
<!-- News With Sidebar End -->
<?= $this->endSection(); ?>