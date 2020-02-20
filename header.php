<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="static/css/main.css">

    <title>Duka Moja</title>
</head>
<body>
<!-- Navbar -->

<nav class="navbar navbar-expand-lg navbar-light bg-warning">
    <a class="navbar-brand" href="index.php">DukaMoja</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>

            <?php
            session_start();
            //if user is logged in then display logout button
                if (isset($_SESSION['loggedin'])){
                    echo '
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>                    
                    ';
                }else{
                    echo '
                        <li class="nav-item">
                             <a class="nav-link" href="signup.php">Signup</a>
                        </li>
                        <li class="nav-item">
                             <a class="nav-link" href="login.php">Login</a>
                        </li>
                    ';
                }
            ?>

        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>

<!-- End of Navbar -->