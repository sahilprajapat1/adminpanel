<?php
include('connection.php');
if (isset($_REQUEST['brandlogo_uid'])) {
    $id = $_REQUEST['brandlogo_uid'];
    $fetch_data = "select * from brandlogo where brand_logo_id='$id'";
    $fetch_data_executed = mysqli_query($connection, $fetch_data);
    $fetch_uddate = mysqli_fetch_array($fetch_data_executed);
}
session_start();
$email = $_SESSION['email'];
if (empty($_SESSION['email'])) {
    header("location:index.php");
}
?>

<!doctype html>
<html lang="en">


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
    <?php include('backend.php'); ?>
    <?php include  'header.php'; ?>
    <!-- LOGO -->
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="col-lg-12 ms-lg-auto">
                                            <div class="mt-4 mt-lg-4 mt-xl-0">
                                                <form method="POST" enctype="multipart/form-data" action="">
                                                    <div class="row">
                                                        <div class="col-md-10">
                                                            <div class="mb-2">

                                                                <input type="file" name="brand_logo_image" class="form-control">

                                                            </div>
                                                        </div>


                                                        <div class="col-md-2">

                                                            <?php if (isset($_REQUEST['brandlogo_uid'])) { ?>
                                                                <button class="btn btn-outline-primary" name="brandlogo_update" type="submit">update</button>
                                                                <input type="hidden" value="<?php echo $fetch_uddate['brand_logo_id']; ?>" name="hidden_id">
                                                            <?php } else { ?>
                                                                <button type="submit" name="submit_brand_logo" class="btn btn-primary w-md">Submit</button>
                                                            <?php } ?>
                                                        </div>
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
            </div>
            <!-- table -->
            <div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>S.no</th>
                                                <th>Logo</th>
                                                <th>Entry Date</th>
                                                <th>status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $insert = "SELECT * from brandlogo;";
                                            $result = mysqli_query($connection, $insert);
                                            $i = 1;
                                            while ($row = mysqli_fetch_array($result)) { ?>

                                                <tr>
                                                    <td><?php echo $i; ?> </td>
                                                    <td> <img src="<?php echo $row['brand_logo_image']; ?>" alt="" width="50px" height="50px" ;> </td>
                                                    <?php $new_date = date("d-M-Y",strtotime($row['brand_logo_entry'])); ?>
                                                    <td><?php echo $new_date; ?></td>
                                                    <td><a href="backend.php?brand_logo_status=<?php echo $row['brand_logo_id']; ?>">
                                                            <?php echo $row['brand_logo_status']=='active'?'Active':'Deactive'; ?>
                                                    </td>
                                                    <td>
                                                        <div class="col-12">
                                                            <div class="card-body">
                                                                <div class="d-flex flex-wrap gap-1">
                                                                    <a href="brand_logo.php?brandlogo_uid=<?php echo $row['brand_logo_id']; ?>" type="button" class="btn btn-success waves-effect waves-light w-sm"><i class="mdi mdi-pencil"></i> EDIT</a>

                                                                    <a href="brand_logo.php?brandlogo_delete_id=<?php echo $row['brand_logo_id']; ?>" type="button" class="btn btn-danger waves-effect waves-light w-sm">
                                                                        <i class="mdi mdi-trash-can"></i>
                                                                        Delete</a>
                                                                </div>

                                                            </div>
                                                        </div>

                                                    </td>
                                                </tr>
                                            <?php
                                                $i += 1;
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