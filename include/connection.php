<?php

$connection = mysqli_connect("localhost","root","","test1login");
if (mysqli_connect_errno()) {
    die("not connected". mysqli_connect_error());
}
else {
    // echo"success";
}

?>