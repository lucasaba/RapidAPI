<?php


namespace lucasaba\RapidAPI\Request;


class TeamsRequest implements IRequest
{
    const ENDPOINT = '/teams';

    private ?int $id = null;
    private ?string $name = null;
    private ?int $league = null;
    private ?int $season = null;
    private ?string $country = null;

    public function withId(int $id): TeamsRequest
    {
        $this->id = $id;
        return $this;
    }

    public function withName(string $name): TeamsRequest
    {
        $this->name = $name;
        return $this;
    }

    public function withLeague(int $leagueId): TeamsRequest
    {
        $this->league = $leagueId;
        return $this;
    }

    public function withCountry(string $country): TeamsRequest
    {
        $this->country = $country;
        return $this;
    }

    public function withSeason(int $season): TeamsRequest
    {
        $this->season = $season;
        return $this;
    }

    public function getQuery(): array
    {
        $query = [];
        if ($this->id) {
            $query['id'] = $this->id;
        }

        if ($this->name) {
            $query['name'] = $this->name;
        }

        if ($this->league) {
            $query['league'] = $this->league;
        }

        if ($this->country) {
            $query['country'] = $this->country;
        }

        if ($this->season) {
            $query['season'] = $this->season;
        }

        return $query;
    }

    public function getEndpoint(): string
    {
        return self::ENDPOINT;
    }
}