<?php
require_once ("include/connection.php");
session_start();

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
            background-color: rgb(0, 0, 0);
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

        .product {
            width: 100%;
            background-color: black;
        }

        /* navigation bar styles start */

        .topbar {
            display: flex;
            justify-content: space-around;
            align-items: center;
            position: fixed;
            right: 0;
            left: 0;
            top: 0;
            background: var(--primary-color);
            box-shadow: var(--box-shadow);
            z-index: 100;
            height: 50px;
        }

        .topbar .logo img {
            width: 100px;
            cursor: pointer;
            margin: 7px 0;
        }

        .topbar .mood {
            width: 100%;
            height: 30px;
            cursor: pointer;
            margin: 7px 0;
        }

        .topbar ul {
            list-style: none;
            display: flex;
            align-items: center;
        }

        .topbar ul li {
            display: inline-block;
            margin: 0 15px;
            cursor: pointer;
        }

        .topbar ul li a {
            text-decoration: none;
            color: var(--secondary-color);
            font-weight: 500;
            font-size: 17px;
            transition: 0.1s;
        }

        .topbar #login {
            text-decoration: none;
            color: var(--secondary-color);
            font-weight: 500;
            font-size: 17px;
            transition: 0.1s;
            cursor: pointer;
        }

        nav ul li a::after {
            content: '';
            width: 0;
            height: 2px;
            background: #fac031;
            display: block;
            transition: 0.2s linear;
        }

        nav ul li a:hover::after {
            width: 100%;
        }

        nav ul li a:hover {
            color: #fac031;
        }

        .sidebar {
            display: none;
            flex-direction: column;
            justify-content: space-around;
            align-items: center;
            position: fixed;
            right: 0;
            top: 50px;
            background: var(--primary-color);
            box-shadow: var(--box-shadow);
            z-index: 100;
            width: 250px;
            height: 600px;
        }

        .sidebar .logo img {
            width: 100px;
            cursor: pointer;
            margin: 7px 0;
        }

        .sidebar .mood {
            width: 100%;
            height: 30px;
            cursor: pointer;
            margin: 7px 0;
        }

        .sidebar ul {
            list-style: none;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .sidebar ul li {
            display: inline-block;
            margin: 15px 0;
            cursor: pointer;
        }

        .sidebar ul li a {
            text-decoration: none;
            color: var(--secondary-color);
            font-weight: 500;
            font-size: 17px;
            transition: 0.1s;
        }

        .sidebar #login {
            text-decoration: none;
            color: var(--secondary-color);
            font-weight: 500;
            font-size: 17px;
            transition: 0.1s;
            cursor: pointer;
        }

        #close_btn {
            background-color: red;
            padding-top: 1px;
            padding-left: 1px;
            padding-right: 1px;

        }
        #session_name {
            text-decoration: none;
            color: var(--secondary-color);
            font-weight: 500;
            font-size: 17px;
            transition: 0.1s;
            cursor: pointer;
        } 
        .search_wrapper {
            width: 100%;
            height: 50px;
            display: flex;
            align-items: center;
            position: relative;
            top: 60px;


        }

        .search_wrapper form {
            width: 50%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            
        }

        .search_wrapper select {
            width: 200px;
            height: 80%;
            font-size: 15px;
            border-radius: 25px;
            text-align: center;
            background-color: var(--primary-color);
            color: var(--secondary-color);
            border: 1px solid var(--third-color);
            cursor: pointer;
        }

        .search_wrapper button {
            width: 100px;
            height: 80%;
            margin-left: 2%;
            margin-right: 2%;
            font-size: 15px;
            border-radius: 25px;
            background-color: var(--third-color);
            color: var(--secondary-color);
            cursor: pointer;
            border: none;
        }
        form label{
            color: white;
        }

        
        .all_product {
            margin-top: 70px;
            width: 100%;
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr;
            grid-column-gap: 15px;
            grid-row-gap: 15px;
        }


        .product_page_menu_item{
            height: 400px;
            background-color: var(--primary-color);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
            color: var(--secondary-color);
            box-shadow: 0 0 10px rgb(112, 112, 112);


        }

        .product_page_menu_item form {}

        .product_page_menu_item input {
            background-color: var(--primary-color);
            border: 1px solid var(--third-color);
            text-align: center;
            height: 25px;
            color: var(--secondary-color);
            border-radius: 5px;
        }

        .product_page_menu_item img {
            width: 100%;

        }

        .product_page_menu_product_name {
            font-size: 25px;
            font-weight: 400;
            padding: 10px;
            color: #fac031;
        }

        .product_page_menu_product_description {
            font-size: 15px;
            padding: 10px;
        }

        .product_page_menu_product {
            width: 100%;
            display: flex;
            padding: 25px 10px;
            align-items: center;
            justify-content: space-between;
        }

        .product_page_menu_product_btn {
            padding: 10px 30px;
            border: none;
            background-color: #fac031;
            border-radius: 12px;
            font-size: 15px;
        }

        .product_page_menu_product_btn a {
            color: var(--secondary-color);
            margin-right: 5px;
            text-decoration: none;
        }

        .product_page_menu_product_rating {
            color: #fac031;
        }


    </style>
