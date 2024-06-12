<?= $this->extend('fragments/layout') ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-lg-6 order-1 order-lg-2">
        <div class="wrapper mt-0">
            <div class="wrapper2">
                <div class="pt-1 pb-2 text-center">
                    <h3 class=" text-uppercase wrap-title px-3"><b>Rules</b></h3>
                </div>
                <div class="about">
                    <p>
                        These Terms of Service apply to you as a member, user, player and advertiser of Sitename.
                    <dl>
                    <dt class="font-weight-bold text-danger">1. User account</dt>
                    <dd>
                        <p><span class="font-weight-bold text-default">1.1.</span> You can only have one account. If you have more than one account, all of them will be permanently suspended.<br>
                            <span class="font-weight-bold text-default">1.2.</span> Your email will not be shown, given or sold.<br>
                            <span class="font-weight-bold text-default">1.3.</span> We will not modify user account information based on user request.<br>
                            <span class="font-weight-bold text-default">1.4.</span> You have to use correct information when registering or changing personal information, otherwise your account will be suspended.<br>
                            <span class="font-weight-bold text-default">1.5.</span> Each advertisement can be viewed by the same IP address only once per 24 hours. 
                        </p>
                    </dd>
                    <dl>
                        <dt class="font-weight-bold text-danger">2. Referrals</dt>
                        <dd>
                            <p><span class="font-weight-bold text-default">2.1.</span> You may refer unlimited users with no limits.<br>
                                <span class="font-weight-bold text-default">2.2.</span> A referral will never be able to modify the member who referred him/her.<br>
                                <span class="font-weight-bold text-default">2.3.</span> The clicks made by your referrals will be credited to your account instantly.
                            </p>
                        </dd>
                        <dt class="font-weight-bold text-danger">3. Anti-cheat Policy</dt>
                        <dd>
                            <p><span class="font-weight-bold text-default">3.1.</span> Any attempt to hack into the system will be noted and the user account will be permanently suspended.<br>
                                <span class="font-weight-bold text-default">3.2.</span> Using any auto-click software to view advertisements will result in the suspension of your account.<br>
                                <span class="font-weight-bold text-default">3.3.</span> Any attempt to manually or automatically reload/view pages intensively will lead to the permanent suspension of your account.<br>
                                <span class="font-weight-bold text-default">3.4.</span> Sometimes we will warn you, sometimes we will not. In either way, when you request payout, our monitoring system will analyze your actions and take its own actions in return. Normally, attempts to cheat the system will result in account termination.
                            </p>
                        </dd>
                        <dt class="font-weight-bold text-danger">4. Payments to Members</dt>
                        <dd>
                            <p><span class="font-weight-bold text-default">4.1.</span> Payments are transferred to users via TRON - TRX no other method of payment is available at the moment.<br>
                                <span class="font-weight-bold text-default">4.2.</span> You can only request an unlimited amount to be paid to the payment processor you've used to make the most of your purchases in monetary amount.<br>
                                <span class="font-weight-bold text-default">4.3.</span> Payments will be made automatically.<br>
                            </p>
                        </dd>
                        <dt class="font-weight-bold text-danger">5. Payments to site</dt>
                        <dd>
                            <p><span class="font-weight-bold text-default">5.1.</span> All payments will be made only through the payment methods available on the site.<br>
                                <span class="font-weight-bold text-default">5.2.</span> All payments are non-refundable. Should you have any issue with any of your purchases, you can contact our support by creating a support ticket. We will work with you to resolve any problem you may have.<br>
                                <span class="font-weight-bold text-default">5.3.</span> All chargebacks or reversed transactions made on your payments will lead to an immediate account suspension.<br>
                                <span class="font-weight-bold text-default">5.4.</span> All deposits take effect immediately.
                            </p>
                        </dd>
                        <dt class="font-weight-bold text-danger">6. Advertisements</dt>
                        <dd>
                            <p><span class="font-weight-bold text-default">6.1.</span> We accept any kind of advertisement except for pages that break out of frames, have malicious code, redirect to another page, have adult or illegal content.<br>
                                <span class="font-weight-bold text-default">6.2.</span> Viewing ads from mobile phones/tablets is allowed but we cannot guarantee that they will work properly.<br>
                                <span class="font-weight-bold text-default">6.3.</span> Advertising scam sites is not allowed. If the website you are trying to advertise it is a very well known scam we will not approve it.
                            </p>
                        </dd>
                    </dl>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <?= $this->include('fragments/deposit_block.php'); ?>
    <?= $this->include('fragments/withdraw_block.php'); ?>

</div>
<?= $this->endSection() ?>