<?= $this->extend('fragments/layout') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-lg-6 order-1 order-lg-2">
        <div class="wrapper mt-0">
            <?= $this->include('fragments/menu.php'); ?>
            <div class="content">
                <div class="content-user">
                    <style>
                        a.card {
                        text-decoration: none !important;
                        border-radius: 1em;
                        }
                        a.card .card-header {
                        padding: 5px;
                        color: #fff;
                        font-size: 15px;
                        }
                        a.card:hover {
                        border: 2px solid #ec2043 !important;
                        }
                        a.card .btn-light {
                        color: #fcd3da;
                        background: rgba(25,25,25,0.5);
                        border-radius: 10px; padding: 2px 10px !important;
                        border: 0px solid rgba(23,23,23,0.1) !important;
                        }
                    </style>
                    <h3 class="text-center">PAYMENT METHOD</h3>
                    <div class="row m-1">
                        <div class="col-lg-4 col-md-4 col-6 p-1">
                            <a href="/user/insert/tron" class="card mb-1">
                                <h5 class="card-header text-center text-uppercase notranslate">TRON</h5>
                                <div class="p-1" style="background: url(public/assets/img/pay/trx.png) no-repeat center center;background-size: 64px;"><br><br><br></div>
                                <div class="text-center notranslate"><span class="btn btn-sm btn-light mb-2 p-1">TRX</span></div>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-4 col-6 p-1">
                            <a href="/user/insert/dogecoin" class="card mb-1">
                                <h5 class="card-header text-center text-uppercase notranslate">DOGECOIN</h5>
                                <div class="p-1" style="background: url(public/assets/img/pay/doge.png) no-repeat center center;background-size: 64px;"><br><br><br></div>
                                <div class="text-center notranslate"><span class="btn btn-sm btn-light mb-2 p-1">DOGE</span></div>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-4 col-6 p-1">
                            <a href="/user/insert/litecoin" class="card mb-1">
                                <h5 class="card-header text-center text-uppercase notranslate">LITECOIN</h5>
                                <div class="p-1" style="background: url(public/assets/img/pay/ltc.png) no-repeat center center;background-size: 64px;"><br><br><br></div>
                                <div class="text-center notranslate"><span class="btn btn-sm btn-light mb-2 p-1">LTC</span></div>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-4 col-6 p-1">
                            <a href="/user/insert/dash" class="card mb-1">
                                <h5 class="card-header text-center text-uppercase notranslate">DASHCOIN</h5>
                                <div class="p-1" style="background: url(public/assets/img/pay/dash.png) no-repeat center center;background-size: 64px;"><br><br><br></div>
                                <div class="text-center notranslate"><span class="btn btn-sm btn-light mb-2 p-1">DASH</span></div>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-4 col-6 p-1">
                            <a href="/user/insert/bitcoin" class="card mb-1">
                                <h5 class="card-header text-center text-uppercase notranslate">BITCOIN</h5>
                                <div class="p-1" style="background: url(public/assets/img/pay/btc.png) no-repeat center center;background-size: 64px;"><br><br><br></div>
                                <div class="text-center notranslate"><span class="btn btn-sm btn-light mb-2 p-1">BTC</span></div>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-4 col-6 p-1">
                            <a href="/user/insert/bitcoincash" class="card mb-1">
                                <h5 class="card-header text-center text-uppercase notranslate">BITCOIN CASH</h5>
                                <div class="p-1" style="background: url(public/assets/img/pay/bch.png) no-repeat center center;background-size: 64px;"><br><br><br></div>
                                <div class="text-center notranslate"><span class="btn btn-sm btn-light mb-2 p-1">BCH</span></div>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-4 col-6 p-1">
                            <a href="/user/insert/tron_trc20" class="card mb-1">
                                <h5 class="card-header text-center text-uppercase notranslate">TETHER (TRC-20)</h5>
                                <div class="p-1" style="background: url(public/assets/img/pay/usdt.png) no-repeat center center;background-size: 64px;"><br><br><br></div>
                                <div class="text-center notranslate"><span class="btn btn-sm btn-light mb-2 p-1">USDT</span></div>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-4 col-6 p-1">
                            <a href="/user/insert/ethereum" class="card mb-1">
                                <h5 class="card-header text-center text-uppercase notranslate">ETHEREUM</h5>
                                <div class="p-1" style="background: url(public/assets/img/pay/eth.png) no-repeat center center;background-size: 64px;"><br><br><br></div>
                                <div class="text-center notranslate"><span class="btn btn-sm btn-light mb-2 p-1">ETH</span></div>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-4 col-6 p-1">
                            <a href="/user/insert/binancecoin" class="card mb-1">
                                <h5 class="card-header text-center text-uppercase notranslate">BinanceCoin</h5>
                                <div class="p-1" style="background: url(public/assets/img/pay/bnb.png) no-repeat center center;background-size: 64px;"><br><br><br></div>
                                <div class="text-center notranslate"><span class="btn btn-sm btn-light mb-2 p-1">BNB</span></div>
                            </a>
                        </div>
                    </div>
                    <div class="stats pb-1">
                        <h5 class="text-uppercase text-white text-center">My last deposits</h5>
                        <table class="stats2 table table-sm table-striped mb-0">
                            <thead>
                                <tr>
                                    <th class="text-start">Status</th>
                                    <th class="text-end">Sum</th>
                                </tr>
                            </thead>
                        </table>
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