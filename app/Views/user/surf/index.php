<?= $this->extend('fragments/layout') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-lg-6 order-1 order-lg-2">
        <div class="wrapper mt-0">

            <?= $this->include('fragments/menu.php'); ?>

            <div class="content">
                <div class="content-user">
                    <div>
                        <div class="row row-grid align-items-center">
                            <?= $this->include('fragments/surf_menu.php'); ?>
                            <div class="col-xl-12">
                                <p class="about text-center"><small>
                                    View the ads of advertisers and get paid to balance!<br>
                                    The administration is not responsible for advertising links posted in surfing.</small>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="pt-0">
                        <style>
                            .surfblockopen{background-color: #d0F0e0;border-color: #D0D0D0;color: #808080;opacity:0.3;display:none;}
                            .panel-success {border-width: 2px;}
                        </style>
                        <script>
                            function showFrame(div, link) {
                              window.open('/view/'+link, '_blank');
                              $(div).parent().parent().parent().addClass("surfblockopen");
                            }
                        </script>
                        <div class="row row-cols-1 m-0">
                            <?php foreach($surfs as $surf):?>
                            <div class="col col-lg-6 p-1">
                                <div class="card h-100 serf shadow-sm mb-2" style="overflow: hidden;border: 1px solid #ec2043 !important;">
                                    <div class="p-1 pt-2 text-center serf-link h-100">
                                        <?= $surf['title']; ?>
                                    </div>
                                    <div class="text-center pt-0 p-2" title="Pay per view">
                                        <a href="#" onclick="showFrame(this, <?= $surf['id']; ?>);" class="btn btn-danger w-50 p-1" title="Click to view">
                                            <i class="fa fa-gift"></i> <b>0.08 TRX</b>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach;?>
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