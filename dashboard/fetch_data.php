<?php

include('../model/conn.php');
if(!isset($_SESSION['UserID'])){
    header('location: ../index.php');
}
$id = $_POST["id"];
$sql = "SELECT * FROM tb_cars WHERE id_car='$id'";
$query = mysqli_query($conn, $sql);
$row=mysqli_fetch_array($query);

echo json_encode($row);


?>