</head>
<body>
    <section class="product">

        <nav class="sidebar">
            <ul>
                <li id="close_btn"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                        width="24px" fill="#e8eaed">
                        <path
                            d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z" />
                    </svg></li>
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#menu">Menu</a></li>
                <li><a href="#gallery">Gallary</a></li>
                <li><a href="#customer">Review</a></li>
                <li><a href="#Order">Order</a></li>
            </ul>

            <ul>
                <li id="login">LOGIN</li>
                <li><img src="images/sun.png" alt="" class="mood menu_list"></li>
                <li><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                        fill="#e8eaed">
                        <path
                            d="m480-560-56-56 63-64H320v-80h167l-64-64 57-56 160 160-160 160ZM280-80q-33 0-56.5-23.5T200-160q0-33 23.5-56.5T280-240q33 0 56.5 23.5T360-160q0 33-23.5 56.5T280-80Zm400 0q-33 0-56.5-23.5T600-160q0-33 23.5-56.5T680-240q33 0 56.5 23.5T760-160q0 33-23.5 56.5T680-80ZM40-800v-80h131l170 360h280l156-280h91L692-482q-11 20-29.5 31T622-440H324l-44 80h480v80H280q-45 0-68.5-39t-1.5-79l54-98-144-304H40Z" />
                    </svg></li>
            </ul>
        </nav>

        <nav class="topbar">
            <div class="logo">
                <img src="images/logo.png">
            </div>

            <ul class="hh">

                <li><a href="#home" class="menu_list">Home</a></li>
                <li><a href="#about" class="menu_list">About</a></li>
                <li><a href="#menu" class="menu_list">Menu</a></li>
                <li><a href="#gallery" class="menu_list">Gallary</a></li>
                <li><a href="#customer" class="menu_list">Review</a></li>
                <li><a href="#Order" class="menu_list">Order</a></li>
            </ul>

            <ul>
                <?php
            if (empty($_SESSION["username"])) {
                    echo "<li id='top_login'>LOGIN</li>";
                } else {
                    echo "<li id='session_name'>$_SESSION[username]</li>";
                }
                ?>
                <li><img src="images/sun.png" alt="" class="mood login_section"></li>
                <li><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                        fill="#e8eaed">
                        <path
                            d="m480-560-56-56 63-64H320v-80h167l-64-64 57-56 160 160-160 160ZM280-80q-33 0-56.5-23.5T200-160q0-33 23.5-56.5T280-240q33 0 56.5 23.5T360-160q0 33-23.5 56.5T280-80Zm400 0q-33 0-56.5-23.5T600-160q0-33 23.5-56.5T680-240q33 0 56.5 23.5T760-160q0 33-23.5 56.5T680-80ZM40-800v-80h131l170 360h280l156-280h91L692-482q-11 20-29.5 31T622-440H324l-44 80h480v80H280q-45 0-68.5-39t-1.5-79l54-98-144-304H40Z" />
                    </svg></li>
                <li id="menu_btn"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg></li>

            </ul>
        </nav>

        <div class="search_wrapper">


            <form method="post" action="product.php" id="sort" class="price">
                <select name="select" id="">
                    <option value="high" type="submit">High to Low</option>
                    <option value="low" type="submit">Low to High</option>
                </select>
                <button type="submit" name="filter">sort</button>
            </form>

            <form method="post" action="product.php" id="sort" class="category">
                <label for="">Category : </label>
                <select name="select" id="">
                    <option value="high" type="submit">High to Low</option>
                    <option value="low" type="submit">Low to High</option>
                </select>
                <button type="submit" name="filter">Search</button>
            </form>


        </div>

        <div class="all_product">

            
        <?php


if (isset($_POST["filter"])) {
    
    $order = $_POST["select"];

    
    if ($order == "high") {
        $query = "SELECT * FROM add_image ORDER BY price DESC";
    } else {
        $query = "SELECT * FROM add_image ORDER BY price ASC";
    }

    
    $result = mysqli_query($connection, $query);
    if ($result) {
        // Output data
        while ($data = mysqli_fetch_assoc($result)) {
            $p_id = $data["id"];
            echo "
            <form action='details.php' method='post'>
                <div class='product_page_menu_item'>
                    <img src='images/$data[image]' alt=''>
                    <p class='product_page_menu_product_name'>Product</p>
                    <p class='product_page_menu_product_description'>$data[price]</p>
                    <input type='hidden' name='product_id' value='$data[id]'>
                    <div class='product_page_menu_product'>
                        <button class='product_page_menu_product_btn' type='submit' name='order_btn'>Order Now</button>
                        <h2 class='product_page_menu_product_rating'>★★★★★</h2>
                    </div>
            </form>
            </div>";
        }
    }

} else {
    $query = "SELECT * FROM add_image";
    $result = mysqli_query($connection, $query);

    if ($result) {
        while ($data = mysqli_fetch_assoc($result)) {
            $p_id = $data["id"];
            echo "
            <form action='details.php' method='post'>
                <div class='product_page_menu_item'>
                    <img src='images/$data[image]' alt=''>
                    <p class='product_page_menu_product_name'>Product</p>
                    <p class='product_page_menu_product_description'>$data[price]</p>
                    <input type='hidden' name='product_id' value='$data[id]'>
                    <div class='product_page_menu_product'>
                        <button class='product_page_menu_product_btn' type='submit' name='order_btn'>Order Now</button>
                        <h2 class='product_page_menu_product_rating'>★★★★★</h2>
                    </div>
            </form>
            </div>";

        }
    } else {
    }

}
?>


    </section>
</body>
</html>