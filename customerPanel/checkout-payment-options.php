<script src="..\assets\js\checkout-payment-option.js"></script>
<?php 
if(isset($_REQUEST['form']) && isset($_REQUEST['task']) && $_REQUEST['form'] =='COD' && $_REQUEST['task']=='show'){

    ?>
    <div class="card-header mydeliveryHeader">Cash on Delivery</div>
              <div class="card-body">
                <div class="row">
                  <div class="col-4 mylabel">Delivery Location</div>
                  <div class="col-8">
                    <select class="form-select" name="location" id="location">
                      <option value="0" selected>Select</option>
                      <option value="1" >Within Colombo District</option>
                      <option value="2" >Outside Colombo District</option>
                    </select>
                  </div>
                </div>
                <div class="row mt-2">
                  <div class="col-4 mylabel">Delivery Fees</div>
                  <div class="col-8"><span id="deliveryFee">Rs 0.00</span></div>
                </div>
                <div class="row mt-2">
                  <div class="col-md-3 mylabel mb-1">Delivery Address</div>
                  <div class="col-11"><textarea class="form-control" name="deliveryCODAddress"></textarea></div>
                  <div class="col-1 icon">
                    <button class="btn btn-outline-danger" id="COD_Address_edit"><i class="far fa-edit"></i></button>
                    <button class="btn btn-outline-success" id="COD_Address_save"><i class="far fa-save"></i></button>
                  </div>
                </div>
                <div class="row mt-2">
                  <div class="col-md-3 mylabel mb-1">Contact Number</div>
                  <div class="col-11"><input type="text" class="form-control" name="CODContact"></div>
                  <div class="col-1 icon">
                    <button class="btn btn-outline-danger" id="COD_Contact_edit"><i class="far fa-edit"></i></button>
                    <button class="btn btn-outline-success" id="COD_Contact_save"><i class="far fa-save"></i></button>
                  </div>
                </div>
              </div>
    <?php
}
?>

<?php 
if(isset($_REQUEST['form']) && isset($_REQUEST['task']) && $_REQUEST['form'] =='BD' && $_REQUEST['task']=='show'){

    ?>
    <div class="card-header mydeliveryHeader">Bank Deposit</div>
              <div class="card-body">
                <div class="row">
                  <div class="col-4 mylabel">Delivery District</div>
                  <div class="col-8">
                    <select class="form-select" name="location" id="location">
                      <option value="0" selected>Select</option>
                      <option value="1" >Within Colombo District</option>
                      <option value="2" >Outside Colombo District</option>
                    </select>
                  </div>
                </div>
                <div class="row mt-2">
                  <div class="col-4 mylabel">Courier Charges</div>
                  <div class="col-8"><span id="deliveryFee">Rs 0.00</span></div>
                </div>
                <div class="row mt-2">
                  <div class="col-md-3 mylabel mb-1">Delivery Address</div>
                  <div class="col-11"><textarea class="form-control" name="deliveryAddress"></textarea></div>
                  <div class="col-1 icon"><button class="btn btn-outline-danger"><i class="far fa-edit"></i></button></div>
                </div>
                <div class="row mt-2">
                  <div class="col-md-3 mylabel mb-1">Contact Number</div>
                  <div class="col-11"><input type="text" class="form-control"></div>
                  <div class="col-1 icon"><button class="btn btn-outline-danger"><i class="far fa-edit"></i></button></div>
                </div>
              </div>
    <?php
}
?>

<?php 
if(isset($_REQUEST['form']) && isset($_REQUEST['task']) && $_REQUEST['form'] =='Pick' && $_REQUEST['task']=='show'){

    ?>
    <div class="card-header mydeliveryHeader">Pick Up</div>
              <div class="card-body">
                <div class="row mt-2">
                  <div class="col-md-3 mylabel mb-1">Contact Number</div>
                  <div class="col-11"><input type="text" class="form-control"></div>
                  <div class="col-1 icon"><button class="btn btn-outline-danger"><i class="far fa-edit"></i></button></div>
                </div>
              </div>
    <?php
}
?>
