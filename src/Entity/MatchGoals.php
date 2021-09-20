<?php


namespace lucasaba\RapidAPI\Entity;


class MatchGoals
{
    private ?int $home;
    private ?int $away;

    /**
     * @return int|null
     */
    public function getHome(): ?int
    {
        return $this->home;
    }

    /**
     * @return int
     */
    public function getAway(): ?int
    {
        return $this->away;
    }
}