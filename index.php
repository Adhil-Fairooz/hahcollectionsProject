<?php include "header.php";
include "classes\DBConnect.php";
include "classes\offerController.php";
$db = new DatabaseConnection;
$offerObj = new offerController;
?>
<section>
<link rel="stylesheet" href="assets/css/homePage-style-A.css">

<div class="container-fluid">

  <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators c-indi">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active c-indi" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" class=" c-indi" aria-label="Slide 2"></button>
      <?php 
      $slide= 2;
      $count = $offerObj->getPublicCount();
      for($i = 0; $i < $count; $i++){
        ?>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?=$slide?>" class=" c-indi" aria-label="Slide <?=$slide+1?>"></button>
      <?php 
        $slide++;
    }
      ?>
      
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active c-item" >
        <img src="assets/imgs/hah-collections-slider1.png" class="d-block w-100  c-img" alt="...">
      </div>
      <div class="carousel-item c-item" >
        <img src="assets/imgs/hah-collections-slider2.png" class="d-block w-100  c-img" alt="...">
      </div>
        <?php 
         $results = $offerObj->displayPublicOffers();
         if($results){
             foreach($results as $row){?>
             <div class="carousel-item c-item">
                <img src="data:image/jpg;charset=utf8;base64,<?=base64_encode($row['IMG'])?>" class="d-block w-100  c-img" alt="...">
                <div class="carousel-caption top-0 mt-4  ">
                  <p class="mt-5 fs-3 text-uppercase"><?=$row['Offer_Title']?></p>
                  <h1 class="display-1 fw-bolder text-Capitalize">Upto <?php 
                  if($row['Discount_Type'] === 'percentage')
                    echo intval($row['Discount'])."%";
                  else{
                    echo "Rs ".$row['Discount'];
                  }
                  ?> off</h1>
                  <p class="mt-5 fs-5">*valid till <?=date("jS F Y",strtotime($row['Valid_To_Date']))?></p>
                  <p class="fs-5">*<?=$row['Description']?></p>
                  <p class="">*Terms and conditions Apply</p>
                </div>
              </div>
          <?php }
         }
        ?>
      
    </div>
  </div>


  <link rel="stylesheet" href="assets/css/customer-product-style.css">

  <div class="card main-container">
    <div class="card-header main-container-title"><span id="title">MENS Wear</span> <a class="btn btn-outline btn-seemore" href="login.php">See More >></a></div>
    <div class="card-body main-container-body">
        <div class="row" id="items">

        </div>    
    </div> 
  </div>
</div>

<div class="modal fade my-product-modal" id="viewProduct" aria-labelledby="staticBackdropLabel" data-bs-backdrop="static" data-bs-keyboard="false"> 
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
    <link rel="stylesheet" href="assets\css\product-modal-style-A.css">
    <script src="..\assets\js\product-view-quantity.js"></script>
      <div class="modal-content my-modal-content">
        
      </div>
      
    </div>
</div>
</section>
<script src="assets\js\home-page.js"></script>

<script src="assets\js\customer-productQtyClickStock.js"></script>
<?php include "footer.php"?>