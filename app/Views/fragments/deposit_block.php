<div class="col-lg-3 order-2 order-lg-1">
    <div class="stats pb-1 mt-3 mt-lg-0">
        <div class="stats-title text-uppercase text-white">deposits</div>
        <div class="table-responsive">
            <table class="stats2 table table-sm table-striped mb-0">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>User</th>
                        <th class="text-center">Sum</th>
                    </tr>
                </thead>
                <?php if($deposits):?>
                <?php foreach($deposits as $depo): ?>
                <tr>
                    <td class="text-center">
                        <img src="<?= base_url('public/assets/img/trx.png')?>" height="20" alt="trx">
                    </td>
                    <td><?= substr($depo->user_wallet, 0, 10); ;?><span style="color: #ff5252;">***</span><br>
                        <small class="date"><?= $depo->created_at;?></small>
                    </td>
                    <td class="text-center">
                        <span class="text-sum"><?= $depo->sum_deposit;?>
                            <small><?= $crypto['curr_code'];?></small>
                        </span>
                    </td>
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