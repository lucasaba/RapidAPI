<?php


namespace lucasaba\RapidAPI\Request;


class FixturesRequest implements IRequest
{
    const ENDPOINT = '/fixtures';

    private ?int $id = null; // The id of the fixture
    private ?string $date = null; // string YYYY-MM-DD
    private ?int $league = null; // The id of the league
    private int $season; // The season of the league
    private ?int $team = null; // The id of the team
    private ?string $from = null; // string YYYY-MM-DD
    private ?string $to = null; // string YYYY-MM-DD
    private ?string $round = null; // The round of the fixture

    public function __construct(int $season = null)
    {
        $this->season = $season ?? date('Y');
    }

    public function withId(int $id): FixturesRequest
    {
        $this->id = $id;
        return $this;
    }

    public function withDate(string $date): FixturesRequest
    {
        $this->date = $date;
        return $this;
    }

    public function withSeason(int $season): FixturesRequest
    {
        $this->season = $season;
        return $this;
    }

    public function withLeague(int $leagueId): FixturesRequest
    {
        $this->league = $leagueId;
        return $this;
    }

    public function withTeam(int $teamId): FixturesRequest
    {
        $this->team = $teamId;
        return $this;
    }

    public function withDateFrom(string $dateFrom): FixturesRequest
    {
        $this->from = $dateFrom;
        return $this;
    }

    public function withDateTo(string $dateTo): FixturesRequest
    {
        $this->to = $dateTo;
        return $this;
    }

    public function withRound(string $round): FixturesRequest
    {
        $this->round = $round;
        return $this;
    }

    public function getQuery(): array
    {
        $query = [];
        if ($this->id) {
            $query['id'] = $this->id;
        }

        if ($this->date) {
            $query['date'] = $this->date;
        }

        if ($this->league) {
            $query['league'] = $this->league;
        }

        if ($this->season) {
            $query['season'] = $this->season;
        }

        if ($this->team) {
            $query['team'] = $this->team;
        }

        if ($this->from) {
            $query['from'] = $this->from;
        }

        if ($this->to) {
            $query['to'] = $this->to;
        }

        if ($this->round) {
            $query['round'] = $this->round;
        }

        return $query;
    }

    public function getEndpoint(): string
    {
        return self::ENDPOINT;
    }
}