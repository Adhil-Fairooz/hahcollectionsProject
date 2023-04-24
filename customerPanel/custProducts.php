<?php 
$currentMainPage = "products";
include "customerHeader.php"; ?>
<link rel="stylesheet" href="../assets/css/customer-product-style.css">
<div class="container-fluid mycontainer">
    <nav class="navbar ">
        <div class="container">
            <form class="d-flex search-box">
                <input class="form-control search-input " type="search" placeholder="Search" aria-label="Search">
                <button class="btn search-btn" type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>
    </nav>
</div>

<div class="d-flex mywrapper" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar">
      <div class="accordion" id="categories">
        <div class="accordion-item">
            <div class="accordion-header" id="mainCategory1"> 
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#submenuitems1" aria-expanded="true" aria-controls="collapseOne">
                Main Category 1
            </button>
            </div>
            <div id="submenuitems1" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#categories">
                <div class="accordion-body">
                    <ul>
                        <li>sub category 1</li>
                        <li>sub category 2</li>
                        <li>sub category 3</li>
                        <li>sub category 4</li>
                        <li>sub category 5</li>
                    </ul>
                </div>
             </div>
        </div>
        <div class="accordion-item">
            <div class="accordion-header" id="mainCategory2"> 
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#submenuitems2" aria-expanded="true" aria-controls="collapseOne">
                Main Category 2
            </button>
            </div>
            <div id="submenuitems2" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#categories">
                <div class="accordion-body">
                    <ul>
                        <li>sub category 1</li>
                        <li>sub category 2</li>
                        <li>sub category 3</li>
                        <li>sub category 4</li>
                        <li>sub category 5</li>
                    </ul>
                </div>
             </div>
        </div>
        <div class="accordion-item">
            <div class="accordion-header" id="mainCategory3"> 
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#submenuitems3" aria-expanded="true" aria-controls="collapseOne">
                Main Category 3
            </button>
            </div>
            <div id="submenuitems3" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#categories">
                <div class="accordion-body">
                    <ul>
                        <li>sub category 1</li>
                        <li>sub category 2</li>
                        <li>sub category 3</li>
                        <li>sub category 4</li>
                        <li>sub category 5</li>
                    </ul>
                </div>
             </div>
        </div>
      </div>
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
        <div class="card-header">Products</div>
        <div class="card-body my-card-body">
            <div class="row">
                <div class="card items" >
                    <img src="..\assets\imgs\sampleImgs\men\Navy-Blue-Mens-Polo-T-Shirt.jpg" class="card-img-top card-img" alt="...">
                        <div class="card-body">
                            <h5 class="card-title item-title">Navy Blue Polo</h5>
                            <p class="card-text item-stockIn">Available</p>
                            <a href="#" class="btn btn-primary card-btn"  data-bs-toggle="modal" data-bs-target="#staticBackdrop">View</a>
                        </div>
                </div>
                <div class="card items">
                    <img src="..\assets\imgs\sampleImgs\men\Navy-Blue-Mens-Long-Sleeve-T-Shirt.jpg" class="card-img-top card-img" alt="...">
                    <div class="card-body">
                    <h5 class="card-title">Navy Blue Polo</h5>
                    <p class="card-text">In-stock</p>
                    <a href="#" class="btn btn-primary card-btn">View</a>
                    </div>
                </div>
                <div class="card items">
                    <img src="..\assets\imgs\sampleImgs\men\Maroon-Mens-Long-Sleeve-T-Shirt.jpg" class="card-img-top card-img" alt="...">
                    <div class="card-body">
                    <h5 class="card-title">Navy Blue Polo</h5>
                    <p class="card-text item-stockout">Sold out!</p>
                    <a href="#" class="btn btn-primary card-btn">View</a>
                    </div>
                </div>
                <div class="card items">
                    <img src="..\assets\imgs\sampleImgs\men\Cinnamon-Brown-Mens-Polo-T-Shirt.jpg" class="card-img-top card-img" alt="...">
                    <div class="card-body">
                    <h5 class="card-title">Navy Blue Polo</h5>
                    <p class="card-text">In-stock</p>
                    <a href="#" class="btn btn-primary card-btn">View</a>
                    </div>
                </div>
                <div class="card items">
                    <img src="..\assets\imgs\sampleImgs\men\Carbon-Blue-Mens-Polo-T-Shirt.jpg" class="card-img-top card-img" alt="...">
                    <div class="card-body">
                    <h5 class="card-title">Navy Blue Polo</h5>
                    <p class="card-text">In-stock</p>
                    <a href="#" class="btn btn-primary card-btn">View</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  <!-- /#wrapper -->
