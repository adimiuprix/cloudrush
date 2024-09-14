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

$routes->group('', function($routes) {
    $routes->get('exit', 'AuthorizeController::session_flush');
    $routes->get('account', 'PanelController::account');
    $routes->get('collect', 'CollectController::collect');

    $routes->get('surf', 'PtcController::surf');
    $routes->get('surf/add', 'PtcController::surfAdd');
    $routes->post('surf_order', 'PtcController::surfOrder');
    $routes->get('surf/links', 'PtcController::surfLink');

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