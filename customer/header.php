<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Click 2 Eat</title>
    <link rel="stylesheet" href="Bootstrap/bootstrap.css">
    <script src="Bootstrap/jquery.js"></script>
    <script src="Bootstrap/popper.js"></script>
    <script src="Bootstrap/bootstrap.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="./index.php">CL<span class='text-success'>I</span>CK<span
                class='text-danger'>2</span>EAT
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link " href="./index.php">MENU</a>
                </li>
            </ul>
            <?php
                    $count=0;
                    if(isset($_SESSION['cart']))
                    {
                        $count=count($_SESSION['cart']);
                    }
                  ?>
            <a href="./Login_Place_order/login2.php" class="btn btn-outline-primary">Log In</a>
            &nbsp;&nbsp;
            <a href="mycart.php" class="btn btn-success"><i class="fa fa-shopping-cart"></i>(<?php echo $count;?>)</a>
        </div>
    </nav>

    <div class="container">

      <ul class="nav nav-tabs justify-content-center">
        <li class="nav-item">
            <a href="./sweet.php" class="nav-link text-warning">Sweet Things</a>
          </li>
        <li class="nav-item">
          <a href="./savori_things.php" class="nav-link text-warning">Sevoury Things</a>
        </li>
        <li class="nav-item">
            <a href="./dessert.php" class="nav-link text-warning">Desserts</a>
        </li>
        <li class="nav-item">
          <a href="./biryani.php" class="nav-link text-warning">Biryani</a>
        </li>
      </ul>
    </div>
      
    <!-- Modal Start -->
   
  </body>

</html>