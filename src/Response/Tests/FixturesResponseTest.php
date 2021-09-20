<?php

namespace lucasaba\RapidAPI\Response\Tests;

use JMS\Serializer\SerializerBuilder;
use lucasaba\RapidAPI\Response\FixturesResponse;
use PHPUnit\Framework\TestCase;

class FixturesResponseTest extends TestCase
{
    public function testCorrectlySerializeResponse(): void
    {
        $content = file_get_contents(__DIR__ . '/../../Tests/fixtures/fixtures.json');
        $serializer = SerializerBuilder::create()->build();
        /** @var FixturesResponse $result */
        $result = $serializer->deserialize($content, FixturesResponse::class, 'json');

        $this->assertEquals(60, $result->getResults());
        $this->assertEquals('fixtures', $result->getGet());
        $this->assertEquals(1, $result->getPaging()->getCurrent());
        $this->assertEquals(1, $result->getPaging()->getTotal());
    }

    public function testResponseElementsAreCorrect(): void
    {
        $content = file_get_contents(__DIR__ . '/../../Tests/fixtures/fixtures.json');
        $serializer = SerializerBuilder::create()->build();
        /** @var FixturesResponse $result */
        $result = $serializer->deserialize($content, FixturesResponse::class, 'json');

        /** @var \lucasaba\RapidAPI\Response\FixturesResponseElement $firstResult */
        $firstResult = $result->getResponse()[1];

        $teams = $firstResult->getTeams();
        $this->assertEquals($teams->getHome()->getName(), 'Cagliari');
        $this->assertEquals($teams->getAway()->getName(), 'Spezia');

        $fixture = $firstResult->getFixture();
        $this->assertEquals($fixture->getVenue()->getName(), 'Unipol Domus');
        $this->assertEquals($fixture->getStatus()->getShort(), 'FT');
        $this->assertEquals($fixture->getStatus()->getLong(), 'Match Finished');

        $league = $firstResult->getLeague();
        $this->assertEquals($league->getName(), 'Serie A');
        $this->assertEquals($league->getRound(), 'Regular Season - 1');

        $goals = $firstResult->getGoals();
        $this->assertEquals($goals->getHome(), 2);
        $this->assertEquals($goals->getAway(), 2);
    }
}
