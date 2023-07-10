<?php 
include "header.php"; ?>
<?php
    session_start();
    unset($_SESSION['customerID']);
    session_destroy();

    echo"<meta http-equiv='refresh' content='2;url=login.php'>";
    echo"<div class='container mt-5'>
    <div class='progress'>
        <div class='progress-bar progress-bar-striped progress-bar-animated' role='progressbar' aria-valuenow='100' aria-valuemin='0' aria-valuemax='100' style='width: 100%''>
            <span class='itext'>Please Wait Loging out !...</span>
        </div>
    </div>
    <br>
            
    </div>";
    ?>

<?php include "footer.php";
?>