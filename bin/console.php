#!/usr/bin/env php
<?php

require __DIR__.'/../vendor/autoload.php';

use lucasaba\RapidAPI\Command\CountriesCommand;
use lucasaba\RapidAPI\Command\LeaguesCommand;
use Symfony\Component\Console\Application;

$application = new Application();

$application->add(new CountriesCommand());
$application->add(new LeaguesCommand());

$application->run();