<?php

namespace lucasaba\RapidAPI\Request\Tests;

use lucasaba\RapidAPI\Request\CountriesRequest;
use PHPUnit\Framework\TestCase;

class CountriesRequestTest extends TestCase
{
    public function testAddsCountryName()
    {
        $request = new CountriesRequest();
        $request->withCountryName('Test name');

        $this->assertEquals(['name' => 'Test name'], $request->getQuery());
    }

    public function testAddsCountryCode()
    {
        $request = new CountriesRequest();
        $request->withCountryCode('TT');

        $this->assertEquals(['code' => 'TT'], $request->getQuery());
    }

    public function testAddsBothCountryCOdeAndName()
    {
        $request = new CountriesRequest();
        $request->withCountryCode('TT')->withCountryName('TestName');

        $this->assertEquals(['code' => 'TT', 'name' => 'TestName'], $request->getQuery());
    }
}
