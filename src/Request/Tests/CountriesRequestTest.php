<?php

namespace lucasaba\RapidAPI\Request\Tests;

use lucasaba\RapidAPI\Request\CountriesRequest;
use PHPUnit\Framework\TestCase;

class CountriesRequestTest extends TestCase
{
    public function testAddsCountryName(): void
    {
        $request = new CountriesRequest();
        $request->withCountryName('Test name');

        $this->assertEquals(['name' => 'Test name'], $request->getQuery());
    }

    public function testAddsCountryCode(): void
    {
        $request = new CountriesRequest();
        $request->withCountryCode('TT');

        $this->assertEquals(['code' => 'TT'], $request->getQuery());
    }

    public function testAddsBothCountryCodeAndName(): void
    {
        $request = new CountriesRequest();
        $request->withCountryCode('TT')->withCountryName('TestName');

        $this->assertEquals(['code' => 'TT', 'name' => 'TestName'], $request->getQuery());
    }

    public function testEndpointIsReturned()
    {
        $request = new CountriesRequest();
        $this->assertEquals('/countries', $request->getEndpoint());
    }
}
