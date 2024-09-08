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
                        <?php if($my_adsense): ?>
                        <div class="row row-cols-1 m-0">
                            <?php foreach($my_adsense as $surf):?>
                            <div class="col col-lg-6 p-1">
                                <div class="card h-100 serf shadow-sm mb-2" style="overflow: hidden;border: 1px solid #ec2043 !important;">
                                    <div class="p-1 pt-2 text-center serf-link h-100">
                                        <?= $surf->title; ?>
                                    </div>
                                    <div class="text-center pt-0 p-2" title="Pay per view">
                                        <a href="#" onclick="showFrame(this, <?= $surf->id; ?>);" class="btn btn-danger w-50 p-1" title="Click to view">
                                            <b>Edit</b>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach;?>
                        </div>
                        <?php else: ?>
                        <div class="about text-center text-uppercase">
                            <b>You do not have any active links </b><br>You can add links for advertising.
                            <hr>
                            <a class="btn btn-lg btn-danger" href="<?= base_url('surf/add')?>">Add link</a>
                        </div>
                        <?php endif; ?>
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