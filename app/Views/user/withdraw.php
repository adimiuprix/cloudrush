<?= $this->extend('fragments/layout') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-lg-6 order-1 order-lg-2">
        <div class="wrapper mt-0">

            <?= $this->include('fragments/menu.php'); ?>

            <div class="content">
                <div class="content-user">
                    <script>
                        var longtext = "<?= $wallet;?>";
                        var smalltext = "<?= substr($wallet, 0, 14);?><span class='text-primary'>xxxx</span><?= substr($wallet, 18);?>";
                        $(function() {
                            $("#mytrx").html(smalltext);
                            var done = false;
                            $("#mytrx").click(function() {
                                if (!done) {
                                    done = true;
                                    $(this).text(longtext);
                                }
                            });
                        });
                    </script>
                    <div class="mb-2">
                        <div class="p-0 pt-2">
                            <h6 class="text-uppercase mb-0 text-center"><b>Payments are made quickly and automatically.</b></h6>
                        </div>
                        <div class="p-2 px-0">
                            <p class="mb-0 text-center">Minimum payout: <span class="text-primary notranslate">10 TRX</span> in transactions.<br> Maximum payout:  <span class="text-primary notranslate">2500 TRX</span> in transactions.</p>
                            <p class="mb-0 text-center">Withdrawal every  <span class="text-primary">3 hour</span>.</p>
                        </div>
                        <div class="alert alert-danger text-center text-uppercase text-warning"><b>Make a deposit on 20 TRX.</b><br> After that, the payouts will be available.</div>
                    </div>
                    <div class="row text-center">
                        <div class="col-lg-12">
                            <hr class="my-1 ">
                            <div class="p-3 pt-2">
                                <form action="<?= base_url('wd_request')?>" method="POST">
                                    <?= csrf_field(); ?>
                                    <label class="text-uppercase">Your address - TRON TRX:</label>
                                    <div class="input-group mb-2">
                                        <div class="form-control"><i class="fa fa-wallet text-primary"></i> <span id="mytrx">TDNgt4fgHx72PDp7<span class="text-primary">xxxx</span>BFnowFuHZ</span></div>
                                    </div>
                                    <div class="col-lg-6 text-center p-3 text-uppercase mx-auto">
                                        <label>Payout amount:</label>
                                        <div class="input-group input-group-lg mb-2">
                                            <input type="text" class="form-control" placeholder="Payout amount" name="amount" min="10" max="2500">
                                            <span class="input-group-text">TRX</span>
                                        </div>
                                    </div>
                                    <button class="btn btn-lg btn-danger text-uppercase" name="pay" type="submit">Withdraw</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="stats pb-0">
                        <h5 class="text-uppercase text-white text-center">My last payouts</h5>
                        <table class="stats2 table table-sm table-striped mb-0">
                            <thead>
                                <tr>
                                    <th class="text-start">Status</th>
                                    <th class="text-end">Sum</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($withdrawals):?>
                                <?php foreach($withdrawals as $withdrawal): ?>
                                <tr class="align-items-center">
                                    <td class="text-start">
                                        <span class="text-primary"><?= $withdrawal['status']; ?></span><br>
                                    </td>
                                    <td class="text-end align-items-center">
                                        <span class="text-sum">
                                            <?= $withdrawal['sum_withdraw']; ?> <small>TRX</small>
                                        </span>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                <?php else: ?>
                                <tr>
                                    <td colspan="3" class="text-center">No record found!</td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
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