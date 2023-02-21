<?php

include "Partial/_auth.php";
$exit = 0;
include 'Partial/_dbconnect.php';

if(isset($_POST['update_profile']))
{
    $srno = $_POST['users_id'];
    $uname = $_POST['uname'];
    $upass = $_POST['password'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $area = $_POST['area'];
   
    $update ="UPDATE user SET username='$uname',mobileno='$phone', user_password='$upass',Area_Area_id='$area', email_id='$email' WHERE users_id='$srno'";
    $result_update = mysqli_query($con,$update);
    if($result_update)
    {
        $_SESSION['updated']="Your profile has been Updated ";
        header("Location:index.php");
    }
    else{
        $_SESSION['updated']="Failed To Profile";
        header("Location:index.php");
    }
}

if(isset($_POST['updateUsers']))
{
    $srno = $_POST['users_id'];
    $uname = $_POST['uname'];
    $upass = $_POST['password'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $area = $_POST['area'];
   
    
    $update ="UPDATE user SET username='$uname',mobileno='$phone', user_password='$upass',Area_Area_id='$area', email_id='$email' WHERE users_id='$srno'";
    $result_update = mysqli_query($con,$update);
    if($result_update)
    {
        $_SESSION['updated']="Updated";
        header("Location:manage-users.php");
    }
    else{
        $_SESSION['updated']="Failed";
        header("Location:manage-users.php");
    }
}

// Adding Users into table from database
if(isset($_POST['AddUsers']))
{
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $area = $_POST['area'];
    $cpass = $_POST['cpassword'];
    $pass = $_POST['password'];
    // Check confirm password
    if($pass == $cpass)
    {
        // Check Username exits or not
        $check_user = "SELECT username from user where username='$uname'";
        $check_num = mysqli_query($con,$check_user);
        if(mysqli_num_rows($check_num) > 0)
        {
            $_SESSION['updated']="Username is already taken";
            header("Location:manage-users.php");
            exit;
        }
        // Email already exits or not
        $check_email = "SELECT email_id from user where email_id='$email'";
        $check_num = mysqli_query($con,$check_email);
        if(mysqli_num_rows($check_num) > 0)
        {
            $_SESSION['updated']="Email is already taken";
            header("Location:manage-users.php");
            exit;
        }
        else
        {
            $insertQuery = "INSERT INTO `user`(username,email_id,mobileno,Area_Area_id,user_password) VALUES ('$uname','$email','$phone','$area','$pass')";
            $resultInsert = mysqli_query($con,$insertQuery);
            if($resultInsert)
            {
                // $_SESSION['updated']="Added" . $area;
                $_SESSION['updated']="Added";
                header("Location:manage-users.php");
            }
            else
            {
                $_SESSION['updated']="Failed";
                header("Location:manage-users.php");
            }
        }
    }
    else{
            $_SESSION['updated']="Password Does Not Match" ;
            header("Location:manage-users.php");
    }
}
// End This Adding users

// Start deleting code
if(isset($_GET['users_id']))
{
    $srno = $_GET['users_id'];
    // $check = "SELECT status FROM `user` where status='1'";
    // $result = mysqli_query($con,$check);
    // $checking = mysqli_num_rows($result);
    
        

        $delete = "DELETE FROM user WHERE users_id='$srno' And status='0'";
        $resultDelete = mysqli_query($con,$delete);
        if(!$resultDelete){ 
            $_SESSION['updated']="Deleted";
            header("Location:manage-users.php");
        }
        else
        {
            $_SESSION['check']="Sorry, You can not delete";
        header("Location:manage-users.php");
        }
    
    
}
// End Deleting code

// Start Adding Category Menu Name in the Database
if(isset($_POST['addMenu']))
{
    $mname = $_POST['menuName'];
    $iname = $_POST['item_type'];
   // $iname = $_POST['types'];
    $select = "SELECT cat_name from category where cat_name='$mname'";
    $result = mysqli_query($con,$select);
    $check = mysqli_num_rows($result);
    if($check > 0)
    {
        $_SESSION['addedMenu'] = "Menu Name Already Exits";
        header("Location:manage-menu.php");
    }
    else
    {
        $addMenu = "INSERT INTO category(cat_name,item_type) VALUES ('$mname','$iname')";
        $result = mysqli_query($con,$addMenu);
        if($result)
        {
            $_SESSION['addedMenu'] = "Successfully! Added";
            header("Location:manage-menu.php");
        }
        else{
            $_SESSION['addedMenu'] = "Failed! Can't Added";
            header("Location:manage-menu.php");
        }
    }
}
// End Category adding

// Start Deleting Category Menu Name in the Database
if(isset($_GET['menu_id']))
{
    $mid = $_GET['menu_id'];
  
    $addMenu = "DELETE from category where cat_id='$mid'";
    $result = mysqli_query($con,$addMenu);
    if($result)
    {
        $_SESSION['DeleteMenu'] = "Successfully! Deleted";
        header("Location:manage-menu.php");
    }
    else{
        $_SESSION['DeleteMenu'] = "Failed! Deleted";
        header("Location:manage-menu.php");
    }
}
// End 

// Category Table Updating start
if(isset($_POST['updateMenuName']))
{
    $id = $_POST['id'];
    $name = $_POST['name'];
    $type = $_POST['item_type'];
    $update = "UPDATE category SET cat_name='$name', item_type='$type' WHERE cat_id = '$id'";
    $resultUpdate = mysqli_query($con,$update);
    if($resultUpdate)
    {
        $_SESSION['Updated']="Successfully Updated!!";
        header("location:manage-menu.php");
    }
    else{
        $_SESSION['Updated']="Failed to Update!!";
        header("location:manage-menu.php");
    }
}
// End Updating of Category Table

// Start Delete Menu from category Table


if(isset($_GET['cat_id']))
{
    $srno = $_GET['cat_id'];
    $delete = "DELETE FROM category WHERE cat_id='$srno'";
    $resultDelete = mysqli_query($con,$delete);
    if($resultDelete)
    {
        $_SESSION['Updated']="deleted";
        header("Location:manage-menu.php");
    }
     else
    {
        $_SESSION['Updated']="Failed";
        header("Location:manage-menu.php");
    }
}
// End deleting from category Table

// Start Adding Offers
if(isset($_POST['AddOffers']))
{
    $name = $_POST['offername'];
    $price = $_POST['offerprice'];
    $start_date = $_POST['startdate'];
    $end_date = $_POST['enddate'];
    
    $inQuery = "INSERT INTO offer(offer_name,offer_price,offer_start_date,offer_end_date)
    VALUES ('$name','$price','$start_date','$end_date')";
    $result = mysqli_query($con,$inQuery);
    
    if($result)
    {
        $_SESSION['AddedOffers'] = "Successfully Added!!";
        header("Location:offers.php");
    }
    else
    {
        $_SESSION['AddedOffers'] = "Failed To Add!!";
        header("Location:offers.php");
    }
}
// End Adding offers

// Start Deleting Offers data
if(isset($_GET['offer_id']))
{
    $id = $_GET['offer_id'];
    $delete = "DELETE FROM offer WHERE offer_id='$id'";
    $result = mysqli_query($con,$delete);
    if($result)
    {
        $_SESSION['deleted']= "Successfully Deleted!!";
        header("Location:offers.php");
    }
    else
    {
        $_SESSION['deleted']= "Failed to Ddelet!!";
        header("Location:offers.php");
    }
}
// END DELETING

// Start Updating Offer table
if(isset($_POST['UpdateOffer']))
{
    $id = $_POST['oid'];
    $name = $_POST['offer_name'];
    $price = $_POST['price'];
    $start_date = $_POST['sdate'];
    $end_date = $_POST['edate'];

    $update = "UPDATE offer SET offer_name='$name', offer_price='$price', offer_start_date='$start_date', offer_end_date='$end_date' WHERE offer_id = '$id'";

    $result = mysqli_query($con,$update); 
    if($result)
    {
        $_SESSION['Updated']= "Successfully Updated!!";
        header("Location:offers.php");
    }
    else
    {
        $_SESSION['Updated']= "Failed to Update!!";
        header("Location:offers.php");
    }
}
// End Updating Offer Table

// Delete Items
if(isset($_GET['pro_id']))
{
    $id = $_GET['pro_id'];
    $delete = "DELETE FROM product WHERE pro_id='$id'";
    $result = mysqli_query($con,$delete);
    if($result)
    {
        $_SESSION['deleted']= "Successfully Deleted!!";
        header("Location:items.php");
    }
    else
    {
        $_SESSION['deleted']= "Failed to Ddelet!!";
        header("Location:items.php");
    }
}

// Start Updating Raw Material
if(isset($_POST['UpdateRaw-Material']))
{
    $id = $_POST['id'];
    $name = $_POST['name'];
    $qty = $_POST['qty'];
    $des = $_POST['des'];
    $supplier = $_POST['supplier_name'];
    $update = "UPDATE raw_material SET name_raw_material='$name', raw_description='$des', qty_on_hand='$qty',supplier_fk_id='$supplier'  WHERE raw_id='$id'";
    $result = mysqli_query($con,$update); 
    if($result)
    {
        $_SESSION['Updated']= "Successfully Updated!!";
        header("Location:raw_material.php");
    }
    else
    {
        $_SESSION['Updated']= "Failed to Update!!";
        header("Location:raw_material.php");
    }
}
// End

// Start Adding Raw
if(isset($_POST['AddRaw']))
{
    $name = $_POST['name'];
    $des = $_POST['des'];
    $qty = $_POST['qty'];
    $sname = $_POST['sname'];
   
    $inQuery = "INSERT INTO `raw_material` (`raw_id`, `qty_on_hand`, `raw_description`, `name_raw_material`, `supplier_fk_id`) 
    VALUES (NULL,' $qty', '$des', '$name', '$sname')";
    $result = mysqli_query($con,$inQuery);
    //INSERT into raw_material(name_raw_material,raw_description,qty_on_hand,supplier_fk_id) VALUES('Mili','Next',5,1);
    if($result)
    {
        $_SESSION['AddedRaw'] = "Successfully Added!!";
        header("Location:raw_material.php");
    }
    else
    {
        $_SESSION['AddedRaw'] = "Failed To Add!!";
        header("Location:raw_material.php");
    }
}
// End Adding Raw_Material

// Feedaback Deleting start
if(isset($_GET['raw_id']))
{
    $id = $_GET['raw_id'];
    $deleteComplaint = "DELETE FROM raw_material WHERE raw_id='$id'";
    $result = mysqli_query($con,$deleteComplaint);
    if($result)
    {
        $_SESSION['Deleted']="Successfully Deleted";
        header("Location:raw_material.php");
    }
    else
    {
        $_SESSION['Deleted']="Failed to Delete";
        header("Location:raw_material.php");
    }
}
// END

// Start Updating Supplier
if(isset($_POST['updateSupplier']))
{
    $srno = $_POST['sup_id'];
    $sname = $_POST['sname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $update ="UPDATE supplier SET supplier_name='$sname',supplier_mo_no='$phone', supplier_email='$email' WHERE supplier_id='$srno'";
    $result_update = mysqli_query($con,$update);
    if($result_update)
    {
        $_SESSION['updated']="Updated";
        header("Location:manage-supplier.php");
    }
    else{
        $_SESSION['updated']="failde";
        header("Location:manage-supplier.php");
    }
}

// End Supplier



// Adding Supplier into table from database
if(isset($_POST['AddSupplier']))
{ 
    $sname = $_POST['sname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $insertQuery = "INSERT INTO supplier(supplier_name,supplier_mo_no,supplier_email) VALUES ('$sname','$phone','$email')";
    $resultInsert = mysqli_query($con,$insertQuery);
    if($resultInsert)
    {
        $_SESSION['Added']="Succefully Added!!";
        header("Location:manage-supplier.php");
    }
    else
    {
        $_SESSION['Added']="Failed to Added!!";
        header("Location:manage-supplier.php");
    }
}
// End This Adding Supplier

// Start deleting code
if(isset($_GET['sup_id']))
{
    $srno = $_GET['sup_id'];
    $delete = "DELETE FROM supplier WHERE supplier_id='$srno'";
    $resultDelete = mysqli_query($con,$delete);
    if($resultDelete)
    {
        $_SESSION['Deleted']="Succefully Deleted";
        header("Location:manage-supplier.php");
    }
     else
    {
        $_SESSION['Deleted']="Failed to Delete";
        header("Location:manage-supplier.php");
    }
}
// End Deleting code

// Complaint Deleting start
if(isset($_GET['complaint_id']))
{
    $id = $_GET['complaint_id'];
    $deleteComplaint = "DELETE FROM complaint WHERE complaint_id='$id'";
    $result = mysqli_query($con,$deleteComplaint);
    if($result)
    {
        $_SESSION['Deleted']="Successfully Deleted!";
        header("Location:manage-complain.php");
    }
    else
    {
        $_SESSION['Deleted']="Failed to Delete";
        header("Location:manage-complain.php");
    }
}
// END

// Feedaback Deleting start
if(isset($_GET['feedback_id']))
{
    $id = $_GET['feedback_id'];
    $deleteComplaint = "DELETE FROM feedback WHERE feedback_id='$id'";
    $result = mysqli_query($con,$deleteComplaint);
    if($result)
    {
        $_SESSION['Deleted']="Successfully Deleted!!!";
        header("Location:manage-feedback.php");
    }
    else
    {
        $_SESSION['Deleted']="Failed to Delete";
        header("Location:manage-feedback.php");
    }
}
// END

// Adding Users into table from database
if(isset($_POST['AddItems']))
{
    $name = $_POST['name'];
    $price = $_POST['price'];
    $type = $_POST['menu_name'];
    $menu_name = $_POST['menu_name'];
    $image = $_POST['image_path'];
    $insertQuery = "INSERT INTO product(pro_name,pro_price,image_path,cat_fk_id) VALUES ('$name','$price','$image','$type')";
    $resultInsert = mysqli_query($con,$insertQuery);
    if($resultInsert)
    {
        // $_SESSION['updated']="Added" . $area;
        $_SESSION['additems']="Successfully Added";
        header("Location:items.php");
    }
    else
    {
        $_SESSION['additems']="Failed to added" ;
        header("Location:items.php");
    }
}
// End This Adding users


if(isset($_POST['item_update']))
{
    $id = $row['pro_id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    // $menu_name = $_POST['menu_name'];
    $img = $_POST['item_img'];
    // $img = $_FILES['item_img']["name"];
    // $c_image_temp=$_FILES['item_img']['tmp_name'];

    // move_uploaded_file($c_image_temp , "./images/$img");

    $c_update="UPDATE product set pro_name='$name', pro_price='$price' where pro_id='$id'";
    $run_update=mysqli_query($con, $c_update);
    if($run_update)
    // {   move_uploaded_file($img,"images/$img");
    {
        //move_uploaded_file($_FILES["item_img"]["tmp_image"],"./images/",$_FILES["item_img"]["name"]);
        $_SESSION['update']=" added";
        header("Location:items.php");
    }
    else
    {
        $_SESSION['update']="Failed to added" ;
        header("Location:items.php");
    }

}

?>