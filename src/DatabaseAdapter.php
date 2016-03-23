<?php namespace Acme;


use PDO;

class DatabaseAdapter {
    protected $connection;
    protected $row;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function query($sql, $parameters = null)
    {
        return $this->connection->prepare($sql)->execute($parameters);
    }

    public function fetchFirstRow($sql, $key)
    {
        $rows = $this->connection->prepare($sql);
        $rows->execute();

        return $this->row = $rows->fetch()["$key"];
    }

    public function fetchAll($tableName)
    {
        return $this->connection->query('select * from ' . $tableName)->fetchAll();
    }

    public function selectWhere($sql)
    {
        return $this->connection->query($sql)->fetchAll();
    }
}