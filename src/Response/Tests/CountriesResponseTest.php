<?php

namespace lucasaba\RapidAPI\Response\Tests;

use JMS\Serializer\SerializerBuilder;
use lucasaba\RapidAPI\Response\CountriesResponse;
use PHPUnit\Framework\TestCase;

class CountriesResponseTest extends TestCase
{
    public function testCorrectlySerializeResponse()
    {
        $content = file_get_contents(__DIR__ . '/../../Tests/fixtures/countries.json');
        $serializer = SerializerBuilder::create()->build();
        /** @var CountriesResponse $result */
        $result = $serializer->deserialize($content, CountriesResponse::class, 'json');

        $this->assertEquals(163, $result->getResults());
        $this->assertEquals('countries', $result->getGet());
        $this->assertEquals(1, $result->getPaging()->getCurrent());
        $this->assertEquals(1, $result->getPaging()->getTotal());
    }
}
