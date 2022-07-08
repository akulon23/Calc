<?php


namespace Application;


use mysqli;
use mysqli_result;

class MysqlService
{
    private mysqli $connection;

    /**
     * MysqlService constructor.
     * @param string $host
     * @param string $user
     * @param string $password
     * @param string $database
     */
    public function __construct(string $host, string $user, string $password, string $database)
    {
        $this->connection = new mysqli(
            $host,
            $user,
            $password,
            $database
        );
    }

    public function executeQuery($query)
    {
        $data = $this->connection->query($query);
        if ($data instanceof mysqli_result) {
            return $data->fetch_all(MYSQLI_ASSOC);
        }

        return [];
    }
}