<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include './model/conn.php'; 

$json_data= array();

$q ="SELECT
b.*,
u.*,
c.*

FROM  ((tb_booking AS b 
INNER JOIN tb_users AS u ON b.id_user = u.id_user)
INNER JOIN tb_cars AS c ON b.id_car = c.id_car) ORDER BY b.id";


$result = $conn->query($q);

while ($rs = $result->fetch_object()) {
    if ($rs->action == '') {
        $color = '#7CFC00';
        //FF0000
    }
    if ($rs->action == 'accept') {
        $color = '#008000';
        //FF0000
    }
    if ($rs->action == 'reject') {
        $color = '#A52A2A';
    }
    if ($rs->action == 'pending') {
        $color = '#D2691E';
    }
    if ($rs->action == 'cancel') {
        $color = '#778899';
    }
    if ($rs->action == '' && $rs->status == '') {
        $color = '#8A2BE2';
    }


    
    $json_data[] = [
        'id' => $rs->id,
        'title' =>
            $rs->number_car.','.$rs->purpose,
        'start' => $rs->booking_start_date,
        'end' => $rs->booking_end_date,
        'url' => 'showEventsData.php?id=' . $rs->id,
        'color' => $color,
    ];
    
}
$json = json_encode($json_data);

echo $json;

//แสดงข้อมูลแบบง่ายๆ นะครับ ส่วนเรื่องความปลอดภัยของข้อมูล ต้องมีเงื่อนไขในการเข้าถึงข้อมูลด้วยนะครับ ถ้าไม่อยากให้ที่อื่นเรียใช้ข้อมูลได้ 