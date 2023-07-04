<?php
$currentMainPage = "";
include "customerHeader.php"; ?>
<link rel="stylesheet" href="..\assets\css\customer-checkout-form-style.css">
<div class="container">
<div id="carouselExample" class="carousel slide my-Carousel-Slide"  data-bs-pause="false">
  <div class="carousel-inner">
    <div class="carousel-item  my-carousel-item active">
      <div class="wrapper mt-sm-3 bg-white">
          <div class="progresses py-4">
                  <ul class="d-flex align-items-center justify-content-between">
                      <li id="step-1" class="blue"></li>
                      <li id="step-2" ></li>
                      <li id="step-3" ></li>
                  </ul>
              <div class="progress">
                  <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
          </div>
      </div>
      <div class="carousel-content my-carousel-content">
        <div class="row my-content-row">
          <div class="col-lg-8 my-content-col">
            <span data-customerID = "<?=$customerID?>" id="getCustID"></span>
          <div class="table-responsive">
              <table class="table">
              <thead>
                <tr>
                  <th scope="col">Product</th>
                  <th scope="col">Product Name</th>
                  <th scope="col">Size</th>
                  <th scope="col">Color</th>
                  <th scope="col">Price</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Amount</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody class="tbody">
                
              </tbody>
              </table>
            </div>
          </div>
            
          <div class="col-lg-4 my-content-col">
            <div class="card my-card-form">
              <div class="card-header"> Discount</div>
              <div class="card-body">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="offerTable" id="publicOffer" value="public">
                  <label class="form-check-label" for="publicOffer">Store Promotion Discount</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="offerTable" id="privateOffer" value="private">
                  <label class="form-check-label" for="privateOffer">Your available Offers</label>
                </div>
              <select class="form-select" name="discount" id="discount">
                <option value="0" selected>Select</option>
              </select>
              </div>
            </div>
          </div>

        </div>
        <div class="row my-content-row mt-3">
          <div class="col">
            <div class="card">
              
              <div class="card-body text-center">
              <p class="fs-6" >Your Discount Amount : Rs <span id="discountAmount"></span></p>
                <p class="fs-5 fw-bold">Your Total : Rs <span id ="total"></span></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="carousel-item">
    <div class="wrapper mt-sm-3 bg-white">
        <div class="progresses py-4">
                <ul class="d-flex align-items-center justify-content-between">
                    <li id="step-1" class="blue"></li>
                    <li id="step-2" class="blue"></li>
                    <li id="step-3" ></li>
                </ul>
            <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
    </div>
      <div class="carousel-content">
        <div class="row">
          <div class="col-md-8">
          <div class="row">
          <div class="col">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-4">
                    <label for="selectPaymentMethod" class="form-label">Select Payment Method</label>
                  </div>
                  <div class="col-md-8">
                    <div class="row">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="paymentMethod" id="COD" value="COD">
                        <label class="form-check-label" for="COD"><i class="fas fa-truck me-2"></i> Cash on Delivery</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="paymentMethod" id="BD" value="BD">
                        <label class="form-check-label" for="BD"><i class="fas fa-receipt me-2"></i> Bank Deposit</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="paymentMethod" id="Pick" value="Pick">
                        <label class="form-check-label" for="Pickup"><i class="fas fa-store-alt me-2"></i> Pick up</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="card my-payment-card" id="my-payment-card">
              
            </div>
          </div>
        </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <div class="card-header billinfoheader">Billing info</div>
              <div class="card-body billingbody">
                <div class="row">
                  <div class="col-md-4 mb-2 bill-label">Sub Total</div>
                  <div class="col-md-8"></div>
                </div>
                <div class="row mt-3">
                  <div class="col-md-4 mb-2 bill-label">Discount</div>
                  <div class="col-md-8"></div>
                </div>
                <div class="row mt-3">
                  <div class="col-md-4 mb-2 bill-label">Delivery fees</div>
                  <div class="col-md-8"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </div>
    <div class="carousel-item">
    <div class="wrapper mt-sm-3 bg-white">
        <div class="progresses py-4">
                <ul class="d-flex align-items-center justify-content-between">
                    <li id="step-1" class="blue"></li>
                    <li id="step-2" class="blue"></li>
                    <li id="step-3" class="blue"></li>
                </ul>
            <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
    </div>
      <div class="carousel-content">
        <h3>Slide 3</h3>
        <p>This is the content for slide 3.</p>
      </div>
    </div>
  </div>
  <div class="carousel-controls mt-4">
    <button class="carousel-control btn btn-primary" id="previous" >Previous</button>
    <button class="carousel-control btn btn-primary" id="next"  >Next</button>
  </div>
</div>
</div>


<script src="..\assets\js\customer-checkout.js"></script>
<script src="..\assets\js\checkout-slider.js"></script>
<?php include "customerFooter.php"; ?>