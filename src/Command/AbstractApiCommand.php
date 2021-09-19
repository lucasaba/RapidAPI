<?php


namespace lucasaba\RapidAPI\Command;


use JMS\Serializer\SerializerBuilder;
use lucasaba\RapidAPI\Infra\Client;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\HttpClient\HttpClient;

abstract class AbstractApiCommand extends Command
{
    public function getClient(string $token)
    {
        $serializer = SerializerBuilder::create()->build();
        return new Client(HttpClient::create(), $serializer, $token);
    }
}