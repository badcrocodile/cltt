<?php namespace Acme;


use PDO;

class DatabaseAdapter {
    protected $connection;
    protected $row;

    /**
     * DatabaseAdapter constructor.
     * @param \PDO $connection
     */
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @param $sql
     * @param null $parameters
     * @return bool
     */
    public function query($sql, $parameters = null)
    {
        return $this->connection->prepare($sql)->execute($parameters);
    }

    /**
     * @param $sql
     * @param $key
     * @return mixed
     */
    public function fetchFirstRow($sql, $key)
    {
        $rows = $this->connection->prepare($sql);
        $rows->execute();

        return $this->row = $rows->fetch()["$key"];
    }

    /**
     * @param $tableName
     * @return array
     */
    public function fetchAll($tableName)
    {
        return $this->connection->query('select * from ' . $tableName)->fetchAll();
    }

    /**
     * @param $sql
     * @return array
     */
    public function selectWhere($sql)
    {
        return $this->connection->query($sql)->fetchAll();
    }
}