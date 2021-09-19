<?php


namespace lucasaba\RapidAPI\Response;


use JMS\Serializer\Annotation as Serializer;

class LeaguesResponse extends Response
{
    /**
     * @var \lucasaba\RapidAPI\Response\LeagueResponseElement[]
     * @Serializer\Type("array<lucasaba\RapidAPI\Response\LeagueResponseElement>")
     */
    protected array $response;
}