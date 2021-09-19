<?php


namespace lucasaba\RapidAPI\Entity;


class Fixture
{
    private int $id;
    private ?string $referee;
    private string $timezone;
    private \DateTimeImmutable $date;
    private int $timestamp;
    private Period $period;
    private Venue $venue;
    private Status $status;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getReferee(): ?string
    {
        return $this->referee;
    }

    /**
     * @return string
     */
    public function getTimezone(): string
    {
        return $this->timezone;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getDate(): \DateTimeImmutable
    {
        return $this->date;
    }

    /**
     * @return int
     */
    public function getTimestamp(): int
    {
        return $this->timestamp;
    }

    /**
     * @return \lucasaba\RapidAPI\Entity\Period
     */
    public function getPeriod(): Period
    {
        return $this->period;
    }

    /**
     * @return \lucasaba\RapidAPI\Entity\Venue
     */
    public function getVenue(): Venue
    {
        return $this->venue;
    }

    /**
     * @return \lucasaba\RapidAPI\Entity\Status
     */
    public function getStatus(): Status
    {
        return $this->status;
    }
}