<?php
require 'config.php';

if (isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM `products` WHERE id = '$id'";

    if (mysqli_query($conn,$sql)){
        header("location:dashboard.php");
    }else{
        echo mysqli_error($conn);
    }
}
?>