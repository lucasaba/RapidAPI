<?php


namespace lucasaba\RapidAPI\Entity;


class Period
{
    private ?int $first;
    private ?int $second;

    /**
     * @return int|null
     */
    public function getFirst(): ?int
    {
        return $this->first;
    }

    /**
     * @return int|null
     */
    public function getSecond(): ?int
    {
        return $this->second;
    }
}