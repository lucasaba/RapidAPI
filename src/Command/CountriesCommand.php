<?php


namespace lucasaba\RapidAPI\Command;


use JMS\Serializer\SerializerBuilder;
use lucasaba\RapidAPI\Infra\Client;
use lucasaba\RapidAPI\Request\CountriesRequest;
use lucasaba\RapidAPI\Response\CountriesResponse;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\HttpClient\HttpClient;

class CountriesCommand extends Command
{
    protected static $defaultName = 'app:get-countries';

    protected function configure(): void
    {
        $this->setDescription('Gets countries informations')
            ->addArgument('token', InputArgument::REQUIRED, 'RapidAPI token')
            ->addOption('countryName', null, InputOption::VALUE_OPTIONAL, 'The country name to search')
            ->addOption('countryCode', null, InputOption::VALUE_OPTIONAL, 'The country code to search');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $serializer = SerializerBuilder::create()->build();
        $client = new Client(HttpClient::create(), $serializer, $input->getArgument('token'));

        $request = new CountriesRequest();
        if ($input->getOption('countryName')) {
            $request->withCountryName($input->getOption('countryName'));
        }
        if ($input->getOption('countryCode')) {
            $request->withCountryCode($input->getOption('countryCode'));
        }

        $response = $client->get($request, CountriesResponse::class);
        var_dump($response);
        /*$content = file_get_contents(__DIR__ . '/../../risultati.json');
        $result = $serializer->deserialize($content, 'lucasaba\RapidAPI\Response\CountriesResponse', 'json');
        var_dump($result);*/

        return Command::SUCCESS;
    }
}