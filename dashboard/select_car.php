
        
<?php
session_start();

include('../model/conn.php');
$id = $_POST["id"];
$sql = "SELECT * FROM tb_cars WHERE id_car=$id";
$query = mysqli_query($conn, $sql);
$result = mysqli_fetch_array($query);
$date = date("Y-m-d");

$dateNow =  $date."T00:00";
?>
        <form  method="post" action="updateData.php" id="update-form" enctype="multipart/form-data">
            <input type="hidden" name="id_car" id="id_car" value="<?php echo $result["id_car"] ?>"> 
            <label for="" class="text-dark">เลขทะเบียน</label>
            <input type="text"name="number_car"  id="number_car" class="form-control" value="<?php echo $result["number_car"]?>">


            <label for="" class="text-dark">ยี่ห้อ</label>
            <select name="brand_car" id="brand_car" class="form-select" aria-label="Default select example" value="<?php echo $result["brand_car"]?>" >
            <option class="text-success" value="HONDA">HONDA</option>
              <option class="text-danger" value="TOYOTA">TOYOTA</option>
            </select>

            <label for="" class="text-dark">ประเภท</label>
            <select name="type_car" id="type_car" class="form-select" aria-label="Default select example" value="<?php echo $result["type_car"]?>">
              <option class="text-success" value="sedan">รถเก๋ง</option>
              <option class="text-danger" value="van">รถตู้</option>
            </select>

            <label for="" class="text-dark">จำนวนที่นั่ง</label>
            <input type="text" name="seats_car"  id="seats_car" class="form-control" value="<?php echo $result["seats_car"]?>">
            
            <label for="" class="text-dark">สถานะ</label>
            <select name="status_car" id="status_car" class="form-select" aria-label="Default select example" value="<?php echo $result["status_car"]?>">
              <option class="text-success" value="free">สามารถใช้งานได้</option>
              <option class="text-danger" value="unavailable">ไม่สามารถใช้งานได้</option>
              <option class="text-warning" value="repair">กำลังส่งซ่อม</option>
            </select>

            <label for="" class="text-dark">รูปภาพ</label>

            <div class="text-center" id="show_car">
            <img src="../image/<?php echo $result["car_img"]?>" alt="" style="width: 100px;">
            </div>
            <div>
            <input type="file" name="upload_new" id="upload_new"/>
            </div>
            <br>
            <input type="submit" id="updateCar" value="update" class="btn btn-primary">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">cancel</button>
        </form>