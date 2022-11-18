<div class="container-fluid p-0 mb-3">
    <nav class="navbar navbar-expand-lg bg-navbar navbar-light py-2 py-lg-0 px-lg-5">
        <a href="<?= site_url() ?>" class="navbar-brand d-block d-lg-none">
            <img src="<?= $config['logo'] ?>" class="img-fluid" alt="<?= $config['sitename'] ?>">
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon">
                <i class="fas fa-bars" style="color:#fff; font-size:28px;"></i>
            </span>
        </button>
        <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
            <ul class="navbar-nav bg-navbar mr-auto py-0">
                <li class="d-inline d-lg-none">
                    <div class="nav-wrapper-logo">
                        <a href="<?= site_url() ?>">
                            <img src="<?= $config['logo'] ?>" class="img-fluid" alt="<?= $config['sitename'] ?>">
                        </a>
                        <div style="padding: 0 0 0 30px">
                            <button data-toggle="collapse" data-target="#navbarCollapse" class="close float-right">
                                <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 32 32">
                                    <path fill="currentColor" d="M24 9.4L22.6 8L16 14.6L9.4 8L8 9.4l6.6 6.6L8 22.6L9.4 24l6.6-6.6l6.6 6.6l1.4-1.4l-6.6-6.6L24 9.4z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url() ?>" class="nav-link active">Home</a>
                </li>
                <?php $limit_kategori = array_slice($data['dataKategori'], 0, 5);
                foreach ($limit_kategori as $value) { ?>
                    <li class="nav-item">
                        <a href="<?= $value['url'] ?>" class="nav-link"><?= $value['kategori'] ?></a>
                    </li>
                <?php } ?>
                <li class="nav-item">
                    <a href="#" class="nav-link">Foto</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Video</a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url('indeks') ?>" class="nav-link">Indeks</a>
                </li>
                <?php unset($data['dataKategori'][0]);
                unset($data['dataKategori'][1]);
                unset($data['dataKategori'][2]);
                unset($data['dataKategori'][3]);
                unset($data['dataKategori'][4]);
                ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Lainnya</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php foreach ($data['dataKategori'] as $value) { ?>
                            <li>
                                <a class="dropdown-item" href="<?= $value['url'] ?>"><?= $value['kategori'] ?></a>
                            </li>
                        <?php } ?>
                    </ul>
                </li>
            </ul>
            <div class="d-none d-lg-block">
                <form method="post" class="nm-searchform" action="#" autocomplete="off">
                    <input type="text" name="search" id="search" placeholder="Cari">
                    <button type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396l1.414-1.414l-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8s3.589 8 8 8zm0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6s-6-2.691-6-6s2.691-6 6-6z"></path>
                            <path fill="currentColor" d="M11.412 8.586c.379.38.588.882.588 1.414h2a3.977 3.977 0 0 0-1.174-2.828c-1.514-1.512-4.139-1.512-5.652 0l1.412 1.416c.76-.758 2.07-.756 2.826-.002z"></path>
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </nav>
</div>