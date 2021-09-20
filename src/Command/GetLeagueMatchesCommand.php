<?php


namespace lucasaba\RapidAPI\Command;


use lucasaba\RapidAPI\Entity\League;
use lucasaba\RapidAPI\Request\CountriesRequest;
use lucasaba\RapidAPI\Request\FixturesRequest;
use lucasaba\RapidAPI\Request\LeaguesRequest;
use lucasaba\RapidAPI\Request\RoundsRequest;
use lucasaba\RapidAPI\Response\CountriesResponse;
use lucasaba\RapidAPI\Response\FixturesResponse;
use lucasaba\RapidAPI\Response\LeaguesResponse;
use lucasaba\RapidAPI\Response\RoundsResponse;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ChoiceQuestion;

class GetLeagueMatchesCommand extends AbstractApiCommand
{
    const SEASON = 2021;
    protected static $defaultName = 'app:get-league-matches';

    protected function configure(): void
    {
        $this->setDescription('Gets league matches')
            ->addArgument('token', InputArgument::REQUIRED, 'RapidAPI token');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $client = $this->getClient($input->getArgument('token'));
        $helper = $this->getHelper('question');

        // Select country
        $countryRequest = new CountriesRequest();
        $response = $client->get($countryRequest, CountriesResponse::class);
        $countryChoice = [];
        foreach ($response->getResponse() as $country) {
            /** @var \lucasaba\RapidAPI\Entity\Country $country */
            $countryChoice[] = $country->getName();
        }
        $question = new ChoiceQuestion('Select a country', $countryChoice);
        $country = $helper->ask($input, $output, $question);

        // Select league
        $leaguesRequest = new LeaguesRequest();
        $leaguesRequest->withCountry($country)->withSeason(self::SEASON)->withType(League::LEAGUE_TYPE_LEAGUE);
        $response = $client->get($leaguesRequest, LeaguesResponse::class);
        $leagueChoice = [];
        foreach ($response->getResponse() as $league) {
            /** @var \lucasaba\RapidAPI\Response\LeagueResponseElement $league */
            $leagueChoice[$league->getLeague()->getId()] = $league->getLeague()->getName();
        }
        $question = new ChoiceQuestion('Select a league', $leagueChoice);
        $league = $helper->ask($input, $output, $question);
        $leagueId = array_search($league, $leagueChoice);
        if (false === $leagueId) {
            $output->writeln('Unable to get league id for ' . $league);
            return Command::FAILURE;
        }

        // Get rounds
        $roundsRequest = new RoundsRequest($leagueId, self::SEASON);
        $response = $client->get($roundsRequest, RoundsResponse::class);
        $rounds = $response->getResponse(); // Array of rounds names

        // Get fixtures
        foreach ($rounds as $round) {
            $output->writeln($round);
            $fixtureRequest = new FixturesRequest(self::SEASON);
            $fixtureRequest->withRound($round)
                ->withLeague($leagueId);
            $fixturesResponse = $client->get($fixtureRequest, FixturesResponse::class);
            $this->displayMatches($fixturesResponse->getResponse(), $output);
        }

        return Command::SUCCESS;
    }

    /**
     * @param \lucasaba\RapidAPI\Response\FixturesResponseElement[] $fixtures
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     */
    private function displayMatches(array $fixtures, OutputInterface $output)
    {
        foreach ($fixtures as $fixture) {
            $output->writeln(
                sprintf('%s - %s - %s: %s-%s',
                    $fixture->getFixture()->getDate()->format('d/m/Y'),
                    $fixture->getTeams()->getHome()->getName(),
                    $fixture->getTeams()->getAway()->getName(),
                    $fixture->getGoals()->getHome() ?? 'TBD',
                    $fixture->getGoals()->getAway() ?? 'TBD'
                )
            );
        }
    }
}