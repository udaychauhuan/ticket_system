<?php

class Connection
{
  protected $hostName;
  protected $userName;
  protected $password;
  protected $conn;
  protected $msg;
  protected $db_name;

  //constructor for database and tables creattion
  public function __construct()
  {
    $this->hostName = 'localhost';
    $this->userName = 'root';
    $this->password = '';
    try {

      $this->conn = new mysqli($this->hostName, $this->userName, $this->password);
      if ($this->conn) {
        # if connection is done that create a Database default
        $this->db_name = "ticket_db";
        $sql = "create DATABASE IF NOT EXISTS $this->db_name";
        if ($this->conn->query($sql)) {
          $this->conn = new mysqli($this->hostName, $this->userName, $this->password, $this->db_name);
          $this->msg = "database created";
        } else {
          # code...
          $this->msg = "database  not created!!!";
        }
      }
      //create user/admin table defaults
      $sql = "CREATE TABLE IF not EXISTS User_Table(id int NOT NULL AUTO_INCREMENT,name varchar(50)NOT NULL,email varchar(50) NOT NULL,phone varchar(15) NOT NULL,role_id TINYINT DEFAULT 0 NOT NULL, password varchar(255) NOT NULL,PRIMARY KEY(id));";
      if ($this->conn->query($sql)) {
        # code...
        $this->msg = "user/admin table created.";
      } else {
        $this->msg = "user/admin not table created.!!!";
      }
      //create ticket table..
      $sql2 = "CREATE TABLE IF not EXISTS ticket_table(ticket_id int NOT NULL AUTO_INCREMENT ,ticket_name  varchar(50)NOT NULL,Ticket_desk varchar(50)NOT NULL,price int(100) NOT NULL,PRIMARY KEY(ticket_id))";
      if ($this->conn->query($sql2)) {
        # code...
        $this->msg = "ticket table created.";
      } else {
        $this->msg = "ticket table not created.!!!";
      }
       //create ticket purchase table..
      $sql3 = "CREATE TABLE IF not EXISTS purchase_table(purchase_id int NOT NULL AUTO_INCREMENT,user_id int NOT NULL,user_name varchar(25) NOT NULL,purchase_date datetime,ticket_id int NOT NULL,ticket_name varchar(25) NOT NULL,Ticket_price int(50) NOT NULL, quantity TINYINT DEFAULT 1 NOT NULL,PRIMARY KEY (purchase_id))";
      if ($this->conn->query($sql3)) {
        # code...
        $this->msg = "purchase ticket table created.";
      } else {
        $this->msg = "purchase ticket table not created.!!!";
      }
      
    } catch (Exception $ex) {
      //throw $th;
      die("connection die due to : " . $ex);
    }
  }


  public function read($query)
  {
    $result = $this->conn->query($query);
    if (!$result) {
      return  false;
    } else {
      $data = false;
      $result = mysqli_query($this->conn, $query);
      if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
          $data[] =  $row;
        }
      }
      return $data;
    }
  }

  public function save($query)
  {
    $result = $this->conn->query($query);

    if (!$result) {
      # code...
      return false;
    } else {
      return true;
    }
  }
}
