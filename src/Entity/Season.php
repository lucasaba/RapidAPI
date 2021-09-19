<?php


namespace lucasaba\RapidAPI\Entity;


use JMS\Serializer\Annotation as Serializer;

class Season
{
    private int $year;
    /**
     * @var \DateTimeImmutable
     * @Serializer\Type("DateTimeImmutable<'Y-m-d'>")
     */
    private \DateTimeImmutable $start;
    /**
     * @var \DateTimeImmutable
     * @Serializer\Type("DateTimeImmutable<'Y-m-d'>")
     */
    private \DateTimeImmutable $end;
    private bool $current;

    /**
     * @return int
     */
    public function getYear(): int
    {
        return $this->year;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getStart(): \DateTimeImmutable
    {
        return $this->start;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getEnd(): \DateTimeImmutable
    {
        return $this->end;
    }

    /**
     * @return bool
     */
    public function isCurrent(): bool
    {
        return $this->current;
    }
}