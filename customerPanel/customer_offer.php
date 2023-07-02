<?php 
include "..\classes\DBConnect.php";
include "..\classes\offerController.php";
$db = new DatabaseConnection;
$offerObj = new offerController;

if(isset($_POST['table']) && isset($_POST['customer_id'])){
    if($_POST['table'] === 'public'){
        $pubRes = $offerObj->loadPublicOffer();
        if($pubRes){
            echo "<option value='0'>Select</option>";
            foreach($pubRes as $row){?>
                <option value="<?=$row['Promo_ID']?>"><?=$row['Offer_Name']?></option>
            <?php }
        }else{
            echo "<option value='0'>None</option>";
        }

    }else{
        echo "<option value='0'>None</option>";
    }
}

?>