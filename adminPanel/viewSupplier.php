<?php 
$currentSubPage="viewSup";
include "SupplierHandling.php"; 
?>
<link rel="stylesheet" href="..\assets\css\admin-color-size-style.css">
<div class="container">
    <div class="card mt-3">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Supplier ID</th>
                        <th scope="col">Supplier Name</th>
                        <th scope="col">Contact No</th>
                        <th scope="col">Email Address</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody id="suppTbl">
                        <?php 
                            $results = $supplierObj->getsupplierData();
                            if($results){
                                foreach($results as $row){?>
                                    <tr>
                                    <th scope="row"><?=$row['Sup_ID']?></th>
                                    <td><?=$row['Sup_Name']?></td>
                                    <td><?=$row['Sup_contact']?></td>
                                    <td><?=$row['Email']?></td>
                                    <td>
                                        <button class="btn btn-outline-danger" data-id="<?=$row['Sup_ID']?>" id="supDelete"><i class="fas fa-trash-alt"></i></button>
                                        <button class="btn btn-outline-success" data-id="<?=$row['Sup_ID']?>" id="supUpdate"><i class="fas fa-edit"></i></button>
                                    </td>
                                    </tr>
                            <?php
                            }
                            }else{
                                echo "<tr><td colspan='5'>No Records found</td></tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="Update-modal-supplier" data-bs-backdrop="static" data-bs-keyboard="false">     
    <div class="modal-dialog modal-xl">
        <link rel="stylesheet" href="..\assets\css\admin-modal-style.css">
        <div class="modal-content">
           
        </div>
    </div>
</div>
<script src="..\assets\js\form-validation\admin-supplierValidation.js"></script>
<?php include "adminFooter.php"; ?>