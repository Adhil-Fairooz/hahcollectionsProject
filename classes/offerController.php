<?php 
require_once "GenerateID.php";

class offerController{
    public function __construct(){
        $db = new DatabaseConnection;
        $this->conn = $db ->conn;
        $this->generateId = new GenerateID;
    }

    private function imgDbFormat($file){
        /*$imageTempName = $file['tmp_Name'];*/
        $imageContent = addslashes(file_get_contents($file));
        return $imageContent;
    }

    public function addPublicOffers($offerData,$img){
        $idType = "offers";
        $promoID = $this->generateId->getNewID($idType);
        $offerTitle = $offerData['title'];
        $offerName = $offerData['name'];
        $desc = $offerData['desc'];
        $type = $offerData['type'];
        $disValue = $offerData['value'];
        $bill = $offerData['bill'];
        $ValidFrom = date("Y-m-d", strtotime($offerData['FDate']));
        $ValidTo = date("Y-m-d", strtotime($offerData['TDate']));
        $OfferImg1 = $this->imgDbFormat($img);
        $sql_addOfferData = "INSERT INTO public_offers VALUES('$promoID','$offerName','$offerTitle','$desc','$type','$disValue','$bill','$ValidFrom','$ValidTo','$OfferImg1')";
        if($this->conn->query($sql_addOfferData)){
            $this->generateId->updatetID($idType);
            return true;
        }else{
            return false;
        }
    }

    public function addPrivateOffers($offerData){
        $idType = "offers";
        $promoID = $this->generateId->getNewID($idType);
        $offerTitle = $offerData['title'];
        $offerName = $offerData['name'];
        $desc = $offerData['desc'];
        $type = $offerData['type'];
        $disValue = $offerData['value'];
        $bill = $offerData['bill'];
        $ValidFrom = date("Y-m-d", strtotime($offerData['FDate']));
        $ValidTo = date("Y-m-d", strtotime($offerData['TDate']));
        $status = "NO";
        $sql_addOfferData = "INSERT INTO private_offers VALUES('$promoID','$offerName','$offerTitle','$desc','$type','$disValue','$bill','$ValidFrom','$ValidTo','$status')";
        if($this->conn->query($sql_addOfferData)){
            $this->generateId->updatetID($idType);
            return true;
        }else{
            return false;
        }
    }

    public function displayPublicOffers(){
        $sql_get_data = "SELECT * FROM public_offers";
        $results = $this->conn->query($sql_get_data);
        if($results->num_rows > 0){
            return $results;
        }else{
            return false;
        }
    }
    public function getPublicOffer($id){
        $sql_get_data = "SELECT * FROM public_offers WHERE Promo_ID='$id'";
        $results = $this->conn->query($sql_get_data);
        if($results->num_rows > 0){
            return $results;
        }else{
            return false;
        }
    }
    public function getPrivateOffer($id){
        $sql_get_data = "SELECT * FROM private_offers WHERE Promo_ID='$id'";
        $results = $this->conn->query($sql_get_data);
        if($results->num_rows > 0){
            return $results;
        }else{
            return false;
        }
    }

    public function displayPrivateOffers(){
        $sql_get_data = "SELECT * FROM private_offers";
        $results = $this->conn->query($sql_get_data);
        if($results->num_rows > 0){
            return $results;
        }else{
            return false;
        }
    }

    public function deletePublicOffer($PromoID){
        $sql_deleteOffer = "DELETE FROM public_offers WHERE Promo_ID = '$PromoID'";
        if($this->conn->query($sql_deleteOffer)){
            return true;
        }else{
            return false;
        }
    }

    public function deletePrivateOffer($PromoID){
        $sql_deleteOffer = "DELETE FROM private_offers WHERE Promo_ID = '$PromoID'";
        if($this->conn->query($sql_deleteOffer)){
            return true;
        }else{
            return false;
        }
    }
    public function UpdatePublicOffer($offerData){
        $promoID = $offerData['ID'];
        $offerTitle = $offerData['title'];
        $offerName = $offerData['name'];
        $desc = $offerData['desc'];
        $type = $offerData['type'];
        $disValue = $offerData['value'];
        $bill = $offerData['bill'];
        $ValidFrom = date("Y-m-d", strtotime($offerData['FDate']));
        $ValidTo = date("Y-m-d", strtotime($offerData['TDate']));
        $sql_updateOfferData = "UPDATE public_offers SET Offer_Name = '$offerName',Offer_Title = '$offerTitle', `Description` = '$desc',Discount_Type = '$type',Discount = '$disValue',TotalBillValue = '$bill',Valid_From_Date = '$ValidFrom',Valid_To_Date = '$ValidTo' WHERE Promo_ID = '$promoID';";
        if($this->conn->query($sql_updateOfferData)){
            return true;
        }else{
            return false;
        }
    }
    public function UpdatePrivateOffer($offerData){
        $promoID = $offerData['ID'];
        $offerTitle = $offerData['title'];
        $offerName = $offerData['name'];
        $desc = $offerData['desc'];
        $type = $offerData['type'];
        $disValue = $offerData['value'];
        $bill = $offerData['bill'];
        $ValidFrom = date("Y-m-d", strtotime($offerData['FDate']));
        $ValidTo = date("Y-m-d", strtotime($offerData['TDate']));
        $status = $offerData['status'];
        $sql_updateOfferData = "UPDATE private_offers SET Offer_Name = '$offerName',Offer_Title = '$offerTitle', `Description` = '$desc',Discount_Type = '$type',Discount = '$disValue',TotalBillValue = '$bill',Valid_From_Date = '$ValidFrom',Valid_To_Date = '$ValidTo', claimed_Status='$status' WHERE Promo_ID = '$promoID';";
        if($this->conn->query($sql_updateOfferData)){
            return true;
        }else{
            return false;
        }
    }

    public function getPublicCount(){
        $sql_get_data = "SELECT * FROM public_offers";
        $results = $this->conn->query($sql_get_data);
        if($results->num_rows > 0){
            return $results->num_rows;
        }else{
            return 0;
        }
    }

    public function loadPrivateOffer($sustomerID){
        $sql_get_data = "SELECT * FROM public_offers";
        $results = $this->conn->query($sql_get_data);
        if($results->num_rows > 0){
            return $results->num_rows;
        }else{
            return 0;
        }
    }
    public function loadPublicOffer(){
        $currentDate = date('Y-m-d');
        $sql_get_data = "SELECT Promo_ID,Offer_Name FROM public_offers WHERE '$currentDate' BETWEEN Valid_From_Date AND Valid_To_Date";
        $results = $this->conn->query($sql_get_data);
        if($results->num_rows > 0){
            return $results;
        }else{
            return false;
        }
    }
    public function getofferDetails($ID){
        $sql_tbl_private = "SELECT Discount_Type,Discount,TotalBillValue FROM private_offers WHERE Promo_ID = '$ID';";
        $sql_tbl_public = "SELECT Discount_Type,Discount,TotalBillValue FROM public_offers WHERE Promo_ID = '$ID';";
        $result_private = $this->conn->query($sql_tbl_private);
        if($result_private->num_rows == 0){
            $result_public = $this->conn->query($sql_tbl_public);
            if($result_public->num_rows > 0){
                return $result_public;
            }else{
                return false;
            }
        }else{
            return $result_private;
        }
    }
    

}

?>