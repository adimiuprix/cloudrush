<?= $this->extend('fragments/layout') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-lg-6 order-1 order-lg-2">
        <div class="wrapper mt-0">

            <?= $this->include('fragments/menu.php'); ?>

            <div class="content">
                <div class="content-user">

                    <?= $this->include('fragments/surf_menu.php'); ?>

                    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                    <!-- Page content -->
                    <div class="p-2">
                        <div class="about text-center text-uppercase">
                            <b>You do not have any active links </b><br>You can add links for advertising.
                            <hr>
                            <a class="btn btn-lg btn-danger" href="/user/surf/add">Add link</a>
                        </div>
                        <div class="row">
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