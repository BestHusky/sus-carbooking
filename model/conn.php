
<?php

    $localhost = "localhost";
    $username = "root";
    $password = "";
    $database = "car_booking";

    $conn = mysqli_connect($localhost,$username,$password,$database);
    
    if(!$conn){
        echo "connect error";
    }

?>