<!--Modal-->
<div class="modal fade my-product-modal" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
 
<div class="modal-dialog modal-xl">
<link rel="stylesheet" href="..\assets\css\product-modal-style-A.css"> 
    <div class="modal-content my-modal-content">
      
      <!-- Header section -->
      <div class="modal-header my-modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Product Name</h5>
        <div class="rating">
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star checked"></span>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <!-- Body Section -->
      <div class="modal-body my-modal-body">
        <div class="container my-modal-container">
            <div class="row">
              <div class="col-lg-4 col-md-12">
                <!-- Product images -->
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                  <div class="carousel-inner my-modal-slider">
                    <div class="carousel-item active">
                      <img src="..\assets\imgs\sampleImgs\men\Carbon-Blue-Mens-Polo-T-Shirt.jpg" class="d-block w-100 my-modal-slider-img" alt="...">
                    </div>
                    <div class="carousel-item">
                      <img src="..\assets\imgs\sampleImgs\men\Cinnamon-Brown-Mens-Polo-T-Shirt.jpg" class="d-block w-100 my-modal-slider-img" alt="...">
                    </div>
                    <div class="carousel-item">
                      <img src="..\assets\imgs\sampleImgs\men\Navy-Blue-Mens-Long-Sleeve-T-Shirt.jpg" class="d-block w-100 my-modal-slider-img" alt="...">
                    </div>
                  </div>
                  <button class="carousel-control-prev " type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon slider-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next " type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon slider-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>
                </div>
              </div>
              
              <div class="col-lg-8 col-md-12 ">
                <div class="row product-details">
                  <div class="col-lg-3 col-md-4 col-topics"><span>Description</span></div>
                  <div class="col-lg-9 col-md-8 col-data">
                    <span>
                    Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typeset
                    </span>
                  </div>

                </div>
                <div class="row product-details">
                  <div class="col-3 col-topics"><span>Pick Color</span></div>
                  <div class="col-9 col-data">
                    <div class="colors">
                      <label>
                        <input type="radio" name="color" value="black">
                        <span class="swatch" style="background-color:#222"></span>
                      </label>
                      <label>
                        <input type="radio" name="color" value="blue">
                        <span class="swatch" style="background-color:#6e8cd5"></span>
                      </label>
                      <label>
                        <input type="radio" name="color" value="green">
                        <span class="swatch" style="background-color:#44c28d"></span>
                      </label>
                    </div>
                  </div>                    
                </div>
                <div class="row product-details">
                  <div class="col-3 col-topics"><span>Pick Size</span></div>
                  <div class="col-9 col-data">
                  <div class="size">
                      <label>
                        <input type="radio" name="size" value="M">
                        <span class="size-box">M</span>
                      </label>
                      <label>
                        <input type="radio" name="size" value="L">
                        <span class="size-box" style="">L</span>
                      </label>
                      <label>
                        <input type="radio" name="size" value="XL">
                        <span class="size-box" style="">XL</span>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="row product-details">
                  <div class="col-3 col-topics"><span>Availability</span></div>
                  <div class="col-9 col-data"></div>
                </div>
                <div class="row product-details">
                  <div class="col-3 col-topics"><span>Price</span></div>
                  <div class="col-9 col-data"></div>
                </div>
                <!-- Add to cart button-->
                <button type="button" class="btn btn-primary"><i class="fas fa-cart-plus fa-lg"></i> Add to cart</button>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>


  
  <script>
    $(document).ready(function () {
      $("#sidebarCollapse").on("click", function () {
        $("#sidebar").toggleClass("active");
      });
    });
  </script>
<?php include "customerFooter.php"; ?>