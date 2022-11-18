<?= $this->extend('layouts/index') ?>
<?= $this->section('tagmeta') ?>
<meta name="description" content="Kumpulan indeks seluruh berita-berita yang ada di Nusantaramedia.co.id">
<meta name="keywords" content="">
<meta name="news_keywords" content="">

<meta name="language" content="id">
<meta name="geo.country" content="id">
<meta http-equiv="content-language" content="In-Id">
<meta name="geo.placename" content="Indonesia">
<meta name="theme-color" content="#5da5e0">
<!-- s: fb meta -->
<meta property="fb:app_id" content="">
<meta property="fb:pages" content="">
<meta property="og:title" content="Indeks Kumpulan Berita Nusantaramedia.co.id">
<meta property="og:description" content="Kumpulan indeks seluruh berita-berita yang ada di Nusantaramedia.co.id">
<meta property="og:type" content="article">
<meta property="og:url" content="<?= site_url('indeks') ?>">
<meta property="og:image" content="<?= $config['logo'] ?>">
<meta property="og:image:type" content="image/jpeg">
<meta property="og:image:width" content="457">
<meta property="og:image:height" content="100">
<meta property="og:site_name" content="<?= $config['domainname'] ?>">
<!-- e: fb meta -->
<!-- S:tweeter card -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="<?= $config['domainname'] ?>">
<meta name="twitter:title" content="Indeks Kumpulan Berita Nusantaramedia.co.id">
<meta name="twitter:description" content="Kumpulan indeks seluruh berita-berita yang ada di Nusantaramedia.co.id">
<meta name="twitter:image" content="<?= $config['logo'] ?>">
<meta name="twitter:image:src" content="<?= $config['logo'] ?>">
<!-- E:tweeter card -->
<?= $this->endSection(); ?>
<?= $this->section('content') ?>
<!-- Breadcrumb Start -->
<div class="container">
    <ul class="breadcrumb bg-transparent m-0 p-0">
        <li class="breadcrumb-item">
            <a href="<?= site_url() ?>" class="content_center">Home</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="<?= site_url('indeks') ?>" class="content_center" alt="Indeks">Indeks</a>
        </li>
    </ul>
</div>
<!-- Breadcrumb End -->
<!-- News With Sidebar Start -->
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <h3 class="py-2 section-title"><span>Indeks</span></h3>
            <div class="row">
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
<!-- News With Sidebar End -->
<?= $this->endSection(); ?>
<?= $this->section('script') ?>
<script src="<?= assets() ?>js/app.js?v=1.0-beta1" type="text/javascript"></script>
<script src="<?= assets() ?>js/load-more.js?v=1.0-beta1" type=" text/javascript"></script>
<script>
    window.last_publish_date = getDateTime().setup();

    var btn_replace = '<button class="btn btn-nm btn-block btn-more content_center" id="load-more-btn">';
    btn_replace += '<span><div>Muat Lainnya</div><i class="fas fa-angle-double-down"></i></span>';
    btn_replace += "</button>";

    load_more().setup({
        last_publish_date: window.last_publish_date,
        url: BASE_URL + 'request/load-more',
        page: 6,
        record_count: 6,
        finish_button_gone: true,
        max_hit: 3,
        load_more_btn: "#load-more-btn",
        load_more_div: "div#load-content",
        loading_string: "Loading ...",
        muat_lainnya_string: 'Muat Lainnya&nbsp;<i class="fas fa-angle-double-down"></i>',
        gagal_muat_string: "Gagal Memuat Data",
        channel_name: "all",
        subchannel_name: "all",
        token: "ZiZDeCPKLG4B6PlFlKWTyuHUCKDPQRWGh0bj7HIu",
        infinit_load: true,
        btn_replace: btn_replace
    });
</script>
<?= $this->endSection(); ?>