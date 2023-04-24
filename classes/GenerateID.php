<?php 
 class GenerateID{
    public function  __construct(){
        $db = new DatabaseConnection;
        $this->conn = $db ->conn;
    }
    public $pro_id_No;
    public $size_id_No;
    public $color_id_No;

    public function getNewProductID(){
        $sql = "SELECT ID_no FROM generate_id WHERE ID_Type ='product';";
        $result = $this->conn->query($sql);
        $row =$result -> fetch_assoc();
        $this->pro_id_No = $row['ID_no'];
        return "P".$row['ID_no'];
    }
    public function updateProductID(){
        $this->pro_id_No= $this->pro_id_No+1;
        $sql= "UPDATE generate_id SET ID_no = '$this->pro_id_No' WHERE ID_Type = 'product';";
        $this->conn->query($sql);
    }

    public function getNewSizeID(){
        $sql = "SELECT ID_no FROM generate_id WHERE ID_Type ='size';";
        $result = $this->conn->query($sql);
        $row =$result -> fetch_assoc();
        $this->size_id_No = $row['ID_no'];
        return "S".$row['ID_no']; 
    }
    public function updateSizeID(){
        $this->size_id_No= $this->size_id_No+1;
        $sql= "UPDATE generate_id SET ID_no = '$this->size_id_No' WHERE ID_Type = 'size';";
        $this->conn->query($sql);
    }

    public function getNewColorID(){
        $sql = "SELECT ID_no FROM generate_id WHERE ID_Type ='color';";
        $result = $this->conn->query($sql);
        $row =$result -> fetch_assoc();
        $this->color_id_No = $row['ID_no'];
        return "C".$row['ID_no'];
    }
    public function updateColorID(){
        $this->color_id_No= $this->color_id_No+1;
        $sql= "UPDATE generate_id SET ID_no = '$this->color_id_No' WHERE ID_Type = 'color';";
        $this->conn->query($sql);
    }
 }

?>