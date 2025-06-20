<!-- Menu Side -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="" class="app-brand-link">
            <span class="app-brand-text demo menu-text fw-semibold ms-2">Admin Page</span>
        </a>
        <a href="" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="menu-toggle-icon d-xl-block align-middle"></i>
        </a>
    </div>
    <div class="menu-inner-shadow"></div>
    <ul class="menu-inner py-1">
        <li class="menu-item active">
            <a href="<?= base_url('admin/panel'); ?>" class="menu-link">
                <i class="menu-icon tf-icons ri-home-smile-line"></i>
                <div>Panel</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ri-luggage-deposit-line"></i>
                <div>Plans</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="<?= base_url('admin/plan');?>" class="menu-link">
                        <div>All Plans</div>
                    </a>
                    <a href="<?= base_url('admin/plan/create');?>" class="menu-link">
                        <div>Create plan</div>
                    </a>
                    <a href="<?= base_url('admin/plan/freeplan');?>" class="menu-link">
                        <div>Free plan management</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ri-file-user-line"></i>
                <div>Users</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="<?= base_url('admin/user');?>" class="menu-link">
                        <div>All users</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ri-news-line"></i>
                <div>News</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="" class="menu-link">
                        <div>News management</div>
                    </a>
                    <a href="" class="menu-link">
                        <div>Create news</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ri-secure-payment-line"></i>
                <div>Payment Methods</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="<?= base_url('admin/gateway')?>" class="menu-link">
                        <div>Gateway setting</div>
                    </a>
                    <a href="<?= base_url('admin/gateway')?>" class="menu-link">
                        <div>Manual</div>
                    </a>
                    <a href="<?= base_url('admin/gateway/ccpayment')?>" class="menu-link">
                        <div>Ccpayment</div>
                    </a>
                    <a href="<?= base_url('admin/gateway/faucetpay')?>" class="menu-link">
                        <div>Faucetpay</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="<?= base_url('admin/faqs'); ?>" class="menu-link">
                <i class="menu-icon tf-icons ri-question-answer-line"></i>
                <div>FAQs</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ri-bar-chart-box-line"></i>
                <div>Statistics</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="<?= base_url('admin/ptc'); ?>" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ri-money-dollar-box-line"></i>
                <div>PTC</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="<?= base_url('admin/ptc')?>" class="menu-link">
                        <div>All Ptc</div>
                    </a>
                    <a href="<?= base_url('admin/ptc/active')?>" class="menu-link">
                        <div>Ptc Active</div>
                    </a>
                    <a href="<?= base_url('admin/ptc/completed')?>" class="menu-link">
                        <div>Ptc Completed</div>
                    </a>
                    <a href="<?= base_url('admin/ptc/setting')?>" class="menu-link">
                        <div>Ptc Setting</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ri-settings-2-line"></i>
                <div>Setting</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="<?= base_url('admin/setting'); ?>" class="menu-link">
                        <div>Generall setting</div>
                    </a>
                    <a href="<?= base_url('admin/seo')?>" class="menu-link">
                        <div>SEO</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ri-history-line"></i>
                <div>Fake History</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="<?= base_url('admin/about')?>" class="menu-link">
                <i class="menu-icon tf-icons ri-info-i"></i>
                <div>About App</div>
            </a>
        </li>
    </ul>
</aside>
<!-- / Menu Side -->