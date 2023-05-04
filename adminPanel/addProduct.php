<?php 
$currentSubPage="add";
include "ProductManagement.php"; ?>
<link rel="stylesheet" href="..\assets\css\admin-product-new-product-style.css">
<script src="..\assets\js\admin-product-add.js"></script>
<div class="container">
    <div class="card mt-3">
        <div class="card-header mycardheader">Add New Product</div>
        <div class="card-body">
            <form action="#" method="post">
                <div class="row myrow">
                    <div class="col-md-3">
                        <div class="form-floating myFormFloating">
                            <select class="form-select myselect" id="floatingSelect">
                                <option value="0">Select</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                            <label for="floatingSelect">Select Main category</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating myFormFloating">
                            <select class="form-select myselect" id="floatingSelect" aria-label="Floating label select example">
                                <option value="0">Select</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                            <label for="floatingSelect">Select Sub category</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating myFormFloating">
                            <select class="form-select myselect" id="floatingSelect" aria-label="Floating label select example">
                                <option value="0">Select</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                            <label for="floatingSelect">Select Brand Name</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating myFormFloating">
                            <select class="form-select myselect" id="floatingSelect" aria-label="Floating label select example">
                                <option value="0">Select</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                            <label for="floatingSelect">Select Supplier</label>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="form-floating myFormFloating">
                            <input type="text" class="form-control myinputText" id="floatingInput" placeholder=" ">
                            <label for="floatingInput">Product Name</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating myFormFloating">
                            <textarea class="form-control myinputTextArea" placeholder=" " id="floatingTextarea"></textarea>
                            <label for="floatingTextarea">Product Description</label>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="form-floating mb-3 myFormFloating">
                            <input type="text" class="form-control myinputText" id="floatingInput" placeholder=" ">
                            <label for="floatingInput">Product Unit Price (Rs.)</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating myFormFloating mb-3">
                            <input type="text" class="form-control myinputText" id="floatingInput" placeholder=" ">
                            <label for="floatingInput">Product Selling Price (Rs.)</label>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="form-group has-validation myFormGroup">
                            <label for="formFile" class="form-label">Please select 3 image files</label>
                            <input type="file" id="file-input" name="imageFile[]" accept="image/png, image/jpeg" onchange="preview()" multiple class="form-control myChooseFile">
                            <div id="strErr"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card img-box">
                            <div class="row " id="images">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <div class="btn-col">
                            <button class="btn myBtn" id="btnAdd">Add Product</button>
                        </div>
                        
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
<?php include "adminFooter.php"; ?>