<?php
/*
 * psalmody
 *
 * Copyright (c) 2018 Christoph Fischer, https://christoph-fischer.org
 * Author: Christoph Fischer, chris@toph.de
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

require_once ('vendor/autoload.php');

define('CADRE_debug', true);

\Peregrinus\Cadre\Framework::setConstants('Psalmody', ['version' => '0.1', 'basePath' => __DIR__, 'namespace' => 'Peregrinus\\Psalmody\\']);
\Peregrinus\Cadre\Logger::initialize();

error_reporting(error_reporting() & ~E_NOTICE);

// get some global config
$configurationManager = \Peregrinus\Cadre\ConfigurationManager::getInstance();
$config = $configurationManager->getConfigurationSet(CADRE_app);

// set locale?
if (isset($config['locale'])) setlocale (LC_ALL, $config['locale']);

// get a router and process request
$router = \Peregrinus\Cadre\Router::getInstance();
$router->setDefaultController('psalm');
$router->dispatch();
