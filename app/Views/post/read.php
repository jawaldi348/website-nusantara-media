<?= $this->extend('layouts/index') ?>
<?= $this->section('tagmeta') ?>
<meta name="description" content="<?= $read['summary'] ?>">
<meta name="keywords" content="<?= $read['tags'] ?>">
<meta name="news_keywords" content="<?= $read['tags'] ?>">
<meta name="author" content="<?= $read['penulis'] ?>">

<meta name="language" content="id">
<meta name="geo.country" content="id">
<meta http-equiv="content-language" content="In-Id">
<meta name="geo.placename" content="Indonesia">
<meta name="theme-color" content="#5da5e0">
<!-- s: fb meta -->
<meta property="fb:app_id" content="">
<meta property="fb:pages" content="">
<meta property="og:title" content="<?= $read['title'] ?>">
<meta property="og:description" content="<?= $read['summary'] ?>">
<meta property="og:type" content="article">
<meta property="og:url" content="<?= $read['url'] ?>">
<meta property="og:image" content="<?= $read['mainMedia']['path_media'] ?>">
<meta property="og:image:type" content="image/jpeg">
<meta property="og:image:width" content="457">
<meta property="og:image:height" content="100">
<meta property="og:site_name" content="<?= $config['domainname'] ?>">
<!-- e: fb meta -->
<!-- S:tweeter card -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="<?= $config['domainname'] ?>">
<meta name="twitter:title" content="<?= $read['title'] ?>">
<meta name="twitter:description" content="<?= $read['summary'] ?>">
<meta name="twitter:image" content="<?= $read['mainMedia']['path_media'] ?>">
<meta name="twitter:image:src" content="<?= $read['mainMedia']['path_media'] ?>">
<!-- E:tweeter card -->
<meta name="content_PublishedDate" content="<?= $read['datetime'] ?>">
<meta name="content_Category" content="<?= $read['kategori'] ?>">
<meta name="content_Author" content="<?= $read['penulis'] ?>">
<meta name="content_Editor" content="<?= $read['editor'] ?>">
<meta name="content_Tag" content="<?= $read['tags'] ?>">
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
            <a href="<?= $read['urlKategori'] ?>" class="content_center" alt="<?= $read['kategori'] ?>"><?= $read['kategori'] ?></a>
        </li>
    </ul>
