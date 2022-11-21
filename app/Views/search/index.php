<?= $this->extend('layouts/index') ?>
<?= $this->section('tagmeta') ?>
<meta name="description" content="<?= $title ?>">
<meta name="keywords" content="<?= $search['search'] ?>">
<meta name="news_keywords" content="<?= $search['search'] ?>">

<meta name="language" content="id">
<meta name="geo.country" content="id">
<meta http-equiv="content-language" content="In-Id">
<meta name="geo.placename" content="Indonesia">
<meta name="theme-color" content="#5da5e0">
<!-- s: fb meta -->
<meta property="fb:app_id" content="">
<meta property="fb:pages" content="">
<meta property="og:title" content="<?= $title ?>">
<meta property="og:description" content="<?= $title ?>">
<meta property="og:type" content="article">
<meta property="og:url" content="<?= site_url('search') ?>">
<meta property="og:image" content="<?= $config['logo'] ?>">
<meta property="og:image:type" content="image/jpeg">
<meta property="og:image:width" content="457">
<meta property="og:image:height" content="100">
<meta property="og:site_name" content="<?= $config['domainname'] ?>">
<!-- e: fb meta -->
<!-- s:tweeter card -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="<?= $config['domainname'] ?>">
<meta name="twitter:title" content="<?= $title ?>">
<meta name="twitter:description" content="<?= $title ?>">
<meta name="twitter:image" content="<?= $config['logo'] ?>">
<meta name="twitter:image:src" content="<?= $config['logo'] ?>">
<!-- e:tweeter card -->
<?= $this->endSection(); ?>
<?php if ($search['dataContent'] != null) : ?>
    <?= $this->section('content') ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h3 class="py-2 section-title"><span>Pencarian <?= $search['search'] ?></span></h3>
                <div class="row">
                    <div class="col-lg-6">
                        <?php $count = 0;
                        foreach ($search['dataContent'] as $value) {
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
                </div>
            </div>
            <!-- Sidebar Start -->
            <?= $this->include('layouts/sidebar') ?>
            <!-- Sidebar End -->
        </div>
    </div>
    <?= $this->endSection(); ?>
<?php else : ?>
    <?= $this->section('content') ?>
    <style>
        .alert-box {
            display: grid;
            grid-template-columns: 55px 1fr;
        }

        .alert-box {
            overflow: hidden;
            border-radius: 10px;
            color: #fff;
        }

        .alert-icon {
            font-size: 24px;
        }

        .alert-label {
            justify-content: flex-start;
            line-height: 140%;
            padding: 10px;
            padding-left: 0;
        }

        @media (prefers-color-scheme: light) {
            .alert-box {
                background-color: #d00;
            }
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <section class="base-container alert-box alert-error">
                    <div class="alert-icon content_center"><i class="fas fa-exclamation-triangle"></i></div>
                    <div class="alert-label content_center">
                        Kata yang dicari tidak ditemukan. <br>
                        Silakan cari kata yang lain atau cek rekomendasi dibawah ini
                    </div>
                </section>
                <h3 class="py-2 section-title"><span>Rekomendasi</span></h3>
                <div class="row">
                    <div class="col-lg-6">
                        <?php $count = 0;
                        foreach ($search['rekomendasi'] as $value) {
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
                </div>
                <div id="load-content"></div>
                <button class="btn btn-nm btn-block btn-more content_center" id="load-more-btn">
                    <span>
                        <div>Muat Lainnya</div>
                        <i class="fas fa-angle-double-down"></i>
                    </span>
                </button>
            </div>
            <!-- Sidebar Start -->
            <?= $this->include('layouts/sidebar') ?>
            <!-- Sidebar End -->
        </div>
    </div>
    <?= $this->endSection(); ?>
<?php endif ?>