<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
    session_start();    

    include('../model/conn.php');
  if(isset($_POST["updateCar"])){
    $id_car  = mysqli_real_escape_string($conn,$_POST['id_car']);
    $number_car = mysqli_real_escape_string($conn,$_POST['number_car']);
    $brand_car = mysqli_real_escape_string($conn,$_POST['brand_car']);
    $type_car = mysqli_real_escape_string($conn,$_POST['type_car']);
    $seats_car = mysqli_real_escape_string($conn,$_POST['seats_car']);
    $status_car = mysqli_real_escape_string($conn,$_POST['status_car']);
    $upload_new = $_FILES['upload_new'];


    date_default_timezone_set('Asia/Bangkok');
	  $date = date("Ymdhis");
    $path = "../image/";
    $fullpath = $path.basename($_FILES["upload_new"]["name"]);
    $uploadOk = 1;
    $type = strrchr($_FILES['upload_new']['name'],".");
    $newname = $date.$type;
    $path_copy=$path.$newname;
    $path_link="../image/".$newname;

    $imageFileType = strtolower(pathinfo($path_copy,PATHINFO_EXTENSION));
   

    

if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["upload_new"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}



if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";

} else {
  if (move_uploaded_file($_FILES["upload_new"]["tmp_name"], $path_copy)) {
   

        $sql2 = "SELECT * FROM  tb_cars WHERE id_car='$id_car'";
        $result2 = mysqli_query($conn, $sql2);
        $fecth = mysqli_fetch_array($result2);


        unlink($path.$fecth["car_img"]);
        $sql = "UPDATE tb_cars SET number_car='$number_car' ,brand_car='$brand_car', type_car='$type_car', seats_car='$seats_car', status_car='$status_car',car_img='$newname' WHERE id_car='$id_car'";
        $result = mysqli_query($conn, $sql);

        echo "<script>
        $(document).ready(function(){
        Swal.fire(
        'อัปเดทข้อมูล!',
        '',
        'success'
        )
        })
      </script>";
      header("refresh:1; url= table_carlist.php");
   
  } else {
    $sql3 = "UPDATE tb_cars SET number_car='$number_car' ,brand_car='$brand_car', type_car='$type_car', seats_car='$seats_car', status_car='$status_car' WHERE id_car='$id_car'";
    $result2 = mysqli_query($conn, $sql3);
    echo "<script>
    $(document).ready(function(){
    Swal.fire(
    'อัปเดทข้อมูล!',
    '',
    'success'
    )
    })
  </script>";
  header("refresh:1; url= table_carlist.php");
  }
}
}
   

if(isset($_POST["saveAction"])){

  $id_row = $_POST['id'];
  $detail_more = $_POST['detail_more'];
  $add_row = $_POST['add_row'];
  $saveAction = "UPDATE tb_booking SET action='$add_row', detail_more='$detail_more' WHERE id ='$id_row'";
  $q_saveAction = mysqli_query($conn,$saveAction);
  if($q_saveAction){
    echo "<script>
        $(document).ready(function(){
        Swal.fire(
        'อัปเดทข้อมูล!',
        '',
        'success'
        )
        })
      </script>";
    header("refresh:1; url= table_booking.php");
  }
}

if(isset($_POST["updateUser"])){
$id_user = $_POST["id_user"];
  $u = $_POST["username"];
  $f = $_POST["fname"];
  $l = $_POST["lname"];
  $p = $_POST["phone"];
  $d = $_POST["department"];

  $u_user = "UPDATE tb_users SET username='$u' ,fname='$f', lname='$l', phone='$p', department='$d' WHERE id_user='$id_user'";
  $q_u = mysqli_query($conn, $u_user);

  if($q_u){
    echo "<script>
        $(document).ready(function(){
        Swal.fire(
        'อัปเดทข้อมูล!',
        '',
        'success'
        )
        })
      </script>";
    header("refresh:1; url= table_booking.php");
  }
}


?>