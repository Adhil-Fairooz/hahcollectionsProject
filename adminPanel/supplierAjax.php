<?php 
include "..\classes\DBConnect.php";
include "..\classes\SupplierController.php";
$db = new DatabaseConnection;
$supplierObj = new SupplierController; 

if(isset($_REQUEST['task']) && $_REQUEST['task'] === 'showUpdateForm'){
    $Res = $supplierObj ->getSuplierDataForUpdate($_REQUEST['id']);
    $data = $Res -> fetch_assoc();
    ?>
    <!--Modal header-->
    <div class="modal-header my-modal-header">

        <div class="modal-title My-modal-title">Update Supplier</div>

        <button type="button" class="btn-close my-close-btn" data-bs-dismiss="modal" aria-label="Close"></button>

    </div>

    <!--Modal body -->
    <div class="modal-body">
        <form id="UpdateSupplier" data-id = "<?=$_REQUEST['id']?>">
            <div class="row">
                        <div class="col-md-4">
                            <div class="form-floating myFormFloating">
                                <input type="text" class="form-control myinputText UP" name="supNameUP" id="floatingInput" placeholder=" " value="<?=$data['Sup_Name']?>">
                                <label for="floatingInput">Supplier Name</label>
                                <div id="strSupNameERRORUP"></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating myFormFloating">
                                    <input type="text" class="form-control myinputText UP" name="supContactUP" id="floatingInput" placeholder=" " value="<?=$data['Sup_contact']?>">
                                    <label for="floatingInput">Contact Number</label>
                                    <div id="strSupContactERRORUP"></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating myFormFloating">
                                    <input type="text" class="form-control myinputText UP" name="supEmailUP" id="floatingInput" placeholder=" " value="<?=$data['Email']?>">
                                    <label for="floatingInput">Email Address</label>
                                    <div id="strSupEmailERRORUP"></div>
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
if(isset($_REQUEST['task']) && $_REQUEST['task'] === 'updateSupData'){
    $data = [
        'id' => mysqli_real_escape_string($db->conn,$_REQUEST['id']),
        'name' => mysqli_real_escape_string($db->conn,$_REQUEST['name']),
        'email' => mysqli_real_escape_string($db->conn,$_REQUEST['email']),
        'contact' => mysqli_real_escape_string($db->conn,$_REQUEST['contact'])
    ];
    $result = $supplierObj -> UpdateSupplier($data);
    if($result){
        echo 1;
    }else{
        echo 0;
    }
}
?>

<?php 
if(isset($_REQUEST['task']) && $_REQUEST['task'] === 'deleteSupplier'){
    $result = $supplierObj -> DeleteSupplierFromDB($_REQUEST['id']);
    if($result){
        echo 1;
    }else{
        echo 0;
    }
}
?>