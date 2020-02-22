<?php
require 'config.php';
require 'header.php';
?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-lg-8 col-xl-8">
<!--            table-->
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
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                    <td>@twitter</td>
                </tr>
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