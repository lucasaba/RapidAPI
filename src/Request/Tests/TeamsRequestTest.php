<?php

namespace lucasaba\RapidAPI\Request\Tests;

use lucasaba\RapidAPI\Request\TeamsRequest;
use PHPUnit\Framework\TestCase;

class TeamsRequestTest extends TestCase
{
    public function testAddsId(): void
    {
        $request = new TeamsRequest();
        $request->withId(11);

        $this->assertEquals(['id' => 11], $request->getQuery());
    }

    public function testAddsName(): void
    {
        $request = new TeamsRequest();
        $request->withName('Test league name');

        $this->assertEquals(['name' => 'Test league name'], $request->getQuery());
    }

    public function testAddsLeague(): void
    {
        $request = new TeamsRequest();
        $request->withLeague(123);

        $this->assertEquals(['league' => 123], $request->getQuery());
    }

    public function testAddsCountryName(): void
    {
        $request = new TeamsRequest();
        $request->withCountry('Test name');

        $this->assertEquals(['country' => 'Test name'], $request->getQuery());
    }

    public function testAddsSeason(): void
    {
        $request = new TeamsRequest();
        $request->withSeason(2021);
        $this->assertEquals(['season' => 2021], $request->getQuery());
    }

    public function testAddsAll(): void
    {
        $request = new TeamsRequest();
        $request->withId(1)
            ->withName('Team name')
            ->withSeason(2021)
            ->withLeague(213)
            ->withCountry('Italy');

        $this->assertEquals(
            [
                'id' => 1,
                'name' => 'Team name',
                'season' => 2021,
                'league' => 213,
                'country' => 'Italy',
            ],
            $request->getQuery()
        );
    }

    public function testEndpointIsReturned()
    {
        $request = new TeamsRequest();
        $this->assertEquals('/teams', $request->getEndpoint());
    }
}
