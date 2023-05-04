<?php
class CategoryController{
    public function __construct(){
        $db = new DatabaseConnection;
        $generateId = new GenerateID;
        $this->conn = $db ->conn;
    }
    /*Main category*/
    public function addNewMainCategory($mainName){
        $idType = "mainCat";
        $mainId = $generateId->getNewID($idType);
        $sql_add_mainCat = "INSERT INTO main_category VALUES('$mainId','$mainName');";
        if($this->conn->query($sql_add_mainCat)){
            $generateId->updatetID($idType);
            return true;
        }else{
            return false;
        }
    }
    /*Sub category*/
    public function addNewSubCategory($subName){
        $idType = "subCat";
        $subId = $generateId->getNewID($idType);
        $sql_add_subCat = "INSERT INTO sub_category VALUES('$subId','$subName');";
        if($this->conn->query($sql_add_subCat)){
            $generateId->updatetID($idType);
            return true;
        }else{
            return false;
        }
    }
    /*brand category*/
    public function addNewBrand($brandName){
        $idType = "brand";
        $brandId = $generateId->getNewID($idType);
        $sql_add_brand = "INSERT INTO brand VALUES('$brandId','$brandName');";
        if($this->conn->query($sql_add_brand)){
            $generateId->updatetID($idType);
            return true;
        }else{
            return false;
        }
    }
}
?>