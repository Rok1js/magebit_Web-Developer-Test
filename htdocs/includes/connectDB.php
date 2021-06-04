<?php

//declare class which connect to database
class ConnectDB{
  private $host = "localhost";
  private $username = "root";
  private $password = "";
  private $dbname ="emails";

  //declare method which returns connection to database
  protected function connect(){
    $conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);
    return $conn;
  }

}
 ?>
