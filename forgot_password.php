<?php
session_start();
$email = $_SESSION['email'];
if (empty($_SESSION['email'])) {
    header("location:index.php");
}
class Model
{
    public function checkOldPassword($oldPassword, $email, $connection)
    {
        $query = "SELECT * FROM mimasoftlogin WHERE email='$email' AND password='$oldPassword'";
        $executedQuery = mysqli_query($connection, $query) or die(mysqli_error($connection));
        return $executedQuery;
    }

    public function updatePassword($newPassword, $email, $connection)
    {
        $query = "UPDATE mimasoftlogin SET password='$newPassword' WHERE email='$email'";
        $executedQuery = mysqli_query($connection, $query) or die(mysqli_error($connection));
        return $executedQuery;
    }
    public function changePassword()
    {
        if (isset($_REQUEST['submit_password'])) 
        {
            $email = $_SESSION['email'];
            $oldPassword = $_REQUEST['oldPassword'];
            $newPassword = $_REQUEST['newPassword'];
            $confirmPassword = $_REQUEST['confirmPassword'];

            // Validation and sanitation here...

            $connection = mysqli_connect("localhost", "root", "", "mimasoft");

            $data = $this->checkOldPassword($oldPassword, $email, $connection);
            if (mysqli_num_rows($data) == 1)
            
             { 
                if($newPassword==$confirmPassword)
                {
                $this->updatePassword($newPassword, $email, $connection);
                header("location:slider.php");
                }
                 else
                {
                 echo "<script>alert('New Password  and Confirm Password not match...!')</script>";
                }
                } 
                 else 
                
            {
                 echo "<script>alert('Please Enter Valid Old Password ...!')</script>";
            }      
                 
           
        }
    }
}

// Instantiate the Model class
$model = new Model();
$model->changePassword();
?>
<!doctype html>
<html lang="en">

<?php include('backend.php'); ?>

<head>
    <meta charset="utf-8" />
    <title>Mima Technosoft</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

</head>



<body>
    <?php include  'header.php'; ?>
    <!-- customerreview -->
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="col-lg-12 ms-lg-auto">
                                            <div class="mt-5 mt-lg-4 mt-xl-0">
                                                <form method="POST" action="">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="mb-3">
                                                                <label>Old Password </label>
                                                                <input type="password" name="oldPassword" id="myInput" class="form-control" placeholder="Enter Old Password ">
                                                                <input type="checkbox" onclick="checkOldPassword()"> <label> Show Password</label>
                                                                <script>
                                                                    function checkOldPassword() 
                                                                    {
                                                                        var x = document.getElementById("myInput");
                                                                        if (x.type === "password") 
                                                                        {
                                                                            x.type = "text";
                                                                        } 
                                                                        else 
                                                                        {
                                                                            x.type = "password";
                                                                        }
                                                                    }
                                                                </script>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="mb-3">
                                                                    <label>New Password </label>
                                                                    <input type="password" name="newPassword" id="myInputR" class="form-control" placeholder="Enter New Password ">
                                                                    <input type="checkbox" onclick="updatePassword()"> <label>Show Password</label>
                                                                    <script>
                                                                        function updatePassword() 
                                                                        {
                                                                            var x = document.getElementById("myInputR");
                                                                            if (x.type === "password") 
                                                                            {
                                                                                x.type = "text";
                                                                            } 
                                                                            else 
                                                                            {
                                                                                x.type = "password";
                                                                            }
                                                                        }
                                                                    </script>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="mb-3">
                                                                    <label>Confirm Password </label>
                                                                    <input type="password" name="confirmPassword" id="myInputN" class="form-control" placeholder="Enter Confirm Password ">
                                                                    <input type="checkbox" onclick="changePassword()"> <label> Show Password</label>
                                                                    <script>
                                                                        function changePassword() 
                                                                        {
                                                                            var x = document.getElementById("myInputN");
                                                                            if (x.type === "password") {
                                                                                x.type = "text";
                                                                            } 
                                                                            else 
                                                                            {
                                                                                x.type = "password";
                                                                            }
                                                                        }
                                                                    </script>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div >
                                                        <button type="submit" name="submit_password" class="btn btn-primary w-md">Change Password</button>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- JAVASCRIPT -->
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenujs/metismenujs.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/feather-icons/feather.min.js"></script>
    <?php include('footer.php'); ?>
</body>

</html>