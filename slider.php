<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
// ini_set('display_startup_errors', 1);
include('connection.php');
if (isset($_REQUEST['slider_update'])) {
    $id = $_REQUEST['slider_update'];
    $fetch_data = "select * from slider where slider_id='$id'";
    $fetch_data_executed = mysqli_query($connection, $fetch_data);
    $fetch_uddate = mysqli_fetch_array($fetch_data_executed);
}

session_start();
$email = $_SESSION['email'];
if (empty($_SESSION['email'])) {
    header("location:index.php");
}

?>

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


<?php
include('backend.php');
?>

<?php include('header.php'); ?>

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
                                            <div class="mt-5 mt-lg-4 mt-xl-0">
                                                <form method="POST" enctype="multipart/form-data" action="">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                            <label>Image</label>
                                                            <input type="file" name="slider_image" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                            <div class="mb-3">
                                                            <?php if (isset($_REQUEST['slider_update'])) { ?>
                                                                <label>Description </label>
                                                                <input class="form-control" type="text" name="slider_header" id="slider_header" value='<?php echo $fetch_uddate['slider_header']; ?>'>
                                                                <input type="hidden" value="<?php echo $fetch_uddate['slider_id']; ?>" name="hidden_id">
                                                            <?php } else { ?>

                                                                <label>Description </label>
                                                                <input type="text" name="slider_header" class="form-control" placeholder="Enter Description">
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                            <div class="mb-3">
                                                            <?php if (isset($_REQUEST['slider_update'])) { ?>
                                                                <label>Sub Description </label>
                                                                <input class="form-control" type="text" name="slider_sub_header" id="slider_sub_header" value='<?php echo $fetch_uddate['slider_sub_header']; ?>'>
                                                            <?php } else { ?>
                                                                <label>Sub Description</label>
                                                                <input type="text" name="slider_sub_header" class="form-control" placeholder="Enter Sub Description">
                                                            <?php } ?>
                                                        </div> 
                                                    </div>
                                                    <div class=" text-center">
                                                        <?php if (isset($_REQUEST['slider_update'])) { ?>
                                                            <button class="btn btn-outline-primary" name="update" type="submit">update</button>
                                                        <?php } else { ?>

                                                            <button type="submit" name="submit_slider" class="btn btn-primary w-md">Submit</button>
                                                        <?php } ?>
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
                                                <th>Image</th>
                                                <th>Description</th>
                                                <th>Sub Description</th>
                                                <th>Entry Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $insert = "SELECT * from slider;";
                                            $result = mysqli_query($connection, $insert);
                                            $i = 1;
                                            while ($row = mysqli_fetch_array($result)) { ?>
                                                <tr>
                                                    <td><?php echo $i; ?> </td>
                                                    <td> <img src="<?php echo $row['slider_image']; ?>" alt="" width="50px" height="50px" ;> </td>
                                                    <td><?php echo $row['slider_header']; ?></td>
                                                    <td><?php echo $row['slider_sub_header']; ?></td>
                                                    <?php $new_date = date("d-M-Y",strtotime($row['slider_entry'])); ?>
                                                    <td><?php echo $new_date; ?></td>
                                                    <td><a href="backend.php?slider_status_id=<?php echo $row['slider_id']; ?>">
                                                            <?php echo $row['slider_status']=='active'?'Active':'Deactive';  ?>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <div class="col-12">
                                                            <div class="card-body">
                                                                <div class="d-flex flex-wrap gap-1">
                                                                    <a href="slider.php?slider_update=<?php echo $row['slider_id']; ?>" type="button" class="btn btn-success waves-effect waves-light w-sm"><i class="mdi mdi-pencil"></i> EDIT</a>

                                                                    <a href="slider.php?delete_id=<?php echo $row['slider_id']; ?>" type="button" class="btn btn-danger waves-effect waves-light w-sm">
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