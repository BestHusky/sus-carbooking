<?php
if(!isset($_SESSION['UserID'])){
    header('location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <link href='https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/headLogin.css">
    <link href='https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css' rel='stylesheet'>
    
    <link rel="shortcut icon" href="icon.svg" type="image/x-icon">
    <title>SUS-ระบบยืมรถยนต์</title>
</head>
<body >

<?php
$idColor = $_SESSION['UserID'];
 $chgColor = "SELECT * FROM tb_setting WHERE id_user='$idColor'";
 $color = mysqli_query($conn,$chgColor);
 $resultColor = mysqli_num_rows($color);
    if($resultColor > 0){
        if($rowColor = mysqli_fetch_assoc($color)){
          if($rowColor["color_theme"] != ''){
            ?>
            <nav class="navbar navbar-dark navbar-expand-sm Fixed-Top" style="background:<?php echo $rowColor["color_theme"]?>;"> 
            <?php
          }
          else{?>
            <nav class="navbar navbar-dark navbar-expand-sm Fixed-Top bg-dark"> 
            <?php
          }
          
     
        }
    }
?>


		<div class="container">
			<a class="navbar-brand text-white" href="index.php"><i class="fa-solid fa-car-side"></i> CAR Booking</a>
			<button class="navbar-toggler" 
                    type="button" 
                    data-bs-toggle="collapse" 
                    data-bs-target="#nvbCollapse" 
                    aria-controls="nvbCollapse">
				<span class="navbar-toggler-icon "></span>
			</button>
			<div class="collapse navbar-collapse "  id="nvbCollapse">
				<ul class="navbar-nav ">
					<li class="nav-item active">
						<a class="nav-link" href="index.php" ><i class="fa fa-home fa-fw mr-1"></i> หน้าหลัก</a>
					</li>
          <li class="nav-item">
        <?php
        if($_SESSION['Userlevel'] == "ADMIN"){?>
            <a class="nav-link" href="./dashboard/table_user.php"><i class="fa-solid fa-chart-line"></i>dashboard</a>
        <?php
        } 
        ?>
        </li>
					<li class="nav-item  ">
						<a class="nav-link" href="add_booking.php" ><i class="fa-solid fa-car"></i> จองยานพาหนะ</a>
					</li>
					<li class="nav-item ">
						<a class="nav-link" href="car_list.php"><i class="fa-regular fa-address-book"></i> รายการจองของฉัน</a>
					</li>
					
                    <li class="nav-item ">
						<a class="nav-link" href="setting.php"><i class="fa-solid fa-gear"></i> ตั้งค่า</a>
					</li>
					<li class="nav-item ">
						<a class="nav-link"  href="./model/logout.php"><i class="fa fa-sign-in fa-fw mr-1"></i> ออกจากระบบ</a>
					</li>
				</ul>

        
			</div>

         
		</div>

    <?php
      if($_SESSION["Userlevel"] == 'ADMIN'){
        ?>
            <div class="btn-group">

<a class="nav-link text-warning dropdown-toggle w-100" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-bell"></i>
<?php
          $report = "SELECT * FROM tb_booking WHERE active='0'";
          $q_report = mysqli_query($conn,$report);
          $allReport = mysqli_num_rows($q_report);
        ?>

        <span><?php 
               echo $allReport;
        ?></span>    
</a>

<ul class="dropdown-menu dropdown-menu-lg-end">
  <div class="list-group" style="width:50vw">
<?php

  include './model/conn.php';
  $date = date("Y-m-d");
  $report = "SELECT
  b.*,
  u.*,
  c.*
  
  FROM  ((tb_booking AS b 
  INNER JOIN tb_users AS u ON b.id_user = u.id_user)
  INNER JOIN tb_cars AS c ON b.id_car = c.id_car) WHERE b.date_today='$date'";
  $q = mysqli_query($conn,$report);
  $allReport = mysqli_num_rows($q);

  while($row = mysqli_fetch_array($q)) {

    $newStart = strtotime($row['booking_start_date']);
    $newEnd = strtotime($row['booking_end_date']);
          

      if($row["active"] == "1"){
        ?>
          <li class="list-group-item d-flex justify-content-between align-items-start bg-info">
          <?php 
          echo $row["fname"].' '.$row["lname"].' '.$row["purpose"]." ขอใช้งาน ".date('d/m/Y', $newStart)."-ถึง-".date('d/m/Y', $newEnd)
          ?>


          <a class="btn btn-outline-primary btn-sm text-dark" href="./chk_action.php?id=<?php echo $row["id"]?>">อ่านรายละเอียด</a>
          
        </li>
      <?php
        }else{
          ?>
          <li class="list-group-item d-flex justify-content-between align-items-start bg-warning">
          <?php 
          echo $row["fname"].' '.$row["lname"].' '.$row["purpose"]." ขอใช้งาน ".date('d/m/Y', $newStart)."-ถึง-".date('d/m/Y', $newEnd)
          ?>
          <a class="btn btn-outline-primary btn-sm text-dark" href="./chk_action.php?id=<?php echo $row["id"]?>">อ่านรายละเอียด</a>
        </li>
      <?php

    }
   
      echo "<li class='list-group-item'></li>";

  }
  
?>
</div>
</ul>
</div>
        <?php
      }
    ?>
</nav>




