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
        $desc = $offerData['desc'];
        $type = $offerData['type'];
        $disValue = $offerData['value'];
        $ValidFrom = date("Y-m-d", strtotime($offerData['FDate']));
        $ValidTo = date("Y-m-d", strtotime($offerData['TDate']));
        $OfferImg1 = $this->imgDbFormat($img);
        $sql_addOfferData = "INSERT INTO public_offers VALUES('$promoID','$offerTitle','$desc','$type','$disValue','$ValidFrom','$ValidTo','$OfferImg1')";
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
        $desc = $offerData['desc'];
        $type = $offerData['type'];
        $disValue = $offerData['value'];
        $ValidFrom = date("Y-m-d", strtotime($offerData['FDate']));
        $ValidTo = date("Y-m-d", strtotime($offerData['TDate']));
        $status = "NO";
        $sql_addOfferData = "INSERT INTO private_offers VALUES('$promoID','$offerTitle','$desc','$type','$disValue','$ValidFrom','$ValidTo','$status')";
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
        if($this->conn->query($sql_addOfferData)){
            $this->generateId->updatetID($idType);
            return true;
        }else{
            return false;
        }
    }

    public function deletePrivateOffer($PromoID){
        $sql_deleteOffer = "DELETE FROM private_offers WHERE Promo_ID = '$PromoID'";
        if($this->conn->query($sql_addOfferData)){
            $this->generateId->updatetID($idType);
            return true;
        }else{
            return false;
        }
    }

    

}

?>