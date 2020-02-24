<?php
require 'config.php';
require 'header.php';
$title = $description = '';
$price = 0;
//image upload variables
$target_dir = "static/images/";

if (isset($_POST['add-product'])){
    //get data from product form
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $target_file = $target_dir.basename($_FILES['productImg']['name']);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    //push data to products table
    $sql = "INSERT INTO `products`(`id`, `suplier_id`, `title`, `price`, `description`, `image`, `time_posted`) VALUES (NULL ,'2','$title','$price','$description','$target_file.$imageFileType',CURRENT_TIMESTAMP )";
    if (mysqli_query($conn,$sql)){
        echo "Data added";
    }else{
        echo "
            <div class=\"alert alert-danger\" role=\"alert\">".
                mysqli_error($conn)
            ."</div>
        ";
    }

}
?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-lg-8 col-xl-8">
<!--            table-->
            <?php
            //read db an if there is data then display it in table
            //otherwise display a message sayin no products


            ?>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Description</th>
                    <th scope="col">Image</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                </tr>

                </tbody>
            </table>
            ?>
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
                    <input type="file" name="productImg">
                    <button class="btn btn-warning btn-block" name="add-product">Add Product</button>
                </fieldset>
            </form>
        </div>
    </div>
</div>


<?php
require 'footer.php';
?>