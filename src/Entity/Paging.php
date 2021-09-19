<?php


namespace lucasaba\RapidAPI\Entity;


class Paging
{
    private int $current;
    private int $total;

    /**
     * @return int
     */
    public function getCurrent(): int
    {
        return $this->current;
    }

    /**
     * @return int
     */
    public function getTotal(): int
    {
        return $this->total;
    }
}