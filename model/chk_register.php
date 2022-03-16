<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
session_start();

if(!isset($_SESSION['UserID'])){
    header('location: ../index.php');
}

      include("conn.php");

      $username = $_POST['username'];
      $password = $_POST['password'];
      $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      $phone = $_POST['phone'];
      $department = $_POST['department'];
      $status_user = $_POST['status_user'];

    $sql = "SELECT * FROM tb_users WHERE username='$username'";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) > 0){
        
        echo "<script>
        $(document).ready(function(){
        Swal.fire(
        'ชื่อUSERมีผู้ใช้แล้ว!',
        '',
        'error'
        )
        })
      </script>";
      header("refresh:1; url= ../index.php");

    }else{
        $regis = "INSERT INTO tb_users (username,password,fname,lname,phone,department,status_user) VALUES('$username','$password','$fname','$lname','$phone','$department','$status_user')";
        $query = mysqli_query($conn,$regis);
        
        echo "<script>
        $(document).ready(function(){
        Swal.fire(
        'ทำการสมัครเรียบร้อย!',
        '',
        'success'
        )
        })
      </script>";
      header("refresh:1; url= ../index.php");
        mysqli_close($conn);

    }

   
?>