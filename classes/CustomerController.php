<?php 
require_once "GenerateID.php";
class CustomerController{
    public function __construct(){
        $db = new DatabaseConnection;
        $this->generateId = new GenerateID;
        $this->conn = $db ->conn;
    }
    public function createCustomerAccount($data){
        $idType = "customer";
        $customerID = $this->generateId->getNewID($idType);
        $fname = $data['fname'];
        $lname = $data['lname'];
        $Email = $data['email'];
        $password = password_hash($data['pass'],PASSWORD_DEFAULT);
        $sql_create = "INSERT INTO customer(Customer_ID,FName,LName,Email,`Password`) VALUES('$customerID','$fname','$lname','$Email','$password')";
        if($this->conn->query($sql_create)){
            $this->generateId->updatetID($idType);
            return true;
        }else{
            return false;
        }
    }
    public function checkEmailInDB($email){
        $sql_getcount = "SELECT * FROM customer WHERE Email = '$email';";
        $results = $this->conn->query($sql_getcount);
        if($results->num_rows > 0){
            return true;
        }else{
            return false;
        }
    }
}
?>