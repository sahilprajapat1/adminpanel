<?php
include('connection.php');

if (isset($_REQUEST['submit_slider'])) 
{
    $slider_header = $_REQUEST['slider_header'];
    $slider_sub_header = $_REQUEST['slider_sub_header'];
    $image_file = $_FILES["slider_image"]["name"];
    if (!empty($image_file)) 
    {   
        $img_tmp = $_FILES["slider_image"]["tmp_name"];
        $path = "images/" . $image_file;
        move_uploaded_file($img_tmp, $path);
        $insert = "INSERT into slider(slider_header,slider_sub_header,slider_image) values('$slider_header','$slider_sub_header','$path')";
        mysqli_query($connection, $insert);
        header("location:slider.php");
    } 
    else 
    {
        echo "<script>alert('Please insert an Image')</script>";
    }
}


//Slider_delete
if (isset($_REQUEST['delete_id'])) 
{
    $id = $_REQUEST['delete_id'];
    $query = "SELECT * FROM slider where slider_id='$id';";
    $result = mysqli_query($connection, $query);
    $path = mysqli_fetch_array($result);
    unlink($path['slider_image']);
    $delete_query = "DELETE FROM slider WHERE slider_id='$id'";
    mysqli_query($connection, $delete_query);
    header('location:slider.php');
}


//slider update//

if (isset($_REQUEST['update'])) 
{
    $id = $_REQUEST['hidden_id'];
    $slider_header = $_REQUEST['slider_header'];
    $slider_sub_header = $_REQUEST['slider_sub_header'];
    $image_file = $_FILES["slider_image"]["name"];

    if (empty($image_file)) {
        $update = "UPDATE slider SET slider_header='$slider_header',slider_sub_header='$slider_sub_header'WHERE slider_id='$id';";
        mysqli_query($connection, $update);
        header("location: slider.php");
    } 
    else 
    {
        $img_tmp = $_FILES["slider_image"]["tmp_name"];
        $path = "images/" . $image_file;

        if (move_uploaded_file($img_tmp, $path)) 
        {
            $query = "SELECT * FROM slider WHERE slider_id='$id';";
            $result = mysqli_query($connection, $query);
            $d = mysqli_fetch_array($result);
            unlink($d['slider_image']);
            $update = "UPDATE slider SET slider_header='$slider_header',slider_sub_header='$slider_sub_header',slider_image='$path' WHERE slider_id='$id';";
            mysqli_query($connection, $update);
            header("location: slider.php");
        } 
        else 
        {
            echo "<script>alert('Please insert an Image')</script>";
        }
    }
}


//slider_status//
if (isset($_REQUEST['slider_status_id'])) 
{
    $id = $_REQUEST['slider_status_id'];
    $query = "SELECT * FROM slider WHERE slider_id  = '$id'";
    $res = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($res);
    $curr_status  = $row['slider_status'];

    if ($curr_status == 'active') 
    {
        $q = "UPDATE slider SET `slider_status`= 'deactive' WHERE slider_id = '$id'";
    } 
    else 
    {
        $q = "UPDATE slider SET `slider_status`= 'active' WHERE slider_id = '$id'";
    }

    mysqli_query($connection, $q);
    header("location:slider.php");
}

//brand_logo_insart//

if (isset($_REQUEST['submit_brand_logo'])) 
{
    $image_file = $_FILES["brand_logo_image"]["name"];
    if (!empty($image_file)) 
    {
        $img_tmp = $_FILES["brand_logo_image"]["tmp_name"];
        $path = "brandlogo_images/" . $image_file;
        move_uploaded_file($img_tmp, $path);
        $brandlogoinsert = "INSERT into brandlogo(brand_logo_image) values('$path')";
        mysqli_query($connection, $brandlogoinsert);
        header("location:brand_logo.php");
    } 
    else 
    {
        echo "<script>alert('Please insert an Image')</script>";
    }
}

//brand_logo_delete
if (isset($_REQUEST['brandlogo_delete_id'])) 
{
    $id = $_REQUEST['brandlogo_delete_id'];
    $query = "SELECT * FROM brandlogo where brand_logo_id='$id';";
    $result = mysqli_query($connection, $query);
    $path = mysqli_fetch_array($result);
    unlink($path['brand_logo_image']);
    $brandlogo_delete_query = "DELETE FROM brandlogo WHERE brand_logo_id='$id'";
    mysqli_query($connection, $brandlogo_delete_query);
    header('location:brand_logo.php');
}

