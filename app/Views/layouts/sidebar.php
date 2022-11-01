<div class="col-lg-4 pt-3 pt-lg-0">
    <!-- Ads Start -->
    <a href="#"><img class="img-fluid" src="<?= getenv('urlassets') . 'iklan_manual/sumbar1.jpg' ?>" alt=""></a>
    <!-- Ads End -->

    <!-- Social Follow Start -->
    <div class="pb-3">
        <h3 class="py-2 mb-3 section-title">
            <span>Ikuti Kami</span>
        </h3>
        <div class="d-flex mb-3">
            <a href="<?= $config['facebook'] ?>" target="_blank" class="d-block w-50 py-2 px-3 text-white text-decoration-none mr-2" style="background: #39569E;">
                <small class="fab fa-facebook-f mr-2"></small><small>Facebook</small>
            </a>
            <a href="<?= $config['twitter'] ?>" target="_blank" class="d-block w-50 py-2 px-3 text-white text-decoration-none ml-2" style="background: #52AAF4;">
                <small class="fab fa-twitter mr-2"></small><small>Twitter</small>
            </a>
        </div>
        <div class="d-flex mb-3">
            <a href="<?= $config['youtube'] ?>" target="_blank" class="d-block w-50 py-2 px-3 text-white text-decoration-none mr-2" style="background: #DC472E;">
                <small class="fab fa-youtube mr-2"></small><small>Youtube</small>
            </a>
            <a href="<?= $config['instagram'] ?>" target="_blank" class="d-block w-50 py-2 px-3 text-white text-decoration-none ml-2" style="background: #C8359D;">
                <small class="fab fa-instagram mr-2"></small><small>Instagram</small>
            </a>
        </div>
    </div>
    <!-- Social Follow End -->

    <!-- Ads Start -->
    <!-- <div class="pb-3">
        <a href=""><img class="img-fluid" src="img/news-500x280-4.jpg" alt=""></a>
    </div> -->
    <!-- Ads End -->

    <!-- Popular News Start -->
    <div class="pb-3">
        <h3 class="py-2 section-title">
            <span>Terpopuler</span>
        </h3>
        <div class="sidebar-article article-list-container">
            <?php foreach ($data['dataTerpopular'] as $terpopular) { ?>
                <div class="article-list-row">
                    <div class="article-list-thumb">
                        <a href="<?= $terpopular['url'] ?>" class="article-list-thumb-link flex_ori" alt="<?= $terpopular['title'] ?>">
                            <img src="<?= $terpopular['mainMedia']['path_media'] ?>" class="img-fluid w-100" alt="<?= $terpopular['mainMedia']['title_media'] ?>" style="object-fit: cover;">
                        </a>
                    </div>
                    <div class="position-relative px-0">
                        <div class="article-list-info content_center">
                            <span>
                                <a href="<?= $terpopular['url'] ?>" class="article-list-title" alt="<?= $terpopular['title'] ?>">
                                    <h2><?= $terpopular['title'] ?></h2>
                                </a>
                                <a href="<?= $terpopular['urlKategori'] ?>" class="article-list-cate content_center" alt="<?= $terpopular['kategori'] ?>">
                                    <h3><?= $terpopular['kategori'] ?></h3>
                                </a>
                                <div class="article-list-date content_center">
                                    <span><?= $terpopular['date_publish'] ?></span>
                                </div>
                            </span>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <button class="btn btn-nm btn-block btn-more content_center">
            <span>
                <div>Selengkapnya</div>
                <i class="fas fa-angle-double-right"></i>
            </span>
        </button>
    </div>
    <!-- Popular News End -->

    <!-- Ads Start -->
    <div class="pb-3">
        <a href="#"><img class="img-fluid" src="<?= getenv('urlassets') . 'iklan_manual/jatim1.jpg' ?>" alt=""></a>
    </div>
    <!-- Ads End -->

    <!-- Tags Start -->
    <div class="pb-3">
        <h3 class="py-2 section-title">
            <span>Tags</span>
        </h3>
        <div class="d-flex flex-wrap m-n1">
            <ul class="tags-links tagcloud ps-0">
                <?php foreach ($data['dataTagpopuler'] as $tagpopuler) { ?>
                    <li><a href="<?= $tagpopuler['url'] ?>" title="<?= $tagpopuler['tag'] ?>"><?= $tagpopuler['tag'] ?></a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <!-- Tags End -->
</div>