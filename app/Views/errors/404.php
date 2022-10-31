<?= $this->extend('layouts/index') ?>
<?= $this->section('content') ?>
<style>
    .error-img>span {
        width: 100%;
        max-width: 480px;
    }

    .flex_ori img {
        position: absolute;
        z-index: 2;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .flex_ori>img {
        opacity: 0;
        transition: opacity 1000ms;
    }

    .flex_ori>img.lazyloaded {
        opacity: 1;
    }

    .error-number {
        position: absolute;
        z-index: 2;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        font-size: 12vw;
        color: #616161;
    }

    @media screen and (min-width: 480px) {
        .error-number {
            font-size: 64px;
        }
    }

    .error-img>span:after {
        content: '';
        display: block;
        padding-top: 75%;
    }

    .error-label,
    .error-desc {
        text-align: center;
        margin: 0 15px;
    }

    .error-label {
        font-weight: 900;
        font-size: 36px;
        text-transform: uppercase;
        color: #e9ecef;
    }

    .error-desc {
        font-weight: 400 !important;
        font-size: 16px;
        margin: 5px 0 30px;
        color: #dee2e6;
    }

    .p404__link {
        color: #fff;
    }

    .p404__link {
        display: block;
    }

    .p404__link {
        text-align: center;
    }

    .p404__link {
        width: 150px;
        margin: 0 auto;
        padding: 10px 0;
        border-radius: 5px;
        text-transform: uppercase;
        font-size: 16px;
        font-weight: 600;
        -webkit-transition: all .2s ease;
        -moz-transition: all .2s ease;
        -ms-transition: all .2s ease;
        -o-transition: all .2s ease;
        transition: all .2s ease;
        /* background: #5f2eea; */
    }

    /* .p404__link {
        background: #ff914c;
    } */
</style>
<div class="container">
    <div class="error-img content_center">
        <span class="flex_ori">
            <img alt="404" class=" lazyloaded" data-original="<?= getenv('urlassets') ?>404.webp" src="<?= getenv('urlassets') ?>404.webp">
            <div class="error-number content_center"><b>404</b></div>
        </span>
    </div>
    <h1 class="error-label">Halaman Tidak Ditemukan</h1>
    <h2 class="error-desc">Maaf, halaman yang anda cari tidak tersedia atau sudah dipindahkan.</h2>
    <a href="javascript:void(0)" onclick="window.history.go(-1); return false;" class="p404__link btn btn-nm">Kembali</a>
</div>
<?= $this->endSection(); ?>