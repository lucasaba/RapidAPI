<?php


namespace lucasaba\RapidAPI\Command;


use JMS\Serializer\SerializerBuilder;
use lucasaba\RapidAPI\Infra\Client;
use lucasaba\RapidAPI\Request\CountriesRequest;
use lucasaba\RapidAPI\Request\LeaguesRequest;
use lucasaba\RapidAPI\Response\CountriesResponse;
use lucasaba\RapidAPI\Response\LeaguesResponse;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\HttpClient\HttpClient;

class LeaguesCommand extends Command
{
    protected static $defaultName = 'app:get-leagues';

    protected function configure(): void
    {
        $this->setDescription('Gets leagues informations')
            ->addArgument('token', InputArgument::REQUIRED, 'RapidAPI token')
            ->addOption('countryName', null, InputOption::VALUE_OPTIONAL, 'The country name to search')
            ->addOption('season', null, InputOption::VALUE_OPTIONAL, 'The season of the league')
            ->addOption('type', null, InputOption::VALUE_OPTIONAL, 'The type of the league (cup or league)');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $serializer = SerializerBuilder::create()->build();
        $client = new Client(HttpClient::create(), $serializer, $input->getArgument('token'));

        $request = new LeaguesRequest();
        if ($input->getOption('countryName')) {
            $request->withCountry($input->getOption('countryName'));
        }
        if ($input->getOption('season')) {
            $request->withSeason($input->getOption('season'));
        }
        if ($input->getOption('type')) {
            $request->withType($input->getOption('type'));
        }

        $response = $client->get($request, LeaguesResponse::class, true);
        var_dump($response);
        /*$content = file_get_contents(__DIR__ . '/../../risultati.json');
        $result = $serializer->deserialize($content, 'lucasaba\RapidAPI\Response\CountriesResponse', 'json');
        var_dump($result);*/

        return Command::SUCCESS;
    }
}