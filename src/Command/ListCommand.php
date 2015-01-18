<?php

namespace JobScheduler\Client\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use JobScheduler\Client\Client;

class ListCommand extends Command
{
    protected function configure()
    {
        $this
        ->setName('job-scheduler-client:list')
        ->setDescription('List jobs')
        ->addArgument(
            'username',
            InputArgument::REQUIRED,
            'Username'
        )
        ->addArgument(
            'password',
            InputArgument::REQUIRED,
            'Password'
        )
        ->addArgument(
            'baseurl',
            InputArgument::REQUIRED,
            'Base URL'
        )
        ->addArgument(
            'keyword',
            InputArgument::REQUIRED,
            'Keyword'
        )
        ;
    }
    
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $c = new Client(
            $input->getArgument('username'),
            $input->getArgument('password'),
            $input->getArgument('baseurl')
        );
        $results = $c->listJobs($input->getArgument('keyword'));

        print_r($results);
    }
}
