<?php 
$currentMainPage = "delOrders";
include "deliveryHeader.php"; ?>
<link rel="stylesheet" href="..\assets\css\delivery-order-style.css">
<div class="d-flex mywrapper" id="wrapper">

<!-- Sidebar -->
<div class="bg-light border-right" id="sidebar">
  <ul>
    <li><a href="#">New Delivery Orders</a></li>
    <li><a href="#">Delivery History</a></li>
  </ul>

</div>
<!-- /#sidebar -->

<!-- Page Content -->
<div id="page-content-wrapper">
  <button type="button" class="btn btn-primary d-lg-none" id="sidebarCollapse">
  <i class="fas fa-angle-double-right"></i>
  </button>
</div>
<!-- /#page-content-wrapper -->
<div class="card my-card-content">
    <div class="card-header">Delivery Order Info</div>
    <div class="card-body my-card-body">
    <div class="table-responsive mt-3">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Invoice ID</th>
                    <th scope="col">Order Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                        
            </tbody> 
        </table>
    </div>
    </div>
</div>
</div>
<!-- /#wrapper -->
<script src="..\assets\js\delivery-orderPage.js"></script>
<?php include "deliveryFooter.php"; ?>