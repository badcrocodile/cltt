<?php namespace Cltt;


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
     * Executes general queries
     *
     * @param $sql
     * @param null $parameters
     * @return bool
     */
    public function query($sql, $parameters = null)
    {
        return $this->connection->prepare($sql)->execute($parameters);
    }

    /**
     * Returns ID of last inserted row
     *
     * @return string The ID of the last inserted row
     */
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
     * @return mixed The first results row returned by query
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
        return $this->connection->query("SELECT * FROM $tableName")->fetchAll();
    }

    /**
     * Queries for all active projects from projects table
     *
     * @return array
     */
    public function fetchActiveProjects()
    {
        return $this->connection->query(" SELECT id, name FROM projects WHERE archived IS NULL") ->fetchAll();
    }

    /**
     * Queries for all archived projects from projects table
     *
     * @return array
     */
    public function fetchArchivedProjects()
    {
        return $this->connection->query(" SELECT id, name FROM projects WHERE archived IS NOT NULL") ->fetchAll();
    }

    /**
     * Queries for all comments by date
     *
     * @param      $time_start
     * @param      $time_end
     * @param bool $currently_running   Include comments left on the currently running timer
     *
     * @return array
     */
    public function fetchCommentsByDate($time_start, $time_end, $currently_running=false)
    {
        if($currently_running == true) {
            return $this->connection->query("
                SELECT entries.id, projects.name, comments.comment
                FROM comments
                LEFT JOIN entries
                ON entries.id = comments.entry_id
                LEFT JOIN projects
                ON entries.project_id = projects.id 
                WHERE stop_time
                BETWEEN $time_start AND $time_end
                OR stop_time IS NULL
            ")
            ->fetchAll();
        } else {
            return $this->connection->query("
                SELECT entries.id, projects.name, comments.comment, comments.timestamp
                FROM comments
                LEFT JOIN entries
                ON entries.id = comments.entry_id
                LEFT JOIN projects
                ON entries.project_id = projects.id 
                WHERE stop_time
                BETWEEN $time_start AND $time_end
            ")
            ->fetchAll();
        }
    }

    /**
     * Queries for all comments attached to currently running timer
     *
     * @return array    A collection of comment data
     */
    public function fetchCurrentTimerComments()
    {
        return $this->connection->query("
                SELECT comments.comment, entries.id, projects.name
                FROM comments
                LEFT JOIN entries
                ON entries.id = comments.entry_id
                LEFT JOIN projects
                ON entries.project_id = projects.id 
                WHERE entries.stop_time IS NULL
        ")
        ->fetchAll();
    }

    /**
     * Gather logged sessions between given dates
     *
     * @param $date_start
     * @param $date_end
     *
     * @return array
     */
    public function fetchSessionsByDate($date_start, $date_end)
    {
        return $this->connection->query("
            SELECT entries.id, project_id, start_time, stop_time, name
            FROM entries
            JOIN projects
            ON entries.project_id = projects.id
            WHERE stop_time 
            BETWEEN $date_start AND $date_end
        ")
        ->fetchAll();
    }

    /**
     * Translate a project ID into proper name
     *
     * @param $project_id
     *
     * @return string The name of the project
     */
    public function projectIDtoName($project_id)
    {
        $project_name = $this->fetchFirstRow("
            SELECT name 
            FROM projects 
            WHERE id = $project_id",
            "name"
        );

        if($project_name) {
            return $project_name;
        }

        return false;
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
     * Simple select query that returns everything
     *
     * @param $sql
     * @return array
     */
    public function selectWhere($sql)
    {
        return $this->connection->query($sql)->fetchAll();
    }
}