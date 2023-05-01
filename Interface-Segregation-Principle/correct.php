<?php

// we can divide Workable interface two part
interface Codeable
{
    public function coding(): string;
}

interface Testable
{
    public function testing(): string;
}

interface Worker
{
    public function working(): void;
}

class Developer implements Worker, Codeable, Testable
{
    public function coding(): string
    {
        return "The developer is working..." . PHP_EOL;
    }

    public function testing(): string
    {
        return "The developer is testing..." . PHP_EOL;
    }

    public function working(): void
    {
        echo $this->coding();
        echo $this->testing();
    }
}

class Tester implements Worker, Testable
{
    public function testing(): string
    {
        return "The Tester is working..." . PHP_EOL;
    }

    public function working(): void
    {
        echo $this->testing();
    }
}

class ProjectManager
{
    private array $workers = [];

    public function addWorker(Worker $worker)
    {
        array_push($this->workers, $worker);
    }

    public function working()
    {
        foreach ($this->workers as $worker) {
            $worker->working();
        }
    }
}

$manager = new ProjectManager();
$manager->addWorker(new Developer());
$manager->addWorker(new Tester());
$manager->working();
