<?php 
$currentMainPage = "Home";
include "customerHeader.php"; ?>
<link rel="stylesheet" href="../assets/css/customer-home-style.css">
<div class="container-fluid">
  <div id="carouselExampleIndicators" class="carousel slide">
    <div class="carousel-indicators c-indi">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active c-indi" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" class=" c-indi" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" class=" c-indi" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active c-item" >
        <img src="../assets/imgs/hah-collections-slider1.png" class="d-block w-100  c-img" alt="...">
      </div>
      <div class="carousel-item c-item" >
        <img src="../assets/imgs/hah-collections-slider2.png" class="d-block w-100  c-img" alt="...">
      </div>
      <div class="carousel-item c-item">
        <img src="../assets/imgs/hah-collections-slider4.png" class="d-block w-100  c-img" alt="...">
        <div class="carousel-caption top-0 mt-4  ">
          <p class="mt-5 fs-3 text-uppercase">සිංහල අලුත් අවුරුදු  offers</p>
          <h1 class="display-1 fw-bolder text-Capitalize">Upto 50% off</h1>
          <p class="mt-5 fs-5">*valid till April 15<sup>th<sup></p>
          <p class="fs-5">*Hurry offer valid till stock lasts</p>
          <p class="">*Terms and conditions Apply</p>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include "customerFooter.php"; ?>