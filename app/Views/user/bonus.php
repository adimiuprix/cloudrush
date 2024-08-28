<?= $this->extend('fragments/layout') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-lg-6 order-1 order-lg-2">
        <div class="wrapper mt-0">

            <?= $this->include('fragments/menu.php'); ?>

            <div class="content">
                <div class="content-user">
                    <div class="about text-center">
                        Get a bonus of <span style="color: #fe1629;"><b>2%</b></span> of your account deposits every 24 hours. <br>
                        The more funds you have deposited or promoted, the higher the daily bonus.
                    </div>
                    <div class="pb-3 text-center">
                        <form action="<?= base_url('claim'); ?>" method="post">
                            <input type="submit" name="bonus" value="CLAIM BONUS" class="btn btn-lg btn-danger mt-2">
                        </form>
                    </div>
                    <div class="stats pb-1 mb-2 mt-3">
                        <div class="stats-title text-uppercase text-white">Last 10 bonuses</div>
                        <table class="stats2 table table-sm table-striped mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-start">User</th>
                                    <th class="text-end">Bonus</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($claims): ?>
                                <?php foreach($claims as $claim): ?>
                                <tr class="align-items-center">
                                    <td class="text-center pt-2">
                                        <img src="<?= base_url('public/assets/img/trx.png'); ?>" height="24">
                                    </td>
                                    <td class="text-start">
                                        <b><?= substr($claim->user_wallet, 0, 16); ?><span class="text-primary">***</span></b><br>
                                        <small class="date"><?= $claim->created_at; ?></small>
                                    </td>
                                    <td class="text-end align-items-center">
                                        <span class="text-sum"><?= $claim->amount_bonus; ?> <small>TRX</small></span>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                <?php else: ?>
                                <tr class="align-items-center">
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