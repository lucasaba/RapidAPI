<?php


namespace lucasaba\RapidAPI\Entity;


class Status
{
    private string $long;
    private string $short;
    private ?int $elapsed;

    /**
     * @return string
     */
    public function getLong(): string
    {
        return $this->long;
    }

    /**
     * @return string
     */
    public function getShort(): string
    {
        return $this->short;
    }

    /**
     * @return int|null
     */
    public function getElapsed(): ?int
    {
        return $this->elapsed;
    }
}