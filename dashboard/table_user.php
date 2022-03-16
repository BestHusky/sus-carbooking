
<?php include 'head_dashboard.php';
if(isset($_GET["submit"])){
    $id_user = $_GET['id_user'];

}
?>


<div class="table-responsive">
<div class="d-flex m-2">
<button type="button" class="btn btn-primary ms-auto bd-highlight" data-bs-toggle="modal" data-bs-target="#addUserModal">
<i class="fa-solid fa-plus"></i>
</button>
</div>

<?php include 'modal_user.php';?>
<table id="myTable3" class="table" style="width:100%">
    <thead class="fs-5 bg-dark text-light fw-normal">
        <th>username</th>
        <th>ชื่อ</th>
        <th>นามสกุล</th> 
        <th>เบอร์โทร</th>
        <th>แผนก</th>
        <th></th>
        <th></th>

    </thead>

    <tbody>
        <?php
        $sql = "SELECT * FROM tb_users   WHERE id_user";
        $query = mysqli_query($conn, $sql);
        $fetch = mysqli_num_rows($query);
            
        if ($fetch > 0) {
            while ($row = mysqli_fetch_assoc($query)){ ?>
            <tr>
            <td><?php echo $row["username"];?></td>
            <td><?php echo $row["fname"];?></td>
            <td><?php echo $row["lname"];?></td>
            <td><?php echo $row["phone"];?></td>
            <td><?php echo $row["department"];?></td>
            <td>
     
            <input type="button" name="edit"  value="edit" class="btn btn-success edit_user" id="<?php echo $row['id_user']?>">
            </td>
            <td>
            <input type="button" name="delete" value="delete" class="btn btn-danger delete_data" id="<?php echo $row['id_user']?>">

            </td>
            </tr>
            <?php
            }
        }
        
        ?>
    </tbody>
</table>
</div>
<?php include 'form_update_user.php'?>
</body>
<?php include 'dataTable.php'?>

<script>
$(document).ready(function(){
    $('.edit_user').click(function(){
            var uid = $(this).attr("id");
            $.ajax({
                url: "select_user.php",
                method: "post",
                data: {
                    id: uid
                },
                success: function(response) {
                    $('#select_user').html(response);
                    $('#updateUser').modal('show');
                }
            })
        });
$('.delete_data').click(function(){
    var uid = $(this).attr("id");
    Swal.fire({
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
                    setTimeout(function () {
                        location.reload(true);
                    }, 1500);
                }
            });
        }
    })    
})
});
</script>

</html>