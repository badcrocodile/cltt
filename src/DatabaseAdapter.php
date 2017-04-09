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

    public function lastInsertedRowID()
    {
        return $this->connection->lastInsertId();
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
        return $this->connection->query('SELECT * FROM ' . $tableName)->fetchAll();
    }

    /**
     * Queries for all active projects from projects table
     *
     * @return array
     */
    public function fetchActiveProjects()
    {
        return $this->connection->query('SELECT id, name FROM projects WHERE archived IS NULL')->fetchAll();
    }

    /**
     * Queries for all archived projects from projects table
     *
     * @return array
     */
    public function fetchArchivedProjects()
    {
        return $this->connection->query('SELECT id, name FROM projects WHERE archived IS NOT NULL')->fetchAll();
    }

    /**
     * Gets the name active project timer, if any
     *
     * @return string|false The name of the currently running project, if any
     */
    public function getRunningTimerName()
    {
        $query = $this->connection->query('
            SELECT projects.name 
            FROM projects 
            INNER JOIN entries 
            ON entries.project_id = projects.id 
            WHERE stop_time IS NULL
        ')->fetchObject();

        if($query) {
            return $query->name;
        }

        return false;
    }

    /**
     * Gets the start time of the active project timer, if any
     *
     * @return string|false The start time of the currently running project, if any
     */
    public function getRunningTimerStartTime()
    {
        $query = $this->connection->query('
            SELECT entries.start_time
            FROM entries 
            INNER JOIN projects
            ON entries.project_id = projects.id 
            WHERE stop_time IS NULL
        ')->fetchObject();

        if($query) {
            return $query->start_time;
        }

        return false;
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