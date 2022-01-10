<?php

declare(strict_types = 1);

use Robo\Collection\CollectionBuilder;
use Robo\Tasks;

class RoboFile extends Tasks
{
    public function checkAll(): void
    {
        $this->checkCs();
        $this->checkPhpstan();
        $this->testUnit();
    }

    public function checkCs($opts = ['dry-run' => false])
    {
        $task = $this->taskExec('vendor/bin/php-cs-fixer fix');
        $task->arg('--diff');

        if ($opts['dry-run']) {
            $task->arg('--dry-run');
        }

        return $this->runAndReturnExitCode($task);
    }

    public function checkPhpstan()
    {
        $task = $this->taskExec('vendor/bin/phpstan analyse src --level=max');

        return $this->runAndReturnExitCode($task);
    }

    public function testUnit(): void
    {
        $this->_exec('vendor/bin/phpunit --bootstrap vendor/autoload.php --testdox tests/');
    }

    private function runAndReturnExitCode(CollectionBuilder $task)
    {
        $result = $task->run();

        return $result->getExitCode();
    }
}
