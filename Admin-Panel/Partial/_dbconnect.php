<!-- Ddatabase Conntection techniques -->
<?php
$servar = "localhost";
$username = "root";
$password = "";
$database = "project_daksh";

$con = mysqli_connect($servar,$username,$password,$database);
if(!$con)
{
    die(mysqli_connect_error());
}
else{
    // echo "Connected";
}
?>