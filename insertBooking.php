<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php

session_start();
require './model/conn.php';
if (!isset($_POST['add_car'])) {
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    header('location: index.php');
} else {

    $UserID = mysqli_real_escape_string($conn, $_SESSION['UserID']);
    $id_car = mysqli_real_escape_string($conn, $_POST['id_car']);
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $number_car = mysqli_real_escape_string($conn, $_POST['number_car']);
    $brand_car = mysqli_real_escape_string($conn, $_POST['brand_car']);
    $purpose = mysqli_real_escape_string($conn, $_POST['purpose']);
    $type_car = mysqli_real_escape_string($conn, $_POST['type_car']);
    $seats_car = mysqli_real_escape_string($conn, $_POST['seats_car']);
    $number_traveler = mysqli_real_escape_string($conn, $_POST['number_traveler']);
    $travelers = trim(mysqli_real_escape_string($conn, $_POST['travelers']));
    $driver = mysqli_real_escape_string($conn, $_POST['driver']);
    $booking_start_date = mysqli_real_escape_string($conn, $_POST['booking_start_date']);
    $booking_end_date = mysqli_real_escape_string($conn, $_POST['booking_end_date']);

    $secstart = strtotime($booking_start_date);
    $newstart = date("Y-m-d H:i", $secstart);
    $datestart = $newstart;

    $secend = strtotime($booking_end_date);
    $newend = date("Y-m-d H:i", $secend);
    $dateend = $newend;


    $dateNow = date('Y-m-d');

    $sql2 = "SELECT * FROM tb_booking WHERE id_car='$id_car'";
    $query2 = mysqli_query($conn, $sql2);
    $fetch2 = mysqli_num_rows($query2);
    $chkStartTime = strtotime($datestart);
    $chkEndTime = strtotime($dateend);

    if ($fetch2 >= 0) {

        while ($row = mysqli_fetch_array($query2)) {
            $startTime = strtotime($row["booking_start_date"]);
            $endTime = strtotime($row["booking_end_date"]);

            $chkStartTime = strtotime($datestart);
            $chkEndTime = strtotime($dateend);
        }


        if ($chkStartTime > $startTime && $chkEndTime < $endTime) {$msg_1 = "มีรถใช้งานในระหว่างเวลานี้";?>
        <script>
                let msg_1 = '<?= $msg_1 ?>';
                $(document).ready(function() {
                    Swal.fire({
                        title: msg_1,
                        text: '',
                        icon: 'warning',
                        confirmButtonColor: '#3085d6'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.replace('index.php');
                        }
                    })
                })
        </script>
        <?php
            echo "sasa";
        } elseif (($chkStartTime > $startTime && $chkStartTime < $endTime) || ($chkEndTime > $startTime && $chkEndTime < $endTime)) {
            $msg_2 = date("Y-m-d H:i", $chkStartTime) . " ช่วงเวลานี้สามารถใช้ได้จนถึง " . date("Y-m-d H:i", $startTime);
            ?>
            <script>
                let msg_2 = '<?= $msg_2 ?>';
                $(document).ready(function() {
                    Swal.fire({
                        title: '',
                        text: msg_2,
                        icon: 'info',
                        width: '50vw',
                        confirmButtonColor: '#3085d6'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.replace('index.php');
                        }
                    })
                })
            </script>


        <?php

        } elseif ($chkStartTime == $startTime || $chkEndTime == $endTime) {
            $msg =  date("Y-m-d H:i", $chkStartTime) . "ช่วงเวลานี้สามารถใช้ได้จนถึง" . date("Y-m-d H:i", $startTime) . "หลังจาก" . date("Y-m-d H:i", $startTime) . "ไม่สามารถใช้ได้จนถึง" . date("Y-m-d H:i", $endTime);
        ?>
            <script>
                let msg = '<?= $msg ?>';
                $(document).ready(function() {
                    Swal.fire({
                        title: '',
                        text: msg,
                        icon: 'info',
                        width: '50vw',
                        confirmButtonColor: '#3085d6'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.replace('index.php');
                        }
                    })
                })
            </script>


        <?php

        } elseif ($startTime > $chkStartTime && $endTime < $chkEndTime) {
            echo date("Y-m-d H:i", $chkStartTime) . "ช่วงเวลานี้สามารถใช้ได้จนถึง" . date("Y-m-d H:i", $startTime) . "หลังจาก" . date("Y-m-d H:i", $endTime) . "สามารถใช้ได้ตามปกติ";
        } else {$msg_4 = "ทำการจองรถเรียบร้อย";?>
            <script>
                let msg_4 = '<?= $msg_4 ?>';
                $(document).ready(function() {
                    Swal.fire({
                        title: msg_4,
                        text: '',
                        icon: 'success',
                        confirmButtonColor: '#3085d6'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.replace('index.php');
                        }
                    })
                })
            </script>
        <?php
            $insertData = "INSERT INTO tb_booking(id_user,id_car,purpose,driver,number_traveler,travelers,booking_start_date,booking_end_date,date_today)
            VALUES('$UserID','$id_car','$purpose','$driver','$number_traveler','$travelers','$booking_start_date','$booking_end_date','$dateNow')";
            $q_insertData = mysqli_query($conn, $insertData);
            if ($q_insertData) {
                $line_notyfi = "SELECT b.*,
                               s.*
                               FROM ((tb_booking as b
                               INNER JOIN tb_users as u ON b.id_user = u.id_user)
                               INNER JOIN tb_setting as s ON u.id_user = s.id_user)
                               WHERE b.id_user='$UserID'";

                $line_api = mysqli_query($conn, $line_notyfi);
                $row_line = mysqli_fetch_array($line_api);

                $line_start = strtotime($row_line["booking_start_date"]);
                $new_start = date("d-m-Y H:i", $line_start);


                $line_end = strtotime($row_line["booking_end_date"]);
                $new_end = date("d-m-Y H:i", $line_end);

                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL);
                date_default_timezone_set("Asia/Bangkok");

                $sToken = $row_line["line_token"];
                $sMessage = $_SESSION["fullname"] . " มีการขอใช้งาน "
                    . $new_start . "ถึงเวลา" . $new_end;


                $chOne = curl_init();
                curl_setopt($chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
                curl_setopt($chOne, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($chOne, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($chOne, CURLOPT_POST, 1);
                curl_setopt($chOne, CURLOPT_POSTFIELDS, "message=" . $sMessage);
                $headers = array('Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer ' . $sToken . '',);
                curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($chOne, CURLOPT_RETURNTRANSFER, 1);
                $result = curl_exec($chOne);
            } else {
                echo "no data";
            }
        }
    }
}


?>