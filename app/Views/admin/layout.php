<!doctype html>
<html lang="en" data-style="light">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
        <title>Dashboard - Analytics | Materio - Bootstrap Material Design Admin Template</title>
        <meta name="description" content="" />
        <link rel="icon" type="image/x-icon" href="<?= base_url('public/admin/img/favicon/favicon.ico'); ?>" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&ampdisplay=swap" rel="stylesheet" />
        <link rel="stylesheet" href="<?= base_url('public/admin/vendor/fonts/remixicon/remixicon.css'); ?>" />
        <link rel="stylesheet" href="<?= base_url('public/admin/vendor/libs/node-waves/node-waves.css'); ?>" />
        <link rel="stylesheet" href="<?= base_url('public/admin/vendor/css/core.css'); ?>" class="template-customizer-core-css" />
        <link rel="stylesheet" href="<?= base_url('public/admin/vendor/css/theme-default.css'); ?>" class="template-customizer-theme-css" />
        <link rel="stylesheet" href="<?= base_url('public/admin/css/demo.css'); ?>" />
        <link rel="stylesheet" href="<?= base_url('public/admin/vendor/libs/perfect-scrollbar/perfect-scrollbar.css'); ?>" />
        <link rel="stylesheet" href="<?= base_url('public/admin/vendor/libs/apex-charts/apex-charts.css'); ?>" />
        <script src="<?= base_url('public/admin/vendor/js/helpers.js'); ?>"></script>
        <script src="<?= base_url('public/admin/js/config.js'); ?>"></script>
    </head>
    <body>
        <!-- Layout wrapper -->
        <div class="layout-wrapper layout-content-navbar">
            <div class="layout-container">

                <?= $this->include('admin/partialls/aside');?>

                <!-- Layout container -->
                <div class="layout-page">

                    <?= $this->include('admin/partialls/navbar');?>

                    <!-- Content wrapper -->
                    <?= $this->renderSection('admsec') ?>
                    <!-- Content wrapper -->

                </div>
                <!-- / Layout page -->

            </div>
            <!-- Overlay -->
            <div class="layout-overlay layout-menu-toggle"></div>
        </div>
        <!-- / Layout wrapper -->
        <!-- Core JS -->
        <script src="<?= base_url('public/admin/vendor/libs/jquery/jquery.js'); ?>"></script>
        <script src="<?= base_url('public/admin/vendor/libs/popper/popper.js'); ?>"></script>
        <script src="<?= base_url('public/admin/vendor/js/bootstrap.js'); ?>"></script>
        <script src="<?= base_url('public/admin/vendor/libs/node-waves/node-waves.js'); ?>"></script>
        <script src="<?= base_url('public/admin/vendor/libs/perfect-scrollbar/perfect-scrollbar.js'); ?>"></script>
        <script src="<?= base_url('public/admin/vendor/js/menu.js'); ?>"></script>
        <!-- endbuild -->
        <!-- Vendors JS -->
        <script src="<?= base_url('public/'); ?>admin/vendor/libs/apex-charts/apexcharts.js"></script>
        <!-- Main JS -->
        <script src="<?= base_url('public/'); ?>admin/js/main.js"></script>
        <!-- Page JS -->
        <script src="<?= base_url('public/'); ?>admin/js/dashboards-analytics.js"></script>
        <!-- Place this tag before closing body tag for github widget button. -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>
    </body>
</html>
