<?php


namespace lucasaba\RapidAPI\Entity;


class MatchTeam
{
    private int $id;
    private string $name;
    private string $logo;
    private bool $winner;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getLogo(): string
    {
        return $this->logo;
    }

    /**
     * @return bool
     */
    public function isWinner(): bool
    {
        return $this->winner;
    }
}