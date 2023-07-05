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
        $paymentID = $this->paymentID;
        $sql_invoice = "INSERT INTO `invoice`(`Invoice_ID`, `sub_Total`, `Discount`, `Order_Date`, `Payment_ID`) VALUES ('$this->invoiceID','$subTotal','$discount','$currentDate','$paymentID')";
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
}

?>