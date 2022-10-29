<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title><?= $title ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- s: section meta -->
    <?= $this->renderSection('tagmeta') ?>
    <!-- e: section meta -->

    <!-- Favicon -->
    <link href="<?= $config['favicon'] ?>" rel="shortcut icon" type="image/x-icon" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?= assets() ?>lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Flickity -->
    <link rel="stylesheet" href="<?= assets() ?>lib/flickity/flickity.css" media="screen">

    <!-- Customized Bootstrap Stylesheet -->
    <link rel="stylesheet" href="<?= assets() ?>css/style.css">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row align-items-center py-2 px-lg-5">
            <div class="col-lg-4">
                <a href="<?= site_url() ?>" class="navbar-brand d-none d-lg-block">
                    <img src="<?= $config['logo'] ?>" class="img-fluid" alt="<?= $config['sitename'] ?>">
                </a>
            </div>
            <div class="col-lg-8 text-center text-lg-right">
                <img class="img-fluid" src="<?= assets() ?>img/ads-700x70.jpg" alt="<?= $config['sitename'] ?>">
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <?= $this->include('layouts/navbar') ?>
    <!-- Navbar End -->

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
            <!-- s: section content -->
            <?= $this->renderSection('content') ?>
            <!-- e: section content -->
        </div>
    </div>
    <!-- News With Sidebar End -->

    <!-- Footer Start -->
    <?= $this->include('layouts/footer') ?>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-dark back-to-top"><i class="fa fa-angle-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="<?= assets() ?>lib/easing/easing.min.js"></script>
    <script src="<?= assets() ?>lib/owlcarousel/owl.carousel.min.js"></script>
    <!-- Flickity -->
    <script src="<?= assets() ?>lib/flickity/flickity.pkgd.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="<?= assets() ?>mail/jqBootstrapValidation.min.js"></script>
    <script src="<?= assets() ?>mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="<?= assets() ?>js/main.js"></script>
</body>

</html>