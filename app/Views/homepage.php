<?= $this->extend('fragments/layout') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-lg-6 order-1 order-lg-2">
        <div class="wrapper mt-0">
            <div class="wrapper2">
                <div class="row mt-0 text-center" id="buy">
                    <div class="col-xl-2 col-lg-1"></div>
                    <div class="col-xl-8 col-lg-10">
                        <div class="hero mx-auto">
                            <div class="hero-img">
                                <div class="ring-1" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: bounceIn;">
                                    <img src="<?= base_url('public/assets/img/ring-1.png');?>" class="img-ring-1 p-2 img-fluid mb-3 mb-lg-0" alt="">
                                </div>
                                <div class="ring-2" data-wow-delay="0.25s" style="visibility: visible; animation-delay: 0.25s; animation-name: bounceIn;">
                                    <img src="<?= base_url('public/assets/img/ring-2.png');?>" class="img-ring-2 img-fluid mb-3 mb-lg-0" alt="">
                                </div>
                                <img src="<?= base_url('public/assets/img/ring.png');?>" class="img-ring mb-3 p-3 mb-lg-0" data-wow-delay="0.5s" alt="" style="visibility: visible; animation-delay: 0.5s;">
                            </div>
                        </div>
                        <h2 class="logo-title text-uppercase pb-2 pt-2">FREE BONUS <b id="trxAmount">20</b> <b>TRX</b></span></h2>
                        <?php if(session()->has('user_data')): ?>
                        <div class="m-auto">
                            <button type="button" class="btn btn-lg btn-danger btn-home me-auto animated tada" onclick="window.location.href = '<?= base_url('account'); ?>'">Account</button>
                        </div>
                        <?php else:?>
                        <form action="<?= base_url('log_form')?>" method="post">
                            <div class="mb-3 login-home">
                                <input type="hidden" name="referral_code">
                                <input type="text" name="wallet" class="form-control notranslate" placeholder="ENTER TRX ADDRESS" style="font-size: 20px;line-height: 30px;">
                            </div>
                            <div class="m-auto">
                                <button type="submit" class="btn btn-lg btn-danger btn-home me-auto animated tada">START</button>
                            </div>
                        </form>
                        <?php endif; ?>
                    </div>
                </div>
                <br>
            </div>
        </div>
        <br>
        <div class="row tarif">
            <?php foreach($plans as $plan): ?>
            <div class="col-xl-6 col-lg-6 col-md-6 p-3">
                <div class="card mb-1">
                    <div class="pulse-st"></div>
                    <div class="row row-grid align-items-center">
                        <div class="col-lg-12 ps-auto">
                            <div class="p-2">
                                <h3 class="card-title ps-0 text-center mt-1 mb-0"><?= $plan->plan_name; ?></h3>
                                <div class="mb-2">
                                    <table class="tarif-table">
                                        <div class="tarif-lnfo">
                                            Income per day <br>
                                            <b><?= number_format($plan->earning_per_day, 2); ?> TRX</b>
                                        </div>
                                        <div class="tarif-lnfo">
                                            Income per week <br>
                                            <b><?= number_format($plan->earning_per_day * 7, 2); ?> TRX</b>
                                        </div>
                                        <div class="tarif-lnfo">
                                            Income per month <br>
                                            <b><?= number_format($plan->earning_per_day * 30, 2); ?> TRX</b>
                                        </div>
                                    </table>
                                </div>
                                <hr class="my-0 mb-2">
                                <table class="tarif-table">
                                    <td class="text-center">
                                        <a href="#buy" class="btn btn-danger"><?= number_format($plan->price, 0); ?>  TRX</a>
                                    </td>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <?= $this->include('fragments/deposit_block.php'); ?>
    <?= $this->include('fragments/withdraw_block.php'); ?>

</div>
<?= $this->endSection() ?>