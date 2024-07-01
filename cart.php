<?php
session_start();
require_once ("include/connection.php");

if (isset($_SESSION["user_id"])) {

    $user_id = $_SESSION["user_id"];
    // echo $user_id;
} else {
    // echo "not";
}

if(isset($_POST["cart"])){

    if(isset($_POST["cart"])){

    $p_id = $_POST['product_id'];
    $p_name = $_POST['product_name'];
    $p_price = $_POST['product_price'];
    $p_image = $_POST['product_image'];
    $p_qty = $_POST['qty'];

    echo $p_image;
    echo $p_name;
    echo $user_id;
    $total =  (float)$p_price * (int)$p_qty;

    $query = "INSERT INTO cart (user_id, name, price, image, quantity) VALUES ('$user_id', '$p_name', '$p_price', '$p_image', '$p_qty')";
    $result = mysqli_query($connection,$query);
    if($result){
    echo"hi";
}
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: sans-serif;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            max-width: 1300px;
            margin: 0 auto;
            background-color: var(--primary-color);
        }

        :root {
            --primary-color: rgb(0, 0, 0);
            --secondary-color: white;
            --third-color: #fac031;
            --fourth-color: rgba(0, 0, 0, 0.719);
            --bg-image: url("images/2.png");
            --box-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
            --gradient1: rgb(0, 0, 0);
            --gradient2: -moz-linear-gradient(90deg, rgba(0, 0, 0, 0.9829457364341085) 0%, rgba(0, 0, 0, 1) 0%, rgba(55, 53, 53, 0.9288165949973739) 50%, rgba(0, 0, 0, 1) 100%);
            --gradient3: -webkit-linear-gradient(90deg, rgba(0, 0, 0, 0.9829457364341085) 0%, rgba(0, 0, 0, 1) 0%, rgba(55, 53, 53, 0.9288165949973739) 50%, rgba(0, 0, 0, 1) 100%);
            --gradient4: linear-gradient(90deg, rgba(0, 0, 0, 0.9829457364341085) 0%, rgba(0, 0, 0, 1) 0%, rgba(55, 53, 53, 0.9288165949973739) 50%, rgba(0, 0, 0, 1) 100%);
            --filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#000000", endColorstr="#000000", GradientType=1);
        }

        .light_mode {
            --primary-color: white;
            --secondary-color: black;
            --third-color: #fac031;
            --fourth-color: rgba(255, 255, 255, 0.795);
            --bg-image: url("images/light_mode.png");
            --box-shadow: 0 0 10px rgb(112, 112, 112);
            --gradient1: white;
            --gradient2: white;
            --gradient3: white;
            --gradient4: white;
            --gradient5: white;
            --filter: white;
        }

        .cart_wrapper {
            width: 100%;
            display: grid;
            grid-template-columns: 50% 50%;
            grid-template-areas:
                'product_info product_info'
                'zero price_info';
        }

        .product_info {
            grid-area: product_info;
            height: 400px;
            overflow-y: scroll;
            scrollbar-width: none;
            margin-top: 50px;
        }

        .price_info {
            grid-area: price_info;
        }

        .product_info table {
            width: 100%;
            border-collapse: collapse;
            border-top: 5px solid #fac031;

        }

        .product_info table th {
            background-color: var(--primary-color);
            height: 50px;
            color: var(--secondary-color);
            font-size: 20px;
            border-bottom: 2px solid #fac031;
        }

        .product_info table td {
            width: 30%;
            text-align: center;
            padding-top: 20px;
            padding-bottom: 20px;
            padding-left: 50px;
            border-bottom: 1px solid #ffffff;
            color: var(--secondary-color);
            font-size: 20px;
        }

        .cart_item {
            width: 200px;
            padding-bottom: 10px;
            box-shadow: var(--box-shadow);
        }

        .product_info table td p {
            font-size: 20px;
            color: var(--secondary-color);
            padding: 10px;
        }

        .product_info table td img {
            width: 150px;
        }

        .product_info table td a {
            text-decoration: none;
            color: red;
        }

        .qty {
            /* width: 20px;
            height: 20px; */
            display: inline-block;
            padding: 20px;
            border: 1px solid var(--secondary-color);
        }

        .price_info {
            border-top: 10px solid #fac031;
        }

        .price_info table {
            width: 100%;
            border-left: 1px solid #fac031;
            border-right: 1px solid #fac031;
            border-bottom: 1px solid #fac031;
        }

        .price_info table td {
            padding: 20px;
            color: var(--secondary-color);
        }

        .zero {
            border-top: 1px solid #fac031;
        }

        .checkout {
            padding: 10px 30px;
            border: none;
            background-color: var(--third-color);
            border-radius: 12px;
            font-size: 15px;
            cursor: pointer;
        }

        .checkout a {
            color: var(--secondary-color);
            margin-right: 5px;
            text-decoration: none;
            color: var(--secondary-color);
        }
    </style>
</head>

<body>
    <div class="cart_wrapper">
        <div class="product_info">
            <table>
                <tr class="heading">
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                </tr>

                <?php
                 $query = "SELECT*FROM cart WHERE user_id='$user_id'";
                 $result = mysqli_query($connection, $query);
                 
                
                        if ($result) {

                            while($data = mysqli_fetch_assoc($result)){
                                echo"<tr><td><div class='cart_item'>
                                <img src=images/$data[image] alt=''>
                                <p>$data[name]</p>
                                <p>Price: $data[price]</p>
                                <a href='cart.php?p_id=$data[id]'>remove</a>
                                </div></td>
                                <td>
                        <div class='qty'>
                            2
                        </div>
                    </td>
                    <td>Rs.100 /=</td>
                </tr>";
                            } 
                        }
                         
?>
            </table>
        </div>
        <div class="zero"></div>
        <div class="price_info">
            <table>
                <tr>
                    <td>Subtotal</td>
                    <td>200</td>
                </tr>
                <tr>
                    <td>Delivery fee</td>
                    <td>200</td>
                </tr>
                <tr>
                    <td>Total</td>
                    <td>200</td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button class="checkout"><a href="">checkout</a></button>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>