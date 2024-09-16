<div class="col-lg-3 order-3 order-lg-3">
    <div class="stats pb-1 mt-3 mt-lg-0">
        <div class="stats-title text-uppercase text-white">payouts</div>
        <div class="table-responsive">
            <table class="stats2 table table-sm table-striped mb-0">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>User</th>
                        <th class="text-center">Sum</th>
                    </tr>
                </thead>
                <?php if($withdraws):?>
                <?php foreach($withdraws as $wd): ?>
                <tr>
                    <td class="text-center"><img src="public/assets/img/trx.png" height="20" alt="trx"></td>
                    <td><?= substr($wd->user_wallet, 0, 10); ;?><span style="color: #ff5252;">***</span><br>
                    <small class="date"><?= $wd->created_at;?></small></td>
                    <td class="text-center"><span class="text-sum"><?= $wd->sum_withdraw;?> <small><?= $crypto['curr_code'];?></small></span> </td>
                </tr>
                <?php endforeach; ?>
                <?php else: ?>
                <tr>
                    <td colspan="3" class="text-center">No record found!</td>
                </tr>
                <?php endif; ?>
            </table>
        </div>
    </div>
</div>