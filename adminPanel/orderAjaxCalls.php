<?php 
include "..\classes\DBConnect.php";
include "..\classes\OrderController.php";
include "..\classes\CartController.php";
$db = new DatabaseConnection;
$orderObj = new OrderController;
$cartObj = new CartController;

if(isset($_REQUEST['task']) && $_REQUEST['task'] === 'loadTable'){
    $orderRes = $orderObj->DisplayOrders();
    if($orderRes){
        foreach($orderRes as $row){
            ?>
            <tr>
                <th scope="col"><?=$row['Invoice_ID']?></th>
                <td><?=$row['Order_Date']?></td>
                <td><?=$row['order_status']?></td>
                <td><button class="btn viewbtn" id="view" data-paymentID="<?=$row['Payment_ID']?>" data-invoiceID = "<?=$row['Invoice_ID']?>"><i class="far fa-eye"></i> View</button></td>
            </tr>
            <?php
        }
    }else{
        ?>
        
        <tr><td colspan="4" class="label">No Orders Yet</td></tr>
        
        <?php
    }
}

if(isset($_REQUEST['task'])&& isset($_REQUEST['invoiceID']) && $_REQUEST['task']==='viewOrder'){
    $pmResult = $orderObj->getPaymentMethod($_REQUEST['paymentID']);
    $pmData = $pmResult->fetch_assoc();
    $pmValue = $pmData['Payment_METHOD'];
    $contact;$address;
    if($pmValue === "Pick"){
        $contact = $pmData['Contact_NO'];
        $address = "None";
    }else{
        $contact=$pmData['Contact_NO'];
        $address=$pmData['Delivery_Address'];
    }
    ?>
    <!--Modal Header -->
    <div class="modal-header my-modal-header mycardheader">
        <div class="modal-title My-modal-title">INVOICE #<?=$_REQUEST['invoiceID']?> Order </div>
        <button type="button" class="btn-close my-close-btn" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <!-- ------------- -->
    <!-- Modal body -->
    <div class="modal-body">
        <div class="row">
            <div class="col-md-8">
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Size</th>
                                <th scope="col">Color</th>
                                <th scope="col">Quantity</th>
                            </tr>
                        </thead>
                        <tbody id="modalOrder">
                            <?php 
                            $result = $orderObj->getOrderInFoTable($_REQUEST['invoiceID']);
                            foreach($result as $row){
                                ?>
                                    <tr>
                                        <td><?=$row['Product_ID']?>: <?=$row['Pro_Name']?></td>
                                        <td><?=$row['Size_ID']?>: <?=$row['Size_Value']?></td>
                                        <td><?=$row['Color_ID']?>: <i class="fas fa-square" style="color: <?=$row['Color_Value']?>"></i>: <?=$row['Color_Name']?></td>
                                        <td><?=$row['Order_Qty']?></td>
                                    </tr>
                                <?php
                            }
                            ?>
                        </tbody> 
                    </table>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col">
                    <div class="card">
                        <div class="card-header mysubcardheader">Order Handling</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 label">Assign Employee For Order</div>
                                <div class="col-md-8">
                                    <select name="Emp" id="emp" class="form-select">
                                        <option value="0">Select</option>
                                    </select>
                                </div>
                                <div class="col-md-4"><button class="btn btn-primary btn-sm" id = "assign">Assign</button></div>
                            </div>
                            <?php 
                            if($pmValue === 'COD'){
                                ?>
                                <div class="row mt-3">
                                <div class="col-md-12 label">Assign Delivery Driver</div>
                                <div class="col-md-6">
                                    <select name="Emp" id="drive" class="form-select">
                                        <option value="0">Select</option>
                                    </select>
                                </div>
                                <div class="col-md-6"><button class="btn btn-primary btn-sm" id = "assign">Assign</button></div>
                            </div>
                                <?php
                            }
                            ?>
                            
                        </div>
                    </div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-md-12">
                    <div class="card">
                        <div class="card-header mysubcardheader">Customer Details</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 label">Delevery Address:</div>
                                <div class="col"><?=$address?></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6 label">Contact No:</div>
                                <div class="col"><?=$contact?></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6 label">Payment Method:</div>
                                <div class="col">
                                    <?php 
                                        if($pmValue === 'COD'){
                                            ?>
                                            Cash on Delivery
                                            <?php
                                        }else if($pmValue === 'BD'){
                                            ?>
                                            Bank Deposit
                                            <?php
                                        }else{
                                            ?>
                                            Pick Up
                                            <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    </div>
                    
                </div>
                

            </div>
        </div>

    </div>
    <div class="modal-footer my-modal-footer">
        <button class="btn btn-success">Confirm Order</button>
        <button class="btn btn-danger">Cancel</button>
        <button class="btn btn-info">Ready</button>
        <button class="btn btn-warning">Dispatch</button>
    </div>
    <!-- ------------- -->
    <?php
}

?>