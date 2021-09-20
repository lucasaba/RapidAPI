<?php


namespace lucasaba\RapidAPI\Response;


use JMS\Serializer\Annotation as Serializer;

class FixturesResponse extends Response
{
    /**
     * @var \lucasaba\RapidAPI\Response\FixturesResponseElement[]
     * @Serializer\Type("array<lucasaba\RapidAPI\Response\FixturesResponseElement>")
     */
    protected array $response;
}