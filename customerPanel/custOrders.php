<?php 
$currentMainPage = "MyOrders";
include "customerHeader.php"; ?>
<link rel="stylesheet" href="..\assets\css\delivery-order-style.css">
<link rel="stylesheet" href="..\assets\css\customer-delivery-order-style.css">
<div class="d-flex mywrapper" id="wrapper">

  <!-- Sidebar -->
  <div class="bg-light border-right" id="sidebar">
    <ul>
      <li><a href='#' id="currentOrders">Your Pending Orders</a></li>
      <li><a href='#' id="completedOrders">Order History</a></li>
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
      <div class="card-body my-order-card-body">

        <div class="row order-row" id = "displayInvoice" data-customerid="<?=$customerID?>">

          
          
        </div>

      </div>    
    </div>

      

</div>
<!-- /#wrapper -->

<div class="modal fade" id="view-customer-order" data-bs-backdrop="static" data-bs-keyboard="false">     
    <div class="modal-dialog modal-xl">
        <link rel="stylesheet" href="..\assets\css\admin-view-orders.css">
        <div class="modal-content cust-order-content">
           
        </div>
    </div>
</div>

<div class="modal fade" id="product-rating-Modal" data-bs-backdrop="static" data-bs-keyboard="false">     
    <div class="modal-dialog modal-xl">
        <link rel="stylesheet" href="..\assets\css\admin-view-orders.css">
        <div class="modal-content ">
          <!--Modal Header -->
          <div class="modal-header my-modal-header mycardheader">

            <div class="modal-title My-modal-title">Product ID #</div>

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
                                    <img src="..\assets\imgs\sampleImgs\men\Carbon-Blue-Mens-Polo-T-Shirt.jpg" class="d-block w-100 my-modal-slider-img" alt="...">
                                </div>
                                <div class="carousel-item ">
                                    <img src="..\assets\imgs\sampleImgs\men\Carbon-Blue-Mens-Polo-T-Shirt.jpg" class="d-block w-100 my-modal-slider-img" alt="...">
                                </div>
                                <div class="carousel-item ">
                                    <img src="..\assets\imgs\sampleImgs\men\Carbon-Blue-Mens-Polo-T-Shirt.jpg" class="d-block w-100 my-modal-slider-img" alt="...">
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

                <form id="RateProduct">

                  <div class="row">

                    <div class="col-md-4">Rate the product</div>

                    <div class="col-md-8">

                      <div class="star-rating">

                        <input type="radio" name="rating" id="star1" value="1">
                        <label for="star1"><span class="fa fa-star"></span></label>

                        <input type="radio" name="rating" id="star2" value="2">
                        <label for="star2"><span class="fa fa-star"></span></label>

                        <input type="radio" name="rating" id="star3" value="3">
                        <label for="star3"><span class="fa fa-star"></span></label>

                        <input type="radio" name="rating" id="star4" value="4">
                        <label for="star4"><span class="fa fa-star"></span></label>

                        <input type="radio" name="rating" id="star5" value="5">
                        <label for="star5"><span class="fa fa-star"></span></label>

                      </div>

                    </div>

                  </div>
                  <div class="row">
                    <div class="col-md-4">Feedback</div>
                    <div class="col-md-8">
                      <textarea name="feedback" id="feedback" class="form-control" cols="30" rows="5"></textarea>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col">
                      <button type="submit" class="btn uploadbtn"> Submit Review</button>
                    </div>
                  </div>
                  
                </form>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
<script src="..\assets\js\delivery-orderPage.js"></script>
<?php include "customerFooter.php"; ?>