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
     * Gets the first results row returned by query
     *
     * @param $sql string The query string
     * @param $key string The key to return
     *
     * @return mixed
     */
    public function fetchFirstRow($sql, $key)
    {
        $rows = $this->connection->prepare($sql);
        $rows->execute();

        return $this->row = $rows->fetch()["$key"];
    }

    /**
     * Queries for all data from table
     *
     * @param $tableName string Name of the table to fetch data from
     *
     * @return array
     */
    public function fetchAll($tableName)
    {
        return $this->connection->query('select * from ' . $tableName)->fetchAll();
    }

    /**
     * Queries for all active projects from projects table
     *
     * @return array
     */
    public function fetchActiveProjects()
    {
        return $this->connection->query('select id, name from projects where archived IS NULL')->fetchAll();
    }

    /**
     * Queries for all archived projects from projects table
     *
     * @return array
     */
    public function fetchArchivedProjects()
    {
        return $this->connection->query('select id, name from projects where archived IS NOT NULL')->fetchAll();
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