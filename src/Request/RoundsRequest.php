<?php


namespace lucasaba\RapidAPI\Request;


class RoundsRequest implements IRequest
{
    const ENDPOINT = '/fixtures/rounds';

    private int $league;
    private int $season;

    public function __construct(int $league, int $season)
    {
        $this->league = $league;
        $this->season = $season;
    }

    public function getQuery(): array
    {
        return [
            'league' => $this->league,
            'season' => $this->season,
        ];
    }

    public function getEndpoint(): string
    {
        return self::ENDPOINT;
    }
}