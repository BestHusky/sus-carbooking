<?php

session_start();

if(!isset($_SESSION['UserID'])){
    header('location: ../index.php');
}
if(isset($_SESSION['UserID'])){
    include 'conn.php';

    $id = $_SESSION['UserID'];
    $id_car = $_POST['id_car'];
    $purpose = $_POST['purpose'];
    $booking_start_date = $_POST['booking_start_date'];
    $booking_end_date = $_POST['booking_end_date'];

    $sql = "INSERT INTO tb_booking (id_user,id_car,purpose,booking_start_date,booking_end_date)
            VALUES('$id','$id_car','$purpose','$booking_start_date','$booking_end_date')";
    $query = mysqli_query($conn,$sql);

    if($query){
        echo "add data success";
    }else{
        echo "add data failed";
    }
    
}


?>