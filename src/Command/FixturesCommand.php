<?php


namespace lucasaba\RapidAPI\Command;


use lucasaba\RapidAPI\Request\FixturesRequest;
use lucasaba\RapidAPI\Response\FixturesResponse;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class FixturesCommand extends AbstractApiCommand
{
    protected static $defaultName = 'app:get-fixtures';

    protected function configure(): void
    {
        $this->setDescription('Gets teams information')
            ->addArgument('token', InputArgument::REQUIRED, 'RapidAPI token')
            ->addOption('league', null, InputOption::VALUE_OPTIONAL, 'The league id of the league')
            ->addOption('season', null, InputOption::VALUE_REQUIRED, 'The season of the fixtures')
            ->addOption('from', null, InputOption::VALUE_OPTIONAL, 'Date from')
            ->addOption('to', null, InputOption::VALUE_OPTIONAL, 'Date to');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $client = $this->getClient($input->getArgument('token'));

        $request = new FixturesRequest($input->getOption('season'));
        if ($input->getOption('league')) {
            $request->withLeague($input->getOption('league'));
        }
        if ($input->getOption('from')) {
            $request->withDateFrom($input->getOption('from'));
        }

        if ($input->getOption('to')) {
            $request->withDateTo($input->getOption('to'));
        }

        $response = $client->get($request, FixturesResponse::class, true);

        $output->write(sprintf('There are %s results', $response->getResults()));

        return Command::SUCCESS;
    }
}