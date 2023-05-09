<?php 
include "..\classes\DBConnect.php";
include "..\classes\ProductController.php";
$productObj = new ProductController;

if(isset($_POST['pId'])){?>
    <div class="modal-header">
                <h1 class="modal-title fs-5"><?=$productObj->getProductName($_POST['pId'])?> (<?=$_POST['pId']?>)</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <form action="#" method="post">
        <div class="modal-body">
            
                <div class="row mb-3">
                    <div class="col">Color</div>
                    <div class="col">Size Type</div>
                    <div class="col">Size</div>
                    <div class="col">Quantity</div>
                </div>
                <div class="row mb-2">
                    <div class="col">
                        <select class="form-select" name="color" id="color">
                            <option value="0" selected>Select</option>
                            <?php
                                $colors = $productObj->getColorData();
                                    if($colors){
                                        foreach($colors as $row){?>
                                            <option value="<?=$row['Color_ID']?>" style="background-color:<?=$row['Color_Value']?>;font-size:22px;"><?=$row['Color_Name']?></option>
                                            <?php
                                        }
                                    }else{
                                        echo "<option></option>";
                                    }
                            ?>
                        </select>
                    </div>
                    <div class="col">
                        <select class="form-control" name = "sizeType" id="sizeType">
                            <option value="0" selected>Select</option>
                            <?php
                                $sizeType = $productObj->getType();
                                    if($sizeType){
                                        foreach($sizeType as $row){ ?>
                                            <option value="<?=$row['Size_Type']?>"><?=$row['Size_Type']?></option>
                                        <?php
                                        }
                                    }else{
                                        echo "<option></option>";
                                    }
                            ?>
                        </select>
                    </div>
                    <div class="col">
                        <select class="form-control" name = "size" id="sizeValue">
                        </select>
                    </div>
                    <div class="col">
                        <input type="number" name="qty" class="form-control">
                    </div>
                </div>
                <input type="hidden" name="productId" value="<?=$_POST['pId']?>">
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" name="addStock">Add Stock</button>
        </div>
    </form>
    
<?php
}

?>
<script src="..\assets\js\ajaxGetSizeValue.js"></script>