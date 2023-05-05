<div class="bg-primary" id="nav-top">
    <div class="container d-none d-lg-block">
        <div class="row align-items-center">
            <div class="col-12 col-md-8">
                <div class="d-flex justify-content-between">
                    <ul class="navbar-nav flex-row top-left">
                        <li class="nav-item"><a href="https://varient.codingest.com/about" class="nav-link">Tentang Kami</a></li>
                        <li class="nav-item"><a href="https://varient.codingest.com/contact" class="nav-link">Kontak</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4 text-right d-none d-md-block">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <div class="nav-link"> Monday, January 01, 2045</div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="container d-none d-lg-block">
    <div class="row align-items-center py-2">
        <div class="col-lg-4">
            <a href="<?= site_url() ?>" class="navbar-brand d-none d-lg-block">
                <img src="<?= $config['logo'] ?>" class="img-fluid" alt="<?= $config['sitename'] ?>">
            </a>
        </div>
        <div class="col-lg-8 text-center text-lg-right header-top">
            <div class="button-header">
                <ul>
                    <li>
                        <form class="search_" action="https://www.suara.com/search" method="GET">
                            <input type="text" name="q" placeholder="Search" class="search-text">
                            <button type="button" class="btn-search" id="open-search" aria-label="search">
                                <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396l1.414-1.414l-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8s3.589 8 8 8zm0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6s-6-2.691-6-6s2.691-6 6-6z"></path>
                                    <path fill="currentColor" d="M11.412 8.586c.379.38.588.882.588 1.414h2a3.977 3.977 0 0 0-1.174-2.828c-1.514-1.512-4.139-1.512-5.652 0l1.412 1.416c.76-.758 2.07-.756 2.826-.002z"></path>
                                </svg>
                            </button>
                            <button type="button" class="btn-search" id="close-search" aria-label="close search">
                                <i class="fa fa-times"></i>
                            </button>
                        </form>
                    </li>
                    <li>
                        <a href="https://www.arkadia.me/register" target="_blank" rel="noopener nofollow" class="btn-header btn-masuk-header" aria-label="register">
                            Masuk
                        </a>
                    </li>
                    <li>
                        <a href="https://www.arkadia.me/register" target="_blank" rel="noopener nofollow" class="btn-header btn-daftar-header" aria-label="register">
                            Daftar
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>