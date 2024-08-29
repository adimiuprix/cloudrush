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
                    <?php foreach($faqs as $faq): ?>
                    <div class="faq">
                        <div class="question">
                            <h2><?= $faq['question']; ?></h2>
                            <div class="answer">
                                <p><?= $faq['answer']; ?></p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
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