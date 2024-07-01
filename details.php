<?php
require_once("include/connection.php");

if(isset($_POST["order_btn"])){
    $product_id = $_POST['product_id'];
    
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
            --bg-image: url("images/light_mode.png");
            --box-shadow: 0 0 10px rgb(112, 112, 112);
            --gradient1: white;
            --gradient2: white;
            --gradient3: white;
            --gradient4: white;
            --gradient5: white;
            --filter: white;
        }


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

        nav .logo img {
            width: 100px;
            cursor: pointer;
            margin: 7px 0;
        }

        nav ul {
            list-style: none;
        }

        nav ul li {
            display: inline-block;
            margin: 0 15px;
        }

        nav ul li a {
            text-decoration: none;
            color: var(--secondary-color);
            font-weight: 500;
            font-size: 17px;
            transition: 0.1s;
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

        nav .icon i {
            font-size: 18px;
            color: #ffffff;
            margin: 0 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        nav .icon i:hover {
            color: #fac031;
        }

        .mood {
            width: 100%;
            height: 30px;
            cursor: pointer;
            margin: 7px 0;
        }

        nav ul {
            list-style: none;
            display: flex;
            align-items: center;
        }

        nav ul li {
            display: inline-block;
            margin: 0 15px;
        }

        nav ul li a {
            text-decoration: none;
            color: var(--secondary-color);
            font-weight: 500;
            font-size: 17px;
            transition: 0.1s;
        }

        .product_detail_wrapper {
            max-width: 1300px;
            margin: 60px auto;
            background-color: #000000;
            display: grid;
            grid-template-columns: 1fr 1fr;
            align-items: center;

        }

        .image_container {
            width: 100%;
            justify-content: center;
            align-items: center;
        }

        .image_container img {
            padding: 20px;
            width: 100%;
            display: flex;

        }

        .image_details {
            padding: 20px;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .image_details p {
            font-size: 1.1em;
            font-family: 'poppins', sans-serif;
            padding-bottom: 5px;
            color: #ffffff;
        }

        .image_details h1 {
            font-size: 50px;
            font-family: 'poppins', sans-serif;
            padding-bottom: 10px;
            color: #ffffff;
        }

        .image_details h4 {
            font-size: 22px;
            font-family: 'poppins', sans-serif;
            padding-bottom: 10px;
            color: #ffffff;
        }

        .image_details form {
            width: 100%;
            padding-top: 30px;
            padding-bottom: 30px;
            display: flex;
            gap: 50px;
        }

        .image_details input {
            width: 50px;
            height: 50px;
            text-align: center;
            border: 3px solid #fac031;
        }

        .image_details button {
            padding: 10px 20px;
            border: 1px solid #fac031;
            background-color: #fac031;
            border-radius: 25px;
            color: #ffffff;
            font-size: 20px;
            cursor: pointer;
        }

        .title {
            max-width: 1300px;
            margin: 0 auto;
            display: flex;
            color: #ffffff;
            justify-content: space-between;
            align-items: center;
        }


        .menu_grid_wrapper {
            width: 100%;
            height: 600px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #000000;
            background: var(--gradient1);
            background: var(--gradient2);
            background: var(--gradient3);
            background: var(--gradient4);
            filter: var(--filter);
        }

        .menu_grid_box {
            width: 98%;
            height: 550px;
            overflow-x: scroll;
            display: grid;
            grid-template-columns: 350px 350px 350px 350px 350px 350px;
            grid-template-rows: 550px;
            grid-column-gap: 15px;
            scrollbar-width: none;
        }

       

        .sidebar {
            height: 100vh;
            width: 250px;
            display: none;
            gap: 20px;
            align-items: center;
            position: fixed;
            top: 50px;
            right: 0;
            background: rgba(11, 11, 11, 0.763);
            box-shadow: var(--box-shadow);
            z-index: 100;
            flex-direction: column;
        }

        .sidebar .logo img {
            width: 100px;
            cursor: pointer;
            margin: 7px 0;
        }

        .sidebar ul {
            display: flex;
            flex-direction: column;
            list-style: none;
        }

        .sidebar ul li {
            display: inline-block;
            margin: 25px 0;
        }

        .sidebar ul li a {
            text-decoration: none;
            color: var(--secondary-color);
            font-weight: 500;
            font-size: 17px;
            transition: 0.1s;
        }
        .product_page {
            margin-top: 70px;
            width: 100%;
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr;
            grid-column-gap: 15px;
            grid-row-gap: 15px;
        }


        .product_page_menu_item {
            height: 400px;
            background-color: var(--primary-color);
            display: flex;
            flex-direction: column;
            align-items: center;
            color: var(--secondary-color);
            box-shadow: 0 0 10px rgb(112, 112, 112);


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
            cursor: pointer;
        }

        .product_page_menu_product_btn a {
            color: var(--secondary-color);
            margin-right: 5px;
            text-decoration: none;
        }

        .product_page_menu_product_rating {
            color: #fac031;
        }
        


        @media screen and (max-width:1080px) {}

        @media screen and (max-width:580px) {
            .product_detail_wrapper {
                max-width: 1300px;
                margin: 60px auto;
                background-color: #000000;
                display: grid;
                grid-template-columns: 1fr;



            }


        }

        @media screen and (max-width:780px) {


            .menu_list {
                display: none;
            }

            .sidebar {
                display: flex;
            }

        }
    </style>
</head>

<body>
    <nav class="sidebar">
        <ul>
            <li class="sidebar_menu"><a href=""><svg xmlns="http://www.w3.org/2000/svg" height="24px"
                        viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
                        <path
                            d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z" />
                    </svg></a></li>
        </ul>


        <ul>

            <li><a href="#home">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#menu">Menu</a></li>
            <li><a href="#gallery">Gallary</a></li>
            <li><a href="#customer">Review</a></li>
            <li><a href="#Order">Order</a></li>
        </ul>

        <ul>



            <li><img src="images/sun.png" alt="" class="mood"></li>
        </ul>
    </nav>
    <nav class="topbar">
        <div class="logo" class="menu_list">
            <img src="images/logo.png">
        </div>

        <ul>
            <li class="menu_list"><a href="#home">Home</a></li>
            <li class="menu_list"><a href="#about">About</a></li>
            <li class="menu_list"><a href="#menu">Menu</a></li>
            <li class="menu_list"><a href="#gallery">Gallary</a></li>
            <li class="menu_list"><a href="#customer">Review</a></li>
            <li class="menu_list"><a href="#Order">Order</a></li>
        </ul>

        <ul>



            <li><img src="images/sun.png" alt="" class="mood menu_list"></li>
            <li class="topbar_cut"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                    width="24px" fill="#e8eaed">
                    <path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z" />
                </svg></li>
        </ul>
    </nav>

    <?php
    

    $query = "SELECT*FROM add_image WHERE id='$product_id'";
    $result = mysqli_query($connection,$query);
    if($result){
        $data = mysqli_fetch_assoc($result);
        
    
        echo "<div class='product_detail_wrapper'>
        <div class='image_container'>
            <img src='images/$data[image]' alt=''>
        </div>
        <div class='image_details'>
            <p>category</p>
            <h1>$data[name]</h1>
            <h4>Rs.$data[price]</h4>
            <form action='details.php' method='post'>
                <input type='number' name='' id='' value='1'>
                <input type='hidden' name='product_id' value='$data[id]'>
                <input type='hidden' name='product_id' value='$data[id]'>
                <input type='hidden' name='product_id' value='$data[id]'>
                <input type='hidden' name='product_id' value='$data[id]'>
                <input type='hidden' name='product_id' value='$data[id]'>
                <button type='submit' name='cart' class='cart'>Add To Cart</button>
            </form>
            <p>Product Details</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque voluptas esse cumque sunt aut ipsa
                porro veritatis distinctio ipsam soluta vel ullam architecto sequi ut nulla, dignissimos sint eius
                consectetur?</p>
        </div>
    </div>";
    
    }
    ?>
    <div class="title">
        <h2>Related Product</h2>
        <p>Shop More</p>
    </div>

    <div class="menu_grid_wrapper">
    <div class="menu_grid_box">
    <?php
    $loop = 0;
    $query = "SELECT*FROM add_image";
    $result = mysqli_query($connection,$query);
    if($result){
        
        while($loop<6){
            $data = mysqli_fetch_assoc($result);
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
                    $loop++;
        }
    }
    
    ?>
    </div>
    </div>

    
    <script src="script.js"></script>
</body>

</html>