<?php


namespace lucasaba\RapidAPI\Response;


use JMS\Serializer\Annotation as Serializer;

class TeamsResponse extends Response
{
    /**
     * @var \lucasaba\RapidAPI\Response\TeamResponseElement[]
     * @Serializer\Type("array<lucasaba\RapidAPI\Response\TeamResponseElement>")
     */
    protected array $response;
}