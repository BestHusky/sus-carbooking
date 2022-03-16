<?php

if(!isset($_SESSION['UserID'])){
    header('location: ../index.php');
}
?>
<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูลผู้ใช้</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
        <form action="insertData.php"  method="post" id="add_user">
        <div class="form-group mb-3">
					<label for="username">Username </label>
					<input type="text" name="username" placeholder="username" class="form-control" required="">
				 </div>
				 <div class="form-group mb-3">
					<label for="password">password </label>
					<input type="text" name="password" placeholder="password" class="form-control" required="">
				 </div>
				 <div class="form-group mb-3">
					<label for="fname">ชื่อ</label>
					<input type="text" name="fname" placeholder="ชื่อ" class="form-control" required="">
				 </div>
				 <div class="form-group mb-3">
					<label for="lname">นามสกุล </label>
					<input type="text" name="lname" placeholder="นามสกุล" class="form-control" required="">
				 </div>
				 <div class="form-group mb-3">
					<label for="Department">แผนก</label>
					<input type="text" name="department" placeholder="แผนก" class="form-control" required="">
				 </div>
				 <div class="form-group mb-3">
					<label for="Tel">เบอร์โทร</label>
					<input type="text" name="phone" placeholder="099-999-9999" class="form-control" required="">
				 </div>

				 <select name="status_user" id="status_user" class="form-select">
				 <option value="USER">USER</option>
			<option value="ADMIN">ADMIN</option>
		
				 </select>
        

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" name="save_user" value="save_user">
      </div>
      </form>
    </div>
  </div>
</div>