<?php


namespace lucasaba\RapidAPI\Response;


use lucasaba\RapidAPI\Entity\Team;
use lucasaba\RapidAPI\Entity\Venue;

class TeamResponseElement
{
    private Team $team;
    private Venue $venue;

    /**
     * @return \lucasaba\RapidAPI\Entity\Team
     */
    public function getTeam(): Team
    {
        return $this->team;
    }

    /**
     * @return \lucasaba\RapidAPI\Entity\Venue
     */
    public function getVenue(): Venue
    {
        return $this->venue;
    }
}