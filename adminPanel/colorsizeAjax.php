<?php 
include "..\classes\DBConnect.php";
include "..\classes\ProductController.php";
$db = new DatabaseConnection;
$productObj = new ProductController; 

if(isset($_REQUEST['task']) && $_REQUEST['task'] === 'showUpdateFormColor'){
    $Res = $productObj ->getColorDataForUpdate($_REQUEST['id']);
    $data = $Res -> fetch_assoc();
    ?>
    <!--Modal header-->
    <div class="modal-header my-modal-header">

        <div class="modal-title My-modal-title">Update Supplier</div>

        <button type="button" class="btn-close my-close-btn" data-bs-dismiss="modal" aria-label="Close"></button>

    </div>

    <!--Modal body -->
    <div class="modal-body">
        <form id="UpdateColor" data-id = "<?=$_REQUEST['id']?>">
            <div class="row">
                        <div class="col-md-4">
                            <div class="form-floating myFormFloating">
                                <input type="text" class="form-control myinputText UP" name="colorNameUP" id="floatingInput" placeholder=" " value="<?=$data['Color_Name']?>">
                                <label for="floatingInput">Color Name</label>
                                <div id="strNameErorUP"></div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-floating myFormFloating">
                                <input type="color" class="form-control myinputText UP" name="colorValueUP" id="floatingInput" placeholder=" " value="<?=$data['Color_Value']?>">
                                <label for="floatingInput">Color</label>
                            </div>
                        </div>    
            </div>
            <div class="row mt-3">
                <div class="col">
                    <div class="btn-col">
                        <button class="btn myBtn" id="btnUpdate" type="submit" name="update">Update</button>
                    </div>         
                </div>
            </div>
        </form>
    </div>

    <?php
}

?>
<?php 
if(isset($_REQUEST['task']) && $_REQUEST['task'] === 'updatecolorValue'){
    $data = [
        'id' => mysqli_real_escape_string($db->conn,$_REQUEST['id']),
        'name' => mysqli_real_escape_string($db->conn,$_REQUEST['name']),
        'value' => mysqli_real_escape_string($db->conn,$_REQUEST['value']),
    ];
    $result = $productObj -> updateColorvalues($data);
    if($result){
        echo 1;
    }else{
        echo 0;
    }
}
?>

<?php 
if(isset($_REQUEST['task']) && $_REQUEST['task'] === 'deleteColor'){
    $result = $productObj -> DeleteColorFromDB($_REQUEST['id']);
    if($result){
        echo 1;
    }else{
        echo 0;
    }
}
?>

<?php 
if(isset($_REQUEST['task']) && $_REQUEST['task'] === 'showUpdateFormSize'){
    $Res = $productObj ->getSizeDataForUpdate($_REQUEST['id']);
    $data = $Res -> fetch_assoc();
    ?>
    <!--Modal header-->
    <div class="modal-header my-modal-header">

        <div class="modal-title My-modal-title">Update Size</div>

        <button type="button" class="btn-close my-close-btn" data-bs-dismiss="modal" aria-label="Close"></button>

    </div>

    <!--Modal body -->
    <div class="modal-body">
        <form id="UpdateSize" data-id = "<?=$_REQUEST['id']?>">
            <div class="row">
                        <div class="col">
                                        <div class="form-floating myFormFloating"> 
                                            <input type="text" class="form-control myinputText UP" list="sizeTypesUP" name="typeUP" id="floatingInput" placeholder=" " value="<?=$data['Size_Type']?>">
                                            <label for="floatingInput">Size Type</label>
                                            <datalist id="sizeTypesUP">
                                                <?php
                                                $sizeType = $productObj->getType();
                                                if($sizeType){
                                                    foreach($sizeType as $row){
                                                        ?>
                                                        <option><?=$row['Size_Type']?></option>
                                                        <?php
                                                    }
                                                }else{
                                                    echo "<option></option>";
                                                }
                                                ?>
                                                
                                            </datalist>
                                            <div id="strTypeErrorUP"></div>
                                        </div>
                                    </div>
                                    <div class="col ">
                                        <div class="form-floating myFormFloating">
                                            <input type="text" class="form-control myinputText UP" name="valueUP" id="floatingInput" placeholder=" " value="<?=$data['Size_Value']?>">
                                            <label for="floatingInput">Value</label>
                                            <div id="strValueErrorUP"></div>
                                        </div>
                                    </div>    
            </div>
            <div class="row mt-3">
                <div class="col">
                    <div class="btn-col">
                        <button class="btn myBtn" id="btnUpdate" type="submit" name="update">Update</button>
                    </div>         
                </div>
            </div>
        </form>
    </div>

    <?php
}

?>

<?php 
if(isset($_REQUEST['task']) && $_REQUEST['task'] === 'updateSizeValue'){
    $data = [
        'id' => mysqli_real_escape_string($db->conn,$_REQUEST['id']),
        'name' => mysqli_real_escape_string($db->conn,$_REQUEST['name']),
        'value' => mysqli_real_escape_string($db->conn,$_REQUEST['value']),
    ];
    $result = $productObj -> updateSizevalues($data);
    if($result){
        echo 1;
    }else{
        echo 0;
    }
}
?>
<?php 
if(isset($_REQUEST['task']) && $_REQUEST['task'] === 'deleteSize'){
    $result = $productObj -> DeleteSizeFromDB($_REQUEST['id']);
    if($result){
        echo 1;
    }else{
        echo 0;
    }
}
?>