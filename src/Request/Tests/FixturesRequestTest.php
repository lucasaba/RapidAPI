<?php

namespace lucasaba\RapidAPI\Request\Tests;

use lucasaba\RapidAPI\Request\FixturesRequest;
use PHPUnit\Framework\TestCase;

class FixturesRequestTest extends TestCase
{
    public function testAddsAll(): void
    {
        $request = new FixturesRequest(2021);
        $request->withId(1)
            ->withLeague(2)
            ->withTeam(3)
            ->withDate('2021-01-01')
            ->withDateFrom('2021-01-01')
            ->withDateTo('2021-01-01')
            ->withRound('Round 1');

        $this->assertEquals(
            [
                'id' => 1,
                'season' => 2021,
                'league' => 2,
                'team' => 3,
                'date' => '2021-01-01',
                'from' => '2021-01-01',
                'to' => '2021-01-01',
                'round' => 'Round 1',
            ],
            $request->getQuery()
        );
    }

    public function testEndpointIsReturned()
    {
        $request = new FixturesRequest();
        $this->assertEquals('/fixtures', $request->getEndpoint());
    }
}
