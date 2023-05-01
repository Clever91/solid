<?php

interface Workable
{
    public function canCode(): bool;
    public function canTest(): bool;
    public function coding(): string;
    public function testing(): string;
}

class Developer implements Workable
{
    public function canCode(): bool
    {
        return true;
    }

    public function canTest(): bool
    {
        return false;
    }

    public function coding(): string
    {
        return "The developer is working..." . PHP_EOL;
    }

    public function testing(): string
    {
        return "The developer is testing..." . PHP_EOL;
    }
}

class Tester implements Workable
{
    public function canCode(): bool
    {
        return false;
    }

    public function canTest(): bool
    {
        return true;
    }

    public function coding(): string
    {
        throw new Exception("Opps! I can not code");
    }

    public function testing(): string
    {
        return "The Tester is working..." . PHP_EOL;
    }
}

class ProjectManager
{
    private array $workers = [];

    public function addWorker(Workable $worker)
    {
        array_push($this->workers, $worker);
    }

    public function working()
    {
        foreach ($this->workers as $worker) {
            if ($worker->canCode()) {
                echo $worker->coding();
            }
            if ($worker->canTest()) {
                echo $worker->testing();
            }
        }
    }
}

$manager = new ProjectManager();
$manager->addWorker(new Developer());
$manager->addWorker(new Tester());
$manager->working();
