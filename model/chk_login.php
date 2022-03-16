<?php
session_start();
if(!isset($_SESSION['UserID'])){
	header('location: ../index.php');
}
if(isset($_POST['username'])){
			
                  include("conn.php");

                  $Username = $_POST['username'];
                  $Password = $_POST['password'];
                  $sql="SELECT * FROM tb_users Where username='".$Username."' AND password='".$Password."' ";
 
                  $result = mysqli_query($conn,$sql);

				  if(mysqli_num_rows($result)==1){
				  $row = mysqli_fetch_array($result);
				  $_SESSION["UserID"] = $row["id_user"];
				  $_SESSION["Fname"] = $row["fname"];
				  $_SESSION["Lname"] = $row["lname"];
				  $_SESSION["fullname"] = $row["fname"]." ".$row["lname"];
				  $_SESSION["Userlevel"] = $row["status_user"];

				  $id = $_SESSION['UserID'];

				  $setting="SELECT * FROM tb_setting WHERE id_user='$id'";
                  $result_setting = mysqli_query($conn,$setting);
				  $row_id = mysqli_fetch_array($result_setting);

				if($row_id["id_user"] == ''){
					$color ="INSERT INTO tb_setting (id_user,color_theme) VALUES('$id','#000000')";
					$result_color = mysqli_query($conn,$color);
				}

        header('location: ../manage_page.php');
    } 
	else{
 
		echo "<script>alert('username หรือ password ไม่ถูกต้อง')</script>";
		header("refresh:0; url= ../index.php");
	
	}		  


}


?>
