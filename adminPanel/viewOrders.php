<?php 
$currentSubPage="viewOrders";
include "OrderManagement.php"; 

?>

<link rel="stylesheet" href="..\assets\css\admin-view-orders.css">

<div class="container">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Invoice ID</th>
                    <th scope="col">Order Date</th>
                    <th scope="col">Order Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                        
            </tbody> 
        </table>
    </div>
</div>
<div class="modal fade" id="viewEachOrder" data-bs-backdrop="static" data-bs-keyboard="false">     
    <div class="modal-dialog modal-xl">
        <link rel="stylesheet" href="..\assets\css\admin-view-orders.css">
        <div class="modal-content">
           
        </div>
    </div>
</div>
<script src="..\assets\js\viewOrder.js"></script>
<?php include "adminFooter.php"; ?>