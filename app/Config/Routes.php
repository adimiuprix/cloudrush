<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'HomeController::index');
$routes->get('news', 'HomeController::news');
$routes->get('bounty', 'HomeController::bounty');
$routes->get('terms', 'HomeController::rules');
$routes->get('faq', 'HomeController::faq');
$routes->post('log_form', 'AuthorizeController::process');
$routes->get('ref', 'AuthorizeController::refflink');

$routes->group('', function($routes) {
    $routes->get('exit', 'AuthorizeController::session_flush');
    $routes->get('account', 'PanelController::account');
    $routes->get('collect', 'CollectController::collect');

    $routes->get('surf', 'PtcController::surf');
    $routes->get('surf/add', 'PtcController::surfAdd');
    $routes->post('surf_order', 'PtcController::surfOrder');
    $routes->get('surf/links', 'PtcController::surfLink');
    $routes->get('surf/view/(:num)', 'PtcController::surfView/$1');
    $routes->post('surf/verify/(:num)', 'PtcController::surfVerify/$1');

    $routes->get('bonus', 'PanelController::bonus');
    $routes->post('claim', 'ClaimController::claimRun');

    $routes->get('refs', 'PanelController::refs');
    $routes->get('deposit', 'PanelController::deposit');

    $routes->post('buy-plan', 'PaymentController::buyplan');
    $routes->get('payment', 'PaymentController::payment');  // Manual
    $routes->get('purchase-plan', 'PaymentController::purchase_api');  // API Payment Gateway

    $routes->get('withdraw', 'PanelController::withdraw');
    $routes->post('wd_request', 'WithdrawController::withdrawreq');
});

$routes->post('ccpayment', 'WebhookResolver\CcpaymentResolver::resolver');

$routes->get('admin', function () {
    return redirect()->route('admin/login');;
});

// Authentication admin routes
$routes->get('admin/login', 'Admin\AdminPanelController::login');
$routes->post('admin/session-check', 'Admin\AdminAuthController::sessionchecker');
$routes->get('admin/panel', 'Admin\AdminPanelController::index');

// Plans admin routes
$routes->get('admin/plan', 'Admin\AdminPlanController::plan_index');
$routes->match(['GET', 'POST'], 'admin/plan/create', 'Admin\AdminPlanController::plan_create');
$routes->match(['GET', 'POST'], 'admin/plan/edit/(:num)', 'Admin\AdminPlanController::plan_edit/$1');
$routes->post('admin/plan/delete/(:num)', 'Admin\AdminPlanController::plan_delete/$1');
$routes->match(['GET', 'POST'], 'admin/plan/freeplan', 'Admin\AdminPlanController::plan_free');

// Manage users routes admin
$routes->get('admin/user', 'Admin\AdminUserController::user_index');

// Gateway payment routes
$routes->match(['GET', 'POST'], 'admin/gateway', 'Admin\AdminGatewayController::gateway_index');
$routes->match(['GET', 'POST'], 'admin/gateway/ccpayment', 'Admin\AdminGatewayController::gateway_ccpayment');
$routes->match(['GET', 'POST'], 'admin/gateway/faucetpay', 'Admin\AdminGatewayController::gateway_faucetpay');

// Generall setting routes
$routes->match(['GET', 'POST'], 'admin/setting', 'Admin\AdminSettingController::setting_index');
$routes->match(['GET', 'POST'], 'admin/seo', 'Admin\AdminSettingController::setting_seo');

$routes->get('admin/faqs', 'Admin\AdminFaqsController::faqs_index');

// PTC admin routes
$routes->match(['GET', 'POST'], 'admin/ptc', 'Admin\AdminPtcController::ptc_index');
$routes->match(['GET', 'POST'], 'admin/ptc/active', 'Admin\AdminPtcController::ptc_active');
$routes->match(['GET', 'POST'], 'admin/ptc/completed', 'Admin\AdminPtcController::ptc_completed');
$routes->match(['GET', 'POST'], 'admin/ptc/setting', 'Admin\AdminPtcController::ptc_setting');

$routes->get('admin/about', 'Admin\AdminPanelController::about');