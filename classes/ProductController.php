<?php 
class ProductController{

    public function __construct(){
        $db = new DatabaseConnection;
        $generateId = new GenerateID;
        $this->conn = $db ->conn;
    }

    public function addNewColor($colorData){
        $colorId = $generateId->getNewColorID();
        $colorName = $colorData['name'];
        $colorValue = $colorData['value'];
        $sql_add_color = "INSERT INTO color VALUES('$colorId','$colorName','$colorValue');";
        if($this->conn->query($sql_add_color)){
            $generateId->updateColorID();
            return true;
        }else{
            return false;
        }
    }

    public function addNewSize($sizeData){
        $sizeId = $generateId->getNewSizeID();
        $sizeType = $sizeData['type'];
        $sizeValue = $sizeData['value'];
        $sql_add_size = "INSERT INTO color VALUES('$cosizeIdlorId','$sizeType','$sizeValue');";
        if($this->conn->query($sql_add_size)){
            $generateId->updateSizeID();
            return true;
        }else{
            return false;
        }
    }

    public function addNewProduct(){
       $productId = $generateId->getNewProductID();
    }
}

?>