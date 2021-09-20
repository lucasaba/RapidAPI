<?php


namespace lucasaba\RapidAPI\Command;


use lucasaba\RapidAPI\Request\CountriesRequest;
use lucasaba\RapidAPI\Response\CountriesResponse;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class CountriesCommand extends AbstractApiCommand
{
    protected static $defaultName = 'app:get-countries';

    protected function configure(): void
    {
        $this->setDescription('Gets countries information')
            ->addArgument('token', InputArgument::REQUIRED, 'RapidAPI token')
            ->addOption('countryName', null, InputOption::VALUE_OPTIONAL, 'The country name to search')
            ->addOption('countryCode', null, InputOption::VALUE_OPTIONAL, 'The country code to search');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $client = $this->getClient($input->getArgument('token'));

        $request = new CountriesRequest();
        if ($input->getOption('countryName')) {
            $request->withCountryName($input->getOption('countryName'));
        }
        if ($input->getOption('countryCode')) {
            $request->withCountryCode($input->getOption('countryCode'));
        }

        $response = $client->get($request, CountriesResponse::class);
        $output->write(sprintf('There are %s results', $response->getResults()));

        return Command::SUCCESS;
    }
}