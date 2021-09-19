<?php


namespace lucasaba\RapidAPI\Request;


interface IRequest
{
    public function getEndpoint(): string;
    public function getQuery(): array;
}