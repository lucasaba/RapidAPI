<?php

namespace lucasaba\RapidAPI\Request\Tests;

use lucasaba\RapidAPI\Entity\League;
use lucasaba\RapidAPI\Request\LeaguesRequest;
use PHPUnit\Framework\TestCase;

class LeaguesRequestTest extends TestCase
{
    public function testAddsId(): void
    {
        $request = new LeaguesRequest();
        $request->withId(11);

        $this->assertEquals(['id' => 11], $request->getQuery());
    }

    public function testAddsName(): void
    {
        $request = new LeaguesRequest();
        $request->withName('Test league name');

        $this->assertEquals(['name' => 'Test league name'], $request->getQuery());
    }

    public function testAddsCountryName(): void
    {
        $request = new LeaguesRequest();
        $request->withCountry('Test name');

        $this->assertEquals(['country' => 'Test name'], $request->getQuery());
    }

    public function testAddsCountryCode(): void
    {
        $request = new LeaguesRequest();
        $request->withCode('TT');

        $this->assertEquals(['code' => 'TT'], $request->getQuery());
    }

    public function testAddsSeason(): void
    {
        $request = new LeaguesRequest();
        $request->withSeason(2021);
        $this->assertEquals(['season' => 2021], $request->getQuery());
    }

    public function testAddsTeam(): void
    {
        $request = new LeaguesRequest();
        $request->withTeam(1);
        $this->assertEquals(['team' => 1], $request->getQuery());
    }

    public function testAddsType(): void
    {
        $request = new LeaguesRequest();
        $request->withType(League::LEAGUE_TYPE_CUP);
        $this->assertEquals(['type' => League::LEAGUE_TYPE_CUP], $request->getQuery());

        $request->withType(League::LEAGUE_TYPE_LEAGUE);
        $this->assertEquals(['type' => League::LEAGUE_TYPE_LEAGUE], $request->getQuery());

        $this->expectException(\Exception::class);
        $request->withType('invalid');
    }

    public function testAddsCurrent(): void
    {
        $request = new LeaguesRequest();
        $request->withCurrent(true);

        $this->assertEquals(['current' => true], $request->getQuery());
    }

    public function testAddsAll(): void
    {
        $request = new LeaguesRequest();
        $request->withId(1)
            ->withName('League name')
            ->withSeason(2021)
            ->withTeam(213)
            ->withCode('IT')
            ->withCountry('Italy')
            ->withType(League::LEAGUE_TYPE_LEAGUE)
            ->withCurrent(false);

        $this->assertEquals(
            [
                'id' => 1,
                'name' => 'League name',
                'season' => 2021,
                'team' => 213,
                'code' => 'IT',
                'country' => 'Italy',
                'type' => League::LEAGUE_TYPE_LEAGUE,
                'current' => false
            ],
            $request->getQuery()
        );
    }

    public function testEndpointIsReturnd()
    {
        $request = new LeaguesRequest();
        $this->assertEquals('/leagues', $request->getEndpoint());
    }
}
