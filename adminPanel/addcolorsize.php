<?php 
$currentSubPage="colorSize";
include "ProductManagement.php"; 
?>

<script type="module" src="../assets/js/datalist-css.min.js"></script>
<link rel="stylesheet" href="..\assets\css\admin-color-size-style.css">
<div class="container">
    <div class="card">
        <div class="card-body">          
            <div class="row myrow">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header mycardheader">Add New Color</div>
                        <div class="card-body">
                            <form action="#" method="post" id="addProductColors">
                            <div class="row myrow">
                                    <div class="col">
                                        <div class="form-floating myFormFloating">
                                            <input type="text" class="form-control myinputText" name="colorName" id="floatingInput" placeholder=" ">
                                            <label for="floatingInput">Color Name</label>
                                            <div id="strNameEror"></div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-floating myFormFloating">
                                            <input type="color" class="form-control myinputText" name="colorValue" id="floatingInput" placeholder=" ">
                                            <label for="floatingInput">Color</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="btn-col">
                                        <button class="btn myBtn" id="btnAdd" type="submit" name="btnColor">Add Color</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="table-responsive">
                        <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Color ID</th>
                            <th scope="col">Color Name</th>
                            <th scope="col">Color</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php 
                                $results = $colorObj->getColorData();
                                if($results){
                                    foreach($results as $row){
                                        ?>
                                        <tr>
                                        <th scope="row"><?=$row['Color_ID']?></th>
                                            <td><?=$row['Color_Name']?></td>
                                            <td class="colorValue" style="background-color: <?=$row['Color_Value']?>;"></td>
                                            <td>
                                                <button class="btn btn-outline-danger" data-id='<?=$row['Color_ID']?>' id="del-color"><i class="fas fa-trash-alt"></i></button>
                                                <button class="btn btn-outline-success" data-id='<?=$row['Color_ID']?>' id="update"><i class="fas fa-edit"></i></button>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }else{
                                    echo "No Records found";
                                }
                                ?>
                                
                        </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="Update-modal-color" data-bs-backdrop="static" data-bs-keyboard="false">     
    <div class="modal-dialog modal-xl">
        <link rel="stylesheet" href="..\assets\css\admin-modal-style.css">
        <div class="modal-content">
           
        </div>
    </div>
</div>
<?php 
if(isset($_POST['btnColor'])){
    $colordata = [
        'name'=> mysqli_real_escape_string($db->conn,$_POST['colorName']),
        'value'=>mysqli_real_escape_string($db->conn,$_POST['colorValue'])
    ];
    $resColor=$colorObj->addNewColor($colordata);
    if($resColor){
        echo"<script>Swal.fire({icon:'success',title:'Done !',text:'A new color added successfully'});</script>";
    }else{
        echo"<script>Swal.fire({icon:'error',title:'Something is not right',text:'Query Failed'});</script>";
    }
}



?>
<script src="..\assets\js\form-validation\validatecolorForm.js"></script>
<?php include "adminFooter.php"; ?>