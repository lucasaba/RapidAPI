<?php

namespace lucasaba\RapidAPI\Request\Tests;

use lucasaba\RapidAPI\Request\RoundsRequest;
use PHPUnit\Framework\TestCase;

class RoundsRequestTest extends TestCase
{
    public function testCanGetParameters(): void
    {
        $request = new RoundsRequest(123, 2021);
        $this->assertEquals(['league' => 123, 'season' => 2021], $request->getQuery());
        $this->assertEquals('/fixtures/rounds', $request->getEndpoint());
    }
}
