<?php


namespace lucasaba\RapidAPI\Entity;


class Country
{
    private string $name;
    private ?string $code;
    private ?string $flag;

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
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getFlag(): ?string
    {
        return $this->flag;
    }
}