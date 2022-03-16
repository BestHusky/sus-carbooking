 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<?php
session_start();
include('./model/conn.php');
$id = $_POST["id"];
$sql = "SELECT * FROM tb_cars WHERE id_car=$id";
$query = mysqli_query($conn, $sql);
$date = date("Y-m-d");

$dateNow =  $date."T00:00";
?>
<form method="post" id="insert-form" action="insertBooking.php">
    <?php
    while ($result = mysqli_fetch_assoc($query)) { ?>
        <input type="hidden" name="id_car" id="id_car" class="form-control" value="<?php echo $result["id_car"] ?>">
        <input type="hidden" name="UserID" id="UserID" class="form-control" value="<?php echo $_SESSION["UserID"] ?>">
        <div class="row gx-3">
            <div class="col-sm-6 col-md-6">
                <label for="" class="text-dark">ชื่อ</label>
                <input type="text" name="fname" id="fname" class="form-control" value="<?php echo $_SESSION["Fname"] ?>" required>
            </div>
            <div class="col-sm-6 col-md-6">
                <label for="" class="text-dark">นามสกุล</label>
                <input type="text" name="lname" id="lname" class="form-control" value="<?php echo $_SESSION["Lname"] ?>" required>
            </div>
            <div class="col-sm-6 col-md-6">
                <label for="" class="text-dark">เลขทะเบียน</label>
                <input type="text" name="number_car" id="number_car" class="form-control" value="<?php echo $result['number_car'] ?>" required>
            </div>
            <div class="col-sm-6 col-md-6">
                <label for="" class="text-dark">ยี่ห้อ</label>
                <input type="text" name="brand_car" id="brand_car" class="form-control" value="<?php echo $result['brand_car'] ?>" required>
            </div>

            <div class="col-sm-6 col-md-12">
                <label for="" class="text-dark">รายละเอียดการขอใช้งาน</label>
                <textarea type="text" row="4" cols="50" name="purpose" id="purpose" class="form-control" value="" required></textarea>
            </div>

            <div class="col-sm-6 col-md-4">
                <label for="" class="text-dark">ประเภทรถ</label>
                <input type="text" name="type_car" id="type_car" class="form-control" value="<?php echo $result['type_car'] ?>" required>
            </div>
            <div class="col-sm-6 col-md-4">
                <label for="" class="text-dark">จำนวนที่นั่ง</label>
                <input type="text" name="seats_car" id="seats_car" class="form-control" value="<?php echo $result['seats_car'] ?>" required>
            </div>
            <div class="col-sm-6 col-md-4">
                <label for="" class="text-dark">จำนวนผู้เดินทาง</label>
                <input type="text" name="number_traveler" id="number_traveler" class="form-control" required>
            </div>
            <div class="col-sm-6 col-md-12">
                <label for="" class="text-dark">รายชื่อผู้เดินทาง</label>
                <textarea type="text" rows="2" cols="20" name="travelers" id="travelers" class="form-control" value="" required></textarea>
            </div>
            <div class="col-sm-6 col-md-6">
                <label for="" class="text-dark">วันที่ยืม</label>
                <input type="datetime-local" name="booking_start_date" id="booking_start_date" class="form-control"  min="<?php echo $dateNow;?>" required>

            </div>
            <div class="col-sm-6 col-md-6">
                <label for="" class="text-dark">วันที่คืน</label>
                <input type="datetime-local" name="booking_end_date" id="booking_end_date" class="form-control" min="<?php echo $dateNow;?>" required>
            </div>
            <div class="col-sm-6 col-md-12">
                <label for="" class="text-dark">ชื่อคนขับรถ</label>
                <input type="text" name="driver" id="driver" class="form-control">
            </div>
         
            <input type="hidden" name="status_car" id="status_car" class="form-control" value="<?php echo $result['status_car'] ?>">
        </div>

    <?php  } ?>
    <div class="col-sm-6 col-md-12  text-end p-2">
        <button type="submit" name="add_car" id="insert" class="btn btn-primary p-2">บันทึก</button>
        <button type="button" class="btn btn-danger p-2" data-bs-dismiss="modal">ยกเลิก</button>
    </div>
</form>
<?php

?>
