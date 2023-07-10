<?php 
require_once "GenerateID.php";
class OrderController{
    private $paymentID;
    private $invoiceID;

    public function __construct(){
        $db = new DatabaseConnection;
        $this->generateId = new GenerateID;
        $this->conn = $db ->conn;
    }

    public function getpaymentID(){
        return $this->paymentID;
    }

    public function getInvoiceID(){
        return $this->invoiceID;
    }

    public function addPaymentCOD($data){
        $idType = "payment";
        $this->paymentID = $this->generateId->getNewID($idType);
        $deliveryFee = $data['del_Fee'];
        $total = $data['total'];
        $address = $data['address'];
        $contact = $data['contact'];
        $sql_payment = "INSERT INTO `payment_cod`(`Payment_ID`, `Delivery_Fee`, `Total`, `Delivery_Address`,`Contact_NO`) VALUES ('$this->paymentID','$deliveryFee','$total','$address','$contact')"; 
        if($this->conn->query($sql_payment)){
            $this->generateId->updatetID($idType);
            return true;
        }else{
            return false;
        }
    }
    public function addPaymentBD($data){
        $idType = "payment";
        $this->paymentID = $this->generateId->getNewID($idType);
        $deliveryFee = $data['del_Fee'];
        $total = $data['total'];
        $address = $data['address'];
        $contact = $data['contact'];
        $sql_payment = "INSERT INTO `payment_bankdeposit`(`Payment_ID`, `postal_charges`, `Total`, `Delivery_Address`, `Contact_NO`) VALUES ('$this->paymentID','$deliveryFee','$total','$address','$contact')";
        if($this->conn->query($sql_payment)){
            $this->generateId->updatetID($idType);
            return true;
        }else{
            return false;
        }
    }
    public function addPaymentPickUp($data){
        $idType = "payment";
        $this->paymentID = $this->generateId->getNewID($idType);
        $total = $data['total'];
        $contact = $data['contact'];
        $sql_payment = "INSERT INTO `payment_pickup`(`Payment_ID`, `Contact_NO`, `Total`) VALUES ('$this->paymentID','$contact','$total')";
        if($this->conn->query($sql_payment)){
            $this->generateId->updatetID($idType);
            return true;
        }else{
            return false;
        }
    }

    public function addInVoice($data){
        $idType = "invoice";
        $this->invoiceID = $this->generateId->getNewID($idType);
        $subTotal = $data['subTotal'];
        $discount = $data['discount'];
        $currentDate = date('Y-m-d');
        $status = "Pending";
        $paymentID = $this->paymentID;
        $sql_invoice = "INSERT INTO `invoice`(`Invoice_ID`, `sub_Total`, `Discount`, `Order_Date`,order_status ,`Payment_ID`) VALUES ('$this->invoiceID','$subTotal','$discount','$currentDate','$status','$paymentID')";
        if($this->conn->query($sql_invoice)){
            $this->generateId->updatetID($idType);
            return true;
        }else{
            return false;
        }
    }

    public function addOrder($data){
        $idType = "order";
        $orderID = $this->generateId->getNewID($idType);
        $productID = $data['pid'];
        $sizeID = $data['sid'];
        $colorID = $data['cid'];
        $qty=$data['qty'];
        $customerID=$data['custId'];
        $invoiceID = $this->invoiceID;
        $sql_order = "INSERT INTO `order_tbl`(`Order_ID`, `Product_ID`, `Size_ID`, `Color_ID`, `Order_Qty`, `Customer_ID`, `Invoice_ID`) VALUES ('$orderID','$productID','$sizeID','$colorID','$qty','$customerID','$invoiceID')";
        if($this->conn->query($sql_order)){
            $this->generateId->updatetID($idType);
        }
    }

    public function DisplayOrders(){
        $sql = "SELECT * FROM invoice";
        $result = $this->conn->query($sql);
        if($result->num_rows > 0){
            return $result;
        }else{
            return false;
        }
    }
    
    public function getOrderInFoTable($invoiceID){
        $sql = "SELECT p.Product_ID,s.Size_ID,c.Color_ID,p.Pro_Name,s.Size_Value,c.Color_Value,c.Color_Name,o.Order_Qty FROM product p, size s, color c, order_tbl o WHERE p.Product_ID = o.Product_ID AND s.Size_ID = o.Size_ID AND c.Color_ID = o.Color_ID AND o.Invoice_ID = '$invoiceID'";
        $result = $this->conn->query($sql);
        if($result->num_rows > 0){
            return $result;
        }else{
            return false;
        }
    }

    public function getPaymentMethod($paymentID){
        $sql_query = "SELECT 'COD' AS Payment_METHOD,Delivery_Address,Contact_NO FROM payment_cod WHERE Payment_ID = '$paymentID' UNION ALL SELECT 'BD' AS Payment_METHOD,Delivery_Address,Contact_NO FROM payment_bankdeposit WHERE Payment_ID = '$paymentID' UNION ALL SELECT 'Pick' AS Payment_METHOD,Contact_NO,`Total` FROM payment_pickup WHERE Payment_ID = '$paymentID'";
        $result = $this->conn->query($sql_query);
        if($result->num_rows > 0){
            return $result;
        }else{
            return false;
        }

    }
    

}

?>