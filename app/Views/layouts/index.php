<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title><?= $title ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="cMrxbAYatSBJiW9MedBFTOAj-YRc0jqOoTRgutx3jKU" />

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
    <link rel="stylesheet" href="<?= assets() ?>css/style.css?v1.19-beta1">
    <!-- s: section style -->
    <?= $this->renderSection('style') ?>
    <!-- e: section style -->
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W2676HS" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <!-- Topbar Start -->
    <?= $this->include('layouts/top-bar') ?>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <?= $this->include('layouts/navbar') ?>
    <!-- Navbar End -->

    <!-- s: section content -->
    <?= $this->renderSection('content') ?>
    <!-- e: section content -->

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
    <script>
        var BASE_URL = "<?= site_url(); ?>";
    </script>
    <!-- s: section style -->
    <?= $this->renderSection('script') ?>
    <!-- e: section style -->
</body>

</html>