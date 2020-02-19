<?php
require 'config.php';
require 'header.php';

//variables to store data from forms
$username = $email = $password1 = $password2 = '';
$userType = false;

//variables to store error messages
$password1_err= $password2_err='';

//check request method and start grabbing data from form

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = cleanData($_POST['username']);
    $email = cleanData($_POST['email']);
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    $userType = $_POST['user-type'];

    if ($userType == 'supplier'){
        $userType = true;
    }

    //check if passwords match
    if ($password1 != $password2){
        $password2_err = 'Oops! Your passwords dont seem to match';
    }else{
        //hash password
        $password1 = md5($password1);
        $sql = "INSERT INTO `users`(`id`, `username`, `email`, `password1`, `supplier`) VALUES (NULL ,'$username','$email','$password1','$userType')";

        if (mysqli_query($conn,$sql)){
            echo "<ion-icon style = 'color: cornflowerblue; font-size: 25px;' name='cloud-upload-outline'></ion-icon>" . " Database updated!<br>";
        }else{
            echo "Data not added." . mysqli_error($conn) . "$sql<br>";
        }

    }
}

function cleanData($data){
    $data = trim($data); //remove whitespaces
    $data = stripslashes($data); //remove slashes
    $data = htmlspecialchars($data); //remove html special characters

    return $data;
}
?>

<!-- Signup form -->

<div class="container">
    <div class="row">
        <div class="col-md-3 col-lg-3 col-xl-3"></div>
        <div class="col-md- col-lg-6 col-xl-6">
            <div class="form-section">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
                    <fieldset>
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password1" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Confirm Password</label>
                            <input type="password" name="password2" class="form-control" required>
                        </div>
                        <div class="input-group">
                            <span>
                                Supplier <input type="radio" name="user-type" value="supplier">
                            </span>
                            <div class="input-group">
                            <span>
                                Customer <input type="radio" name="user-type" value="customer">
                            </span>
                        </div>
                            <div class="button btn btn-warning btn-block">Create Account</div>
                    </fieldset>
                </form>
            </div>
        </div>
        <div class="col-md-3 col-lg-3 col-xl-3"></div>
    </div>
</div>

<?php
require 'footer.php';
?>