<?= $this->extend('fragments/layout') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-lg-6 order-1 order-lg-2">
        <div class="wrapper mt-0">

            <?= $this->include('fragments/menu.php'); ?>

            <div class="content">
                <div class="content-user">
                    <style>
                        .countmining {
                            font-size: 42px;
                        }
                        @media only screen and (max-width: 1491px) {
                            .countmining {
                                font-size: 30px;
                            }
                        }
                    </style>
                    <div class="row row-grid align-items-center">
                        <div class="col-xl-12">
                            <div class="p-3 about">
                                <div class="row row-grid align-items-center">
                                    <div class="col-md-5 col-lg-4 text-md-end text-center">
                                        <div class="hero mx-auto" style="width: 70%;">
                                            <div class="hero-img">
                                                <div class="ring-1" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: bounceIn;">
                                                    <img src="<?= base_url('public/assets/img/ring.png'); ?>" class="img-ring-1 p-2 img-fluid mb-3 mb-lg-0" alt="">
                                                </div>
                                                <div class="ring-2" data-wow-delay="0.25s" style="visibility: visible; animation-delay: 0.25s; animation-name: bounceIn;">
                                                    <img src="<?= base_url('public/assets/img/ring-2.png'); ?>" class="img-ring-2 img-fluid mb-3 mb-lg-0" alt="">
                                                </div>
                                                <img src="<?= base_url('public/assets/img/ring.png'); ?>" class="img-ring mb-3 p-3 mb-lg-0" data-wow-delay="0.5s" alt="" style="visibility: visible; animation-delay: 0.5s;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-lg-8 text-md-start text-center">
                                        <div class="text-white" style="position: relative;z-index: 5;">
                                            <h5 class="card-title mb-0 mt-1">MY BALANCE</h5>
                                            <h4 class="card-text mt-0 countmining text-primary">
                                                <b id="mining_run"><?= $balance; ?></b>
                                                <small>TRX</small>
                                            </h4>
                                        </div>
                                        <script type="text/javascript">
                                        //Counter
                                        $(document).ready(function() {
                                            var speed = (parseFloat(<?= $earning_rate;?>)/60).toFixed(8);
                                            setInterval(function() {
                                                var oldvalue =  parseFloat($('#mining_run').html()).toFixed(8);
                                                var result = parseFloat(parseFloat(oldvalue) + parseFloat(speed)).toFixed(8);
                                                $("#mining_run").html(result);
                                            }, 1000);
                                        });
                                        </script>
                                        <div class="w-100 mt-1 btn-balance">
                                            <a class="btn btn-danger btn-danger2 p-2 mb-2" href="collect"><i class="fa fa-parachute-box"></i><span> <b>COLLECT</b></span></a>
                                            <a class="btn btn-outline-danger p-2 mb-2" href="withdraw"><i class="fa fa-arrow-down"></i><span> <b>WITHDRAW</b></span></a>
                                            <a class="btn btn-outline-danger p-2 mb-2" href="exit"><i class="fa fa-power-off"></i><span> <b>EXIT</b></span></a>
                                            <script>
                                                $(document).ready(function(){
                                                    $('a[href="exit"]').on('click', function(event) {
                                                        event.preventDefault()
                                                        Swal.fire({
                                                            text: "Are you sure want to exit?",
                                                            icon: 'question',
                                                            showCancelButton: true,
                                                            confirmButtonText: 'Yes',
                                                            cancelButtonText: 'No'
                                                        }).then((result) => {
                                                            if(result.isConfirmed){
                                                                window.location.href = this.href;
                                                            }
                                                        })
                                                    })
                                                })
                                            </script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 p-1">
                            <div class="row">
                                <div class="col-md-6 col-lg-6 col-xl-12">
                                    <div class="mining-info mining-hover">
                                        <i class="fa fa-coins text-center" style="width: 20px;"></i> 
                                        Hour profit: <b class="float-end text-primary"><?= $earning['hourly']; ?> TRX</b>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-xl-12">
                                    <div class="mining-info mining-hover">
                                        <i class="fa fa-coins text-center" style="width: 20px;"></i> 
                                        Daily profit: <b class="float-end text-primary"><?= $earning['daily']; ?> TRX</b>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-xl-12">
                                    <div class="mining-info mining-hover">
                                        <i class="fa fa-arrow-down text-center" style="width: 20px;"></i> 
                                        My deposit: <b class="float-end text-primary"><?= $earning['tot_deposit']; ?> TRX</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="text-center">You need to buy plans to start mining.</p>
                    <div class="row tarif m-0">
                        <?php foreach($plans as $plan): ?>
                        <div class="col-xl-6 col-lg-6 col-md-6 p-2">
                            <div class="card mb-1">
                                <div class="pulse-st"></div>
                                <div class="row row-grid align-items-center">
                                    <div class="col-lg-12 ps-auto">
                                        <div class="p-2">
                                            <h3 class="card-title ps-0 text-center mt-1 mb-0"><?= $plan->plan_name; ?></h3>
                                            <div class="mb-2">
                                                <table class="tarif-table">
                                                    <tbody>
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
                                                    </tbody>
                                                </table>
                                            </div>
                                            <hr class="my-0">
                                            <table class="tarif-table">
                                                <tbody>
                                                    <td>
                                                        <form action="<?= base_url('buy-plan'); ?>" method="post" class="m-0 text-center">
                                                            <input type="hidden" name="plan" value="<?= $plan->id; ?>">
                                                            <small class="text-uppercase">Buying tarif</small><br>
                                                            <button class="btn btn-danger" type="submit">
                                                                <?= number_format($plan->price, 0); ?>  TRX
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
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