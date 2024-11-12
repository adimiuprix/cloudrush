<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?= esc($sitename); ?> - <?= $slogan; ?></title>
        <meta name="description" content="<?= $description; ?>">
        <meta name="keywords" content="<?= $keywords; ?>">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" type="image/png" sizes="32x32" href="public/assets/img/fav/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="16x16" href="public/assets/img/fav/favicon-16x16.png">
        <link rel="manifest" href="public/assets/img/fav/site.webmanifest">
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <!-- AOS -->
        <link href="https://unpkg.com/aos%402.3.1/dist/aos.css" rel="stylesheet">
        <link rel="dns-prefetch" href="https://use.fontawesome.com/">
        <link rel="dns-prefetch" href="https://cdnjs.cloudflare.com/">
        <link rel="dns-prefetch" href="https://translate.google.com/">
        <link rel="preconnect" href="https://fonts.googleapis.com/">
        <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&amp;display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css" crossorigin="anonymous">
        <link rel="stylesheet" href="<?= base_url('public/assets/css/bootstrap.min.css') ?>">
        <link rel="stylesheet" href="<?= base_url('public/assets/css/animate.css') ?>">
        <link rel="stylesheet" href="<?= base_url('public/assets/css/style3860.css') ?>">
        <link rel="stylesheet" href="<?= base_url('public/assets/css/language.css') ?>">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="<?= base_url('public/assets/js/wow.min.js') ?>"></script>
        <script src="<?= base_url('public/assets/js/js.cookie.min.js') ?>"></script>
        <script> new WOW().init(); </script>
        <style>
            .buyban {display:inline-block;position:relative;padding: 4px 4px 4px 4px;background: #f24;}
            .buyban small a {color: #234;font-weight: bold;}
            .buyban small a:hover {color: #f24;}
            .buyban .buybut {position: absolute; top:2px; right: 2px;color: #fff;font-size: 14px;}
            .buyban .buybut::after {position: absolute; top:2px; right: 2px;content: "+"; background: #f24;padding:1px 4px;font-weight: bold; }
            .buyban .buybut:hover::after {position: absolute; top:2px; right: 2px; font-size: 16px; background: #61cb75;padding:2px 5px;}
        </style>
    </head>
    <body>
        <div class="container-xl">
        <!-- Navbar -->
        <div class="row m-0 mb-2 navmenu">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <a class="navbar-brand text-uppercase" href="<?= base_url(''); ?>" title="Sitename.com">
                    <img src="<?= base_url('public/assets/img/logo.png') ?>" style="width: 180px;" alt="Sitename">
                </a>
                <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-lg-0 text-center" style="flex-wrap: wrap;">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('news'); ?>"> News <span></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('bounty'); ?>"> Bounty <span></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('terms'); ?>"> Rules <span></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('faq'); ?>"> Faq <span></span></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <?php include('statistic.php');?>

        <?= $this->renderSection('content') ?>

        <style>
            @media only screen and (max-width: 1381px) {
            .stats {
            padding: 5px 2px 0;
            }
            .table td {font-size: 12px;
            }
            .table-sm > :not(caption) > * > * {
            padding: .25rem 1px;
            }
            }
            @media only screen and (max-width: 991px) {
            .stats {
            padding: 5px 2px 0;
            }
            .table td {font-size: 14px;
            }
            .table-sm > :not(caption) > * > * {
            padding: .25rem 1px;
            }
            .hidetime f2023630{
            display:none !important;
            }
            }
        </style>
        <style>
            .linkcopy { color: #fff; }
            .linkcopy:hover { color: #fc2; }
        </style>
        <div class="container-xl text-center p-3">
            <p class="mb-0 pb-0 notranslate" style="font-size: 120%;">
                <i class="fa fa-envelope"></i> email: <span class="text-warning"><?= $email->link;?></span> |
                <i class="fa fa-paper-plane"></i> telegram:
                <a target="_blank" href="<?= $telegram->link;?>" style="text-decoration: none">
                    <span class="text-info">@site_name</span>
                </a>
            </p>
            <b> Sitename.com </b> © 2024 - All rights reserved.
            <!-- Генерация страницы: 0.00192 -->
        </div>

        <div style="position:fixed; bottom:-5px; right:-10px;">
            <a target="_blank"   href="https://t.me/gotrx_support">
                <div class="telegram-button" style="line-height: 1 !important;">
                    <i class="fa fa-paper-plane"></i>
                </div>
            </a>
        </div>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="<?= base_url('public/assets/js/surf.js') ?>"></script>
        <script src="<?= base_url('public/assets/js/bootstrap.bundle.min.js') ?>"></script>
        <script src="<?= base_url('public/assets/js/common.js') ?>"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

        <script>
        <?php if (session()->getFlashdata('alert') === 'success'): ?>
            Swal.fire({
                title: 'Success!',
                text: 'Login successfully.',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        <?php endif; ?>

        <?php if (session()->getFlashdata('alert') === 'claim_success'): ?>
            Swal.fire({
                title: 'Success!',
                text: 'Bonus claim was successful.',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        <?php endif; ?>

        <?php if (session()->getFlashdata('alert') === 'claim_failed'): ?>
            Swal.fire({
                title: 'Failed!',
                text: 'Bonus claim unsuccessful.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        <?php endif; ?>

        <?php if (session()->getFlashdata('alert') === 'free_plan'): ?>
            Swal.fire({
                title: 'Failed!',
                text: 'You need deposit for claim bonus',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        <?php endif; ?>

        <?php if (session()->getFlashdata('surf') === 'surf_ok'): ?>
            Swal.fire({
                title: 'Success!',
                text: 'You have create ads...',
                icon: 'success',
                showConfirmButton: false,
                timer: 3000,
            });
        <?php endif; ?>

        <?php if (session()->getFlashdata('surf') === 'surf_failed'): ?>
            Swal.fire({
                title: 'Failed!',
                text: 'Insufficient balance!',
                icon: 'warning',
                showConfirmButton: false,
                timer: 3000,
            });
        <?php endif; ?>

        <?php if (session()->getFlashdata('payout') === 'payout_ok'): ?>
            Swal.fire({
                title: 'Success!',
                text: 'You have create withdrawal request.',
                icon: 'success',
                showConfirmButton: false,
                timer: 3000,
            });
        <?php endif; ?>

        <?php if (session()->getFlashdata('payout') === 'payout_failed'): ?>
            Swal.fire({
                title: 'Failed!',
                text: 'Insufficient balance!',
                icon: 'warning',
                showConfirmButton: false,
                timer: 3000,
            });
        <?php endif; ?>

        <?php if (session()->getFlashdata('payout') === 'payout_minimum'): ?>
            Swal.fire({
                title: 'Failed!',
                text: 'Minimum withdraw is 10 TRX',
                icon: 'warning',
                showConfirmButton: false,
                timer: 3000,
            });
        <?php endif; ?>

        <?php if (session()->getFlashdata('payout') === 'free_plan'): ?>
            Swal.fire({
                title: 'Failed!',
                text: 'You have to make a deposit for request withdrawal!',
                icon: 'warning',
                showConfirmButton: false,
                timer: 5000,
            });
        <?php endif; ?>

        <?php if (session()->getFlashdata('collect') === 'collect_ok'): ?>
            Swal.fire({
                title: 'Success!',
                text: 'Collect earning success',
                icon: 'success',
                showConfirmButton: false,
                timer: 3000,
            });
        <?php endif; ?>

        <?php if (session()->getFlashdata('collect') === 'collect_failed'): ?>
            Swal.fire({
                title: 'Failed!',
                text: 'Insuficient balance!',
                icon: 'warning',
                showConfirmButton: false,
                timer: 3000,
            });
        <?php endif; ?>

        <?php if (session()->getFlashdata('collect') === 'collect_exceded'): ?>
            Swal.fire({
                title: 'Failed!',
                text: 'You have reached the limit to be able to collect earnings. Come back tomorrow.',
                icon: 'warning',
                showConfirmButton: false,
                timer: 6000,
            });
        <?php endif; ?>

        </script>
    </body>
</html>