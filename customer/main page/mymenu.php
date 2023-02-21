
<?php
require_once('./component/component.php');
?>
<html>
    <head>
        <title>shoping cart</title>
    </head>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="Bootstrap/jquery.js"></script>
    <script src="Bootstrap/popper.js"></script>
    <script src="Bootstrap/bootstrap.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="style.css">
    <body>
        <div class="container">
            <div class="row text-center py-5">
               <?php 
               component();
               component();
               component();
               component();
               ?>
                        
            </div>
        </div>
    </body>
</html>