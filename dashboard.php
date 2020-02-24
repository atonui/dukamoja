<?php
require 'config.php';
require 'header.php';

$title = $description = $price = $uploadFile = $supplier_id = '';
$title_err = $description_err = $price_err = $uploadFile_err = '';

//get supplier id
if (isset($_SESSION['kipande'])){
    $supplier_id = $_SESSION['kipande'];
}

if (isset($_POST['btn_addProduct']) and isset($_FILES['uploadFile'])){
    //get for data
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    //validate data
    if (!isset($title)){
        $title_err = 'Please fill this field';
    }
    if (!isset($description)){
        $description_err = 'Please fill this field';
    }
    if (!isset($price)){
        $price_err = 'Please fill this field';
    }

    $fileTmpPath = $_FILES['uploadFile']['tmp_name'];
    $image = $_FILES['uploadFile']['name']; //name of the file
    $fileSize = $_FILES['uploadFile']['size']; //size of the file
    $fileType = $_FILES['uploadFile']['type'];//type of file
    $filNameCmps = explode(".",$image);
    $fileExtension = strtolower(end($filNameCmps)); //extension of the file

    //allowed extensions for upload

    $extension = array("jpeg","png","jpg");

    if (in_array($fileExtension, $extension) == false){
        //if user uploads an images with a different extension
        $error[] = 'Extension not allowed, please choose JPG, JPEG or PNG file type';
    }
    if (empty($error)){
        //upload images to the images folder
        move_uploaded_file($fileTmpPath,"static/images/".$image);
    }else{
        print ($error);
    }
    //if successful then add text data into the db
    $sql = "INSERT INTO `products`(`id`, `supplier_id`, `title`, `price`, `description`, `image`, `time_posted`) VALUES (NULL ,'$supplier_id','$title','$price','$description','$image',CURRENT_TIMESTAMP )";
    if (mysqli_query($conn,$sql)){

        header("location:dashboard.php");
    }else{
        echo mysqli_error($conn);
    }
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-lg-8 col-xl-8">
<!--            table-->
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Description</th>
                    <th scope="col">Time</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $sql = "SELECT `id`, `supplier_id`, `title`, `price`, `description`, `image`, `time_posted` FROM `products` WHERE supplier_id='$supplier_id'";
                $products = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($products)){
                    echo "<tr>";
                            $id = $row['id'];
                            $title = $row['title'];
                            $price = $row['price'];
                            $description = $row['description'];
                            $time = $row['time_posted'];

                            echo "<td>$id</td>";
                            echo "<td>$title</td>";
                            echo "<td>$price</td>";
                            echo "<td>$description</td>";
                            echo "<td>$time</td>";
                            echo "<td>";
                                    echo "<a href='product_detail.php?id=$id' class='btn btn-info'>View</a>";
                                    echo "<a href='product_delete.php?id=$id' class='btn btn-danger'>Delete</a>";
                            echo "</td>";

                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
        <div class="col-md-4 col-lg-4 col-xl-4">
<!--            form to add product-->
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST" enctype="multipart/form-data">
                <fieldset>
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" name="title" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Price</label>
                        <input type="number" name="price" class="form-control">
                    </div>

                    <div class="form-group">
                        <textarea name="description" class="form-control" cols="30" rows="10"></textarea>
                    </div>
                    <label for="">Image</label>
                    <input type="file" name="uploadFile">
                    <button class="btn btn-warning btn-block" name="btn_addProduct">Add Product</button>
                </fieldset>
            </form>
        </div>
    </div>
</div>


<?php
require 'footer.php';
?>