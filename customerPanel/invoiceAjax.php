<?php 
include "..\classes\DBConnect.php";
include "..\classes\OrderController.php";
include "..\classes\ProductController.php";
$db = new DatabaseConnection;
$orderObj = new OrderController;
$productObj = new ProductController;

if(isset($_REQUEST['task']) && $_REQUEST['task']==='displayInvoice'){
    $OrderRes = $orderObj->getInvoiceDataForCustomer($_REQUEST['custID'],$_REQUEST['status']);
    if($OrderRes){
        foreach($OrderRes as $row){
            $pmResult = $orderObj->getPaymentMethod($row['Payment_ID']);
            $pmData = $pmResult->fetch_assoc();
            $pmValue = $pmData['Payment_METHOD'];
            ?>
            <div class="card order-card">

                <div class="card-header order-card-header">Invoice No : <?=$row['Invoice_ID']?></div>

                <div class="card-body order-card-body">
                    <?php 
                    if($pmValue === 'COD'){
                        ?>
                        <span><Strong>Payment Method :</Strong> Cash on Delivery</span>
                        <?php
                        
                    }else if($pmValue === 'BD'){
                        ?>
                        <span><Strong>Payment Method :</Strong> Bank Deposit</span>
                        <?php
                    }else{
                        ?>
                        <span><Strong>Payment Method :</Strong> Store Pick up</span>
                        <?php
                    }
                    ?>
                    

                    <div class="row mt-2">

                        <div class="col"><button class="btn btn-outline-primary" data-orderStatus="<?=$row['order_status']?>" data-invoiceID = '<?=$row['Invoice_ID']?>' data-paymentID='<?=$row['Payment_ID']?>' id="cust-view-order">View Order</button></div>
                        
                        <?php if($row['order_status'] ==='Pending') {?>

                        <div class="col"><button class="btn btn-outline-danger" data-invoiceID = '<?=$row['Invoice_ID']?>' data-paymentID='<?=$row['Payment_ID']?>' id="cust-cancel-order">Cancel Order</button></div>
                        
                        <?php } ?>
                    </div>
                    <?php 
                    if($pmValue === 'BD'){
                        ?>
                        <div class="row mt-2">

                            <form id="paymentProof">
                                <input type="hidden" id="paymentID" value="<?=$row['Payment_ID']?>">

                                <div class="col-12"><input type="file" name="proof" id="imgproof" class="form-control myChooseFile"></div>

                                <div class="col-md-12 mt-1 redda"><button type="submit" class="btn uploadbtn"> Upload </button></div>

                            </form>

                        </div>
                        <?php
                    }
                    ?>
                    

                </div>
                <div class="card-footer order-card-footer <?=$row['order_status']?>">Order Status: <span><?=$row['order_status']?></span></div>

            </div>

            <?php
        }
    }else{
        ?>
        <div class="card">
            <div class="card-body"><span class="h3">There is no any orders placed recently</span></div>
        </div>
        <?php
    }
}

if(isset($_REQUEST['task']) && $_REQUEST['task']==='displayCompletedInvoice'){
    $OrderRes = $orderObj->getCompletedInvoiceDataForCustomer($_REQUEST['custID'],$_REQUEST['status']);
    if($OrderRes){
        foreach($OrderRes as $row){
            $pmResult = $orderObj->getPaymentMethod($row['Payment_ID']);
            $pmData = $pmResult->fetch_assoc();
            $pmValue = $pmData['Payment_METHOD'];
            ?>
            <div class="card order-card">

                <div class="card-header order-card-header">Invoice No : <?=$row['Invoice_ID']?></div>

                <div class="card-body order-card-body">
                    <?php 
                    if($pmValue === 'COD'){
                        ?>
                        <span><Strong>Payment Method :</Strong> Cash on Delivery</span>
                        <?php
                        
                    }else if($pmValue === 'BD'){
                        ?>
                        <span><Strong>Payment Method :</Strong> Bank Deposit</span>
                        <?php
                    }else{
                        ?>
                        <span><Strong>Payment Method :</Strong> Store Pick up</span>
                        <?php
                    }
                    ?>
                    

                    <div class="row mt-2">

                        <div class="col"><button class="btn btn-outline-primary rating-viewbtn" data-invoiceID = '<?=$row['Invoice_ID']?>' data-paymentID='<?=$row['Payment_ID']?>' data-orderStatus="<?=$row['order_status']?>" id="">View Order</button></div>
                        
                        <?php if($row['order_status'] ==='Pending') {?>

                        <div class="col"><button class="btn btn-outline-danger" data-invoiceID = '<?=$row['Invoice_ID']?>' data-paymentID='<?=$row['Payment_ID']?>' id="cust-cancel-order">Cancel Order</button></div>
                        
                        <?php } ?>
                    </div>
                    <?php 
                    if($pmValue === 'BD'){
                        ?>
                        <div class="row mt-2">

                            <form id="paymentProof">
                                <input type="hidden" id="paymentID" value="<?=$row['Payment_ID']?>">

                                <div class="col-12"><input type="file" name="proof" id="imgproof" class="form-control myChooseFile"></div>

                                <div class="col-md-12 mt-1 redda"><button type="submit" class="btn uploadbtn"> Upload </button></div>

                            </form>

                        </div>
                        <?php
                    }
                    ?>
                    

                </div>
                <div class="card-footer order-card-footer <?=$row['order_status']?>">Order Status: <span><?=$row['order_status']?></span></div>

            </div>

            <?php
        }
    }else{
        ?>
        <div class="card">
            <div class="card-body"><span class="h3">There is no any orders placed recently</span></div>
        </div>
        <?php
    }
}

