<?php

/**
 * At this point, we would want to know which classes are high level, and which are low level?
 * In general, the class that uses another class is the high level class. So our Report class
 * is the high level class and the MySqlDatabase class is the low level class.
 */

class MySQLDatabase
{
    public function connect(): void
    {
        // connect mysql
    }

    public function insert(string $table, array $columns, array $values): int
    {
        // insert table
        echo "mysql: insert into {$table} ...." . PHP_EOL;
        return 1; // insert ID
    }

    public function update(string $table, string $column, array $value, mixed $primaryKey): int
    {
        // update table
        return 1; // update ID
    }

    public function delete(string $table, mixed $primaryKey): int
    {
        // delete row using primary key
        return 1; // deleted ID
    }
}

class Report
{
    public MySQLDatabase $database;
    private string $table = "report";

    public function __construct(MySQLDatabase $db)
    {
        $this->database = $db;
        $this->database->connect();
    }

    public function save(array $columns, array $data): bool
    {
        $id = $this->database->insert($this->table, $columns, $data);

        return $id > 0 ? true : false;
    }
}

// Client
$report = new Report(new MySQLDatabase());
$report->save(["title", "content"], ["Something title", "This is content"]);
