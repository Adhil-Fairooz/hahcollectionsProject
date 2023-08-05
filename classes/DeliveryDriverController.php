<?php 
require_once "GenerateID.php";
class DeliveryDriverController{
    public function __construct(){
        $db = new DatabaseConnection;
        $this->generateId = new GenerateID;
        $this->conn = $db ->conn;
    }

    public function addDeliveryDriver($data){
        $idType = "delivery";
        $DelDriverID = $this->generateId->getNewID($idType);
        $fname = $data['fname'];
        $lname = $data['lname'];
        $VNum = $data['VNum'];
        $contact = $data['contact'];
        $email = $data['email'];
        $password = password_hash($data['pass'],PASSWORD_DEFAULT);
        $sql_create = "INSERT INTO deliver_driver VALUES('$DelDriverID','$fname','$lname','$VNum','$email','$password','$contact')";
        if($this->conn->query($sql_create)){
            $this->generateId->updatetID($idType);
            return true;
        }else{
            return $this->conn -> error;
        }
    }

    public function getDeliveryDriverInfo(){
        $sql = "SELECT * FROM deliver_driver";
        $results = $this->conn->query($sql);
        if($results->num_rows > 0){
            return $results;
        }else{
            return false;
        }
    }

    public function searchDriver($category,$searchData){
        $sql = "SELECT * FROM deliver_driver WHERE $category LIKE '%$searchData%'";
        $results = $this->conn->query($sql);
        if($results->num_rows > 0){
            return $results;
        }else{
            return false;
        }
    }
    
}