if(isset($_REQUEST['task'])&& isset($_REQUEST['invoice']) && $_REQUEST['task']==='viewCustomerOrder'){
    $pmResult = $orderObj->getPaymentMethod($_REQUEST['payment']);
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

        <div class="modal-title My-modal-title">INVOICE #<?=$_REQUEST['invoice']?> Order </div>

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
                            $result = $orderObj->getOrderInFoTable($_REQUEST['invoice']);
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

                <div class="card">

                    <div class="card-header mysubcardheader">Your InFo Details</div>

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
                            <?php if($pmValue === 'BD'){?>

                            <div class="row mt-3">

                                <div class="col-md-6 label">Payment Proof:</div>

                                    <div class="col">

                                        <?php 
                                            $payBDResult=$orderObj->getImgProofBDPayment($_REQUEST['payment']);
                                            if($payBDResult){
                                                $pBDData = $payBDResult->fetch_assoc();
                                                $payProof = $pBDData['Payment_Proof'];
                                                if(is_null($payProof)){
                                                    ?><a href="#" class="btn btn-outline-danger">No Image</a><?php
                                                }else{
                                                    ?><a href="data:image/jpg;base64,<?=base64_encode($payProof)?>"  target="_blank" class="btn btn-outline-success" id="proofimgview">view Image</a><?php
                                                }
                                            }
                                        ?>
                                            
                                    </div>
                                </div>
                                    <?php
                                } ?>
                                
                            </div>
                    </div>

                </div>

        </div>

    </div>

    <?php
}

if(isset($_REQUEST['task'])&& isset($_REQUEST['invoice']) && $_REQUEST['task']==='viewCustomerOrderWithRating'){
    $pmResult = $orderObj->getPaymentMethod($_REQUEST['payment']);
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

        <div class="modal-title My-modal-title">INVOICE #<?=$_REQUEST['invoice']?> Order </div>

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
                                <th scope="col">Action</th>
                            </tr>

                        </thead>

                        <tbody id="modalOrder">
                            <?php 
                            $result = $orderObj->getOrderInFoTable($_REQUEST['invoice']);
                            foreach($result as $row){
                                ?>
                                    <tr>
                                        <td><?=$row['Product_ID']?>: <?=$row['Pro_Name']?></td>
                                        <td><?=$row['Size_ID']?>: <?=$row['Size_Value']?></td>
                                        <td><?=$row['Color_ID']?>: <i class="fas fa-square" style="color: <?=$row['Color_Value']?>"></i>: <?=$row['Color_Name']?></td>
                                        <td><?=$row['Order_Qty']?></td>
                                        <td><button class="btn btn-outline-success" id="RateButton" data-productID='<?=$row['Product_ID']?>'>Rate</button></td>
                                    </tr>
                                <?php
                            }
                            ?>
                        </tbody> 

                    </table>

                </div>

            </div>

            <div class="col-md-4">

                <div class="card">

                    <div class="card-header mysubcardheader">Your InFo Details</div>

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
                            <?php if($pmValue === 'BD'){?>

                            <div class="row mt-3">

                                <div class="col-md-6 label">Payment Proof:</div>

                                    <div class="col">

                                        <?php 
                                            $payBDResult=$orderObj->getImgProofBDPayment($_REQUEST['payment']);
                                            if($payBDResult){
                                                $pBDData = $payBDResult->fetch_assoc();
                                                $payProof = $pBDData['Payment_Proof'];
                                                if(is_null($payProof)){
                                                    ?><a href="#" class="btn btn-outline-danger">No Image</a><?php
                                                }else{
                                                    ?><a href="data:image/jpg;base64,<?=base64_encode($payProof)?>"  target="_blank" class="btn btn-outline-success" id="proofimgview">view Image</a><?php
                                                }
                                            }
                                        ?>
                                            
                                    </div>
                                </div>
                                    <?php
                                } ?>
                                
                            </div>
                    </div>

                </div>

        </div>

    </div>

    <?php
}


