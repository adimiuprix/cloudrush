<?= $this->extend('fragments/layout') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-lg-6 order-1 order-lg-2">
        <div class="wrapper mt-0">

            <?= $this->include('fragments/menu.php'); ?>

            <div class="content">
                <div class="content-user">
                    <h3 class="text-center">MAKE A DEPOSIT METHOD<br> <span class="text-primary">DOGECOIN</span></h3>
                    <div class="row m-2">
                        <div class="col-lg-12">
                            <div class="card mt-3">
                                <div class="p-3">
                                    <b>Send a money to the DogeCoin address:</b>
                                    <div class="input-group input-group-lg mb-2">
                                        <input type="text" class="form-control notranslate" placeholder="wallet" value="DQ2XM8APUaz8nTusB8p6iVhJg4Xm7AtxgJ" name="wall" id="purse" onclick="copier();">
                                        <span class="input-group-text copy" onclick="copier();"><i class="fa fa-copy"></i></span>
                                    </div>
                                    <hr>
                                    <p>Minimal deposit: <b>10.000000 DOGE</b> </p>
                                    <p>Minimum in site currency: <b>14 TRX</b> </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <style>
                        .copy {
                        text-transform: uppercase;
                        cursor: pointer;
                        }
                        .copy:hover {
                        background-color: #ec2043;
                        }
                    </style>
                    <script>
                        function copier() {
                            $("#purse").select();
                            document.execCommand('copy');
                        	document.getElementById('purse').style.backgroundColor = '#2e2727';
                        	document.getElementById('purse').style.color = '#ec2043';
                        }
                    </script>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <?= $this->include('fragments/deposit_block.php'); ?>
    <?= $this->include('fragments/withdraw_block.php'); ?>

</div>
<?= $this->endSection() ?>