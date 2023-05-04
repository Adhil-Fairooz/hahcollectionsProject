<?php 
include "GenerateID.php";
class ProductController{

    public function __construct(){
        $db = new DatabaseConnection;
        $this->conn = $db ->conn;
        $this->generateId = new GenerateID;
    }

    /*product color*/
    public function addNewColor($colorData){
        $idType = "color";
        $colorId = $this->generateId->getNewID($idType);
        $colorName = $colorData['name'];
        $colorValue = $colorData['value'];
        $sql_add_color = "INSERT INTO color VALUES('$colorId','$colorName','$colorValue');";
        if($this->conn->query($sql_add_color)){
            $this->generateId->updatetID($idType);
            return true;
        }else{
            return false;
        }
    }
    public function getColorData(){
        $sql_get_color_data = "SELECT * FROM color;";
        $results = $this->conn->query($sql_get_color_data);
        if($results->num_rows > 0){
            return $results;
        }else{
            return false;
        }
    }
    /*product size*/
    public function addNewSize($sizeData){
        $generateId = new GenerateID;
        $idType = "size";
        $sizeId = $this->generateId->getNewID($idType);
        $sizeType = $sizeData['type'];
        $sizeValue = $sizeData['value'];
        $sql_add_size = "INSERT INTO size VALUES('$sizeId','$sizeType','$sizeValue');";
        if($this->conn->query($sql_add_size)){
            $this->generateId->updatetID($idType);
            return true;
        }else{
            return false;
        }
    }
    public function getType(){
        $sql_get_Type = "SELECT Size_Type FROM size GROUP BY Size_Type;";
        $results = $this->conn->query($sql_get_Type);
        if($results->num_rows > 0){
            return $results;
        }else{
            return false;
        }
    }
    public function getSizeData(){
        $sql_get_size_Data = "SELECT * FROM size;";
        $results = $this->conn->query($sql_get_size_Data);
        if($results->num_rows > 0){
            return $results;
        }else{
            return false;
        }
    }
    /*product Data*/
    private function imgDbFormat($file){
        $imageTempName = $file['tmp_Name'];
        $imageContent = addslashes(file_get_contents($imageTempName));
        return $imageContent;
    }
    public function addNewProduct($productData,$image1,$image2,$image3){
       $idType = "product";
       $productId = $this->generateId->getNewID($idType);
       $productName = $productData['pName'];
       $productDesc = $productData['pDesc'];
       $productUnitPrice = $productData['pUnitPrice'];
       $productSalePrice = $productData['pSalePrice'];
       $productImg1 = $this->imgDbFormat($image1);
       $productImg1 = $this->imgDbFormat($image2);
       $productImg1 = $this->imgDbFormat($image3);
       $sql_add_product = "INSERT INTO product VALUES('$productId','$productName','$productDesc','$productUnitPrice','$productSalePrice','$productImg1','$productImg2','$productImg3')";
       if($this->conn->query($sql_add_product)){
        $this->generateId->updatetID($idType);
        return true;
       }else{
        return false;
       }
    }

    /* Product stock based on color and size */

    public function addStockInfo($stockData){
        $productId = $stockData['pID'];
        $sizeId = $stockData['sID'];
        $colorId = $stockData['cID'];
        $stockQty = $stockData['qty'];
        $sql_add_stock_info = "INSERT INTO product_variation VALUES('$productId','$sizeId','$colorId','$stockQty')";
        if($this->conn->query($sql_add_stock_info)){
            return true;
        }else{
            return false;
        }
    }
}

?>