</div>
<!-- Breadcrumb End -->
<!-- News With Sidebar Start -->
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="post-title">
                <h1 class="main-content-title mb-2"><?= $read['title'] ?></h1>
                <div class="main-content-atribute mb-3">
                    <div class="my-3 text-muted">
                        <!-- author -->
                        <span class="d-sm-inline author">
                            <span class="d-sm-inline author">
                                Penulis : <a class="fw-bold" href="#"><?= $read['penulis'] ?></a>
                            </span>
                            <span class="d-sm-inline ms-md-3 author">
                                Editor : <a class="fw-bold" href="#"><?= $read['editor'] ?></a>
                            </span>
                            <!-- date -->
                            <time class="ms-0 ms-sm-2 ms-md-3 date" datetime="2019-10-22">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-calendar-check me-1" viewBox="0 0 16 16">
                                    <path d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"></path>
                                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"></path>
                                </svg> <?= $read['date_publish'] ?>
                            </time>
                            <!--comments-->
                            <!-- <span class="ms-2 ms-md-3" title="5 comments">
                                    <a class="comments" href="#comments">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-chat-left-dots me-1" viewBox="0 0 16 16">
                                            <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"></path>
                                            <path d="M5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"></path>
                                        </svg> 5 Comments
                                    </a>
                                </span> -->
                            <!--view-->
                            <!-- <span class="ms-2 ms-md-3 view">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye me-1" viewBox="0 0 16 16">
                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"></path>
                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"></path>
                                    </svg> 1.230x view
                                </span> -->
                    </div>
                </div>
            </div>
            <!-- News Detail Start -->
            <div class="position-relative mb-3 post-content">
                <div class="main-content-image mb-3">
                    <div class="mci-frame">
                        <img class="img-fluid w-100 main-media" src="<?= $read['mainMedia']['path_media'] ?>" alt="<?= $read['mainMedia']['title_media'] ?>">
                    </div>
                    <div class="mci-info"><?= $read['mainMedia']['title_media'] ?></div>
                </div>
                <div class="share-box">
                    <div class="share-box-label content_center">
                        <span>Bagikan :</span>
                    </div>
                    <div class="share-list">
                        <button aria-label="Share Facebook" class="share-list-link share-list-fb content_center" onclick="return !window.open('https://www.facebook.com/sharer/sharer.php?u=<?= $read['url'] ?>', 'FB Share', 'width=500,height=500')">
                            <svg class="svgicon svgicon-fb" width="32" height="32" viewBox="0 0 448 448">
                                <path d="M400,0H48C21.5,0,0,21.5,0,48v352c0,26.5,21.5,48,48,48h137.2V295.7h-63V224h63v-54.6c0-62.2,37-96.5,93.7-96.5c27.1,0,55.5,4.8,55.5,4.8v61h-31.3c-30.8,0-40.4,19.1-40.4,38.7V224h68.8l-11,71.7h-57.8V448H400c26.5,0,48-21.5,48-48V48C448,21.5,426.5,0,400,0z"></path>
                            </svg>
                        </button>
                        <button aria-label="Share Twitter" class="share-list-link share-list-tw content_center" onclick="return !window.open('https://twitter.com/intent/tweet?text=<?= $read['title'] . ' ' . $read['url'] ?>', 'Tweet', 'width=500,height=500')">
                            <svg class="svgicon svgicon-tw" width="32" height="32" viewBox="0 0 448 448">
                                <path d="M400,0H48C21.5,0,0,21.5,0,48v352c0,26.5,21.5,48,48,48h352c26.5,0,48-21.5,48-48V48C448,21.5,426.5,0,400,0z M351.1,158.8c0.2,2.8,0.2,5.7,0.2,8.5c0,86.7-66,186.6-186.6,186.6c-37.2,0-71.7-10.8-100.7-29.4c5.3,0.6,10.4,0.8,15.8,0.8c30.7,0,58.9-10.4,81.4-28c-28.8-0.6-53-19.5-61.3-45.5c10.1,1.5,19.2,1.5,29.6-1.2c-30-6.1-52.5-32.5-52.5-64.4v-0.8c8.7,4.9,18.9,7.9,29.6,8.3c-18.3-12.2-29.2-32.7-29.2-54.6c0-12.2,3.2-23.4,8.9-33.1c32.3,39.8,80.8,65.8,135.2,68.6c-9.3-44.5,24-80.6,64-80.6c18.9,0,35.9,7.9,47.9,20.7c14.8-2.8,29-8.3,41.6-15.8c-4.9,15.2-15.2,28-28.8,36.1c13.2-1.4,26-5.1,37.8-10.2C375.1,137.9,363.9,149.5,351.1,158.8z"></path>
                            </svg>
                        </button>
                        <a aria-label="Share Email" class="share-list-link share-list-ml desktop-only content_center" href="mailto:?subject=<?= $read['title'] ?>&amp;amp;body=Check out this site <?= $read['url'] ?>">
                            <svg class="svgicon svgicon-ml" width="32" height="32" viewBox="0 0 448 448">
                                <path d="M400,0H48C21.5,0,0,21.5,0,48v352c0,26.5,21.5,48,48,48h352c26.5,0,48-21.5,48-48V48C448,21.5,426.5,0,400,0z M178.1,230.1c-90.7-65.8-89.8-66-114.1-84.9V120c0-13.3,10.7-24,24-24h272c13.3,0,24,10.7,24,24v25.2c-24.4,19-23.4,19.1-114.1,84.9c-10.5,7.7-31.4,26.1-45.9,25.9C209.5,256.2,188.6,237.8,178.1,230.1z M384,185.8V328c0,13.3-10.7,24-24,24H88c-13.3,0-24-10.7-24-24V185.8c14,10.8,33.3,25.2,95.3,70.2c14.2,10.3,38,32.1,64.7,32c26.9,0.1,51-22,64.7-32C350.7,211,370,196.6,384,185.8z"></path>
                            </svg>
                        </a>
                        <a aria-label="Share Whatsapp" class="share-list-link share-list-wa content_center" href="https://api.whatsapp.com/send?text=<?= $read['title'] . ' ' . $read['url'] ?>">
                            <svg class="svgicon svgicon-wa" width="32" height="32" viewBox="0 0 448 448">
                                <path d="M224,90.8c-72.7,0-131.8,59.1-131.9,131.8c0,24.9,7,49.2,20.2,70.1l3.1,5l-13.3,48.6l49.9-13.1l4.8,2.9c20.2,12,43.4,18.4,67.1,18.4h0.1c72.6,0,133.3-59.1,133.3-131.8c0-35.2-15.2-68.3-40.1-93.2C292.2,104.5,259.2,90.8,224,90.8L224,90.8z M301.5,279.2c-3.3,9.3-19.1,17.7-26.7,18.8c-12.6,1.9-22.4,0.9-47.5-9.9c-39.7-17.2-65.7-57.2-67.7-59.8c-2-2.6-16.2-21.5-16.2-41s10.2-29.1,13.9-33.1c3.6-4,7.9-5,10.6-5c2.6,0,5.3,0,7.6,0.1c2.4,0.1,5.7-0.9,8.9,6.8c3.3,7.9,11.2,27.4,12.2,29.4s1.7,4.3,0.3,6.9c-7.6,15.2-15.7,14.6-11.6,21.6c15.3,26.3,30.6,35.4,53.9,47.1c4,2,6.3,1.7,8.6-1c2.3-2.6,9.9-11.6,12.5-15.5c2.6-4,5.3-3.3,8.9-2s23.1,10.9,27.1,12.9s6.6,3,7.6,4.6C304.8,262,304.8,270,301.5,279.2z M400,0H48C21.5,0,0,21.5,0,48v352c0,26.5,21.5,48,48,48h352c26.5,0,48-21.5,48-48V48C448,21.5,426.5,0,400,0z M223.9,381.2c-26.6,0-52.7-6.7-75.8-19.3L64,384l22.5-82.2c-13.9-24-21.2-51.3-21.2-79.3C65.4,135.1,136.5,64,223.9,64c42.4,0,82.2,16.5,112.2,46.5c29.9,30,47.9,69.8,47.9,112.2C384,310.1,311.3,381.2,223.9,381.2L223.9,381.2z"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="main-content-detail">
                    <?php foreach ($read['dataSection'] as $section) {
                        if ($section['url'] != '') :
                            echo '<img class="img-fluid w-100 mb-2" src="' . $section['url'] . '">';
                        endif;
                        foreach ($section['desc'] as $key_desc => $value_desc) {
                            echo $value_desc;
                        }
                    ?>
                    <?php } ?>
                </div>
            </div>
            <h3 class="py-2 mb-3 section-title">
                <span>Topik Terkait</span>
            </h3>
            <ul class="tags-links tagcloud ps-0">
                <?php foreach ($read['dataTags'] as $tag) { ?>
                    <li><a href="<?= $tag['url'] ?>" title="<?= $tag['tag'] ?>"><?= $tag['tag'] ?></a></li>
                <?php } ?>
            </ul>
            <h3 class="py-2 mb-3 section-title">
                <span>Komentar</span>
            </h3>
            <div class="mb-3">
                <form class="comment">
                    <input type="hidden" name="idpost" value="<?= $read['idpost'] ?>">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="name">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="message">Komentar</label>
                        <textarea name="message" id="message" cols="30" rows="5" class="form-control" placeholder="Tiggalkan Komentar Anda..."></textarea>
                    </div>
                    <div class="form-group mb-0">
                        <button class="btn btn-nm btn-send content_center">
                            <span>
                                <div>Kirim Komentar</div>
                                <i class="fas fa-angle-double-right"></i>
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Sidebar Start -->
        <?= $this->include('layouts/sidebar') ?>
        <!-- Sidebar End -->
    </div>
</div>
<!-- News With Sidebar End -->
<?= $this->endSection(); ?>