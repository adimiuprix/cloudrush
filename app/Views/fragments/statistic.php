<div class="row text-uppercase mb-4">
    <div class="col-md-6 col-lg-3">
        <div class="st">
            <div class="pulse-st2"></div>
            <div class="stat2"> <b class="st-count"><?= esc($web_stats['total_user']); ?> </b></div>
            <div class="st-title"><i class="fa fa-users"></i> Users</div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="st">
            <div class="pulse-st2"></div>
            <div class="stat2"> <b class="st-count"><?= esc($web_stats['total_deposit']); ?> <small class="notranslate"><?= $crypto['curr_code'];?></small> </b></div>
            <div class="st-title"><i class="fa fa-briefcase"></i> Deposits</div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="st">
            <div class="pulse-st2"></div>
            <div class="stat2"> <b class="st-count"><?= esc($web_stats['total_withdraw']); ?> <small class="notranslate"><?= $crypto['curr_code'];?></small> </b></div>
            <div class="st-title"><i class="fa fa-money-bill"></i> paid out</div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="st">
            <div class="pulse-st2"></div>
            <div class="stat2"> <b class="st-count"><?= esc($web_stats['online_day']); ?></b></div>
            <div class="st-title"><i class="fa fa-clock"></i> Days online</div>
        </div>
    </div>
</div>
