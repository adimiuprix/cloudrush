<?= $this->extend('fragments/layout') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-lg-6 order-1 order-lg-2">
        <div class="wrapper mt-0">

            <?= $this->include('fragments/menu.php'); ?>

            <div class="content">
                <div class="content-user">

                    <?= $this->include('fragments/surf_menu.php'); ?>

                    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                    <!-- Page content -->
                    <div class="p-2">
                        <div class="about text-center text-uppercase">
                            <b>You do not have any active links </b><br>You can add links for advertising.
                            <hr>
                            <a class="btn btn-lg btn-danger" href="/user/surf/add">Add link</a>
                        </div>
                        <div class="row">
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <?= $this->include('fragments/deposit_block.php'); ?>
    <?= $this->include('fragments/withdraw_block.php'); ?>
</div>
<?= $this->endSection() ?>