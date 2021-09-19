<?php


namespace lucasaba\RapidAPI\Response;


use JMS\Serializer\Annotation as Serializer;

class CountriesResponse extends Response
{
    /**
     * @var \lucasaba\RapidAPI\Entity\Country[]
     * @Serializer\Type("array<lucasaba\RapidAPI\Entity\Country>")
     */
    protected array $response;
}