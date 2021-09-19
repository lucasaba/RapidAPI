<?php


namespace lucasaba\RapidAPI\Request;


class CountriesRequest implements IRequest
{
    const ENDPOINT = '/countries';

    private ?string $name = null;
    private ?string $code = null;

    public function withCountryName(string $name): CountriesRequest
    {
        $this->name = $name;
        return $this;
    }

    public function withCountryCode(string $code): CountriesRequest
    {
        $this->code = $code;
        return $this;
    }

    public function getQuery(): array
    {
        $query = [];
        if ($this->name) {
            $query['name'] = $this->name;
        }

        if ($this->code) {
            $query['code'] = $this->code;
        }

        return $query;
    }

    public function getEndpoint(): string
    {
        return self::ENDPOINT;
    }
}