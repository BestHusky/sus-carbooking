<?php 
session_start();
include './model/conn.php';
date_default_timezone_set('Asia/Bangkok');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <link href='https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/headLogin.css">
    <link href='https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css' rel='stylesheet'>
    
    <title>CAR-BOOKING</title>
</head>
<body class="d-flex align-items-center" style="background: #DCDCDC;">
<a href="manage_page.php" type="button"  class="btn btn-secondary btn-outline-warning"><i class="fa-solid fa-angles-left">หน้าแรก</i></a>
<?php

$id = $_GET['id'];

$sql3 = "SELECT
b.*,
u.*,
c.*
FROM  ((tb_booking AS b 
INNER JOIN tb_users AS u ON b.id_user = u.id_user)
INNER JOIN tb_cars AS c ON b.id_car = c.id_car) WHERE b.id='$id'";
$q_book = mysqli_query($conn, $sql3);

$num = mysqli_num_rows($q_book);
$row2 = mysqli_fetch_array($q_book);
    
    if($row2["active"] == "1"){

      $activeAll = 1;
   
      $sql = "UPDATE tb_booking SET active='$activeAll'";
      $query = mysqli_query($conn,$sql);
        
        if($query){
        }
    }

    if($row2["active"] == "1"){
            
            ?>
            
            <div class="container mt-5">
            <div class="card mt-5" style="max-width: 100vw;">
  <div class="row g-3">
    <div class="col-md-4">
      <img src="./image/<?php echo $row2["car_img"]?>" class="img-fluid rounded-start" alt="..." style="width:100vw">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">ทะเบียน : <?php echo $row2["number_car"]?></h5>
        <ul class="list-group list-group-flush">
    <li class="list-group-item">ชื่อผู้ยืม : <?php echo $row2["fname"]?> <?php echo $row2["lname"]?></li>
    <li class="list-group-item">เบอร์โทร : <?php echo $row2["phone"]?></li>
    <li class="list-group-item">แผนก : <?php echo $row2["department"]?></li>
    <li class="list-group-item">ยี่ห้อรถ : <?php echo $row2["brand_car"]?></li>
    <li class="list-group-item">ประเภท : <?php echo $row2["type_car"]?> จำนวนที่นั่ง <?php echo $row2["seats_car"]?> ที่นั่ง</li>
    <li class="list-group-item">รายละเอียดการยืม : <?php echo $row2["purpose"]?></li>
    <li class="list-group-item">จำนวนผู้เดินทาง : <?php echo $row2["number_traveler"]?></li>
    <li class="list-group-item">รายชื่อผู้เดินทาง : <?php echo $row2["travelers"]?></li>
    <li class="list-group-item">รายชื่อผู้ขับรถ : <?php echo $row2["driver"]?></li>
    <li class="list-group-item">วันที่ยืมรถ : <?php  $newStart= strtotime($row2['booking_start_date']);
                    echo date('d/m/Y', $newStart);
                    echo "&nbsp;";
                    echo date('H:i', $newStart);?> 
    วันที่คืน : <?php  $newEnd = strtotime($row2['booking_end_date']);
                    echo date('d/m/Y', $newEnd);
                    echo "&nbsp;";
                    echo date('H:i', $newEnd);?></li>
    <li class="list-group-item">รายละเอียดเพิ่มเติม : <?php echo $row2["detail_more"]?></li>
    <li class="list-group-item">สถานะ : <?php
    if($row2["action"] == "pending"){
        echo "กำลังรอดำเนินการ";
    }
    if($row2["action"] == "accept"){
      echo "อนุมัติ";
  }
  if($row2["action"] == "cancel"){
    echo "ยกเลิก";
}
    
    ?></li>
    
  </ul>
       
      </div>
    </div>
  </div>
</div>
            </div>

            <?php

    }else{
      $active = 1;
   
        $sql2 = "UPDATE tb_booking SET active='$active' WHERE id='$id'";
        $query2 = mysqli_query($conn,$sql2);
      ?>
            
      <div class="container mt-5">
      <div class="card mt-5" style="max-width: 100vw;">
<div class="row g-3">
<div class="col-md-4">
<img src="./image/<?php echo $row2["car_img"]?>" class="img-fluid rounded-start" alt="..." style="width:100vw">
</div>
<div class="col-md-8">
<div class="card-body">
        <h5 class="card-title">ทะเบียน : <?php echo $row2["number_car"]?></h5>
        <ul class="list-group list-group-flush">
    <li class="list-group-item">ชื่อผู้ยืม : <?php echo $row2["fname"]?> <?php echo $row2["lname"]?></li>
    <li class="list-group-item">เบอร์โทร : <?php echo $row2["phone"]?></li>
    <li class="list-group-item">แผนก : <?php echo $row2["department"]?></li>
    <li class="list-group-item">ยี่ห้อรถ : <?php echo $row2["brand_car"]?></li>
    <li class="list-group-item">ประเภท : <?php echo $row2["type_car"]?> จำนวนที่นั่ง <?php echo $row2["seats_car"]?> ที่นั่ง</li>
    <li class="list-group-item">รายละเอียดการยืม : <?php echo $row2["purpose"]?></li>
    <li class="list-group-item">จำนวนผู้เดินทาง : <?php echo $row2["number_traveler"]?></li>
    <li class="list-group-item">รายชื่อผู้เดินทาง : <?php echo $row2["travelers"]?></li>
    <li class="list-group-item">รายชื่อผู้ขับรถ : <?php echo $row2["driver"]?></li>
    <li class="list-group-item">วันที่ยืมรถ : <?php  $newStart= strtotime($row2['booking_start_date']);
                    echo date('d/m/Y', $newStart);
                    echo "&nbsp;";
                    echo date('H:i', $newStart);?> 
    วันที่คืน : <?php  $newEnd = strtotime($row2['booking_end_date']);
                    echo date('d/m/Y', $newEnd);
                    echo "&nbsp;";
                    echo date('H:i', $newEnd);?></li>
    <li class="list-group-item">รายละเอียดเพิ่มเติม : <?php echo $row2["detail_more"]?></li>
    <li class="list-group-item">สถานะ : <?php
    if($row2["action"] == "pending"){
        echo "กำลังรอดำเนินการ";
    }
    if($row2["action"] == "accept"){
      echo "อนุมัติ";
  }
  if($row2["action"] == "cancel"){
    echo "ยกเลิก";
}
    
    ?></li>
    
  </ul>
       
      </div>
</div>
</div>
</div>
      </div>

      <?php
    }
    
    
?>



