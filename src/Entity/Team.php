<?php


namespace lucasaba\RapidAPI\Entity;


class Team
{
    private int $id;
    private string $name;
    private string $country;
    private int $founded;
    private bool $national;
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
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @return int
     */
    public function getFounded(): int
    {
        return $this->founded;
    }

    /**
     * @return bool
     */
    public function isNational(): bool
    {
        return $this->national;
    }

    /**
     * @return string
     */
    public function getLogo(): string
    {
        return $this->logo;
    }
}