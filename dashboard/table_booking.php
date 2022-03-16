
<?php
$order = 1;

?>

<?php include ("head_dashboard.php"); ?>

<div class="table-responsive m-3">
    <div class="row">
        <div class="col-lg-12 col-sm-12">
        <table id="myTable" class="table" style="width:100%"> 
    <thead class="text-center h6 bg-dark text-light fw-normal">
        
        <th>
            ลำดับ
        </th>
        <th style="column-width:200px;white-space: normal;">
            ชื่อผู้ยืม
        </th>
        <th style="column-width:200px;white-space: normal;">
            เลขทะเบียนรถ
        </th>
        <th style="column-width:200px;white-space: normal;">
            ยี่ห้อรถ
        </th>
        <th>
            ประเภท
        </th>
        <th style="column-width:200px;white-space: normal;">
            รายละเอียดการยืม
        </th>
        <th>
            จำนวนผู้เดินทาง
        </th>
        <th>
            รายชื่อผู้เดินทาง
        </th>
        <th>
            รายชื่อผู้ขับรถ
        </th>
        <th>
            วันที่ยืมรถ
        </th>
        <th>
            วันส่งคืนรถ
        </th>
        
        <th>
            การอนุมัติ
        </th>
        
        <th>
            สถานะ
        </th>
        <th>
            *เหตุผลในการยกเลิก
        </th>
        <th>

        </th>
        
    </thead>

    <tbody>
        <?php
        $sql = "SELECT
        b.*,
        u.*,
        c.*
        FROM  ((tb_booking AS b 
        INNER JOIN tb_users AS u ON b.id_user = u.id_user)
        INNER JOIN tb_cars AS c ON b.id_car = c.id_car) ORDER BY b.id";
        $query = mysqli_query($conn, $sql);
        $fetch = mysqli_num_rows($query);
        while ($row = mysqli_fetch_assoc($query)) {
            $fullname = $row['fname']."&nbsp;".$row['lname'];
            ?>
                <tr>
                <td>
                    <?php echo $order++; ?>
                </td>
                <td style="column-width:300px;white-space: normal;">
                <p style="width:150px"><?php echo $fullname; ?></p>
                </td>
                <td>
                    <?php echo $row['number_car']; ?>
                </td>
                <td>
                    <?php echo $row['brand_car']; ?>
                </td>
                <td>
                <?php 
                    if($row["type_car"] == "sedan"){
                        echo "รถเก๋ง";
                    }elseif($row["type_car"] == "van"){
                        echo "รถตู้";
                    }else{
                        echo "ไม่สามารถระบุได้";
                    }
                     ?>
                </td>
                <td>
                    <?php echo $row['purpose']; ?>
                </td>
                <td>
                    <?php echo $row['number_traveler']; ?>
                </td>
                <td style="column-width:auto;white-space: normal;">
                <p style="width:150px"><?php echo $row['travelers']; ?></p>
                </td>
                <td style="column-width:auto;white-space: normal;">
                    <p style="width:100px"><?php echo $row['driver']; ?></p>
                </td>
                <td>
                    <?php
                      date_default_timezone_set('Asia/Bangkok');
        
                    $newStart = strtotime($row['booking_start_date']);
                    echo date('d/m/Y', $newStart);
                    echo "</br>";
                    echo date('H:i', $newStart);
                    ?>
                </td>
                <td>
                    <?php
                    $newEnd = strtotime($row['booking_end_date']);
                    echo date('d/m/Y', $newEnd);
                    echo "</br>";
                    echo date('H:i', $newEnd);
                    ?>
                </td>
               
                <form action="updateData.php" method="POST">
                <td style="column-width:1000px;white-space: normal;">
                    
                    <input type="hidden" name="id" value="<?php echo $row[
                        'id'
                    ]; ?>">
                    <select class="form-select selec_action" aria-label="Default select example" name="add_row" style="width:100px">
                        <option value="accept">อนุมัติ</option>
                        <option value="reject">ไม่อนุมัติ</option>
                        <option value="cancel">ยกเลิก</option>
                    </select>
                   
                </td>
            
                <td>
                <?php
                if ($row['action'] == 'accept') { ?>
                            <div class="btn btn-success disabled">อนุมัติ</div>
                        <?php }
                if ($row['action'] == 'reject') { ?>
                            <div class="btn btn-danger disabled">ไม่อนุมัติ</div>
                        <?php }
                if ($row['action'] == 'pending') { ?>
                        <div class="btn btn-warning disabled">รอการอนุมัติ</div>
                        <?php }
                if ($row['action'] == 'cancel') { ?>
                    <div class="btn btn-secondary disabled">ยกเลิก</div>
                    <?php }
                ?>
                </td>
                <td>
                        <input type="text" class="btn outline-danger" id="detail_more" name="detail_more" placeholder="*กรุณาระบุถ้ามีการยกเลิก*" >
                </td>
                <td>
                        <input type="submit" name="saveAction" class="btn btn-primary save_action" onclick="myFunction()" value="บันทึก"/>
                </td>
                </form>
                </tr>
                 <?php }
        ?> 
       
    </tbody>
        </table>
        </div>
    </div>
</div>

</body>
       <?php include 'dataTable.php'; ?>
</html>