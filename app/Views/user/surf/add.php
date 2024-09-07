<?= $this->extend('fragments/layout') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-lg-6 order-1 order-lg-2">
        <div class="wrapper mt-0">

            <?= $this->include('fragments/menu.php'); ?>

            <div class="content">
                <div class="content-user">

                    <?= $this->include('fragments/surf_menu.php'); ?>

                    <p class="about text-center "><small>
                        On this page you can place your websites / referral links of various projects!<br>
                        Users of our site will view your links and receive payment for it according to the tariff.<br>
                        <b class="text-danger">It is forbidden to add sites:</b> porn containing viruses and destroying the work of the frame.</small>
                    </p>
                    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                    <!-- Page content -->
                    <div class="pt-0">
                        <div class="card mt-2">
                            <div class="card-header text-uppercase p-2">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h4 class="mb-0">Add link</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form name="surforder" id="surforder" action="" class="mb-0" method="post">
                                    <input type="hidden" name="@secury" value="">
                                    <!-- Title -->
                                    <div class="input-group mb-2">
                                        <span class="input-group-text"><i class="far fa-edit"></i></span>
                                        <input class="form-control" name="title" id="title" placeholder="Title" required />
                                    </div>
                                    <!-- URL -->
                                    <div class="input-group mb-2">
                                        <span class="input-group-text"><i class="fa fa-link"></i></span>
                                        <input class="form-control" name="url" id="url" placeholder="URL: https://example.com" required />
                                    </div>
                                    <div class="row">
                                        <!-- Timer -->
                                        <div class="col-md-4">
                                            <label class="mb-1">Timer</label>
                                            <div class="input-group input-group-sm mb-2" title="Timer">
                                                <span class="input-group-text"><i class="fa fa-clock"></i></span>
                                                <select class="form-control" name="timer" id="timer" onchange="PlanChange(this.form);" required>
                                                    <option value="10">Timer: 10 sec (+ 0.005 TRX)</option>
                                                    <option value="20">Timer: 20 sec (+ 0.01 TRX)</option>
                                                    <option value="30">Timer: 30 sec (+ 0.015 TRX)</option>
                                                    <option value="40">Timer: 40 sec (+ 0.02 TRX)</option>
                                                    <option value="50">Timer: 50 sec (+ 0.025 TRX)</option>
                                                    <option value="60">Timer: 60 sec (+ 0.03 TRX)</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- VIP -->
                                        <div class="col-md-4">
                                            <label class="mb-1">VIP</label>
                                            <div class="input-group input-group-sm mb-2" title="List top link">
                                                <span class="input-group-text"><i class="fa fa-star"></i></span>
                                                <select class="form-control" name="vip" id="vip" onchange="PlanChange(this.form);" required>
                                                    <option value="0">Off</option>
                                                    <option value="1">On (+ 0.005 TRX)</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- Period -->
                                        <div class="col-md-4">
                                            <label class="mb-1">Period</label>
                                            <div class="input-group input-group-sm mb-2" title="The repeat period after which the link will be available to the user again">
                                                <span class="input-group-text"><i class="fa fa-reply"></i></span>
                                                <select class="form-control" name="reply" id="reply" required>
                                                    <option value="0">Every 24 hours</option>
                                                    <option value="1">Every 12 hours</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-1">
                                    <!-- Price View -->
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <input type="hidden" name="add">
                                            <input type="hidden" id="type" name="type" value="add">
                                            <input type="hidden" id="request" name="request" value="/ajax.php?action=surf&amp;type=add">
                                            <button type="submit" class="btn btn-lg btn-danger mt-2">SAVE</button>
                                        </div>
                                        <div class="col-sm-4 col-md-3 float-end">
                                            <label class="mb-1">
                                                <small>PRICE VIEW:</small>
                                            </label>
                                            <div class="input-group">
                                                <input class="form-control" style="font-size: 22px; font-weight: 700;" name="linkprice" value="" readonly />
                                                <span class="input-group-text">TRX</span>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <script>
                                    const buy_price = <?= $buy_p; ?>;
                                    const buy_price_timer = <?= $buy_pt; ?>;
                                    const buy_price_move = <?= $buy_pm; ?>;

                                    function PlanChange(form) {
                                        let lprice = buy_price;

                                        // VIP price addition
                                        if (form.vip.value == 1) {
                                            lprice += buy_price_move;
                                        }

                                        // Timer price addition
                                        const timerMultiplier = parseInt(form.timer.value) / 10;
                                        lprice += (buy_price_timer * timerMultiplier);

                                        // Update link price field
                                        form.linkprice.value = number_format(lprice, 6, '.', '');
                                    }

                                    function number_format(number, decimals, dec_point, thousands_sep) {
                                        let i, j, kw, kd, km;
                                        if (isNaN(decimals = Math.abs(decimals))) {
                                            decimals = 2;
                                        }
                                        dec_point = dec_point || ".";
                                        thousands_sep = thousands_sep || ",";

                                        i = parseInt(number = (+number || 0).toFixed(decimals)) + "";
                                        j = (i.length > 3) ? i.length % 3 : 0;

                                        km = (j ? i.substr(0, j) + thousands_sep : "");
                                        kw = i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousands_sep);
                                        kd = (decimals ? dec_point + Math.abs(number - i).toFixed(decimals).slice(2) : "");

                                        return km + kw + kd;
                                    }

                                    function ClearForm() {
                                        const form = document.forms['surforder'];
                                        form.timer.value = 10;
                                        form.vip.value = 0;
                                        PlanChange(form);
                                    }

                                    $(document).ready(function() {
                                        ClearForm();
                                    });
                                </script>
                            </div>
                        </div>
                        <br>
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