<?php 
include "..\classes\DBConnect.php";
include "..\classes\CategoryController.php";

$db = new DatabaseConnection;
$categoryObj = new CategoryController();

?>

<?php 
if(isset($_REQUEST['task']) && $_REQUEST['task'] === 'showMainCategoryUpdateForm'){
    $mCatRes = $categoryObj ->getMainCategoryDataForUpdate($_REQUEST['mid']);
    $data = $mCatRes -> fetch_assoc();
    ?>
    <!--Modal header-->
    <div class="modal-header my-modal-header">

        <div class="modal-title My-modal-title">Update Main Category</div>

        <button type="button" class="btn-close my-close-btn" data-bs-dismiss="modal" aria-label="Close"></button>

    </div>

    <!--Modal body -->
    <div class="modal-body">
        <form id="UpdateMainCategory" data-id = "<?=$_REQUEST['mid']?>">
            <div class="row">
            
                <div class="col-md-6">
                    <div class="form-floating myFormFloating">
                        <input type="text" class="form-control myinputText UP" name="UPMainName" id="floatingInput" placeholder=" " value = "<?=$data['Name']?>">
                        <label for="floatingTextarea">Main Category Name</label>
                        <div id="strmainNameErrorUP"></div>
                    </div>
                </div>
                <div class="col-md-6">
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
if(isset($_REQUEST['task']) && $_REQUEST['task'] === 'UpdateMainCat'){
    $data = [
        'id' => mysqli_real_escape_string($db->conn,$_REQUEST['id']),
        'name' => mysqli_real_escape_string($db->conn,$_REQUEST['name'])
    ];
    $result = $categoryObj -> UpdateMainCategory($data);
    if($result){
        echo 1;
    }else{
        echo 0;
    }
}


?>

<?php 
if(isset($_REQUEST['task']) && $_REQUEST['task'] === 'showSubCategoryUpdateForm'){
    $mCatRes = $categoryObj ->getSubCategoryDataForUpdate($_REQUEST['sid']);
    $data = $mCatRes -> fetch_assoc();
    ?>
    <!--Modal header-->
    <div class="modal-header my-modal-header">

        <div class="modal-title My-modal-title">Update Sub Category</div>

        <button type="button" class="btn-close my-close-btn" data-bs-dismiss="modal" aria-label="Close"></button>

    </div>

    <!--Modal body -->
    <div class="modal-body">
        <form id="UpdateSubCategory" data-id = "<?=$_REQUEST['sid']?>">
            <div class="row">
            
                <div class="col-md-6">
                    <div class="form-floating myFormFloating">
                        <input type="text" class="form-control myinputText UP" name="UPSubName" id="floatingInput" placeholder=" " value = "<?=$data['Name']?>">
                        <label for="floatingTextarea">Sub Category Name</label>
                        <div id="strSubNameErrorUP"></div>
                    </div>
                </div>
                <div class="col-md-6">
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
if(isset($_REQUEST['task']) && $_REQUEST['task'] === 'UpdateSubCat'){
    $data = [
        'id' => mysqli_real_escape_string($db->conn,$_REQUEST['id']),
        'name' => mysqli_real_escape_string($db->conn,$_REQUEST['name'])
    ];
    $result = $categoryObj -> UpdateSubCategory($data);
    if($result){
        echo 1;
    }else{
        echo 0;
    }
}


?>

<?php 
if(isset($_REQUEST['task']) && $_REQUEST['task'] === 'showBrandUpdateForm'){
    $mCatRes = $categoryObj ->getBrandDataForUpdate($_REQUEST['bid']);
    $data = $mCatRes -> fetch_assoc();
    ?>
    <!--Modal header-->
    <div class="modal-header my-modal-header">

        <div class="modal-title My-modal-title">Update Brand Name</div>

        <button type="button" class="btn-close my-close-btn" data-bs-dismiss="modal" aria-label="Close"></button>

    </div>

    <!--Modal body -->
    <div class="modal-body">
        <form id="UpdateBRAND" data-id = "<?=$_REQUEST['bid']?>">
            <div class="row">
            
                <div class="col-md-6">
                    <div class="form-floating myFormFloating">
                        <input type="text" class="form-control myinputText UP" name="UPBrandName" id="floatingInput" placeholder=" " value = "<?=$data['Name']?>">
                        <label for="floatingTextarea">Brand Name</label>
                        <div id="strBrandErrorUP"></div>
                    </div>
                </div>
                <div class="col-md-6">
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
if(isset($_REQUEST['task']) && $_REQUEST['task'] === 'UpdateBrandvalue'){
    $data = [
        'id' => mysqli_real_escape_string($db->conn,$_REQUEST['id']),
        'name' => mysqli_real_escape_string($db->conn,$_REQUEST['name'])
    ];
    $result = $categoryObj -> UpdateBrand($data);
    if($result){
        echo 1;
    }else{
        echo 0;
    }
}
?>
<?php 
if(isset($_REQUEST['task']) && $_REQUEST['task'] === 'DELETEBrandvalue'){
    $result = $categoryObj -> deleteBrandName($_REQUEST['bid']);
    if($result){
        echo 1;
    }else{
        echo 0;
    }
}
?>

<?php 
if(isset($_REQUEST['task']) && $_REQUEST['task'] === 'deleteSubCategory'){
    $result = $categoryObj -> deleteSubCategory($_REQUEST['sid']);
    if($result){
        echo 1;
    }else{
        echo 0;
    }
}
?>

<?php 
if(isset($_REQUEST['task']) && $_REQUEST['task'] === 'deleteMainCategory'){
    $result = $categoryObj -> deleteMainCategory($_REQUEST['mid']);
    if($result){
        echo 1;
    }else{
        echo 0;
    }
}
?>
