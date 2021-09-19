<?php


namespace lucasaba\RapidAPI\Entity;


class League
{
    public const LEAGUE_TYPE_LEAGUE = 'league';
    public const LEAGUE_TYPE_CUP = 'cup';
    public const LEAGUE_TYPES = [self::LEAGUE_TYPE_LEAGUE, self::LEAGUE_TYPE_CUP];

    private int $id;
    private string $name;
    private string $type;
    private string $logo;

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
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getLogo(): string
    {
        return $this->logo;
    }
}