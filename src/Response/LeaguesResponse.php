<?php


namespace lucasaba\RapidAPI\Response;


use lucasaba\RapidAPI\Entity\Country;
use lucasaba\RapidAPI\Entity\League;

class LeaguesResponse extends Response
{
    /**
     * @var \lucasaba\RapidAPI\Response\LeagueResponseElement[]
     */
    protected array $response;
}