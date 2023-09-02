<?php
include('connection.php');
session_start();
if (!empty($_SESSION['email'])) {
    header("location:slider.php");
}


//session_login//

if (isset($_REQUEST['login'])) {
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $sql = "SELECT * from mimasoftlogin where BINARY email = BINARY '$email' and BINARY password = BINARY '$password';";
    $result = mysqli_query($connection, $sql);
    $total = mysqli_num_rows($result);


    if ($total > 0) {
        session_start();
        $_SESSION['email'] = $email;
        header("location:slider.php");
    } else {

        echo "<script>alert('Please right Email and Password')</script>";
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Login | Symox - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    <style>
        .bg-overlay {
            width: 100%;
            height: 650px;
            background: linear-gradient(0deg, rgba(255 255 255 / 54%), rgba(255 0 150 / 69%)), url(../../images/carousel-img2.jpg);
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>

<body data-layout="horizontal" data-topbar="dark" data-sidebar-size="md">
    <div class="authentication-bg min-vh-100">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="d-flex flex-column min-vh-100 px-3 pt-4">
                <div class="row justify-content-center my-auto">
                    <div class="col-md-8 col-lg-6 col-xl-5">

                        <div class="text-center mb-4">
                            <a href="index.html">
                                <img src="assets/images/logo-sm.svg" alt="" height="22"> <span class="logo-txt">Symox</span>
                            </a>
                        </div>

                        <div class="card">
                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Welcome Back !</h5>
                                    <p class="text-muted">Sign in to continue to Symox.</p>
                                </div>
                                <form method="POST">
                                    <div class=" mt-4">
                                        <label>Email</label>
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter email">
                                    </div>

                                    <div>
                                        <div class="mb-3">
                                            <label>Password</label>
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">

                                        </div>
                                        <div class="mt-3 text-center">
                                            <button name="login" type="submit" class="btn btn-primary w-sm waves-effect waves-light"><i class='bx bx-log-in-circle font-size-18 align-middle me-1'></i>login</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>