//brandlogo update//
if (isset($_REQUEST['brandlogo_update'])) 
{
    $id = $_REQUEST['hidden_id'];
    $image_file = $_FILES["brand_logo_image"]["name"];
    if (!empty($image_file)) 
    {
        $img_tmp = $_FILES["brand_logo_image"]["tmp_name"];
        $path = "brandlogo_images/" . $image_file;
        move_uploaded_file($img_tmp, $path);
        $query = "SELECT * FROM brandlogo WHERE brand_logo_id='$id';";
        $result = mysqli_query($connection, $query);
        $logo = mysqli_fetch_array($result);
        unlink($logo['brand_logo_image']);
        $update = "UPDATE brandlogo SET brand_logo_image='$path' WHERE brand_logo_id='$id';";
        mysqli_query($connection, $update);
        header("location: brand_logo.php");
    } 
    else 
    {
        echo "<script>alert('Please insert an Image')</script>";
    }
}

//brandlogo_status//
if (isset($_REQUEST['brand_logo_status'])) {
    $id = $_REQUEST['brand_logo_status'];
    $query = "SELECT * FROM brandlogo WHERE brand_logo_id  = '$id'";
    $res = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($res);
    $curr_status  = $row['brand_logo_status'];

    if ($curr_status == 'active') 
    {
        $status = "UPDATE brandlogo SET `brand_logo_status`= 'deactive' WHERE brand_logo_id = '$id'";
    } 
    else 
    {
        $status = "UPDATE brandlogo SET `brand_logo_status`= 'active' WHERE brand_logo_id = '$id'";
    }

    mysqli_query($connection, $status);
    header("location:brand_logo.php");
}

//customer_review_insart//

if (isset($_REQUEST['submit_customer_review'])) 
{

    $customer_review_header = $_REQUEST['customer_review_header'];
    $customer_review_content = $_REQUEST['customer_review_content'];
    $customer_review_star = $_REQUEST['customer_review_star'];
    $insert = "INSERT into customer_review (customer_review_header,customer_review_content,customer_review_star) values('$customer_review_header','$customer_review_content','$customer_review_star')";
    mysqli_query($connection, $insert);
}

//customer_review_delete

if (isset($_REQUEST['customer_review_delete_id']))
{
    $id = $_REQUEST['customer_review_delete_id'];
    $delete_query = "DELETE FROM customer_review WHERE customer_review_id='$id'";
    mysqli_query($connection, $delete_query);
    header('location:customer_review.php');
}

//customer_review_update//

if (isset($_REQUEST['customer_review_update'])) 
{
    $id = $_REQUEST['hidden_id'];
    $customer_review_header = $_REQUEST['customer_review_header'];
    $customer_review_content = $_REQUEST['customer_review_content'];
    $customer_review_star = $_REQUEST['customer_review_star'];

    $update = "UPDATE customer_review SET customer_review_header='$customer_review_header',customer_review_content='$customer_review_content',customer_review_star='$customer_review_star' WHERE customer_review_id='$id';";
    mysqli_query($connection, $update);
    header("location: customer_review.php");

}

//customer_review_status//
if (isset($_REQUEST['customer_review_status_id'])) 
{
    $id = $_REQUEST['customer_review_status_id'];
    $query = "SELECT * FROM customer_review WHERE customer_review_id  = '$id'";
    $res = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($res);
    $curr_status  = $row['customer_review_status'];

    if ($curr_status == 'active') 
    {
        $status = "UPDATE customer_review SET `customer_review_status`= 'deactive' WHERE customer_review_id = '$id'";
    } 
    else 
    {
        $status = "UPDATE customer_review SET `customer_review_status`= 'active' WHERE customer_review_id = '$id'";
    }

    mysqli_query($connection, $status);
    header("location:customer_review.php");
}

//services_insart//

if (isset($_REQUEST['submit_services'])) 
{
 
    $services_header = $_REQUEST['services_header'];
    $services_content =  $_REQUEST['services_content'];
    
    $image_file = $_FILES["services_image"]["name"];
    if (!empty($image_file)) 
    {
        $img_tmp = $_FILES["services_image"]["tmp_name"];
        $path = "services_images/" . $image_file;
        move_uploaded_file($img_tmp, $path);
        
        $insert = "INSERT INTO services(services_header, services_content, services_image) VALUES ('$services_header','$services_content','$path')";
            
        mysqli_query($connection, $insert);
        header("location:services.php");
        } 
        else  
        {
        echo "<script>alert('Please insert an Image')</script>";
    }
}

//services_delete//

if (isset($_REQUEST['services_delete_id'])) 
{
    $id = $_REQUEST['services_delete_id'];
    $query = "SELECT * FROM services where services_id='$id';";
    $result = mysqli_query($connection, $query);
    $path = mysqli_fetch_array($result);
    unlink($path['services_image']);
    $delete_query = "DELETE FROM services WHERE services_id='$id'";
    mysqli_query($connection, $delete_query);
    header('location:services.php');
}

//services update//

