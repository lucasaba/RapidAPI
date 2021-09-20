#!/usr/bin/env php
<?php

require __DIR__.'/../vendor/autoload.php';

use lucasaba\RapidAPI\Command\CountriesCommand;
use lucasaba\RapidAPI\Command\FixturesCommand;
use lucasaba\RapidAPI\Command\LeaguesCommand;
use lucasaba\RapidAPI\Command\TeamsCommand;
use Symfony\Component\Console\Application;

$application = new Application();

$application->add(new CountriesCommand());
$application->add(new LeaguesCommand());
$application->add(new TeamsCommand());
$application->add(new FixturesCommand());

$application->run();