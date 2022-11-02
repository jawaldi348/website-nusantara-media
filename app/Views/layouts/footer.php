<!-- Footer Start -->
<div class="footer">
    <div class="container-fluid pt-5 px-sm-3 px-md-5">
        <hr>
        <div class="row pt-5">
            <div class="col-lg-3 col-md-6 mb-5">
                <a href="<?= site_url() ?>" class="navbar-brand">
                    <h1 class="mb-2 mt-n2 display-5 text-uppercase">
                        <img src="<?= $config['logo'] ?>" class="img-logo img-fluid" alt="<?= $config['sitename'] ?>">
                    </h1>
                </a>
                <p>
                    Jl. Adam Malik Jarau Buntak No. 105, Kec. Lubuk Sikaping, Kab. Pasaman<br>
                    <i class="fas fa-phone mr-2"></i> 082169454080 <br>
                    <i class="fas fa-envelope mr-2"></i> equatornusantaramedia@gmail.com
                </p>
                <div class="d-flex justify-content-start mt-4">
                    <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;" href="<?= $config['twitter'] ?>"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;" href="<?= $config['facebook'] ?>"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;" href="<?= $config['instagram'] ?>"><i class="fab fa-instagram"></i></a>
                    <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;" href="<?= $config['youtube'] ?>"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="font-weight-bold mb-4">Kategori</h4>
                <div class="d-flex flex-wrap m-n1">
                    <?php foreach ($data['dataKategori'] as $kategori) { ?>
                        <a href="<?= site_url($kategori['url']) ?>" class="btn btn-sm btn-outline-secondary m-1" title="<?= $kategori['kategori'] ?>"><?= $kategori['kategori'] ?></a>
                    <?php } ?>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="font-weight-bold mb-4">Informasi</h4>
                <ul class="nav flex-column hover-a">
                    <li class="nav-item"><a class="nav-link pt-0" href="<?= site_url('redaksi') ?>">» Redaksi</a></li>
                    <li class="nav-item"><a class="nav-link pt-0" href="<?= site_url('contact') ?>">» Kontak</a></li>
                    <li class="nav-item"><a class="nav-link pt-0" href="<?= site_url('about-us') ?>">» Tentang Kami</a></li>
                    <li class="nav-item"><a class="nav-link pt-0" href="<?= site_url('pedoman-media-siber') ?>">» Pedoman Media Siber</a></li>
                    <li class="nav-item"><a class="nav-link pt-0" href="#">» Kebijakan Privasi</a></li>
                    <li class="nav-item"><a class="nav-link pt-0" href="<?= site_url('sitemap') ?>">» Site Map</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <!-- <div class="bg-light text-center p-4 mb-3"> -->
                <h4 class="font-weight-bold">Dapatkan Pembaruan</h4>
                <p>Dapatkan informasi terkini dan terbaru yang dikirimkan langsung ke Inbox anda</p>
                <div class="input-group" style="width: 100%;">
                    <input type="text" class="form-control form-control" placeholder="Alamat email anda">
                    <div class="input-group-append">
                        <button class="btn btn-nm">Subscribe</button>
                    </div>
                </div>
                <!-- </div> -->
            </div>
        </div>
    </div>
    <div class="footer-copyright container-fluid py-4 px-sm-3 px-md-5">
        <p class="m-0 text-center copyright hover-a">
            &copy; <a class="font-weight-bold" href="<?= site_url() ?>"><?= $config['sitename'] ?></a>. All Rights Reserved.
        </p>
    </div>
</div>