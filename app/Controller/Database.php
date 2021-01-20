<?php

class Database{

    protected $db, $stmt;
    public $Err;

    public function __construct()
    {
        $this->db = new mysqli('localhost', 'root', '', 'kantor');
        return $this->db;


    }

    public function create($qeury, $header){

        $result = $this->db->query($qeury);

        if($result === TRUE){
            header('Location:'. $header);
        }
        
        return $result;

    }

    public function createWithoutHeader($qeury){

        $result = $this->db->query($qeury);
        return $result;

    }

    public function all($qeury){

        $result = $this->db->query($qeury);
        return $result;

    }

    public function validate_char($val){

        $val = htmlentities($val);
        $val = htmlspecialchars($val);
        $val = trim($val);
        return $val;
    }




}


