<?= $this->extend('fragments/layout') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-lg-6 order-1 order-lg-2">
        <div class="wrapper mt-0">

            <?= $this->include('fragments/menu.php'); ?>

            <div class="content">
                <div class="content-user">
                    <div>
                        <div class="row row-grid align-items-center">
                            <?= $this->include('fragments/surf_menu.php'); ?>
                            <div class="col-xl-12">
                                <p class="about text-center"><small>
                                    View the ads of advertisers and get paid to balance!<br>
                                    The administration is not responsible for advertising links posted in surfing.</small>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="pt-0">
                        <style>
                            .surfblockopen{background-color: #d0F0e0;border-color: #D0D0D0;color: #808080;opacity:0.3;display:none;}
                            .panel-success {border-width: 2px;}
                        </style>
                        <script>
                            function showFrame(div, link) {
                              window.open('/view/'+link, '_blank');
                              $(div).parent().parent().parent().addClass("surfblockopen");
                            }
                        </script>
                        <div class="row row-cols-1 m-0">
                            <div class="col col-lg-6 p-1">
                                <div class="card h-100 serf shadow-sm mb-2" style="overflow: hidden;border: 1px solid #ec2043 !important;">
                                    <div class="p-1 pt-2 text-center serf-link h-100">
                                        TRONOK +240% EARN ! BONUS 50 TRX
                                    </div>
                                    <div class="text-center pt-0 p-2" title="Pay per view">
                                        <a href="#" onclick="showFrame(this, '8');" class="btn btn-danger w-50 p-1" title="Click to view"><i class="fa fa-gift"></i> <b>0.08 TRX</b></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col col-lg-6 p-1">
                                <div class="card h-100 serf shadow-sm mb-2" style="overflow: hidden;border: 1px solid #3b2929 !important;">
                                    <div class="p-1 pt-2 text-center serf-link h-100">
                                        BONUS 50 DOGE
                                    </div>
                                    <div class="text-center pt-0 p-2" title="Pay per view">
                                        <a href="#" onclick="showFrame(this, '11');" class="btn btn-danger w-50 p-1" title="Click to view"><i class="fa fa-gift"></i> <b>0.08 TRX</b></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col col-lg-6 p-1">
                                <div class="card h-100 serf shadow-sm mb-2" style="overflow: hidden;border: 1px solid #3b2929 !important;">
                                    <div class="p-1 pt-2 text-center serf-link h-100">
                                        TRON X ✔️ BONUS 100 TRX
                                    </div>
                                    <div class="text-center pt-0 p-2" title="Pay per view">
                                        <a href="#" onclick="showFrame(this, '3');" class="btn btn-danger w-50 p-1" title="Click to view"><i class="fa fa-gift"></i> <b>0.08 TRX</b></a>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                            <td>TEjCaB1Fa8FJ<span style="color: #ff5252;">***</span><br><small class="date">07 Jun 2024 - 02:52</small></td>
                            <td class="text-center"><span class="text-sum">143 <small>TRX</small></span></td>
                        </tr>
                        <tr class="notranslate">
                            <td class="text-center"><img src="/img/trx.png" height="20" alt="trx"> </td>
                            <td>TWX1T9MP9hmu<span style="color: #ff5252;">***</span><br><small class="date">07 Jun 2024 - 00:03</small></td>
                            <td class="text-center"><span class="text-sum">5 <small>TRX</small></span></td>
                        </tr>
                        <tr class="notranslate">
                            <td class="text-center"><img src="/img/trx.png" height="20" alt="trx"> </td>
                            <td>TWX1T9MP9hmu<span style="color: #ff5252;">***</span><br><small class="date">06 Jun 2024 - 21:14</small></td>
                            <td class="text-center"><span class="text-sum">21 <small>TRX</small></span></td>
                        </tr>
                        <tr class="notranslate">
                            <td class="text-center"><img src="/img/trx.png" height="20" alt="trx"> </td>
                            <td>TWX1T9MP9hmu<span style="color: #ff5252;">***</span><br><small class="date">06 Jun 2024 - 18:19</small></td>
                            <td class="text-center"><span class="text-sum">51 <small>TRX</small></span></td>
                        </tr>
                        <tr class="notranslate">
                            <td class="text-center"><img src="/img/trx.png" height="20" alt="trx"> </td>
                            <td>TKWyQN8UDwqc<span style="color: #ff5252;">***</span><br><small class="date">06 Jun 2024 - 15:13</small></td>
                            <td class="text-center"><span class="text-sum">10 <small>TRX</small></span></td>
                        </tr>
                        <tr class="notranslate">
                            <td class="text-center"><img src="/img/trx.png" height="20" alt="trx"> </td>
                            <td>TLJTHrKzAZRG<span style="color: #ff5252;">***</span><br><small class="date">06 Jun 2024 - 12:03</small></td>
                            <td class="text-center"><span class="text-sum">100 <small>TRX</small></span></td>
                        </tr>
                        <tr class="notranslate">
                            <td class="text-center"><img src="/img/trx.png" height="20" alt="trx"> </td>
                            <td>TLt1qcz8k1zG<span style="color: #ff5252;">***</span><br><small class="date">06 Jun 2024 - 07:10</small></td>
                            <td class="text-center"><span class="text-sum">100 <small>TRX</small></span></td>
                        </tr>
                        <tr class="notranslate">
                            <td class="text-center"><img src="/img/trx.png" height="20" alt="trx"> </td>
                            <td>TLrqHgiaTuiK<span style="color: #ff5252;">***</span><br><small class="date">06 Jun 2024 - 06:15</small></td>
                            <td class="text-center"><span class="text-sum">33 <small>TRX</small></span></td>
                        </tr>
                        <tr class="notranslate">
                            <td class="text-center"><img src="/img/trx.png" height="20" alt="trx"> </td>
                            <td>TKWyQN8UDwqc<span style="color: #ff5252;">***</span><br><small class="date">05 Jun 2024 - 22:43</small></td>
                            <td class="text-center"><span class="text-sum">7 <small>TRX</small></span></td>
                        </tr>
                        <tr class="notranslate">
                            <td class="text-center"><img src="/img/trx.png" height="20" alt="trx"> </td>
                            <td>TDYCmDJVZwtt<span style="color: #ff5252;">***</span><br><small class="date">05 Jun 2024 - 20:45</small></td>
                            <td class="text-center"><span class="text-sum">15 <small>TRX</small></span></td>
                        </tr>
                        <tr class="notranslate">
                            <td class="text-center"><img src="/img/trx.png" height="20" alt="trx"> </td>
                            <td>TLKjer1ZQsnL<span style="color: #ff5252;">***</span><br><small class="date">05 Jun 2024 - 20:18</small></td>
                            <td class="text-center"><span class="text-sum">100 <small>TRX</small></span></td>
                        </tr>
                        <tr class="notranslate">
                            <td class="text-center"><img src="/img/trx.png" height="20" alt="trx"> </td>
                            <td>TDYCmDJVZwtt<span style="color: #ff5252;">***</span><br><small class="date">05 Jun 2024 - 17:40</small></td>
                            <td class="text-center"><span class="text-sum">50 <small>TRX</small></span></td>
                        </tr>
                        <tr class="notranslate">
                            <td class="text-center"><img src="/img/trx.png" height="20" alt="trx"> </td>
                            <td>TSX7w2w6Fw6i<span style="color: #ff5252;">***</span><br><small class="date">05 Jun 2024 - 17:31</small></td>
                            <td class="text-center"><span class="text-sum">20 <small>TRX</small></span></td>
                        </tr>
                        <tr class="notranslate">
                            <td class="text-center"><img src="/img/trx.png" height="20" alt="trx"> </td>
                            <td>TKWyQN8UDwqc<span style="color: #ff5252;">***</span><br><small class="date">05 Jun 2024 - 13:33</small></td>
                            <td class="text-center"><span class="text-sum">80 <small>TRX</small></span></td>
                        </tr>
                        <tr class="notranslate">
                            <td class="text-center"><img src="/img/trx.png" height="20" alt="trx"> </td>
                            <td>TLrqHgiaTuiK<span style="color: #ff5252;">***</span><br><small class="date">05 Jun 2024 - 11:48</small></td>
                            <td class="text-center"><span class="text-sum">21 <small>TRX</small></span></td>
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
                            <td>TSz7r4cAtwD4<span style="color: #ff5252;">***</span><br><small class="date">07 Jun 2024 - 00:38</small></td>
                            <td class="text-center"><span class="text-sum">100 <small>TRX</small></span> </td>
                        </tr>
                        <tr class="notranslate">
                            <td class="text-center"><img src="/img/trx.png" height="20" alt="trx"></td>
                            <td>TTEtTRJMzie1<span style="color: #ff5252;">***</span><br><small class="date">06 Jun 2024 - 23:58</small></td>
                            <td class="text-center"><span class="text-sum">10 <small>TRX</small></span> </td>
                        </tr>
                        <tr class="notranslate">
                            <td class="text-center"><img src="/img/trx.png" height="20" alt="trx"></td>
                            <td>TETxFR8sJBrs<span style="color: #ff5252;">***</span><br><small class="date">06 Jun 2024 - 22:01</small></td>
                            <td class="text-center"><span class="text-sum">22 <small>TRX</small></span> </td>
                        </tr>
                        <tr class="notranslate">
                            <td class="text-center"><img src="/img/trx.png" height="20" alt="trx"></td>
                            <td>TLKjer1ZQsnL<span style="color: #ff5252;">***</span><br><small class="date">06 Jun 2024 - 20:22</small></td>
                            <td class="text-center"><span class="text-sum">11 <small>TRX</small></span> </td>
                        </tr>
                        <tr class="notranslate">
                            <td class="text-center"><img src="/img/trx.png" height="20" alt="trx"></td>
                            <td>TP3W9FcAikeu<span style="color: #ff5252;">***</span><br><small class="date">06 Jun 2024 - 17:00</small></td>
                            <td class="text-center"><span class="text-sum">10 <small>TRX</small></span> </td>
                        </tr>
                        <tr class="notranslate">
                            <td class="text-center"><img src="/img/trx.png" height="20" alt="trx"></td>
                            <td>TETxFR8sJBrs<span style="color: #ff5252;">***</span><br><small class="date">06 Jun 2024 - 16:54</small></td>
                            <td class="text-center"><span class="text-sum">22 <small>TRX</small></span> </td>
                        </tr>
                        <tr class="notranslate">
                            <td class="text-center"><img src="/img/trx.png" height="20" alt="trx"></td>
                            <td>TKWyQN8UDwqc<span style="color: #ff5252;">***</span><br><small class="date">06 Jun 2024 - 15:09</small></td>
                            <td class="text-center"><span class="text-sum">10 <small>TRX</small></span> </td>
                        </tr>
                        <tr class="notranslate">
                            <td class="text-center"><img src="/img/trx.png" height="20" alt="trx"></td>
                            <td>TGML8YG6R8Ca<span style="color: #ff5252;">***</span><br><small class="date">06 Jun 2024 - 12:26</small></td>
                            <td class="text-center"><span class="text-sum">10 <small>TRX</small></span> </td>
                        </tr>
                        <tr class="notranslate">
                            <td class="text-center"><img src="/img/trx.png" height="20" alt="trx"></td>
                            <td>TDUUA9iQ26h7<span style="color: #ff5252;">***</span><br><small class="date">06 Jun 2024 - 11:01</small></td>
                            <td class="text-center"><span class="text-sum">10 <small>TRX</small></span> </td>
                        </tr>
                        <tr class="notranslate">
                            <td class="text-center"><img src="/img/trx.png" height="20" alt="trx"></td>
                            <td>TXi8xu2JBzfB<span style="color: #ff5252;">***</span><br><small class="date">06 Jun 2024 - 10:36</small></td>
                            <td class="text-center"><span class="text-sum">10 <small>TRX</small></span> </td>
                        </tr>
                        <tr class="notranslate">
                            <td class="text-center"><img src="/img/trx.png" height="20" alt="trx"></td>
                            <td>TCNVicEvnozj<span style="color: #ff5252;">***</span><br><small class="date">06 Jun 2024 - 04:36</small></td>
                            <td class="text-center"><span class="text-sum">10 <small>TRX</small></span> </td>
                        </tr>
                        <tr class="notranslate">
                            <td class="text-center"><img src="/img/trx.png" height="20" alt="trx"></td>
                            <td>TS4CvsXUWB9X<span style="color: #ff5252;">***</span><br><small class="date">05 Jun 2024 - 23:33</small></td>
                            <td class="text-center"><span class="text-sum">10 <small>TRX</small></span> </td>
                        </tr>
                        <tr class="notranslate">
                            <td class="text-center"><img src="/img/trx.png" height="20" alt="trx"></td>
                            <td>TS4CvsXUWB9X<span style="color: #ff5252;">***</span><br><small class="date">05 Jun 2024 - 17:41</small></td>
                            <td class="text-center"><span class="text-sum">10 <small>TRX</small></span> </td>
                        </tr>
                        <tr class="notranslate">
                            <td class="text-center"><img src="/img/trx.png" height="20" alt="trx"></td>
                            <td>TZCqM9jJvw5j<span style="color: #ff5252;">***</span><br><small class="date">05 Jun 2024 - 15:50</small></td>
                            <td class="text-center"><span class="text-sum">10 <small>TRX</small></span> </td>
                        </tr>
                        <tr class="notranslate">
                            <td class="text-center"><img src="/img/trx.png" height="20" alt="trx"></td>
                            <td>TB1X8kinMtvA<span style="color: #ff5252;">***</span><br><small class="date">05 Jun 2024 - 14:43</small></td>
                            <td class="text-center"><span class="text-sum">10 <small>TRX</small></span> </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>