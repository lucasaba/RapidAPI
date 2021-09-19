<?php


namespace lucasaba\RapidAPI\Response;


use JMS\Serializer\Annotation as Serializer;

class RoundsResponse extends Response
{
    /**
     * @var string[]
     * @Serializer\Type("array<string>")
     */
    protected array $response;
}