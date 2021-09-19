<?php

namespace lucasaba\RapidAPI\Response\Tests;

use JMS\Serializer\SerializerBuilder;
use lucasaba\RapidAPI\Response\TeamsResponse;
use PHPUnit\Framework\TestCase;

class TeamsResponseTest extends TestCase
{
    public function testCorrectlySerializeResponse(): void
    {
        $content = file_get_contents(__DIR__ . '/../../Tests/fixtures/teams.json');
        $serializer = SerializerBuilder::create()->build();
        /** @var TeamsResponse $result */
        $result = $serializer->deserialize($content, TeamsResponse::class, 'json');

        $this->assertEquals(20, $result->getResults());
        $this->assertEquals('teams', $result->getGet());
        $this->assertEquals(1, $result->getPaging()->getCurrent());
        $this->assertEquals(1, $result->getPaging()->getTotal());
    }

    public function testResponseElementsAreCorrect(): void
    {
        $content = file_get_contents(__DIR__ . '/../../Tests/fixtures/teams.json');
        $serializer = SerializerBuilder::create()->build();
        /** @var TeamsResponse $result */
        $result = $serializer->deserialize($content, TeamsResponse::class, 'json');

        /** @var \lucasaba\RapidAPI\Response\TeamResponseElement $firstResult */
        $firstResult = $result->getResponse()[3];

        $team = $firstResult->getTeam();
        $this->assertEquals($team->getName(), 'Cagliari');
        $this->assertEquals($team->getCountry(), 'Italy');
        $this->assertEquals($team->getId(), 490);
        $this->assertEquals($team->getFounded(), 1920);
        $this->assertEquals($team->isNational(), false);
        $this->assertEquals($team->getLogo(), 'https://media.api-sports.io/football/teams/490.png');

        $venue = $firstResult->getVenue();
        $this->assertEquals($venue->getName(), 'Unipol Domus');
        $this->assertEquals($venue->getCity(), 'Cagliari');
        $this->assertEquals($venue->getId(), 12275);
    }
}
