<?php


namespace lucasaba\RapidAPI\Infra;


use JMS\Serializer\SerializerInterface;
use lucasaba\RapidAPI\Request\IRequest;
use lucasaba\RapidAPI\Response\Response;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class Client implements IClient
{
    const BASE_URI = 'https://v3.football.api-sports.io';
    const RAPID_HOST = 'v3.football.api-sports.io';

    private HttpClientInterface $httpClient;
    private SerializerInterface $serializer;

    public function __construct(HttpClientInterface $httpClient, SerializerInterface $serializer, string $apiKey)
    {
        $this->httpClient = $httpClient->withOptions([
            'base_uri' => self::BASE_URI,
            'headers' => [
                'x-rapidapi-host' => self::RAPID_HOST,
                'x-rapidapi-key' => $apiKey
            ]
        ]);

        $this->serializer = $serializer;
    }

    public function get(IRequest $request, string $serializerClass): Response
    {
        $response = $this->httpClient->request('GET', $request->getEndpoint(), ['query' => $request->getQuery()]);

        return $this->serializer->deserialize($response->getContent(), $serializerClass, 'json');
    }
}