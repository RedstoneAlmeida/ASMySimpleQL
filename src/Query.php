<?php

namespace ASPHP\ASMySimpleQL;

class Query extends ASMySimpleQL
{
    public function __construct($host = '', $user = '', $password = '', $database = '')
    {
        parent::__construct($host, $user, $password, $database);
    }

    public function Delete($table, $where)
    {
        if(is_array($where)){
            $table = mysqli_real_escape_string($this->getConnection(), $table);
            $where_ = $where;

            $where = '';

            foreach($where_ as $key => $value) {
                $key = mysqli_real_escape_string($this->getConnection(), $key);
                $value = mysqli_real_escape_string($this->getConnection(), $value);
                $where .= "$key = '$value' AND ";
            }

            $where = substr($where, 0, -5);

            $sql = "DELETE FROM {$table} WHERE {$where};";

            if($sql = $this->getConnection()->query($sql)){
                return true;
            }else{
                throw new \Exception('Error on delete this values, check if your columns on \'$where\' parameter is correct or your table (' . $table . ') or database (' . $this->getDatabase() . ') exists.');
            }
        }else{
            throw new \Exception('$where and $columns parameter need is array');
        }
    }

    public function Insert($table, $data)
    {
        if(is_array($data)){
            $table = mysqli_real_escape_string($this->getConnection(), $table);

            $columns = '';
            $values = '';

            foreach($data as $key => $value){
                $key = mysqli_real_escape_string($this->getConnection(), $key);
                $value = mysqli_real_escape_string($this->getConnection(), $value);

                $columns .= $key . ",";

                $values .= "'$value',";
            }

            $columns = substr($columns, 0, -1);
            $values = substr($values, 0, -1);

            $sql = "INSERT INTO {$table} ({$columns}) VALUES ({$values});";

           if($sql = $this->getConnection()->query($sql)){
                return true;
            }else{
                throw new \Exception('Error on insert this values, check if your columns in \'$data\' parameter is correct or if your table (' . $table . ')/database (' . $this->getDatabase() . ') exists. Or this data already exists in your table and is primary key.');
            }
        }else{
            throw new \Exception('$data parameter need is array');
        }
    }

    public function Update($table, $columns, $where)
    {
        if(is_array($where) && is_array($columns)){
            $table = mysqli_real_escape_string($this->getConnection(), $table);
            $columns_ = $columns;
            $where_ = $where;

            $columns = '';
            $where = '';

            foreach ($columns_ as $key => $value){
                $key = mysqli_real_escape_string($this->getConnection(), $key);
                $value = mysqli_real_escape_string($this->getConnection(), $value);
                $columns .= "$key = '$value',";
            }

            foreach($where_ as $key => $value) {
                $key = mysqli_real_escape_string($this->getConnection(), $key);
                $value = mysqli_real_escape_string($this->getConnection(), $value);
                $where .= "$key = '$value' AND ";
            }

            $columns = substr($columns, 0, -1);
            $where = substr($where, 0, -5);

            $sql = "UPDATE {$table} SET {$columns} WHERE {$where};";

            if($sql = $this->getConnection()->query($sql)){
                return true;
            }else{
                throw new \Exception('Error on update this values, check if your columns in \'$columns\' and \'$where\' parameter is correct or if your table (' . $table . ')/database (' . $this->getDatabase() . ') exists.');
            }
        }else{
            throw new \Exception('$where and $columns parameter need is array');
        }
    }

    public function SelectAllCollumnsFromFirst($table, $where){
        if(is_array($where)){
            $where_ = $where;

            $where = '';

            foreach($where_ as $key => $value){
                $key = mysqli_real_escape_string($this->getConnection(), $key);
                $value = mysqli_real_escape_string($this->getConnection(), $value);

                $where .= "$key = '$value' AND ";
            }

            $where = substr($where, 0, -5) . ";";
            $table = mysqli_real_escape_string($this->getConnection(), $table);

            $sql = "SELECT * FROM {$table} WHERE {$where}";
            if($sql = $this->getConnection()->query($sql)){
                $fetch = $this->FetchOne($sql);
                return $fetch;
            }else{
                throw new \Exception('Error on select, check if your columns on \'$where\' parameter is correct or your table (' . $table . ') or database (' . $this->getDatabase() . ') exists.');
            }
        }else{
            throw new \Exception('$where parameter need is array');
        }
    }

    public function FetchAll($result)
    {
        $return = [];
        while($row = mysqli_fetch_array($result)){
            $return[] = $return;
        }

        return $return;
    }

    public function FetchOne($result)
    {
        return mysqli_fetch_array($result);
    }
}