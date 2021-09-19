<?php


namespace lucasaba\RapidAPI\Request;


use lucasaba\RapidAPI\Entity\League;

class LeaguesRequest implements IRequest
{
    const ENDPOINT = '/leagues';

    private ?int $id = null;
    private ?string $name = null;
    private ?string $country = null;
    private ?string $code = null;
    private ?int $season = null;
    private ?int $team = null;
    private ?string $type = null;
    private ?bool $current = null;

    public function withId(int $id): LeaguesRequest
    {
        $this->id = $id;
        return $this;
    }

    public function withName(string $name): LeaguesRequest
    {
        $this->name = $name;
        return $this;
    }

    public function withCountry(string $country): LeaguesRequest
    {
        $this->country = $country;
        return $this;
    }

    public function withCode(string $code): LeaguesRequest
    {
        $this->code = $code;
        return $this;
    }

    public function withSeason(int $season): LeaguesRequest
    {
        $this->season = $season;
        return $this;
    }

    public function withTeam(int $teamId): LeaguesRequest
    {
        $this->team = $teamId;
        return $this;
    }

    public function withType(string $type): LeaguesRequest
    {
        if (!in_array($type, League::LEAGUE_TYPES)) {
            throw new \Exception('Invliad league type: '.$type);
        }
        $this->type = $type;
        return $this;
    }

    public function withCurrent(bool $current): LeaguesRequest
    {
        $this->current = $current;
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

        if ($this->country) {
            $query['country'] = $this->country;
        }

        if ($this->code) {
            $query['code'] = $this->code;
        }

        if ($this->season) {
            $query['season'] = $this->season;
        }

        if ($this->team) {
            $query['team'] = $this->team;
        }

        if ($this->type) {
            $query['type'] = $this->type;
        }

        if (null !== $this->current) {
            $query['current'] = $this->current;
        }

        return $query;
    }

    public function getEndpoint(): string
    {
        return self::ENDPOINT;
    }
}