<?php include "header.php"; ?>
<link rel="stylesheet" href="assets\css\login-style-A.css">

<div class="container my-container">
    <div class="card my-login-card">
        <div class="card-body my-card-body">
            <div class="row">
                <div class="col-md-8 col-lg-7 col-xl-6 "><img src="assets\imgs\hah-collections-img-signin.png" class="img-fluid my-img" /></div>
                <div class="col-md-7 col-lg-5 col-xl-5 my-col">
                    <p class ="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4 title">Sign in</p>
                    <form method="POST" action = "customerPanel/customer.php">
                        <div class="form-floating my-form  mb-4">
                            <input type="email" id="username" name="username" class="form-control my-input shadow-none" placeholder="Username"/>
                            <label class="" for="username"><i class="fas fa-user me-2"></i>Username</label>
                        </div>

                        <div class="form-floating my-form mb-4">
                            <input type="password" id="password" name="password" class="form-control my-input shadow-none" placeholder="Password"/>
                            <label class="" for="password"><i class="fas fa-lock me-2"></i>Password</label>
                        </div>
                        <button type="submit" name="login" class="btn  btn-lg btn-block mybtn mb-4">Sign in</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    

</div>
<?php include "footer.php"; ?>