if (isset($_REQUEST['services_update_update'])) 
{
    $id = $_REQUEST['hidden_id'];
    $services_header = $_REQUEST['services_header'];
    $services_content =  $_REQUEST['services_content'];
    $image_file = $_FILES["services_image"]["name"];

    if (empty($image_file)) 
    {
        $update = "UPDATE services SET services_header='$services_header',services_content='$services_content'WHERE services_id='$id';";
        mysqli_query($connection, $update);
        header("location: services.php");
    } 
    else 
    {
        $img_tmp = $_FILES["services_image"]["tmp_name"];
        $path = "images/" . $image_file;

        if (move_uploaded_file($img_tmp, $path)) 
        {
            $query = "SELECT * FROM services WHERE services_id='$id';";
            $result = mysqli_query($connection, $query);
            $d = mysqli_fetch_array($result);
            unlink($d['services_image']);
            $update = "UPDATE services SET services_header='$services_header',services_content='$services_content',services_image='$path' WHERE services_id='$id';";
            mysqli_query($connection, $update);
            header("location: services.php");
        } 
        else 
        {
            echo "<script>alert('Please insert an Image')</script>";
        }
    }
}

//services_status//
if (isset($_REQUEST['services_status_id'])) 
{
    $id = $_REQUEST['services_status_id'];
    $query = "SELECT * FROM services WHERE services_id  = '$id'";
    $res = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($res);
    $curr_status  = $row['services_status'];

    if ($curr_status == 'active') {
        $status = "UPDATE services SET `services_status`= 'deactive' WHERE services_id = '$id'";
    } 
    else 
    {
        $status = "UPDATE services SET `services_status`= 'active' WHERE services_id = '$id'";
    }

    mysqli_query($connection, $status);
    header("location:services.php");
}

//gallery_insart//
if (isset($_REQUEST['submit_gallery'])) 
{
    $gallery_header = $_REQUEST['gallery_header'];
    $image_file = $_FILES["gallery_image"]["name"];
    if (!empty($image_file)) 
    {
        $img_tmp = $_FILES["gallery_image"]["tmp_name"];
        $path = "gallery_images/" . $image_file;
        move_uploaded_file($img_tmp, $path);
        $insert = "INSERT INTO gallery(gallery_header,gallery_image) VALUES ('$gallery_header', '$path')";
        mysqli_query($connection, $insert);
        header("location:gallery.php");
    } 
    else
    {
        // Display an alert if no image is inserted
        echo "<script>alert('Please insert an Image')</script>";
    }
}

//gallery_delete//

if (isset($_REQUEST['gallery_delete_id'])) 
{
    $id = $_REQUEST['gallery_delete_id'];
    $query = "SELECT * FROM gallery where gallery_id='$id';";
    $result = mysqli_query($connection, $query);
    $path = mysqli_fetch_array($result);
    unlink($path['gallery_image']);
    $delete_query = "DELETE FROM gallery WHERE gallery_id='$id'";
    mysqli_query($connection, $delete_query);
    header('location:gallery.php');
}


//gallery update//

if (isset($_REQUEST['gallery_update'])) {
    $id = $_REQUEST['hidden_id'];
    $gallery_header = $_REQUEST['gallery_header'];
    $image_file = $_FILES["gallery_image"]["name"];

    if (empty($image_file)) 
    {
        $update = "UPDATE gallery SET gallery_header='$gallery_header'WHERE gallery_id='$id';";
        mysqli_query($connection, $update);
        header("location: gallery.php");
    } 
    else 
    {
        $img_tmp = $_FILES["gallery_image"]["tmp_name"];
        $path = "gallery_images/" . $image_file;

        if (move_uploaded_file($img_tmp, $path)) 
        {
            $query = "SELECT * FROM gallery WHERE gallery_id='$id';";
            $result = mysqli_query($connection, $query);
            $d = mysqli_fetch_array($result);
            unlink($d['gallery_image']);
            $update = "UPDATE gallery SET gallery_header='$gallery_header',gallery_image='$path' WHERE gallery_id='$id';";
            mysqli_query($connection, $update);
            header("location: gallery.php");
        } 
        else 
        {
            echo "<script>alert('Please insert an Image')</script>";
        }
    }
}


//gallery_status//
if (isset($_REQUEST['gallery_status_id'])) 
{
    $id = $_REQUEST['gallery_status_id'];
    $query = "SELECT * FROM gallery WHERE gallery_id  = '$id'";
    $res = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($res);
    $curr_status  = $row['gallery_status'];

    if ($curr_status == 'active') {
        $status = "UPDATE gallery SET `gallery_status`= 'deactive' WHERE gallery_id = '$id'";
    } 
    else 
    {
        $status = "UPDATE gallery SET `gallery_status`= 'active' WHERE gallery_id = '$id'";
    }

    mysqli_query($connection, $status);
  echo   header("location:gallery.php");
}

?>