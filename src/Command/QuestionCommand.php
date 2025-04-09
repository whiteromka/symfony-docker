<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class QuestionCommand extends Command
{
    protected static $defaultName = 'app:question';

    protected function configure()
    {
        $this
            ->setDescription('Получить вопрос')
            ->setHelp('Получить случайный вопрос, но не из тех что недавно получил');
    }

    /** php bin/console app:question */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('Начало обработки...');
        // Ваша логика здесь
        $output->writeln('Обработка завершена!');
        return Command::SUCCESS;
    }
}
