<?php
    session_start();
    include './model/conn.php';
    $id = $_SESSION['UserID'];
    
?>
<?php include('headLogin.php')?>

<div class="container mt-5">
   
<form action="./model/chk_setting.php" method="post" class="form-control-lg border border-Secondary border-4 rounded" id="updateSetting">
<h3>แก้ไขข้อมูลส่วนตัว</h3>
</br>
<?php


    $sql = "SELECT 
    s.*,
    u.*
    FROM tb_setting as s
    INNER JOIN tb_users as u ON s.id_user = u.id_user
    WHERE s.id_user='$id'";

    $q = mysqli_query($conn,$sql);
    $result = mysqli_num_rows($q);

    if($result > 0){
        if($row = mysqli_fetch_array($q)){ ?>
        <div class="mb-3 row">
        <label for="" class="col-sm-2 col-form-label">ชื่อ-นามสกุล</label>
        <div class="col-sm col-lg-3">
        <input type="text" name="fname" id="fname" value="<?php echo $row["fname"]?>" class="form-control">
        </div>
        <div class="col-sm col-lg-3">
        <input type="text" name="lname" id="lname" value="<?php echo $row["lname"]?>" class="form-control">
        </div>
        </div>

        <div class="mb-3 row">
        <label for="" class="col-sm-2 col-form-label">username</label>
        <div class="col-sm col-lg-3">
        <input type="text" name="username" id="username" value="<?php echo $row["username"]?>" class="form-control">
        </div>
        </div>
    

        <div class="mb-3 row">
        <label for="" class="col-sm-2 col-form-label">password</label>
        <div class="col-sm col-lg-3">
        <input type="password" name="password" id="password" value="<?php echo $row["password"]?>" class="form-control">
        </div>
        </div>

        <div class="mb-3 row">
        <label for="" class="col-sm-2 col-form-label">เบอร์โทร</label>
        <div class="col-sm col-lg-3">
        <input type="text" name="phone" id="phone" value="<?php echo $row["phone"]?>" class="form-control">
        </div>
        </div>

        <div class="mb-3 row">
        <label for="" class="col-sm-2 col-form-label">แผนก</label>
        <div class="col-sm col-lg-3">
        <input type="text" name="department" id="department" value="<?php echo $row["department"]?>" class="form-control">
        </div>
        </div>
  

        <?php
        
        if($_SESSION['Userlevel'] != "ADMIN"){

        }else{
            ?>
            <div class="mb-3 row">
        <label for="" class="col-sm-2 col-form-label">Line Token</label>
        <div class="col-sm col-lg-6">
        <input type="text" name="line_token" id="line_token" value="<?php echo $row["line_token"]?>" class="form-control">
        </div>
        </div>
        <?php
        }

        ?>


        <div class="mb-3 row">
        <label for="" class="col-sm-2 col-form-label">theme</label>
        <div class="col-sm col-lg-3">
        <input type="color" name="theme" id="theme" value="<?php echo $row["color_theme"]?>" class="form-control form-control-color" id="exampleColorInput">
        </div>
        </div>
        <?php
        }
    }
?>
<input type="submit" class="btn btn-warning" value="บันทึก" >
</form>
</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
    let color = document.getElementById('color');

    color.addEventListener("Change",()=>{
        
    })
</script>
</html>