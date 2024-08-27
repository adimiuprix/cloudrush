<?= $this->extend('fragments/layout') ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-lg-6 order-1 order-lg-2">
        <div class="wrapper mt-0">
            <div class="wrapper2">
                <div class="pt-1 pb-2 text-center">
                    <h3 class=" text-uppercase wrap-title px-3"><b>Youtube Bounty</b></h3>
                </div>
                <p class="text-center">We are ready to actively encourage our users<br>
                    and in addition to the affiliate program, we provide a bonus for creating Video Reviews of our Project. 
                </p>
                <div class="row row-grid align-items-center">
                    <div class="col-md-12 text-center"><img src="<?= base_url('public/assets/img/b4.png'); ?>" style="max-width: 128px;"></div>
                    <div class="col-md-12 p-1">
                        <div class="about ps-0 mt-2">
                            <small>
                                <ul style="text-align:left;">
                                    <li>Your channel and videos must be public.</li>
                                    <li>You must have at least 50 subscribers. </li>
                                    <li>The minimum video length is 1 minute. </li>
                                    <li>Somewhere in the title name use the word (<span class="text-warning">Sitenmae</span>).</li>
                                    <li>Your review must be original. It's forbidden to copy content, text, visuals etc. from other reviews in any format.</li>
                                    <li>There is no limit to the number of reviews but We can reject your review for various reasons: poor video/sound quality, plagiarism, fake audience activity, etc.</li>
                                    <li>We will consider key points like, duration, number of views, likes and comments, and video &amp; sound quality for paying a reward.</li>
                                    <li>Video must contain a HUMAN voice . Videos without your voice wont be accepted.</li>
                                    <li>Repeat the process as much as you want to earn Referral Commission.</li>
                                    <li>The bonus will be directly credited to the account used for recording video reviews.</li>
                                </ul>
                            </small>
                            <h4 class="text-primary text-center"><i class="fa fa-gift"></i> REWARD: <b> 50 - 1000 TRX</b></h4>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <div class="p-2 pb-4">
                        <form action="#" method="POST">
                            <div class="p-1 text-uppercase">
                                <label>Youtube video:</label>
                                <div class="input-group input-group-lg mb-2">
                                    <input type="text" class="form-control" placeholder="Youtube link video" value="" name="youlink">
                                </div>
                                <button class="btn btn-lg btn-danger text-uppercase" name="yousend" type="submit">SEND VIDEO</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Post bounty -->
            </div>
        </div>
    </div>

    <?= $this->include('fragments/deposit_block.php'); ?>
    <?= $this->include('fragments/withdraw_block.php'); ?>

</div>
<?= $this->endSection() ?>