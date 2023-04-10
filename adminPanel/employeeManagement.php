<?php 
$currentMainPage ="EmpManage";
include "adminHeader.php"; ?>
<nav class="navbar navbar-expand-lg myNavbarSub" >
    <div class="container">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContentSub" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContentSub">
        <ul class="navbar-nav myNavbarNavSub justify-content-center">
            <li class="nav-item mynavitemSub">
                <a class="nav-link mynavLinkSub"  href="admin.php">Register Employee</a>
            </li>
            <li class="nav-item mynavitemSub">
                <a class="nav-link mynavLinkSub"  href="admin.php">View Employees</a>
            </li>
        </ul>

    </div>
    </div>
</nav>
<?php include "adminFooter.php"; ?>