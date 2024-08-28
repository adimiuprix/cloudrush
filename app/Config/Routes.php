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
    $routes->get('surf', 'PanelController::surf');
    $routes->get('surf/add', 'PanelController::surfAdd');
    $routes->get('surf/links', 'PanelController::surfLink');

    $routes->get('bonus', 'PanelController::bonus');
    $routes->post('claim', 'ClaimController::claimRun');

    $routes->get('refs', 'PanelController::refs');
    $routes->get('deposit', 'PanelController::deposit');
    $routes->get('payment', 'PanelController::payment');
    $routes->get('withdraw', 'PanelController::withdraw');
});