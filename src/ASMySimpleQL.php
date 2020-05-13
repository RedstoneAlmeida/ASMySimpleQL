<?php

namespace ASPHP\ASMySimpleQL;

class ASMySimpleQL
{
    const CURRENT_TIME = 'current_time';
    const CURRENT_DATE = 'current_date';

    private $host, $user, $password, $database, $conn;

    public function setUser($user)
    {
        $this->user = $user;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setDatabase($databse)
    {
        $this->database = $databse;
    }

    public function setHost($host)
    {
        $this->host = $host;
    }

    public function __construct($host = '', $user = '', $password = '', $database = '')
    {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->database = $database;
    }

    public function getConnection(){
        try{
            $this->conn =  new \mysqli($this->host, $this->user, $this->password, $this->database);
        }catch(\Exception $e){
            throw new \Exception('A error has ocurred on connect to your database, check the data login.');
        }

        return $this->conn;
    }

    protected function getDatabase()
    {
        return $this->database;
    }
}