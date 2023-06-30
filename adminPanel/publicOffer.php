<?php 
$currentSubPage="public";
include "OfferManagement.php"; 
?>
<link rel="stylesheet" href="..\assets\css\admin-offer-style.css">
<div class="container my-container mt-2">
    <div class="card form-card mb-3">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6 off-my-col">
                        <form class="d-flex search-box">
                            <input class="form-control search-input " type="search" placeholder="Search" aria-label="Search">
                            <button class="btn search-btn" type="submit"><i class="fas fa-search"></i></button>
                        </form>
                </div>
                <div class="col-lg-3"><button class="btn my-Btn add-offer-public">Add New Offer Item</button></div>
                <div class="col-lg-3"><span>No of public Offers: 0</span></div>
            </div>
        </div>
    </div>
    
    <div class="card table-card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Promo ID</th>
                            <th scope="col">Offer Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Discount Type</th>
                            <th scope="col">Discount</th>
                            <th scope="col">Valid From</th>
                            <th scope="col">Valid Till</th>
                            <th scope="col">Img</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="col">#</td>
                            <td>#</td>
                            <td>#</td>
                            <td>#</td>
                            <td>#</td>
                            <td>#</td>
                            <td class="img">#</td>
                            <td>#</td>
                            <td>
                                <button class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></button>
                                <button class="btn btn-outline-success"><i class="fas fa-edit"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="add-Offer-modal" data-bs-backdrop="static" data-bs-keyboard="false">     
    <div class="modal-dialog modal-xl">
        <link rel="stylesheet" href="..\assets\css\admin-modal-style.css">
        <div class="modal-content">
           
        </div>
    </div>
</div>
<script src="..\assets\js\admin-offer-modal.js"></script>

<?php include "adminFooter.php"; ?>