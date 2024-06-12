<?= $this->extend('fragments/layout') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-lg-6 order-1 order-lg-2">
        <div class="wrapper mt-0">
            <div class="wrapper2">
                <div class="pt-1 pb-2 text-center">
                    <h3 class=" text-uppercase wrap-title px-3"><b>Frequently Asked Questions</b></h3>
                </div>
                <div class="container-test" id="faq">
                    <div class="faq">
                        <div class="question">
                            <h2>Who i will participate in Sitename</h2>
                            <div class="answer">
                                <p>Any person or corporation from any country can register an account with us and we will be glad to accept investors from anywhere in the world.</p>
                            </div>
                        </div>
                        <div class="question">
                            <h2>What I need join to  Sitename?</h2>
                            <div class="answer">
                                <p>Starting with  Sitename is very simple → just create an account on our platform. Creating an account takes no longer than 1 minute and gives you access to our project.</p>
                            </div>
                        </div>
                        <div class="question">
                            <h2>How to make a deposit?</h2>
                            <div class="answer">
                                <p>To create a deposit, you need to be a registered user, go to the dashboard and click the "DEPOSIT" button, then follow all the relevant instructions that are described in this section. After the transaction, the deposit will be credited within 5 minutes and your plan will be activated as soon as the funds arrive in your account.</p>
                            </div>
                        </div>
                        <div class="question">
                            <h2>I already have an activated deposit, I want to make more, what should I do?</h2>
                            <div class="answer">
                                <p>You can activate an additional deposit at any time, make a new deposit in the dashboard and the new deposit will be activated.</p>
                            </div>
                        </div>
                        <div class="question">
                            <h2>What currencies are currently accepted?</h2>
                            <div class="answer">
                                <p>We currently accept: Tron (TRX), Dogecoin (DOGE), Bitcoin (BTC), Bitcoin cash (BCH), Litecoin (LTC), Ethereum (ETH), Dash coin (Dash), Binance (BNB), Tether TRC-20 (USDT).</p>
                            </div>
                        </div>
                        <div class="question">
                            <h2>What is the minimum deposit amount?</h2>
                            <div class="answer">
                                <p>The minimum deposit is only 10 Tron (TRX).</p>
                            </div>
                        </div>
                        <div class="question">
                            <h2>How long does it take to activate the deposit after sending funds?</h2>
                            <div class="answer">
                                <p>Your deposit will be automatically activated after it will be confirmed in Tron (TRX) network. Please keep in mind that we cannot influence the speed of confirmation. Usually it takes to 5 minutes.</p>
                            </div>
                        </div>
                        <div class="question">
                            <h2>What is the minimum withdrawal amount?</h2>
                            <div class="answer">
                                <p>The minimum withdrawal amount is 10 Tron (TRX).</p>
                            </div>
                        </div>
                        <div class="question">
                            <h2>How long do you process the withdrawal of funds?</h2>
                            <div class="answer">
                                <p>Withdrawal of funds is processing for 5 minutes since submitting a request.</p>
                            </div>
                        </div>
                        <div class="question">
                            <h2>Are there any fees for withdrawals?</h2>
                            <div class="answer">
                                <p>The project undertakes commissions for all transactions</p>
                            </div>
                        </div>
                        <div class="question">
                            <h2>Can I combine earnings from different deposits for withdrawal?</h2>
                            <div class="answer">
                                <p>Yes, you can combine earnings from every deposit and withdraw it just in one transaction.</p>
                            </div>
                        </div>
                        <div class="question">
                            <h2>How does the affiliate program work?</h2>
                            <div class="answer">
                                <p>You get 12-2-1% for each deposit of invited referrals. The size and number of referral rewards is unlimited.</p>
                            </div>
                        </div>
                        <div class="question">
                            <h2>Where can I find my invitation link?</h2>
                            <div class="answer">
                                <p>You can find the invitation link in the "Referrals" section.</p>
                            </div>
                        </div>
                        <div class="question">
                            <h2>Can I participate in the referral program without my own active deposit?</h2>
                            <div class="answer">
                                <p>Yes, you can access all the features of our affiliate program regardless of whether you have a deposit or not.</p>
                            </div>
                        </div>
                        <div class="question">
                            <h2>Where can I get answers to questions that are not covered here?</h2>
                            <div class="answer">
                                <p>Our technical support works 24/7. You can contact our support personnel any moment from LiveChat or Telegram:  news_Sitename</p>
                            </div>
                        </div>
                    </div>
                </div>
                <style>
                    .container-test {
                    max-width: 100%;
                    border-radius: 10px;
                    }
                    h1 {
                    text-align: center;
                    color: white;
                    }
                    .faq {
                    margin-top: 10px;
                    }
                    .question {
                    font-family: 'Roboto', sans-serif;
                    margin-bottom: 20px;
                    }
                    .question h2 {
                    margin: 0;
                    padding: 15px;
                    cursor: pointer;
                    color: #333;
                    font-size: 16px;
                    background-color: #fff;
                    border-radius: 8px;
                    transition: background-color 0.3s ease-in-out;
                    }
                    .question h2:hover {
                    color: #fff;
                    background-color: #ff5252;
                    border-radius: 8px 8px 0 0;
                    }
                    .answer {
                    border-bottom: 1px solid #e0e0e0;
                    display: none;
                    padding: 15px;
                    font-family: monospace;
                    font-size: 16px;
                    line-height: 1.6;
                    }
                    .question:hover .answer  {
                    border-bottom: 1px solid #e0e0e0;
                    display: block;
                    background-color: #252525;
                    padding: 10px;
                    font-family: monospace;
                    font-size: 16px;
                    line-height: 1.6;
                    }
                    .answer p {
                    margin: 0;
                    color: white;
                    }
                    @media    screen and (max-width: 600px) {
                    .container-test {
                    padding: 15px;
                    }
                    .question h2 {
                    font-size: 16px;
                    }
                    }
                </style>
            </div>
        </div>
    </div>

    <?= $this->include('fragments/deposit_block.php'); ?>
    <?= $this->include('fragments/withdraw_block.php'); ?>

</div>
<?= $this->endSection() ?>