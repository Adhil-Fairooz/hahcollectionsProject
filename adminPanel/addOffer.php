<?php 

if(isset($_POST['value']) && $_POST['value'] === 'private'){?>

 <!--Modal header-->
 <div class="modal-header my-modal-header">
    <div class="modal-title My-modal-title">Add New Private offer</div>
    <button type="button" class="btn-close my-close-btn" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<!--Modal body -->
<div class="modal-body">
    <form method="post">
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="form-floating myFormFloating">
                    <input type="text" class="form-control myinputText" name="off_title" id="floatingInput" placeholder=" ">
                    <label for="floatingInput">Offer Title</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating myFormFloating">
                    <textarea class="form-control myinputTextArea" name="off_Desc"  placeholder=" " id="floatingTextarea"></textarea>
                    <label for="floatingTextarea">Offer Description</label>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="form-floating myFormFloating">
                    <select class="form-select myselect" id="floatingSelect" name="off_type">
                        <option value="0">Select</option>
                        <option value="percentage">percentage</option>
                        <option value="Cash">Cash</option>
                    </select>
                        <label for="floatingSelect">Discount Type</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating myFormFloating">
                    <input type="text" class="form-control myinputText" name="off_value" id="floatingInput" placeholder=" ">
                    <label for="floatingInput">Discount Value</label>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="form-floating myFormFloating">
                    <input type="date" class="form-control myinputText" name="off_from_Date" id="floatingInput" placeholder=" ">
                    <label for="floatingInput">Start Date</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating myFormFloating">
                    <input type="date" class="form-control myinputText" name="off_to_Date" id="floatingInput" placeholder=" ">
                    <label for="floatingInput">End Date</label>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="btn-col">
                    <button class="btn myBtn" id="btnAdd" type="submit" name="offer-private-add">Add Offer</button>
                </div>         
            </div>
        </div>
    </form>
</div>
    
<?php }
?>

<?php 

if(isset($_POST['value']) && $_POST['value'] === 'public'){?>

 <!--Modal header-->
 <div class="modal-header my-modal-header">
    <div class="modal-title My-modal-title">Add New Public offer</div>
    <button type="button" class="btn-close my-close-btn" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<!--Modal body -->
<div class="modal-body">
    <form method="post">
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="form-floating myFormFloating">
                    <input type="text" class="form-control myinputText" name="off_title" id="floatingInput" placeholder=" ">
                    <label for="floatingInput">Offer Title</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating myFormFloating">
                    <textarea class="form-control myinputTextArea" name="off_Desc"  placeholder=" " id="floatingTextarea"></textarea>
                    <label for="floatingTextarea">Offer Description</label>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="form-floating myFormFloating">
                    <select class="form-select myselect" id="floatingSelect" name="off_type">
                        <option value="0">Select</option>
                        <option value="percentage">percentage</option>
                        <option value="Cash">Cash</option>
                    </select>
                        <label for="floatingSelect">Discount Type</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating myFormFloating">
                    <input type="text" class="form-control myinputText" name="off_value" id="floatingInput" placeholder=" ">
                    <label for="floatingInput">Discount Value</label>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="form-floating myFormFloating">
                    <input type="date" class="form-control myinputText" name="off_from_Date" id="floatingInput" placeholder=" ">
                    <label for="floatingInput">Start Date</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating myFormFloating">
                    <input type="date" class="form-control myinputText" name="off_to_Date" id="floatingInput" placeholder=" ">
                    <label for="floatingInput">End Date</label>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="form-group has-validation myFormGroup">
                    <label for="formFile" class="form-label">Please select a image file</label>
                        <input type="file" id="file-input" name="imageFile[]" accept="image/png, image/jpeg" onchange="preview()" multiple class="form-control myChooseFile">
                        <div id="strErr"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card img-box">
                    <div class="row " id="images">
                                
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="btn-col">
                    <button class="btn myBtn" id="btnAdd" type="submit" name="btnProduct">Add Offer</button>
                </div>         
            </div>
        </div>
    </form>
</div>
    
<?php }
?>