<?php include("header.php");
?>
<body>
    <div class="continer">
        <div class="row w-100">
            <div class="col-lg-12 col-sm-12 text-center border rounded bg-light p-4">
                <h1>MY CART</h1>
            </div>
                <table class="table ml-2">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scop="col"></th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php
                        if (isset($_SESSION['cart'])) {
                            foreach ($_SESSION['cart'] as $key => $value) {
                                $sr = $key + 1;
                                echo "
                            <tr>
                            <td id='sr_no'>$value[Serial_No]</td>
                            <td id='item_name'>$value[Item_Name]</td>
                            <td id='price'>$value[Price]<input type='hidden' class='iprice' value='$value[Price] '></td>
                            <td>
                            <form action='manage_cart.php' method='POST'>
                            
                            <input id='qty' class='text-center iquantity' name='Mod-Quantity' onchange='this.form.submit();' type='number' value='$value[Quantity]' min='0' max='10'>
                            <input type='hidden' name='Item_Name' value='$value[Item_Name]'>
                            </form>
                            </td>
                            <td class='itotal'></td>
                            <td>
                            <form action='manage_cart.php' method='POST'>
                            <button name='Remove_Item' class='btn btn-sm btn-outline-danger' ><i class='fa fa-trash''></i></button>
                            <input type='hidden' name='Item_Name' value='$value[Item_Name]'>
                            </form>
                            </td>
                            </tr>                       
                        ";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <hr>
    <h3 class="text-center font-weight-bold">Order Summary</h3>
    <hr>
    <table class="table">
        <tbody>
            <tr>
                <th scope="row">
                    <h5>Sub Total: </h5>
                </th>
                <th>
                    <h5 class="" id="stotal"></h5>
                </th>

            </tr>
            <tr>
                <th scope="row">
                    <h5>Discount: </h5>
                </th>
                <th>
                    <h5>0</h5>
                </th>
            </tr>
            <tr>
                <th scope="row">
                    <h5>Tax: </h5>
                </th>
                <th>
                    <h5>0</h5>
                </th>
            </tr>
            <tr>
                <th scope="row">
                    <h5 class="text-danger">Grand Total: </h5>
                </th>
                <th>
                    <h5 c id="gtotal"></h5>
                </th>
            </tr>
        </tbody>

    </table>
    <div class="text-center">
        <div class="col-12 "><a href="checkout.php" class=" btn btn-danger">Checkout</a> </div>
    </div>
    <script>
        var gt = 0;
        var iprice = document.getElementsByClassName('iprice');
        var iquantity = document.getElementsByClassName('iquantity');
        var itotal = document.getElementsByClassName('itotal');
        var gtotal = document.getElementById('stotal');

        function subTotal() {
            gt = 0;
            for (i = 0; i < iprice.length; i++) {

                itotal[i].innerText = (iprice[i].value) * (iquantity[i].value);

                gt = gt + (iprice[i].value) * (iquantity[i].value);
            }

            gtotal.innerText = gt;
        }
        subTotal();

        var gt = 0;
        var iprice = document.getElementsByClassName('iprice');
        var iquantity = document.getElementsByClassName('iquantity');
        var itotal = document.getElementsByClassName('itotal');
        var gtotal = document.getElementById('gtotal');

        function grandTotal() {
            gt = 0;
            for (i = 0; i < iprice.length; i++) {

                itotal[i].innerText = (iprice[i].value) * (iquantity[i].value);

                gt = gt + (iprice[i].value) * (iquantity[i].value);
            }

            gtotal.innerText = gt;
        }

        grandTotal()
        
        
    </script>

</body>

</html>

<!-- <form action="purchase.php" method="POST">
                    <div class="mb-3">
                        <label >FULL Name</label>
                        <input type="text" name="name" class="form-control" id="Full_Name" required>
                    </div>
                    <div class="mb-3">
                        <label >Mobile No:</label>
                        <input type="number" name="Phone_No" class="form-control" id="Full_Name" required>
                    </div>
                    <div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="paymod" value="COD" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                        On Cash
                        </label>
                    </div>
                    <br>
                    <button class="btn btn-primary btn-block" name="purchase">Make Purchase</button>
                </form> -->