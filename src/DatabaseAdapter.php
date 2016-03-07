<?php namespace Acme;


use PDO;

class DatabaseAdapter
{
    protected $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function fetchAll($tableName)
    {
        return $this->connection->query('select * from ' . $tableName)->fetchAll();
    }

    public function selectWhere($sql)
    {
        return $this->connection->query($sql)->fetchAll();
    }

    public function query($sql, $parameters)
    {
        return $this->connection->prepare($sql)->execute($parameters);
    }
}