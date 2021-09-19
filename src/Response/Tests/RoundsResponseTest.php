<?php

namespace lucasaba\RapidAPI\Response\Tests;

use JMS\Serializer\SerializerBuilder;
use lucasaba\RapidAPI\Response\RoundsResponse;
use PHPUnit\Framework\TestCase;

class RoundsResponseTest extends TestCase
{
    public function testCorrectlySerializeResponse(): void
    {
        $content = file_get_contents(__DIR__ . '/../../Tests/fixtures/rounds.json');
        $serializer = SerializerBuilder::create()->build();
        /** @var RoundsResponse $result */
        $result = $serializer->deserialize($content, RoundsResponse::class, 'json');

        $this->assertEquals(38, $result->getResults());
        $this->assertEquals('fixtures/rounds', $result->getGet());
        $this->assertEquals(1, $result->getPaging()->getCurrent());
        $this->assertEquals(1, $result->getPaging()->getTotal());
    }
}
