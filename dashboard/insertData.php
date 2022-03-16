<?php

if(!isset($_SESSION['UserID'])){
    header('location: ../index.php');
}
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php

    include ("../model/conn.php");

if(isset($_POST['save_user'])){
        $username = mysqli_real_escape_string($conn,$_POST['username']);
        $password = mysqli_real_escape_string($conn,$_POST['password']);
        $fname = mysqli_real_escape_string($conn,$_POST['fname']);
        $lname = mysqli_real_escape_string($conn,$_POST['lname']);
        $phone = mysqli_real_escape_string($conn,$_POST['phone']);
        $department = mysqli_real_escape_string($conn,$_POST['department']);
        $status_user = mysqli_real_escape_string($conn,$_POST['status_user']);
    
        $sql ="INSERT INTO tb_cars (username,password,fname,lname,phone,department,status_user) VALUES('$username','$password','$fname','$lname','$phone','$department','$status_user')";
        $query = mysqli_query($conn,$sql);
    
        if($query){
          echo "<script>
          $(document).ready(function(){
          Swal.fire(
          'เพิ่มข้อมูลผู้ใช้เรียบร้อย!',
          '',
          'success'
          )
          })
        </script>";
      header("refresh:1; url= table_car.php");
        }else{
          echo "<script>
          $(document).ready(function(){
          Swal.fire(
          'เพิ่มข้อมูลไม่สำเร็จ!',
          '',
          'error'
          )
          })
        </script>";
      header("refresh:1; url= table_car.php");
        }
}

if(isset($_POST['save_car'])){

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

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}



if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";

} else {
  if (move_uploaded_file($_FILES["upload_new"]["tmp_name"], $path_copy)) {

    $add_car ="INSERT INTO tb_cars (number_car,brand_car,type_car,seats_car,status_car,car_img) VALUES('$number_car','$brand_car','$type_car','$seats_car','$status_car','$newname')";
    $q_car = mysqli_query($conn,$add_car);

        echo "<script>
        $(document).ready(function(){
        Swal.fire(
        'เพิ่มข้อมูลรถยนต์เรียบร้อย!',
        '',
        'success'
        )
        })
      </script>";
    header("refresh:1; url= table_carlist.php");
   
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}

}
    

   
?>