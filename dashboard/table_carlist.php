<?php include 'head_dashboard.php'; ?>

<div class="table-responsive">
<div class="d-flex m-2">
<button type="button" class="btn btn-primary ms-auto bd-highlight" data-bs-toggle="modal" data-bs-target="#addCarModal">
<i class="fa-solid fa-plus"></i>
</button>
</div>
<?php include 'modal_car.php';?>
<table id="myTable2" class="table" style="width:100%"> 
    <thead class="text-center fs-5 bg-dark text-light fw-normal">
        <th>
            
        </th>
        <th>
            เลขทะเบียน
        </th>
        <th>
            ยี่ห้อ
        </th>
        <th>
            ประเภท
        </th>
        <th>
            จำนวนที่นั่ง
        </th>
        <th>
            สถานะ
        </th>
        <th>
            
        </th>
        <th>
            
        </th>
    </thead>

    <tbody class="text-center">
        <?php
        $sql = "SELECT * FROM tb_cars WHERE id_car";
        $query = mysqli_query($conn, $sql);
        $fetch = mysqli_num_rows($query);

        if ($fetch > 0) {
            while ($row =  mysqli_fetch_assoc($query)) { ?>

                <tr>
                <td style="width: 150px;">
                       <img src="../image/<?php echo $row['car_img'] ?>" alt="" width="150">
                    </td>
                <td>
                    <?php echo $row["number_car"]; ?>
                </td>
                <td>
                    <?php echo $row["brand_car"]; ?>
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
                    <?php echo $row["seats_car"]; ?>
                </td>
                <td>
                    <?php 
                    if($row["status_car"] == "free"){
                        echo "สามารถใช้งานได้";
                    }elseif($row["status_car"] == "repair"){
                        echo "กำลังส่งซ่อม";
                    }else{
                        echo "ไม่สามารถใช้งานได้";
                    }
                     ?>
                </td>
                    <td class="text-center">
                    <input type="button" name="edit" value="edit" class="btn btn-success edit_data" id="<?php echo $row["id_car"]?>" />
                </td>
                <td>
                <input type="button" name="delete" value="delete" class="btn btn-danger delete_car" id="<?php echo $row['id_car']?>">
                </td>
            </tr>
        <?php
            }
        }
        ?>
    </tbody>
</table>
<?php include 'form_update_car.php'?>
</div>

</body>
<?php include 'dataTable.php'?>

<script>
$('.delete_car').click(function(){
            var uid = $(this).attr("id");
            var status = Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
    Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
    $.ajax({
                url: "deleteData.php",
                method: "post",
                data: {id:uid},
                
                success: function(data){
                    setTimeout(function() {
                    location.reload(true);
                  }, 1500);
                }

            })
  }
})
})

            $('.edit_data').click(function() {
            var uid = $(this).attr('id');
            $.ajax({
                url: "select_car.php",
                method: "post",
                data: {
                    id: uid
                },
                success: function(data) {
                    $('#select_car').html(data);
                    $('#updateModal').modal('show');
                }
            })


    })
</script>

</html>