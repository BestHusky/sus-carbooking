<?php
session_start();
include './model/conn.php';
include 'headLogin.php';
?>

<div class="table-responsive-sm table-responsive-md p-5">
<table id="myTable">
                <thead>
                    <th>
                        ลำดับ
                    </th>
                    <th>
                        รูปภาพ
                    </th>
                    <th>
                        ชื่อผู้ขอใช้
                    </th>
                    <th>
                        เลขทะเบียนรถ
                    </th>
                    <th>
                        รายละเอียดการใช้งาน
                    </th>
                    <th>
                        รายชื่อผู้เดินทาง
                    </th>
                    <th>
                        รายชื่อผูขับ
                    </th>
                    <th>
                        วันที่ยืม
                    </th>
                    <th>
                        วันที่คืน
                    </th>
                    <th>
                        สถานะ
                    </th>
                </thead>
                <tbody>
<?php


$id = $_SESSION['UserID'];

$sql = "SELECT
        b.*,
        u.*,
        c.*
        
        FROM  ((tb_booking AS b 
        INNER JOIN tb_users AS u ON b.id_user = u.id_user)
        INNER JOIN tb_cars AS c ON b.id_car = c.id_car)
        WHERE b.id_user='$id' ORDER BY b.id
        ";

$query = mysqli_query($conn,$sql);
$fetch = mysqli_num_rows($query);
$order=1;



if($fetch > 0){
        while($row = mysqli_fetch_assoc($query)){
            $startTime = date("Y-m-d H:i", strtotime($row['booking_start_date']));
            $endTime = date("Y-m-d H:i", strtotime($row['booking_end_date']));
            ?>
           
                    <tr>
                    <td>
                        <?php echo $order++;?>
                        </td>
                        <td>
                            <img src="./image/<?php echo $row["car_img"];?>" alt="" srcset="">
                        </td>
                        <td>
                            <?php echo $row["fname"];?>
                            <?php echo $row["lname"];?>
                        </td>
                        <td>
                            <?php echo $row["number_car"];?>
                        </td>
                        <td>
                            <?php echo $row["purpose"];?>
                        </td>
                        <td>
                            <?php echo $row["travelers"];?>
                        </td>
                        <td>
                            <?php echo $row["driver"];?>
                        </td>
                        <td>
                            <?php echo $startTime;?>
                        </td>
                        <td>
                            <?php echo $endTime;?>
                        </td>
                        <td>
                           <?php
                if($row["action"] == "pending"){
                    echo "รอดำเนินการ";
                }
                           ?>
                        </td>
                    </tr>
                
    
        <?php 
        }
    
}


?>

</tbody>
</table>
</div>

</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>


<script>
    $(document).ready(function() {
        $.extend(true, $.fn.dataTable.defaults, {
            "language": {
                "sProcessing": "กำลังดำเนินการ...",
                "sLengthMenu": "แสดง_MENU_ แถว",
                "sZeroRecords": "ไม่พบข้อมูล",
                "sInfo": "แสดง _START_ ถึง _END_ จาก _TOTAL_ แถว",
                "sInfoEmpty": "แสดง 0 ถึง 0 จาก 0 แถว",
                "sInfoFiltered": "(กรองข้อมูล _MAX_ ทุกแถว)",
                "sInfoPostFix": "",
                "sSearch": "ค้นหา:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "เิริ่มต้น",
                    "sPrevious": "ก่อนหน้า",
                    "sNext": "ถัดไป",
                    "sLast": "สุดท้าย"
                }
            }
        });
        $('#myTable').DataTable();
    })
</script>
</html>

