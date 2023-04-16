<?php 
$currentSubPage="adminHome";
include "admin.php"; ?>
<link rel="stylesheet" href="..\assets\css\admin-dashboard-home-style-A.css">
<div class="card main-container">
    <div class="card-body main-body">
        <div class="row main-row">
            <div class="col main-col">
                <div class="card sub-card">
                    <div class="card-header">Category Status</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Main</h5>
                                        <div class="card-text">4</div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    
                                    <div class="card-body">
                                        <h5 class="card-title">Sub</h5>
                                        <div class="card-text">16</div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    
                                    <div class="card-body">
                                        <h5 class="card-title">Brands</h5>
                                        <div class="card-text">5</div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Suppliers</h5>
                                        <div class="card-text">5</div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col main-col">
                <div class="card">
                    <div class="card-header">Order Status</div>
                    <div class="card-body">
                    <div class="row">
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">New Orders</h5>
                                        <div class="card-text">4</div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    
                                    <div class="card-body">
                                        <h5 class="card-title">Ready Orders</h5>
                                        <div class="card-text">16</div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    
                                    <div class="card-body">
                                        <h5 class="card-title">Completed orders</h5>
                                        <div class="card-text">5</div>
                                        
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
                <div class="card">
                    <div class="card-header">Product Returns</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">New Return Requests</h5>
                                        <div class="card-text">4</div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    
                                    <div class="card-body">
                                        <h5 class="card-title">Rejected Requests</h5>
                                        <div class="card-text">5</div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    
                                    <div class="card-body">
                                        <h5 class="card-title">Approved Requests</h5>
                                        <div class="card-text">5</div>
                                        
                                    </div>
                                </div>
                            </div>
                            
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="col main-col">
                <div class="card">
                    <div class="card-header">Products</div>
                    <div class="card-body">
                    <div class="row">
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Instock</h5>
                                        <div class="card-text">4</div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    
                                    <div class="card-body">
                                        <h5 class="card-title">out of Stock</h5>
                                        <div class="card-text"> 0 </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    
                                    <div class="card-body">
                                        <h5 class="card-title">Low in Stock</h5>
                                        <div class="card-text">5</div>
                                        
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