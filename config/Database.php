<?php
class Database{

private $host = 'localhost';
private $user = 'root';
private $password = "";
private $database = "api";

public function getConnection(){

$conn = new mysqli($this->host, $this->user, $this->password, $this-

>database);

if($conn->connect_error){
die("Error failed to connect to MySQL: " . $conn->connect_er

ror);

} else {
return $conn;
}

}
}
?>