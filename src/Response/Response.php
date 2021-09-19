<?php


namespace lucasaba\RapidAPI\Response;


use lucasaba\RapidAPI\Entity\Paging;

abstract class Response
{
    private string $get;
    private int $results;
    private Paging $paging;
    protected array $response;

    /**
     * @return string
     */
    public function getGet(): string
    {
        return $this->get;
    }

    /**
     * @return int
     */
    public function getResults(): int
    {
        return $this->results;
    }

    /**
     * @return \lucasaba\RapidAPI\Entity\Paging
     */
    public function getPaging(): Paging
    {
        return $this->paging;
    }

    /**
     * @return array
     */
    public function getResponse(): array
    {
        return $this->response;
    }
}