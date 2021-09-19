![UnitTests](https://github.com/lucasaba/RapidAPI/actions/workflows/unit-tests.yml/badge.svg)

# RapidAPI - PHP Soccer client

[RapidAPI](https://rapidapi.com/hub) offers different kind of api information.

This library is a PHP client for (some) of the [Soccer API](https://rapidapi.com/api-sports/api/api-football/)
v3.

## Installation

...package to be published

## Usage

In order to use this library you need to create a [Client](src/Infra/Client.php)

The client needs a [HttpClientInterface](https://github.com/symfony/symfony/blob/5.4/src/Symfony/Contracts/HttpClient/HttpClientInterface.php),
a [serializer](https://github.com/schmittjoh/JMSSerializerBundle) and the API Token:

```php
$serializer = SerializerBuilder::create()->build();
$client = new Client(HttpClient::create(), $serializer, 'this-is-a-secret-token');
```

Then, you need to feed the client with a request. Request are in the `src/Request`
folder.

Each request ha different kind of parameters. You can use autocomplete
to have a suggestion of them.

E.g.

```php
$request = new LeaguesRequest();
$request->withCountry('Italy')
    ->withSeason(2021)
    ->withType(League::LEAGUE_TYPE_CUP);

$response = $client->get($request, LeaguesResponse::class, true);
```

The second argument of the client `get` method is the expected response type.
It is used by the serializer to correctly deserialize the object.

## Have fun!

