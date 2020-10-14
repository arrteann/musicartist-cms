<?php
session_start();
class Core
{

    public $connection;

    function __construct($host = "localhost", $dbname = "prhm", $user = "artin", $pass = "P@ssw0rd")
    {
        try {
            $this->connection = new PDO("mysql:host=" . $host . ";dbname=" . $dbname . ";charset=utf8", $user, $pass);
        } catch (PDOException $error) {
            echo 'Error : ' . $error->getMessage();
        }
    }
    // LOGIN
    public function login($email, $password, $tbl)
    {
        // CHECK EMAIL AND PASSWORD
        $check = $this->connection->prepare("SELECT * FROM " . $tbl . " WHERE mail=:email AND password=:pass");
        $check->bindValue(":email", $email);
        $check->bindValue(":pass", $password);
        $check->execute();
        return $check->fetch(2);
    }
    // CHECK IMAGE EXTENTION
   
}
