<?php
session_start();
include('./model/conn.php');
?>
<?php include 'headLogin.php' ?>

<div class="table-responsive p-5">
    <table id="myTable" class="table">
        <thead class="text-center">
            <th scope="col">
          
            </th>
            <th scope="col">
                เลขทะเบียน
            </th>
            <th scope="col">
                ยี่ห้อ
            </th>
            <th scope="col">
                ประเภท
            </th>
            <th scope="col">
                จำนวนที่นั่ง
            </th>
            <th scope="col">
                สถานะ
            </th>
            <th scope="col">

            </th>
        </thead>


        <tbody class="text-center bg-secondary">
            <?php

            $sql = "SELECT * FROM tb_cars";
            $query = mysqli_query($conn, $sql);
            $fetch = mysqli_num_rows($query);

            $sql2 = "SELECT * FROM tb_booking";
            $query2 = mysqli_query($conn, $sql2);
            $fetch2 = mysqli_num_rows($query2);
            $row2 = mysqli_fetch_assoc($query2);

            while ($row = mysqli_fetch_assoc($query)) { ?>

                <tr>
                     <td style="width: 150px;">
                       <img src="./image/<?php echo $row['car_img'] ?>" alt="" width="150">
                    </td>
                    <td>
                        <?php echo $row['number_car'] ?>
                    </td>
                    <td>
                        <?php echo $row['brand_car'] ?>
                    </td>
                    <td>
                        <?php echo $row['type_car'] ?>
                    </td>
                    <td>
                        <?php echo $row['seats_car'] ?>
                    </td>
                    <td>
                        <?php

                        if ($row['status_car'] == "free") {
                            echo "สามารถใช้งานได้";
                        }
                        if ($row['status_car'] == "unavailable") {
                            echo "ไม่สามารถใช้ได้ในขณะนี้";
                        }

                        if ($row['status_car'] == "repair") {
                            echo "กำลังส่งซ่อม";
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                            if($row['status_car'] == "repair" || $row['status_car'] == "unavailable"){?>
                               <input type="button" value="ไม่สามารถทำรายการได้" class="btn btn-warning btn-xs view_data" id="<?php echo $row['id_car'] ?>" disabled>    
                            <?php
                            }else{?>
                                <input type="button" value="ทำรายการจอง" class="btn btn-success btn-xs view_data" id="<?php echo $row['id_car'] ?>">    
                            <?php
                            }
                        ?>
                    </td>
                </tr>
            <?php
            } ?>
        </tbody>
    </table>

    <?php require 'viewBooking.php' ?>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
        $('#myTable').DataTable({
            responsive: true,
        });
        

        $('.view_data').click(function() {
            var uid = $(this).attr('id');
            $.ajax({
                url: "select.php",
                method: "post",
                data: {
                    id: uid
                },
                success: function(data) {
                    $('#detail').html(data);
                    $('#dataModal').modal('show');
                }
            })

        })

        
    });
</script>

</html>