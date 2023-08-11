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

    public function getCountMainCategory(){
        $sql = "SELECT * FROM main_category";
        $result = $this->conn->query($sql);
        if($result->num_rows > 0){
            return $result->num_rows;
        }else{
            return 0;
        }
    }
    public function getCountSubCategory(){
        $sql = "SELECT * FROM sub_category";
        $result = $this->conn->query($sql);
        if($result->num_rows > 0){
            return $result->num_rows;
        }else{
            return 0;
        }
    }
    public function getCountBrand(){
        $sql = "SELECT * FROM brand";
        $result = $this->conn->query($sql);
        if($result->num_rows > 0){
            return $result->num_rows;
        }else{
            return 0;
        }
    }
    public function getCountSupplier(){
        $sql = "SELECT * FROM supplier";
        $result = $this->conn->query($sql);
        if($result->num_rows > 0){
            return $result->num_rows;
        }else{
            return 0;
        }
    }

    public function getCountNewOrders(){
        $sql = $sql = "SELECT * FROM invoice WHERE order_status = 'Pending'";
        $result = $this->conn->query($sql);
        if($result->num_rows > 0){
            return $result->num_rows;
        }else{
            return 0;
        }
    }

    public function getCountReadyOrders(){
        $sql = $sql = "SELECT * FROM invoice WHERE order_status = 'Ready'";
        $result = $this->conn->query($sql);
        if($result->num_rows > 0){
            return $result->num_rows;
        }else{
            return 0;
        }
    }

    public function getCountCompleted(){
        $sql = $sql = "SELECT * FROM invoice WHERE order_status = 'Completed'";
        $result = $this->conn->query($sql);
        if($result->num_rows > 0){
            return $result->num_rows;
        }else{
            return 0;
        }
    }
}

?>