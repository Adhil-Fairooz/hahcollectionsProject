<?php 
$currentSubPage="adminHome";
include "admin.php"; 
include "..\classes\DBConnect.php";
include "..\classes\AdminController.php";
$db = new DatabaseConnection;
$adminObj = new AdminController;
?>
<link rel="stylesheet" href="..\assets\css\admin-dashboard-home-style-A.css">

<div class="card main-container">

    <div class="card-body main-body">

        <div class="row main-row">

            <div class="col main-col">

                <div class="card sub-card">

                    <div class="card-header my-card-header">Category Status</div>

                    <div class="card-body">

                        <div class="row">

                            <div class="col">

                                <div class="card my-card-content-box">

                                    <div class="card-body my-content-box-body">

                                        <div class="card-title my-content-box-title">Main</div>

                                        <div class="card-text my-content-box-text"><?=$adminObj->getCountMainCategory()?></div>
                                        
                                    </div>

                                </div>

                            </div>

                            <div class="col">

                                <div class="card my-card-content-box">

                                    <div class="card-body my-content-box-body">

                                        <div class="card-title my-content-box-title">Sub</div>

                                        <div class="card-text my-content-box-text"><?=$adminObj->getCountSubCategory()?></div>

                                    </div>

                                </div>

                            </div>

                            <div class="col">

                                <div class="card my-card-content-box">

                                    <div class="card-body my-content-box-body">

                                        <div class="card-title my-content-box-title">Brand</div>

                                        <div class="card-text my-content-box-text"><?=$adminObj->getCountBrand()?></div>
                                        
                                    </div>

                                </div>

                            </div>

                            <div class="col">

                                <div class="card my-card-content-box">

                                    <div class="card-body my-content-box-body">

                                        <div class="card-title my-content-box-title">Supplier</div>

                                        <div class="card-text my-content-box-text"><?=$adminObj->getCountSupplier()?></div>
                                        
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>
            </div>
            
            <div class="col main-col">
                <div class="card sub-card">
                    <div class="card-header my-card-header">Order Status</div>
                    <div class="card-body">
                    <div class="row">
                            <div class="col">
                            <div class="card my-card-content-box">
                                    <div class="card-body my-content-box-body">
                                        <div class="card-title my-content-box-title">New Orders</div>
                                        <div class="card-text my-content-box-text"><?=$adminObj->getCountNewOrders()?></div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card my-card-content-box">
                                    <div class="card-body my-content-box-body">
                                        <div class="card-title my-content-box-title">Ready Orders</div>
                                        <div class="card-text my-content-box-text"><?=$adminObj->getCountReadyOrders()?></div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                            <div class="card my-card-content-box">
                                    <div class="card-body my-content-box-body">
                                        <div class="card-title my-content-box-title">Completed Orders</div>
                                        <div class="card-text my-content-box-text"><?=$adminObj->getCountCompleted()?></div>
                                        
                                    </div>
                                </div>
                            </div>                         
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row main-row">
            <div class="col main-col">
                <div class="card sub-card">
                    <div class="card-header my-card-header">Product Offers</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                            <div class="card my-card-content-box">
                                    <div class="card-body my-content-box-body">
                                        <div class="card-title my-content-box-title">Public Offers</div>
                                        <div class="card-text my-content-box-text">1</div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card my-card-content-box">
                                    <div class="card-body my-content-box-body">
                                        <div class="card-title my-content-box-title">Private Offers</div>
                                        <div class="card-text my-content-box-text">1</div>
                                    </div>
                                </div>
                            </div>                         
                        </div>
                    </div>
                </div>
            </div>
            <div class="col main-col">
                <div class="card sub-card">
                    <div class="card-header my-card-header">Products</div>
                    <div class="card-body">
                    <div class="row">
                            <div class="col">
                                <div class="card my-card-content-box">
                                    <div class="card-body my-content-box-body">
                                        <div class="card-title my-content-box-title">Instock</div>
                                        <div class="card-text my-content-box-text">5</div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card my-card-content-box">
                                    <div class="card-body my-content-box-body">
                                        <div class="card-title my-content-box-title">Out of stock</div>
                                        <div class="card-text my-content-box-text">0</div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card my-card-content-box">
                                    <div class="card-body my-content-box-body">
                                        <div class="card-title my-content-box-title">Low in Stock</div>
                                        <div class="card-text my-content-box-text">0</div>
                                        
                                    </div>
                                </div>
                            </div>                         
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "adminFooter.php"; ?>