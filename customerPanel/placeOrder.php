<?php 
include "..\classes\DBConnect.php";
include "..\classes\OrderController.php";
include "..\classes\CartController.php";
$db = new DatabaseConnection;
$orderObj = new OrderController;
$cartObj = new CartController;

if(isset($_REQUEST['task']) && $_REQUEST['task']==='placeOrder'){
    if($_REQUEST['paymentMode'] === 'COD'){
        $paymentData = [
            "del_Fee" => mysqli_real_escape_string($db->conn,$_REQUEST['charges']),
            "total" => mysqli_real_escape_string($db->conn,$_REQUEST['total']),
            "address" => mysqli_real_escape_string($db->conn,$_REQUEST['address']),
            "contact" => mysqli_real_escape_string($db->conn,$_REQUEST['contact']),
        ];
        $paymentResult = $orderObj->addPaymentCOD($paymentData);
        if($paymentResult){
            $invoiceData = [
                "subTotal" => mysqli_real_escape_string($db->conn,$_REQUEST['subtotal']),
                "discount" => mysqli_real_escape_string($db->conn,$_REQUEST['discount']),
            ];
            $invoiceResult = $orderObj->addInVoice($invoiceData);
            if($invoiceResult){
                $cartResult = $cartObj->getcartInfoDirect($_REQUEST['customerID']);
                if($cartResult){
                    foreach ($cartResult as $row){
                        $orderData = [
                            "pid" => mysqli_real_escape_string($db->conn,$row['Product_ID']),
                            "sid" => mysqli_real_escape_string($db->conn,$row['Size_ID']),
                            "cid" => mysqli_real_escape_string($db->conn,$row['Color_ID']),
                            "qty" => mysqli_real_escape_string($db->conn,$row['Qty']),
                            "custId" => mysqli_real_escape_string($db->conn,$row['Customer_ID'])
                        ];
                        $orderResult = $orderObj->addOrder($orderData);
                    }
                    echo 1;
                }
            }
        }else{
            echo "0";
        }

    }else if($_REQUEST['paymentMode'] === 'BD'){
        $paymentData = [
            "del_Fee" => mysqli_real_escape_string($db->conn,$_REQUEST['charges']),
            "total" => mysqli_real_escape_string($db->conn,$_REQUEST['total']),
            "address" => mysqli_real_escape_string($db->conn,$_REQUEST['address']),
            "contact" => mysqli_real_escape_string($db->conn,$_REQUEST['contact']),
        ];
        $paymentResult = $orderObj->addPaymentBD($paymentData);
        if($paymentResult){
            $invoiceData = [
                "subTotal" => mysqli_real_escape_string($db->conn,$_REQUEST['subtotal']),
                "discount" => mysqli_real_escape_string($db->conn,$_REQUEST['discount']),
            ];
            $invoiceResult = $orderObj->addInVoice($invoiceData);
            if($invoiceResult){
                $cartResult = $cartObj->getcartInfoDirect($_REQUEST['customerID']);
                if($cartResult){
                    foreach ($cartResult as $row){
                        $orderData = [
                            "pid" => mysqli_real_escape_string($db->conn,$row['Product_ID']),
                            "sid" => mysqli_real_escape_string($db->conn,$row['Size_ID']),
                            "cid" => mysqli_real_escape_string($db->conn,$row['Color_ID']),
                            "qty" => mysqli_real_escape_string($db->conn,$row['Qty']),
                            "custId" => mysqli_real_escape_string($db->conn,$row['Customer_ID'])
                        ];
                        $orderResult = $orderObj->addOrder($orderData);
                    }
                    echo 1;
                }
            }
        }
    }else{
        $paymentData = [
            "total" => mysqli_real_escape_string($db->conn,$_REQUEST['total']),
            "contact" => mysqli_real_escape_string($db->conn,$_REQUEST['contact']),
        ];
        $paymentResult = $orderObj->addPaymentPickUp($paymentData);
        if($paymentResult){
            $invoiceData = [
                "subTotal" => mysqli_real_escape_string($db->conn,$_REQUEST['subtotal']),
                "discount" => mysqli_real_escape_string($db->conn,$_REQUEST['discount']),
            ];
            $invoiceResult = $orderObj->addInVoice($invoiceData);
            if($invoiceResult){
                $cartResult = $cartObj->getcartInfoDirect($_REQUEST['customerID']);
                if($cartResult){
                    foreach ($cartResult as $row){
                        $orderData = [
                            "pid" => mysqli_real_escape_string($db->conn,$row['Product_ID']),
                            "sid" => mysqli_real_escape_string($db->conn,$row['Size_ID']),
                            "cid" => mysqli_real_escape_string($db->conn,$row['Color_ID']),
                            "qty" => mysqli_real_escape_string($db->conn,$row['Qty']),
                            "custId" => mysqli_real_escape_string($db->conn,$row['Customer_ID'])
                        ];
                        $orderResult = $orderObj->addOrder($orderData);
                    }
                    echo 1;
                }
            }
        }

    }
}
?>

