<?php
    session_start();
    include './model/conn.php';
    if(!isset($_SESSION['UserID'])){
        header('location: login.php');
    }
    

    $sql = "SELECT * FROM tb_cars";
    $q_car = mysqli_query($conn,$sql);

    $sql2 = "SELECT * FROM tb_users";
    $q2 = mysqli_query($conn,$sql2);
    
    $dateToday = date("Y-m-d");
    $sql3 = "SELECT * FROM tb_booking WHERE date_today='$dateToday'";
    $query = mysqli_query($conn,$sql3);
    $arr = mysqli_num_rows($query);
    

?>
<?php include 'headLogin.php' ?>

<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 m-1">
    <div class="col">
      <div class="card">
        <div class="in-box d-flex">
          <div class="b-1">
            <img src="./img/car-rental.png" alt="" width="100">
          </div>
          <div class="b-2">
            <p class="fs-6">ยานพาหนะ</p>
            <p class="fs-6"><?php
                $car = mysqli_num_rows($q_car);
                    echo $car;
            ?></p>
            <p class="fs-6">ยานพาหนะทั้งหมด</p>
          </div>
        </div>
      </div>
    </div>

    <div class="col">
      <div class="card">
        <div class="in-box d-flex">
          <div class="b-3">
            <img src="./img/check-list.png" alt="" width="100">
          </div>
          <div class="b-4">
            <p class="fs-6">จองยานพาหนะ</p>
            <p class="fs-6"><?php echo $arr;?></p>
            <p class="fs-6">การจองวันนี้</p>
          </div>
        </div>
      </div>
    </div>

    <div class="col">
      <div class="card">
        <div class="in-box d-flex">
          <div class="b-5">
            <img src="./img/talking.png" alt="" width="100">
          </div>
          <div class="b-6">
            <p class="fs-6">สมาชิก</p>
            <p class="fs-6"><?php
                $fetch2 = mysqli_num_rows($q2);
                    echo $fetch2;
            ?></p>
            <p class="fs-6">จำนวนสมาชิก</p>
          </div>
        </div>
      </div>
    </div>
  
  </div>

    <?php
        require 'calendar.php';
    ?>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>
