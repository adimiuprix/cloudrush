<?= $this->extend('fragments/layout') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-lg-6 order-1 order-lg-2">
        <div class="wrapper mt-0">
            <div class="wrapper2">
                <div class="pt-1 pb-2 text-center">
                    <h3 class=" text-uppercase wrap-title px-3"><b>News</b></h3>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="about m-2 mb-3 pb-1">
                            <h4 class="card-title text-primary"><b>FREE 20 TRX</b> 
                                <small title="Date" class="float-end"><i class="far fa-calendar-alt"></i> 01 Jun 2024 - 10:00</small>
                            </h4>
                            <div class="p-1 pt-0 mb-0">Sitename.COM - Start cloud mining!<br>
                                Welcome bonus on your account.<br>
                                <b>
                                - Free bonus 20 TRX<br>
                                - Daily profit +12%<br>
                                - Daily bonus | PTC Ads | Bounty <br>
                                - Referral program 10-2%<br>
                                - Many bonuses.</b>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?= $this->include('fragments/deposit_block.php'); ?>
    <?= $this->include('fragments/withdraw_block.php'); ?>

</div>
<?= $this->endSection() ?>