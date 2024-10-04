<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Main::baseRaceInfo');
$routes->get('RacedYears/(:num)', "Main::getYearInfo/$1");
$routes->get("RaceStages/(:num)", "Main::getRacedStages/$1");

