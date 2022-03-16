
<?php
session_start();



include("../model/conn.php");
$id = $_POST["id"];
$sql = "SELECT * FROM tb_users WHERE id_user=$id";
$query = mysqli_query($conn, $sql);
$result = mysqli_fetch_array($query);
$date = date("Y-m-d");

$dateNow =  $date."T00:00";
?>
        <form  method="post" action="updateData.php" id="update-User" enctype="multipart/form-data">
            <input type="hidden" name="id_user" id="id_user" value="<?php echo $result["id_user"] ?>"> 
            <label for="" class="text-dark">username</label>
            <input type="text"name="username"  id="username" class="form-control" value="<?php echo $result["username"]?>">
            
            <label for="" class="text-dark">ชื่อ</label>
            <input type="text"name="fname"  id="fname" class="form-control" value="<?php echo $result["fname"]?>">
            

            <label for="" class="text-dark">นามสกุล</label>
            <input type="text"name="lname"  id="lname" class="form-control" value="<?php echo $result["lname"]?>">
            
            <label for="" class="text-dark">เบอร์โทร</label>
            <input type="text"name="phone"  id="phone" class="form-control" value="<?php echo $result["phone"]?>">
            
            <label for="" class="text-dark">แผนก</label>
            <input type="text"name="department"  id="department" class="form-control" value="<?php echo $result["department"]?>">
            
</br>

            <input type="submit" id="updateUser" value="อัพเดทข้อมูล" class="btn btn-primary">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">ยกเลิก</button>
        </form>