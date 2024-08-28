<?= $this->extend('fragments/layout') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-lg-6 order-1 order-lg-2">
        <div class="wrapper mt-0">

            <?= $this->include('fragments/menu.php'); ?>

            <div class="content">
                <div class="content-user">
                    <div class="row row-grid align-items-center">
                        <div class="col-xl-12">
                            <div class="about p-2">
                                Referral system is a great opportunity to get passive earnings every day!<br>
                                Below is a special link for invitations and statistics of your referrals.
                            </div>
                            <div class="row mt-2 mb-3">
                                <div class="col-lg-12 col-xl-8 pt-0">
                                    <form action="" method="post" onsubmit="submitfromexchange(this);return false">
                                        <small class="text-warning text-uppercase">Referral link:</small>
                                        <div class="input-group">
                                            <span class="input-group-text"> <i class="fa fa-link"></i> </span>
                                            <input type="text" id="ref-input" onclick="this.select()" class="form-control" value="<?= $reff_link; ?>" readonly />
                                        </div>
                                        <script>
                                            document.addEventListener('DOMContentLoaded', () => {
                                                const input = document.getElementById('ref-input')

                                                input.addEventListener('click', () => {
                                                    input.select()
                                                    document.execCommand('copy') // untuk browser yang lebih lama
                                                    navigator.clipboard.writeText(input.value) // untuk browser modern
                                                        .then(() => {
                                                        alert('Text copied to clipboard')
                                                    }).catch(err => {
                                                        alert('Failed to copy text: ', err)
                                                    })
                                                })
                                            })
                                        </script>
                                    </form>
                                </div>
                                <div class="col-lg-12 col-xl-4 text-center">
                                    <button class="btn text-uppercase btn-danger mt-4" type="button" data-bs-toggle="collapse" data-bs-target="#demo"><i class="fa fa-copy"></i> <span class="btn-inner--text">GIF</span> </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="st">
                                        <div class="stat2"> <b class="notranslate st-count">10-2%</b></div>
                                        <div class="st-title"><i class="fa fa-percent"></i> REF.SYSTEM</div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="st">
                                        <div class="pulse-st"></div>
                                        <div class="stat2"> <b class="notranslate st-count">0</b></div>
                                        <div class="st-title"><i class="fa fa-coins"></i> INCOME (TRX)</div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="st">
                                        <div class="pulse-st"></div>
                                        <div class="stat2"> <b class="notranslate st-count"><?= $ref_count; ?> </b></div>
                                        <div class="st-title"><i class="fa fa-users"></i> REFERALS</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="demo" class="p-3 collapse">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-2">
                                    <div class="p-2">
                                        <img src="https://sitename.com/img/promo/468.gif" alt="img">
                                        <h6 class="card-title">Banner size:</h6>
                                        <div class="input-group mb-1">
                                            <span class="input-group-text">468x60 </span>
                                            <input type="text" onclick="this.select()" class="form-control" value="https://sitename.com/img/promo/468.gif">
                                        </div>
                                        <div class="input-group mb-1">
                                            <span class="input-group-text">728x90 </span>
                                            <input type="text" onclick="this.select()" class="form-control" value="https://sitename.com/img/promo/728.gif">
                                        </div>
                                        <div class="input-group mb-1">
                                            <span class="input-group-text">200x300 </span>
                                            <input type="text" onclick="this.select()" class="form-control" value="https://sitename.com/img/promo/200.gif">
                                        </div>
                                        <div class="input-group mb-1">
                                            <span class="input-group-text">300x250 </span>
                                            <input type="text" onclick="this.select()" class="form-control" value="https://sitename.com/img/promo/300.gif">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="stats pb-1 mb-2 mt-3">
                        <div class="stats-title text-uppercase text-white">Referrals</div>
                        <div class="table-responsive">
                            <table class="stats2 table table-sm table-striped mb-0 ">
                                <thead>
                                    <tr>
                                        <th>User</th>
                                        <th class="text-center">Referer</th>
                                        <th class="text-end">Income</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php if($referrals):?>
                                <?php foreach($referrals as $ref): ?>
                                <tr class="align-items-center">
                                    <td class="text-center pt-2">
                                        <img src="<?= base_url('public/assets/img/trx.png'); ?>" height="24">
                                    </td>
                                    <td class="text-start">
                                        <b><?= substr($ref->user_wallet, 0, 15); ?><span class="text-primary">***</span></b><br>
                                        <small class="date"></small>
                                    </td>
                                    <td class="text-end align-items-center">
                                        <span class="text-sum"><?= number_format($ref->total_earn, 0); ?> <small>TRX</small></span>
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
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <?= $this->include('fragments/deposit_block.php'); ?>
    <?= $this->include('fragments/withdraw_block.php'); ?>

</div>
<?= $this->endSection() ?>