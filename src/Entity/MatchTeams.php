<?php


namespace lucasaba\RapidAPI\Entity;


class MatchTeams
{
    private MatchTeam $home;
    private MatchTeam $away;

    /**
     * @return \lucasaba\RapidAPI\Entity\MatchTeam
     */
    public function getHome(): MatchTeam
    {
        return $this->home;
    }

    /**
     * @return \lucasaba\RapidAPI\Entity\MatchTeam
     */
    public function getAway(): MatchTeam
    {
        return $this->away;
    }
}