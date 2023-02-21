<?php
include './header.php'; 

// echo phpversion; 
$servername = "localhost";
$username = "root";
$password = "";
$db = "project"; 
// Create connection
$conn = new mysqli($servername, $username, $password, $db);

$email = $_SESSION['EMAIL'];
$select =mysqli_query($conn,"SELECT * from customer where cus_email = '$email'");
  while($row = mysqli_fetch_assoc($select))
  {
      $id = $row['cus_id'];
      $_SESSION['id'] = $id;
  }
?>
<div class="row w-100">

    <div class="col-lg-12 col-sm-12 px-5 py-5">

        <h3 class="mb-3"> Order Details </h3>
        <?php if (isset($_SESSION['cart'])) : ?>
        <table class="table mt-4">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col"> Item </th>
                    <th scope="col">Qty </th>
                    <th scope="col">Price </th>
                    <th scope="col">Total </th>
                </tr>
            </thead>
            <tbody>
                <?php $total = 0;
                    foreach ($_SESSION['cart'] as $key => $value) : ?>
                <tr class="cart-items" data-price="<?php echo $value['Price'];?> "
                    data-pid="<?php echo $value['Serial_No'];?>" data-qty="<?php echo $value['Quantity'];?>">
                    <th scope="row"> <?php echo $key + 1; ?></th>
                    <td> <?php echo $value['Item_Name'];  ?> </td>
                    <td> <?php echo $value['Quantity'];  ?> </td>
                    <td> ₹ <?php echo $value['Price'];  ?> </td>
                    <td>
                        ₹ <?php echo $value['Quantity'] * $value['Price'];
                                    $total += $value['Quantity'] * $value['Price'];  ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <td scope="col" colspan="4">
                    <strong>
                        Total
                    </strong>
                </td>
                <td scope="col">
                    <strong>
                        ₹ <?php echo $total; ?>
                    </strong>
                </td>
            </tfoot>
        </table>
        <div class="d-grid gap-2">
            <button id="placeOrder" class="placeOrder btn-lg btn btn-dark" type="button"> Place Order </button>
        </div>
        <?php endif; ?>
    </div>
</div>

<script>
$(document).ready(function($) {

    var items = [];

    function placeOrder() {

        $('.cart-items').each(function() {
            var data = {
                pid: $(this).attr('data-pid'),
                price: $(this).attr('data-price'),
                qty: $(this).attr('data-qty'),
            }
            items.push(data);
        });

        var _address = ""
        $('.address-line').each(function() {
            _address = _address + " " + $(this).val();
        });

        var ajaxData = {
            data: JSON.stringify(items),
            address: _address.trim()
        }

        $.ajax({
            method: 'POST',
            url: 'order-process.php',
            data: ajaxData,
            dataType: 'json'
        }).done(function(data) {
            console.log(data);
            if (data.id == -1) {
                alert('Something went wrong please try after sometime');
            } else {
                //alert("DOne");
                window.location = 'thanks.php?sid=' + data.id;
            }
        });
    }

    $('#placeOrder').on('click', function() {
        placeOrder();
    });
});
</script>