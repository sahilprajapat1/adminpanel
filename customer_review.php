<?php
include('connection.php');
if (isset($_REQUEST['customer_review_update_id'])) {
    $id = $_REQUEST['customer_review_update_id'];
    $fetch_data = "select * from customer_review where customer_review_id='$id'";
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
    <!-- customerreview -->
    <?php include  'header.php'; ?>


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
                                                <form method="POST"  action="">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <?php if (isset($_REQUEST['customer_review_update_id'])) { ?>
                                                                    <label>Description </label>
                                                                    <input class="form-control" type="text" name="customer_review_header" id="customer_review_header" value='<?php echo $fetch_uddate['customer_review_header']; ?>'>
                                                                    <input type="hidden" value="<?php echo $fetch_uddate['customer_review_id']; ?>" name="hidden_id">
                                                                <?php } else { ?>
                                                                    <label>Description </label>
                                                                    <input type="text" name="customer_review_header" class="form-control" placeholder="Enter Description">
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <?php if (isset($_REQUEST['customer_review_update_id'])) { ?>
                                                                    <label>Content </label>
                                                                    <input class="form-control" type="text" name="customer_review_content" id="customer_review_content" value='<?php echo $fetch_uddate['customer_review_content']; ?>'>
                                                                <?php } else { ?>
                                                                    <label>Content </label>
                                                                    <input type="text" name="customer_review_content" class="form-control" placeholder="Enter Content">
                                                                <?php } ?>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <?php if (isset($_REQUEST['customer_review_update_id'])) { ?>
                                                                    <label>Star </label>
                                                                    <input class="form-control" type="number" name="customer_review_star" id="customer_review_star" value='<?php echo $fetch_uddate['customer_review_star']; ?>'>
                                                                <?php } else { ?>

                                                                    <label>Star</label>
                                                                    <div class="col-sm-12">
                                                                        <input type="number" name="customer_review_star" class="form-control" placeholder="Enter Star">
                                                                    </div>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                        <div class=" text-center">
                                                            <?php if (isset($_REQUEST['customer_review_update_id'])) { ?>
                                                                <button class="btn btn-outline-primary" name="customer_review_update" type="submit">update</button>
                                                            <?php } else { ?>

                                                                <button type="submit" name="submit_customer_review" class="btn btn-primary w-md">Submit</button>
                                                            <?php } ?>
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
                                                    <th>Description</th>
                                                    <th>Content</th>
                                                    <th>Star</th>
                                                    <th>Entry Date</th>
                                                    <th>status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $insert = "SELECT * from customer_review;";
                                                $result = mysqli_query($connection, $insert);
                                                $i = 1;
                                                while ($row = mysqli_fetch_array($result)) { ?>
                                                    <tr>
                                                        <td><?php echo $i; ?> </td>
                                                        <td><?php echo $row['customer_review_header']; ?></td>
                                                        <td><?php echo $row['customer_review_content']; ?></td>
                                                        <td><?php echo $row['customer_review_star']; ?></td>
                                                        <?php $new_date = date("d-M-Y",strtotime($row['customer_review_entry'])); ?>
                                                    <td><?php echo $new_date; ?></td>
                                                        <td><a href="backend.php?customer_review_status_id=<?php echo $row['customer_review_id']; ?>">
                                                                <?php echo $row['customer_review_status']=='active'?'Active':'Deactive';  ?>
                                                        </td>
                                                        <td>
                                                            <div class="col-12">
                                                                <div class="card-body">
                                                                    <div class="d-flex flex-wrap gap-1">
                                                                        <a href="customer_review.php?customer_review_update_id=<?php echo $row['customer_review_id']; ?>" type="button" class="btn btn-success waves-effect waves-light w-sm"><i class="mdi mdi-pencil"></i> EDIT</a>

                                                                        <a href="customer_review.php?customer_review_delete_id=<?php echo $row['customer_review_id']; ?>" type="button" class="btn btn-danger waves-effect waves-light w-sm">
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