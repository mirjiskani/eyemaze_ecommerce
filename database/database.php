<?php

class DBConnect
{

    private $host;
    private $user;
    private $pass;
    private $db;
    public $con;

    /****************************CONSTRUCTOR**************************************/
    /* Connect with server and check database */

    function __construct()
    {
        $this->host     =     'localhost';
        // hostname
        $this->user     =     'root';
        // username
        $this->pass     =     'root';
        // password
        $this->db     =     'eyemaze_ecommerce';
        // database
    }
    /****************************CONSTRUCTOR**************************************/
    public function CreateConnection()
    {
        $this->con     =     new mysqli($this->host, $this->user, $this->pass, $this->db);

        if ($this->con->connect_error) {
            die('Connect Error: ' . $this->con->connect_error);
            throw new Exception('Connect Error: ' . $this->con->connect_error . '');
        }

        return $this->con;
    }
    /**************************** createConnection **************************************/

    function query_exe($query)
    {
        return $this->con->query($query);
    }

    /**************************** SINGLE RESULT**************************************/

    function fetch_all($query)
    {
        ini_set('memory_limit', -1);
        $result = $this->con->query($query);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ini_set('memory_limit', -1);
                $data[] = $row;
            }
            ini_set('memory_limit', -1);
            return $data;
        } else {
            return $this->con->error;
        }
    }
    /**************************** FETCH ALL RESULTS **************************************/
    function fetch_single($query)
    {
        $result = $this->con->query($query);
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return $this->con->error;
        }
    }
    /**************************** FETCH SINGLE RESULT **************************************/
}
