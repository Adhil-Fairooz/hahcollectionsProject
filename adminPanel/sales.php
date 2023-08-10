<?php 
$currentSubPage="sales";
include "admin.php"; ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<div class="card mt-5">
    <div class="card-body">
    <canvas id="myProductSalesChart" style="width:100%;max-width:100%;max-height: 500px"></canvas>
    
    </div>
</div>
<script src="..\assets\js\adminChartGeneration.js"></script>
<?php include "adminFooter.php"; ?>