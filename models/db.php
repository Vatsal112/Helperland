<?php
 class db{

    private $server = 'localhost:5050';
    private $user = 'root';
    private $pass = '';
    private $dbName = 'helperland';

  protected  function connection(){
        try{
            $dsn = 'mysql:host='.$this->server.';dbname='.$this->dbName;
        
            $this->pdo = new PDO($dsn,$this->user,$this->pass);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
        
            return $this->pdo;
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    
 }
