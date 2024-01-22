<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use App\Service\RestaurantService;

#[AsCommand(
    name: 'app:restaurants:export',
    description: 'Commands for restaurants',
)]
class RestaurantExportCommand extends Command
{
    protected static $defaultName = 'app:restaurants:export';
    private $restaurantService;

    public function __construct(RestaurantService $restaurantService)
    {
        parent::__construct();
        $this->restaurantService = $restaurantService;
    }

    protected function configure()
    {
        $this->setDescription('Exports restaurant titles to a TXT file.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        try {
            $filename = $this->restaurantService->export();
            $output->writeln('The file has been generated: ' . $filename);
        } catch (IOExceptionInterface $exception) {
            $output->writeln('An error occurred: ' . $exception->getMessage());
        }

        return Command::SUCCESS;
    }
}