<?php


namespace lucasaba\RapidAPI\Response;


use lucasaba\RapidAPI\Entity\Country;
use lucasaba\RapidAPI\Entity\League;

class LeagueResponseElement
{
    private League $league;
    private Country $country;
    /**
     * @var \lucasaba\RapidAPI\Entity\Season[]
     */
    private array $seasons;

    /**
     * @return \lucasaba\RapidAPI\Entity\League
     */
    public function getLeague(): League
    {
        return $this->league;
    }

    /**
     * @return \lucasaba\RapidAPI\Entity\Country
     */
    public function getCountry(): Country
    {
        return $this->country;
    }

    /**
     * @return \lucasaba\RapidAPI\Entity\Season[]
     */
    public function getSeasons(): array
    {
        return $this->seasons;
    }
}