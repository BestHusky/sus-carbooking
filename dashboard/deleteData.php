<?php

    require '../model/conn.php';
    if(!isset($_SESSION['UserID'])){
        header('location: ../index.php');
    }
    $id = $_POST['id'];



    $sql = "DELETE FROM tb_users WHERE id_user='$id'";
    $query = mysqli_query($conn,$sql);

    
if(isset($_POST["id"])){
    $sql2 = "SELECT * FROM list_car WHERE id_car='$id'";
    $result2 = mysqli_query($conn, $sql2);
    $arr = mysqli_fetch_array($result2);

    $path = "../image/".$arr["car_img"];
    $delete = "../image/".$arr["car_img"];

    echo $path;
    echo "</br>";
    echo $delete;

    if($path == $delete){

        @unlink($delete);
        $del_car = "DELETE FROM list_car WHERE id_car='$id'";
        $q_car = mysqli_query($conn,$del_car);
    }
}

?>