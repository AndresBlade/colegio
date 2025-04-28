<?php
class DB
{
    private $host = "localhost";
    private $username = "root";
    private $password = "";

    private $database = "colegio";

    public $connection;

    public function __construct()
    {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->database . ';charset=utf8';
        try {
            $this->connection = new PDO($dsn, $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $error) {
            die('Connection failed: ' . $error->getMessage());
        }


    }

    public function get()
    {
        return $this->connection;
    }
} ?>