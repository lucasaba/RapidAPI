<?php


namespace lucasaba\RapidAPI\Command;


use lucasaba\RapidAPI\Request\TeamsRequest;
use lucasaba\RapidAPI\Response\TeamsResponse;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class TeamsCommand extends AbstractApiCommand
{
    protected static $defaultName = 'app:get-teams';

    protected function configure(): void
    {
        $this->setDescription('Gets teams information')
            ->addArgument('token', InputArgument::REQUIRED, 'RapidAPI token')
            ->addOption('league', null, InputOption::VALUE_OPTIONAL, 'The league id of the teams')
            ->addOption('season', null, InputOption::VALUE_OPTIONAL, 'The season of the teams')
            ->addOption('country', null, InputOption::VALUE_OPTIONAL, 'The country of the teams');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $client = $this->getClient($input->getArgument('token'));

        $request = new TeamsRequest();
        if ($input->getOption('league')) {
            $request->withLeague($input->getOption('league'));
        }
        if ($input->getOption('season')) {
            $request->withSeason($input->getOption('season'));
        }
        if ($input->getOption('country')) {
            $request->withCountry($input->getOption('country'));
        }

        $response = $client->get($request, TeamsResponse::class, true);
        var_dump($response);
        /*$content = file_get_contents(__DIR__ . '/../../risultati.json');
        $result = $serializer->deserialize($content, 'lucasaba\RapidAPI\Response\CountriesResponse', 'json');
        var_dump($result);*/

        return Command::SUCCESS;
    }
}