if(isset($_REQUEST['task']) && $_REQUEST['task']==='updateProof'){
    $updateResult = $orderObj->updatePaymentProof($_FILES['proof']['tmp_name'],$_REQUEST['paymentID']);
    if($updateResult){
        echo 1;
    }else{
        echo $updateResult;
    }
}

if(isset($_REQUEST['task']) && $_REQUEST['task']==='cancelOrder'){

    $orderResult = $orderObj->getOrderInFoTable($_REQUEST['invoice']);

    foreach($orderResult as $orderRow){

        $productObj->addBackToStock($orderRow['Product_ID'],$orderRow['Color_ID'],$orderRow['Size_ID'],$orderRow['Order_Qty']);
    }

    $invoiceResult = $orderObj->RemoveRecordsFromInvoice($_REQUEST['invoice']);

    if($invoiceResult){

        $paymentResult = $orderObj->RemovePaymentRecord($_REQUEST['payment']);

        if($paymentResult){

            echo 1;
        }else{
            echo 0;
        }
    }

    
}

if(isset($_REQUEST['task']) && $_REQUEST['task'] === 'showRatingModal'){
    $result = $productObj->getProdutInFoRating($_REQUEST['productID']);
    $data = $result->fetch_assoc();

    ?>
<!--Modal Header -->
<div class="modal-header my-modal-header mycardheader">

<div class="modal-title My-modal-title">(<?=$data['Product_ID']?>) <?=$data['Pro_Name']?></div>

<button type="button" class="btn-close my-close-btn" data-bs-dismiss="modal" aria-label="Close"></button>

</div>
<!-- ------------- -->
<!-- Modal body -->
<div class="modal-body">

<div class="row">

  <div class="col-md-4">
     <!--Product Images-->
     <div id="productImageCarouselControl" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner my-modal-slider">
                    <div class="carousel-item active">
                        <img src="data:image/jpg;charset=utf8;base64,<?=base64_encode($data['Pro_IMG_1'])?>" class="d-block w-100 my-modal-slider-img" alt="...">
                    </div>
                    <div class="carousel-item ">
                        <img src="data:image/jpg;charset=utf8;base64,<?=base64_encode($data['Pro_IMG_2'])?>" class="d-block w-100 my-modal-slider-img" alt="...">
                    </div>
                    <div class="carousel-item ">
                        <img src="data:image/jpg;charset=utf8;base64,<?=base64_encode($data['Pro_IMG_3'])?>" class="d-block w-100 my-modal-slider-img" alt="...">
                    </div>
                    <button class="carousel-control-prev " type="button" data-bs-target="#productImageCarouselControl" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon slider-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next " type="button" data-bs-target="#productImageCarouselControl" data-bs-slide="next">
                        <span class="carousel-control-next-icon slider-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <!--Product Images end-->
  </div>

  <div class="col-md-8">

    <form id="RateProduct" data-ProductID="<?=$_REQUEST['productID']?>" data-CustomerID="<?=$_REQUEST['customerID']?>">

      <div class="row mt-2">

        <div class="col-md-4"><span class="label">Rate the product</span></div>

        <div class="col-md-8">

          <div class="star-rating">

            <input type="radio" name="rating" id="star5" value="5">
            <label for="star5"><span class="fa fa-star"></span></label>

            <input type="radio" name="rating" id="star4" value="4">
            <label for="star4"><span class="fa fa-star"></span></label>

            <input type="radio" name="rating" id="star3" value="3">
            <label for="star3"><span class="fa fa-star"></span></label>

            <input type="radio" name="rating" id="star2" value="2">
            <label for="star2"><span class="fa fa-star"></span></label>

            <input type="radio" name="rating" id="star1" value="1">
            <label for="star1"><span class="fa fa-star"></span></label>

          </div>
          <div id="strStarError"></div>

        </div>

      </div>
      <div class="row mt-2">
        <div class="col-md-4"><span class="label">Feedback</span></div>
        <div class="col-md-8">
          <textarea name="feedback" id="feedback" class="form-control" cols="30" rows="5"></textarea>
          <div id="strFeedbackError"></div>
        </div>
      </div>

      <div class="row mt-3">
        <div class="col">
          <button type="submit" class="btn uploadbtn">Submit Review</button>
        </div>
      </div>
      
    </form>

  </div>

</div>

</div>
    
    <?php
}



?>

<?php 
if(isset($_REQUEST['task']) && $_REQUEST['task'] === 'AddReview'){
    $data = [
        "cid" => mysqli_real_escape_string($db->conn,$_REQUEST['cid']),
        "pid" => mysqli_real_escape_string($db->conn,$_REQUEST['pid']),
        "rate" => mysqli_real_escape_string($db->conn,$_REQUEST['rate']),
        "feedback" => mysqli_real_escape_string($db->conn,$_REQUEST['feedback']),
    ];
    $res = $productObj -> addProductReview($data);
    if($res){
        echo 1;
    }else{
        echo 0;
    }

}
?>