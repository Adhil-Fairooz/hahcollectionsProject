<?php 
$currentMainPage = "MyOrders";
include "customerHeader.php"; ?>
<link rel="stylesheet" href="..\assets\css\delivery-order-style.css">
<div class="d-flex mywrapper" id="wrapper">

<!-- Sidebar -->
<div class="bg-light border-right" id="sidebar">
  <ul>
    <li><a href="#">Your Pending Orders</a></li>
    <li><a href="#">Order History</a></li>
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
    <div class="card-body my-card-body">
    </div>
</div>
</div>
<!-- /#wrapper -->
<script src="..\assets\js\delivery-orderPage.js"></script>
<?php include "customerFooter.php"; ?>