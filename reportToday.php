<?php
    session_start();
    include './model/conn.php';
    $date = date("Y-m-d");
    $report = "SELECT * FROM tb_booking WHERE date_today='$date'";
    $q = mysqli_query($conn,$report);
    $allReport = mysqli_num_rows($q);

    $active = $_GET["active"];
    echo $active;
    echo "<td><a href='./model/chk_action.php?activeAll=1'>อ่านทั้งหมด</a></td>";
while($row = mysqli_fetch_array($q)) {
    echo "<table>";
    echo "<tr>";
      echo "<td>" .$row["id"] .  "</td> ";
      echo "<td>" .$row["id_user"] .  "</td> ";
      echo "<td>" .$row["booking_start_date"] .  "</td> ";
      echo "<td>" .$row["booking_end_date"] .  "</td> ";
      echo "<td>" .$row["purpose"] .  "</td> ";

      if($row["active"] == "1"){
        echo "<td> อ่านแล้ว</td> ";
        }else{
            echo "<td> ยังไม่อ่านแล้ว</td> "; 
        }
        echo "<td><a href='./model/chk_action.php?id=".$row['id']."&active=1'>อ่าน</a></td>";
    echo "</tr>";
    echo "</table>";
    }
?>


