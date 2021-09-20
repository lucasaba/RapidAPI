<?php


namespace lucasaba\RapidAPI\Response;



use lucasaba\RapidAPI\Entity\Fixture;
use lucasaba\RapidAPI\Entity\League;
use lucasaba\RapidAPI\Entity\MatchGoals;
use lucasaba\RapidAPI\Entity\MatchTeams;

class FixturesResponseElement
{
    private Fixture $fixture;
    private League $league;
    private MatchTeams $teams;
    private MatchGoals $goals;

    /**
     * @return \lucasaba\RapidAPI\Entity\Fixture
     */
    public function getFixture(): Fixture
    {
        return $this->fixture;
    }

    /**
     * @return \lucasaba\RapidAPI\Entity\League
     */
    public function getLeague(): League
    {
        return $this->league;
    }

    /**
     * @return \lucasaba\RapidAPI\Entity\MatchTeams
     */
    public function getTeams(): MatchTeams
    {
        return $this->teams;
    }

    /**
     * @return \lucasaba\RapidAPI\Entity\MatchGoals
     */
    public function getGoals(): MatchGoals
    {
        return $this->goals;
    }
}