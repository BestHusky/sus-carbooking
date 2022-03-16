<?php
    session_start();
    include '../model/conn.php';
    if(!isset($_SESSION['UserID'])){
        header('location: ../index.php');
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">

    <link rel="stylesheet" href="../css/headLogin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <link rel="shortcut icon" href="../icon.svg" type="image/x-icon">
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
          }else{?>
            <nav class="navbar navbar-dark navbar-expand-sm Fixed-Top bg-dark"> 
            <?php
          }
          
     
        }
    }
?>


		<div class="container">
			<a class="navbar-brand text-white" href="../index.php"><i class="fa-solid fa-car-side"></i> CAR Booking</a>
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
						<a class="nav-link" href="../index.php" ><i class="fa fa-home fa-fw mr-1"></i> หน้าหลัก</a>
					</li>
					<li class="nav-item">
          <a class="nav-link" href="table_user.php"><i class="fa-solid fa-users"></i> ข้อมูลผู้ใช้งาน</a>
					</li>
					<li class="nav-item ">
          <a class="nav-link" href="table_carlist.php"><i class="fa-solid fa-car"></i> ข้อมูลรถ</a>
					</li>
          <li class="nav-item ">
          <a class="nav-link" href="table_booking.php"><i class="fa-solid fa-book"></i> รายละเอียดการยืมรถ</a>
					</li>
                    <li class="nav-item ">
						<a class="nav-link" href="../setting.php"><i class="fa-solid fa-gear"></i> ตั้งค่า</a>
					</li>
					<li class="nav-item ">
						<a class="nav-link"  href="../model/logout.php"><i class="fa fa-sign-in fa-fw mr-1"></i> ออกจากระบบ</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>




