<?= $this->extend('layouts/index') ?>
<?= $this->section('tagmeta') ?>
<meta name="description" content="<?= $list['kategori'] ?>">
<meta name="keywords" content="<?= $list['slug'] ?>">
<meta name="news_keywords" content="<?= $list['slug'] ?>">
<meta name="author" content="">

<meta name="language" content="id">
<meta name="geo.country" content="id">
<meta http-equiv="content-language" content="In-Id">
<meta name="geo.placename" content="Indonesia">
<meta name="theme-color" content="#5da5e0">
<!-- s: fb meta -->
<meta property="fb:app_id" content="">
<meta property="fb:pages" content="">
<meta property="og:title" content="<?= $list['kategori'] ?>">
<meta property="og:description" content="<?= $list['kategori'] ?>">
<meta property="og:type" content="article">
<meta property="og:url" content="<?= $list['url'] ?>">
<meta property="og:image" content="">
<meta property="og:site_name" content="<?= $config['domainname'] ?>">
<!-- e: fb meta -->
<!-- S:tweeter card -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="<?= $config['domainname'] ?>">
<meta name="twitter:title" content="<?= $list['kategori'] ?>">
<meta name="twitter:description" content="<?= $list['kategori'] ?>">
<meta name="twitter:image" content="">
<meta name="twitter:image:src" content="">
<!-- E:tweeter card -->
<meta name="content_PublishedDate" content="">
<meta name="content_Category" content="<?= $list['kategori'] ?>">
<meta name="content_Author" content="">
<meta name="content_Editor" content="">
<meta name="content_Tag" content="<?= $list['slug'] ?>">
<?= $this->endSection(); ?>
<?= $this->section('content') ?>
<!-- Breadcrumb Start -->
<div class="container">
    <ul class="breadcrumb bg-transparent m-0 p-0">
        <li class="breadcrumb-item">
            <a href="<?= site_url() ?>" class="content_center">Home</a>
        </li>
        <li class="breadcrumb-item">
            <a href="<?= site_url('category') ?>" class="content_center">Kategori</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="<?= $list['url'] ?>" class="content_center" alt="<?= $list['kategori'] ?>"><?= $list['kategori'] ?></a>
        </li>
    </ul>
</div>
<!-- Breadcrumb End -->
<!-- News With Sidebar Start -->
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <h3 class="py-2 mb-3 section-title">
                <span><?= $list['kategori'] ?></span>
            </h3>
            <!-- Headline News Slider Start -->
            <div class="owl-carousel owl-carousel-2 carousel-item-1 position-relative mb-3">
                <div class="position-relative overflow-hidden thumb-big-carousel-widget media_image" style="height: 435px;">
                    <img class="img-fluid h-100" src="<?= $list['dataContent'][0]['mainMedia']['path_media'] ?>" style="object-fit: cover;" alt="<?= $list['dataContent'][0]['mainMedia']['title_media'] ?>">
                    <div class="position-absolute b-0 w-100 bg-lg-shadow">
                        <div class="article-list-info content_center">
                            <span>
                                <a class="article-list-title" href="<?= $list['dataContent'][0]['url'] ?>" alt="<?= $list['dataContent'][0]['title'] ?>">
                                    <h2><?= $list['dataContent'][0]['title'] ?></h2>
                                </a>
                                <a class="article-list-cate content_center" href="<?= $list['dataContent'][0]['urlKategori'] ?>" alt="<?= $list['dataContent'][0]['kategori'] ?>">
                                    <h3><?= $list['dataContent'][0]['kategori'] ?></h3>
                                </a>
                                <div class="article-list-date content_center">
                                    <span><?= $list['dataContent'][0]['date_publish'] ?></span>
                                </div>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Headline News Slider End -->
            <!-- List Content Start -->
            <div class="row mb-3">
                <div class="col-12">
                    <h3 class="py-2 mb-3 section-title">
                        <span>Terkini</span>
                    </h3>
                </div>
                <div class="col-lg-6">
                    <?php unset($list['dataContent'][0]);
                    $count = 0;
                    foreach ($list['dataContent'] as $value) {
                        if ($count >= 1) {
                            echo '</div><div class="col-lg-6">';
                            $count = 0;
                        }
                        $count++;
                    ?>
                        <div class="position-relative mb-3">
                            <div class="article-list-thumb thumb-loading">
                                <a href="<?= $value['url'] ?>" class="article-list-thumb-link flex_ori" alt="<?= $value['title'] ?>">
                                    <img src="<?= $value['mainMedia']['path_media'] ?>" class="img-fluid w-100" alt="<?= $value['mainMedia']['title_media'] ?>" style="object-fit: cover;">
                                </a>
                            </div>
                            <div class="position-relative px-0">
                                <div class="article-list-info content_center">
                                    <span>
                                        <a href="<?= $value['url'] ?>" class="article-list-title" alt="<?= $value['title'] ?>">
                                            <h2><?= $value['title'] ?></h2>
                                        </a>
                                        <a href="<?= $value['urlKategori'] ?>" class="article-list-cate content_center" alt="<?= $value['kategori'] ?>">
                                            <h3><?= $value['kategori'] ?></h3>
                                        </a>
                                        <div class="article-list-date content_center">
                                            <span><?= $value['date_publish'] ?></span>
                                        </div>
                                    </span>
                                </div>
                                <div class="py-2 m-0">
                                    <div class="article-list-desc"><?= $value['summary'] ?></div>
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
            <!-- List Content Start -->
        </div>
        <!-- Sidebar Start -->
        <?= $this->include('layouts/sidebar') ?>
        <!-- Sidebar End -->
    </div>
</div>
<!-- News With Sidebar End -->
<?= $this->endSection(); ?>