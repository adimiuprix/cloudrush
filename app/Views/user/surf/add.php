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
                        <script> 
                            function PlanChange(frm)
                            {
                            
                               lprice = bux_price;
                               if (frm.vip.value == 1) {
                                   lprice += bux_price_move;
                               }
                               if (frm.timer.value == 10) {
                                   lprice += bux_price_timer;
                               } else
                               if (frm.timer.value == 20) {
                                   lprice += (bux_price_timer * 2);
                               } else
                               if (frm.timer.value == 30) {
                                   lprice += (bux_price_timer * 3);
                               } else
                               if (frm.timer.value == 40) {
                                   lprice += (bux_price_timer * 4);
                               } else
                               if (frm.timer.value == 50) {
                                   lprice += (bux_price_timer * 5);
                               } else
                               if (frm.timer.value == 60) {
                                   lprice += (bux_price_timer * 6);
                               }
                               frm.linkprice.value = number_format(lprice, 6, '.', '');
                            
                            }
                            
                            function number_format(number, decimals, dec_point, thousands_sep) {
                               var i, j, kw, kd, km;
                               if (isNaN(decimals = Math.abs(decimals))) {
                                   decimals = 2;
                               }
                               if (dec_point == undefined) {
                                   dec_point = ",";
                               }
                               if (thousands_sep == undefined) {
                                   thousands_sep = ".";
                               }
                               i = parseInt(number = (+number || 0).toFixed(decimals)) + "";
                               if ((j = i.length) > 3) {
                                   j = j % 3;
                               } else {
                                   j = 0;
                               }
                               km = (j ? i.substr(0, j) + thousands_sep : "");
                               kw = i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousands_sep);
                               kd = (decimals ? dec_point + Math.abs(number - i).toFixed(decimals).replace(/-/, 0).slice(2) : "");
                               return km + kw + kd;
                            }
                            
                            
                                       var bux_price = 0.04;
                                       var bux_price_timer = 0.005;
                                       var bux_price_move = 0.005;
                                       function ClearForm()
                                       {
                                           document.forms['surforder'].timer.value = 10;
                                           document.forms['surforder'].vip.value = 0;
                                           PlanChange(document.forms['surforder']);
                                       }
                                       
                                       $(document).ready(function() { ClearForm(); });
                        </script> 
                        <div class="card mt-2">
                            <div class="card-header text-uppercase p-2">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h4 class="mb-0">Add link</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form name="surforder" action="" class="mb-0" method="POST" id="surf_add" onsubmit="return false;">
                                    <input type="hidden" name="@secury" value="">
                                    <div class="input-group mb-2">
                                        <span class="input-group-text"><i class="far fa-edit"></i></span>
                                        <input class="form-control" name="title" id="title" placeholder="Title" required="">
                                    </div>
                                    <div class="input-group mb-2">
                                        <span class="input-group-text"><i class="fa fa-link"></i></span>
                                        <input class="form-control" name="url" id="url" placeholder="URL: https://example.com" required="">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="mb-1">Timer</label>
                                            <div class="input-group input-group-sm mb-2" title="Timer">
                                                <span class="input-group-text"><i class="fa fa-clock"></i></span>
                                                <select class="form-control" name="timer" id="timer" onchange="PlanChange(this.form); return false;" required="">
                                                    <option value="10">Timer: 10 sec  (+ 0.005 TRX)</option>
                                                    <option value="20">Timer: 20 sec  (+ 0.01 TRX)</option>
                                                    <option value="30">Timer: 30 sec  (+ 0.015 TRX)</option>
                                                    <option value="40">Timer: 40 sec  (+ 0.02 TRX)</option>
                                                    <option value="50">Timer: 50 sec  (+ 0.025 TRX)</option>
                                                    <option value="60">Timer: 60 sec  (+ 0.03 TRX)</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="mb-1">VIP</label>
                                            <div class="input-group input-group-sm mb-2" title="List top link">
                                                <span class="input-group-text"><i class="fa fa-star"></i></span>
                                                <select class="form-control" name="vip" id="vip" onchange="PlanChange(this.form); return false;" required="">
                                                    <option value="0">Off</option>
                                                    <option value="1">On  (+ 0.005 TRX)</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="mb-1">Period</label>
                                            <div class="input-group input-group-sm mb-2" title="The repeat period after which the link will be available to the user again">
                                                <span class="input-group-text"><i class="fa fa-reply"></i></span>
                                                <select class="form-control" name="reply" id="reply" required="">
                                                    <option value="0">Every 24 hours</option>
                                                    <option value="1">Every 12 hours</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-1">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <input type="hidden" name="add">
                                            <input type="hidden" id="type" name="type" value="add">
                                            <input type="hidden" id="request" name="request" value="/ajax.php?action=surf&amp;type=add">
                                            <button type="submit" class="btn btn-lg btn-danger mt-2">SAVE</button>
                                        </div>
                                        <div class="col-sm-4 col-md-3 float-end">
                                            <label class="mb-1"><small>PRICE VIEW:</small></label>
                                            <div class="input-group">
                                                <input class="form-control" style="font-size: 22px;font-weight:700;" name="linkprice" value="0.045" readonly="readonly">
                                                <span class="input-group-text">TRX</span>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
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
                    <tbody>
                        <tr class="notranslate">
                            <td class="text-center"><img src="/img/trx.png" height="20" alt="trx"> </td>
                            <td>TNLfhZN9SQav<span style="color: #ff5252;">***</span><br><small class="date">12 Jun 2024 - 04:05</small></td>
                            <td class="text-center"><span class="text-sum">20 <small>TRX</small></span></td>
                        </tr>
                        <tr class="notranslate">
                            <td class="text-center"><img src="/img/trx.png" height="20" alt="trx"> </td>
                            <td>TF3RxyjQoLoM<span style="color: #ff5252;">***</span><br><small class="date">11 Jun 2024 - 22:33</small></td>
                            <td class="text-center"><span class="text-sum">20 <small>TRX</small></span></td>
                        </tr>
                        <tr class="notranslate">
                            <td class="text-center"><img src="/img/trx.png" height="20" alt="trx"> </td>
                            <td>TF3RxyjQoLoM<span style="color: #ff5252;">***</span><br><small class="date">11 Jun 2024 - 22:19</small></td>
                            <td class="text-center"><span class="text-sum">18 <small>TRX</small></span></td>
                        </tr>
                        <tr class="notranslate">
                            <td class="text-center"><img src="/img/trx.png" height="20" alt="trx"> </td>
                            <td>TBKnNfZRcM49<span style="color: #ff5252;">***</span><br><small class="date">11 Jun 2024 - 15:56</small></td>
                            <td class="text-center"><span class="text-sum">49 <small>TRX</small></span></td>
                        </tr>
                        <tr class="notranslate">
                            <td class="text-center"><img src="/img/trx.png" height="20" alt="trx"> </td>
                            <td>TEjCaB1Fa8FJ<span style="color: #ff5252;">***</span><br><small class="date">11 Jun 2024 - 10:53</small></td>
                            <td class="text-center"><span class="text-sum">36 <small>TRX</small></span></td>
                        </tr>
                        <tr class="notranslate">
                            <td class="text-center"><img src="/img/trx.png" height="20" alt="trx"> </td>
                            <td>TDcK59bpYobW<span style="color: #ff5252;">***</span><br><small class="date">10 Jun 2024 - 21:20</small></td>
                            <td class="text-center"><span class="text-sum">28 <small>TRX</small></span></td>
                        </tr>
                        <tr class="notranslate">
                            <td class="text-center"><img src="/img/trx.png" height="20" alt="trx"> </td>
                            <td>TGML8YG6R8Ca<span style="color: #ff5252;">***</span><br><small class="date">10 Jun 2024 - 19:07</small></td>
                            <td class="text-center"><span class="text-sum">50 <small>TRX</small></span></td>
                        </tr>
                        <tr class="notranslate">
                            <td class="text-center"><img src="/img/trx.png" height="20" alt="trx"> </td>
                            <td>TDcK59bpYobW<span style="color: #ff5252;">***</span><br><small class="date">10 Jun 2024 - 15:25</small></td>
                            <td class="text-center"><span class="text-sum">110 <small>TRX</small></span></td>
                        </tr>
                        <tr class="notranslate">
                            <td class="text-center"><img src="/img/trx.png" height="20" alt="trx"> </td>
                            <td>TLJTHrKzAZRG<span style="color: #ff5252;">***</span><br><small class="date">10 Jun 2024 - 09:59</small></td>
                            <td class="text-center"><span class="text-sum">50 <small>TRX</small></span></td>
                        </tr>
                        <tr class="notranslate">
                            <td class="text-center"><img src="/img/trx.png" height="20" alt="trx"> </td>
                            <td>TBKnNfZRcM49<span style="color: #ff5252;">***</span><br><small class="date">10 Jun 2024 - 04:50</small></td>
                            <td class="text-center"><span class="text-sum">20 <small>TRX</small></span></td>
                        </tr>
                        <tr class="notranslate">
                            <td class="text-center"><img src="/img/trx.png" height="20" alt="trx"> </td>
                            <td>TJ6iSFcVekCh<span style="color: #ff5252;">***</span><br><small class="date">10 Jun 2024 - 04:15</small></td>
                            <td class="text-center"><span class="text-sum">20 <small>TRX</small></span></td>
                        </tr>
                        <tr class="notranslate">
                            <td class="text-center"><img src="/img/trx.png" height="20" alt="trx"> </td>
                            <td>TPMJ8KGhRM37<span style="color: #ff5252;">***</span><br><small class="date">09 Jun 2024 - 21:04</small></td>
                            <td class="text-center"><span class="text-sum">32 <small>TRX</small></span></td>
                        </tr>
                        <tr class="notranslate">
                            <td class="text-center"><img src="/img/trx.png" height="20" alt="trx"> </td>
                            <td>TESrkCy4gg8X<span style="color: #ff5252;">***</span><br><small class="date">09 Jun 2024 - 20:15</small></td>
                            <td class="text-center"><span class="text-sum">20 <small>TRX</small></span></td>
                        </tr>
                        <tr class="notranslate">
                            <td class="text-center"><img src="/img/trx.png" height="20" alt="trx"> </td>
                            <td>TTSVeSTff95d<span style="color: #ff5252;">***</span><br><small class="date">09 Jun 2024 - 17:05</small></td>
                            <td class="text-center"><span class="text-sum">10 <small>TRX</small></span></td>
                        </tr>
                        <tr class="notranslate">
                            <td class="text-center"><img src="/img/trx.png" height="20" alt="trx"> </td>
                            <td>TTSVeSTff95d<span style="color: #ff5252;">***</span><br><small class="date">09 Jun 2024 - 16:55</small></td>
                            <td class="text-center"><span class="text-sum">33 <small>TRX</small></span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
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
                    <tbody>
                        <tr class="notranslate">
                            <td class="text-center"><img src="/img/trx.png" height="20" alt="trx"></td>
                            <td>TLt1qcz8k1zG<span style="color: #ff5252;">***</span><br><small class="date">12 Jun 2024 - 05:41</small></td>
                            <td class="text-center"><span class="text-sum">10 <small>TRX</small></span> </td>
                        </tr>
                        <tr class="notranslate">
                            <td class="text-center"><img src="/img/trx.png" height="20" alt="trx"></td>
                            <td>TQhXEP1UCCJE<span style="color: #ff5252;">***</span><br><small class="date">12 Jun 2024 - 04:16</small></td>
                            <td class="text-center"><span class="text-sum">10 <small>TRX</small></span> </td>
                        </tr>
                        <tr class="notranslate">
                            <td class="text-center"><img src="/img/trx.png" height="20" alt="trx"></td>
                            <td>TNLfhZN9SQav<span style="color: #ff5252;">***</span><br><small class="date">12 Jun 2024 - 04:10</small></td>
                            <td class="text-center"><span class="text-sum">10 <small>TRX</small></span> </td>
                        </tr>
                        <tr class="notranslate">
                            <td class="text-center"><img src="/img/trx.png" height="20" alt="trx"></td>
                            <td>TQXp7GGHBEio<span style="color: #ff5252;">***</span><br><small class="date">12 Jun 2024 - 03:51</small></td>
                            <td class="text-center"><span class="text-sum">10 <small>TRX</small></span> </td>
                        </tr>
                        <tr class="notranslate">
                            <td class="text-center"><img src="/img/trx.png" height="20" alt="trx"></td>
                            <td>TF3RxyjQoLoM<span style="color: #ff5252;">***</span><br><small class="date">11 Jun 2024 - 22:34</small></td>
                            <td class="text-center"><span class="text-sum">10 <small>TRX</small></span> </td>
                        </tr>
                        <tr class="notranslate">
                            <td class="text-center"><img src="/img/trx.png" height="20" alt="trx"></td>
                            <td>TASesnU9Mg98<span style="color: #ff5252;">***</span><br><small class="date">11 Jun 2024 - 20:15</small></td>
                            <td class="text-center"><span class="text-sum">10 <small>TRX</small></span> </td>
                        </tr>
                        <tr class="notranslate">
                            <td class="text-center"><img src="/img/trx.png" height="20" alt="trx"></td>
                            <td>TTSVeSTff95d<span style="color: #ff5252;">***</span><br><small class="date">11 Jun 2024 - 18:47</small></td>
                            <td class="text-center"><span class="text-sum">10 <small>TRX</small></span> </td>
                        </tr>
                        <tr class="notranslate">
                            <td class="text-center"><img src="/img/trx.png" height="20" alt="trx"></td>
                            <td>TDYCmDJVZwtt<span style="color: #ff5252;">***</span><br><small class="date">11 Jun 2024 - 13:32</small></td>
                            <td class="text-center"><span class="text-sum">10 <small>TRX</small></span> </td>
                        </tr>
                        <tr class="notranslate">
                            <td class="text-center"><img src="/img/trx.png" height="20" alt="trx"></td>
                            <td>TGML8YG6R8Ca<span style="color: #ff5252;">***</span><br><small class="date">11 Jun 2024 - 12:23</small></td>
                            <td class="text-center"><span class="text-sum">10 <small>TRX</small></span> </td>
                        </tr>
                        <tr class="notranslate">
                            <td class="text-center"><img src="/img/trx.png" height="20" alt="trx"></td>
                            <td>TLt1qcz8k1zG<span style="color: #ff5252;">***</span><br><small class="date">11 Jun 2024 - 11:32</small></td>
                            <td class="text-center"><span class="text-sum">10 <small>TRX</small></span> </td>
                        </tr>
                        <tr class="notranslate">
                            <td class="text-center"><img src="/img/trx.png" height="20" alt="trx"></td>
                            <td>TTSVeSTff95d<span style="color: #ff5252;">***</span><br><small class="date">11 Jun 2024 - 10:05</small></td>
                            <td class="text-center"><span class="text-sum">10 <small>TRX</small></span> </td>
                        </tr>
                        <tr class="notranslate">
                            <td class="text-center"><img src="/img/trx.png" height="20" alt="trx"></td>
                            <td>TWX1T9MP9hmu<span style="color: #ff5252;">***</span><br><small class="date">11 Jun 2024 - 08:32</small></td>
                            <td class="text-center"><span class="text-sum">10 <small>TRX</small></span> </td>
                        </tr>
                        <tr class="notranslate">
                            <td class="text-center"><img src="/img/trx.png" height="20" alt="trx"></td>
                            <td>TBKnNfZRcM49<span style="color: #ff5252;">***</span><br><small class="date">10 Jun 2024 - 21:40</small></td>
                            <td class="text-center"><span class="text-sum">10 <small>TRX</small></span> </td>
                        </tr>
                        <tr class="notranslate">
                            <td class="text-center"><img src="/img/trx.png" height="20" alt="trx"></td>
                            <td>TGML8YG6R8Ca<span style="color: #ff5252;">***</span><br><small class="date">10 Jun 2024 - 17:58</small></td>
                            <td class="text-center"><span class="text-sum">10 <small>TRX</small></span> </td>
                        </tr>
                        <tr class="notranslate">
                            <td class="text-center"><img src="/img/trx.png" height="20" alt="trx"></td>
                            <td>TD56yiybWQzQ<span style="color: #ff5252;">***</span><br><small class="date">10 Jun 2024 - 16:14</small></td>
                            <td class="text-center"><span class="text-sum">10 <small>TRX</small></span> </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>