<?php


namespace lucasaba\RapidAPI\Entity;


class MatchGoals
{
    private int $home;
    private int $away;

    /**
     * @return int
     */
    public function getHome(): int
    {
        return $this->home;
    }

    /**
     * @return int
     */
    public function getAway(): int
    {
        return $this->away;
    }
}