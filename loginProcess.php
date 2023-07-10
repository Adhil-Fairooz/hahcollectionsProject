<?php 
include "header.php";
include "classes\DBConnect.php";
include "classes\CustomerController.php";
$db = new DatabaseConnection;
$customerObj = new CustomerController();

if(isset($_POST['login'])){
    $user_unsafe=$_POST['username'];
    $pass_unsafe=$_POST['password'];

    $user=mysqli_real_escape_string($db->conn,$user_unsafe);
    $pass=mysqli_real_escape_string($db->conn,$pass_unsafe);

    /* check customer Table */
    $customerResult = $customerObj->getLoginData($user);
    if($customerResult){
        $data = $customerResult -> fetch_assoc();
        $customer_id = $data['Customer_ID'];
        $fname = $data['FName'];
        $lname = $data['LName'];
        $password = $data['Password'];
        $verify_customer=password_verify($pass, $password);
        if($verify_customer){
            session_start();
            $_SESSION['customerID']=$customer_id;
            $_SESSION['Name']=$fname." ".$lname;
            $_SESSION['CurrentPassword'] = $password;
            $_SESSION['USerEmail'] = $user;
            echo"<meta http-equiv='refresh' content='2;url=customerPanel/index.php'>";
            echo"<div class='container mt-5'>
                    <div class='progress'>
                        <div class='progress-bar progress-bar-striped progress-bar-animated' role='progressbar' aria-valuenow='100' aria-valuemin='0' aria-valuemax='100' style='width: 100%'>
                        <span class='itext'>Please Wait Customer !...</span>
                        </div>
                    </div>
                <br>
            </div>";
        }else{
            $status="Incorrect Password Customer !";
            header("Location: login.php?status=$status");
        }
    }else{
        /* check admin */
    }
}



include "footer.php";
?>
