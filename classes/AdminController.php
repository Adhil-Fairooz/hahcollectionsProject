<?php 
class AdminController{
    public function __construct(){
        $db = new DatabaseConnection;
        $this->conn = $db ->conn;
    }

    public function getAdminLogin($email){
        $sql_get_login_data = "SELECT * FROM admin WHERE Email = '$email';";
        $result = $this->conn->query($sql_get_login_data);
        if($result->num_rows > 0){
            return $result;
        }else{
            return false;
        }
    }
}

?>