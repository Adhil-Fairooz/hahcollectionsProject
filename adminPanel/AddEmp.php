<?php 
$currentSubPage="addEmp";
include "employeeManagement.php"; ?>
<link rel="stylesheet" href="..\assets\css\employee-style.css">
<div class="container">
    <div class="card mt-3">
        <div class="card-header mycardheader">Add New Employee</div>
        <div class="card-body">

            <form id="AddEMP">

                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="form-floating myFormFloating">
                            <input type="text" class="form-control myinputText" name="FName" id="floatingInput" placeholder=" ">
                            <label for="floatingInput">First Name</label>
                            <div id="strFNameError"></div> <!-- First Name validation error -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating myFormFloating">
                            <input type="text" class="form-control myinputText" name="LName" id="floatingInput" placeholder=" " >
                            <label for="floatingInput">Last Name</label>
                            <div id="strLNameError"></div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="form-floating myFormFloating">
                            <select class="form-select myselect" id="floatingSelect" name="JobRole">
                                <option value="0">Select</option>
                                <option value="Staff">Staff</option>
                                <option value="Stock_Keeper">Stock Keeper</option>
                                
                            </select>
                            <label for="floatingSelect">Job Role</label>
                            <div id="strJobError"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating myFormFloating">
                            <input type="text" class="form-control myinputText" name="contact" id="floatingInput" placeholder=" ">
                            <label for="floatingInput">Contact Number</label>
                            <div id="strNumberError"></div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="form-floating myFormFloating">
                            <input type="text" class="form-control myinputText" name="email" id="floatingInput" placeholder=" ">
                            <label for="floatingInput">Email Address</label>
                            <div id="strEmailError"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating myFormFloating">
                            <input type="text" class="form-control myinputText" name="Password" id="floatingInput" placeholder=" ">
                            <label for="floatingInput">Password</label>
                            <div id="strPasswordError"></div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <div class="btn-col">
                            <button class="btn myBtn" type="submit" name="btnEmp">Add Employee</button>
                        </div>
                        
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
<script src="..\assets\js\form-validation\admin-employeeRegistration.js"></script>
<?php include "adminFooter.php"; ?>