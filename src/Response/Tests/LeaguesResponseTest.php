<?php

namespace lucasaba\RapidAPI\Response\Tests;

use JMS\Serializer\SerializerBuilder;
use lucasaba\RapidAPI\Response\CountriesResponse;
use lucasaba\RapidAPI\Response\LeaguesResponse;
use PHPUnit\Framework\TestCase;

class LeaguesResponseTest extends TestCase
{
    public function testCorrectlySerializeResponse(): void
    {
        $content = file_get_contents(__DIR__ . '/../../Tests/fixtures/leagues.json');
        $serializer = SerializerBuilder::create()->build();
        /** @var CountriesResponse $result */
        $result = $serializer->deserialize($content, LeaguesResponse::class, 'json');

        $this->assertEquals(488, $result->getResults());
        $this->assertEquals('leagues', $result->getGet());
        $this->assertEquals(1, $result->getPaging()->getCurrent());
        $this->assertEquals(1, $result->getPaging()->getTotal());
    }

    public function testResponseElementsAreCorrect(): void
    {
        $content = file_get_contents(__DIR__ . '/../../Tests/fixtures/leagues.json');
        $serializer = SerializerBuilder::create()->build();
        /** @var CountriesResponse $result */
        $result = $serializer->deserialize($content, LeaguesResponse::class, 'json');

        /** @var \lucasaba\RapidAPI\Response\LeagueResponseElement $firstResult */
        $firstResult = $result->getResponse()[0];

        $country = $firstResult->getCountry();
        $this->assertEquals($country->getName(), 'Nicaragua');
        $this->assertEquals($country->getCode(), 'NI');
        $this->assertEquals($country->getFlag(), 'https://media.api-sports.io/flags/ni.svg');

        $league = $firstResult->getLeague();
        $this->assertEquals($league->getName(), 'Liga Primera U20');

        $season = $firstResult->getSeasons()[0];
        $this->assertEquals($season->getYear(), 2021);
        $this->assertEquals($season->isCurrent(), false);
    }
}
