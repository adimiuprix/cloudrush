<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('news', 'Home::news');
$routes->get('bounty', 'Home::bounty');
$routes->get('terms', 'Home::rules');
$routes->get('faq', 'Home::faq');
$routes->get('account', 'Panel::account');
$routes->get('surf', 'Panel::surf');
$routes->get('surf/add', 'Panel::surfAdd');
$routes->get('surf/links', 'Panel::surfLink');
$routes->get('bonus', 'Panel::bonus');
$routes->get('refs', 'Panel::refs');
$routes->get('deposit', 'Panel::deposit');
$routes->get('payment', 'Panel::payment');
$routes->get('withdraw', 'Panel::withdraw');