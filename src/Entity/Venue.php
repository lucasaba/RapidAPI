<?php


namespace lucasaba\RapidAPI\Entity;


class Venue
{
    private ?int $id;
    private ?string $name;
    private ?string $city;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function getCity(): ?string
    {
        return $this->city;
    }
}