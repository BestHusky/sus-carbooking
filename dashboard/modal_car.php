
<div class="modal fade" id="addCarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูลรถยนต์</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
        <form action="insertData.php" method="post" id="add_car" enctype="multipart/form-data">
        <div class="form-group mb-3">
					<label for="number_car">เลขทะเบียน </label>
					<input type="text" name="number_car" placeholder="เลขทะเบียน" class="form-control" required="">
				 </div>
				 <div class="form-group mb-3">
					<label for="brand_car">ยี่ห้อ </label>
					<select name="brand_car" id="brand_car" class="form-select">
						<option value="HONDA">HONDA</option>
						<option value="TOYOTA">TOYOTA</option>
					</select>

				 </div>
				 <div class="form-group mb-3">
					<label for="type_car">ประเภท</label>
					<select name="type_car" id="type_car" class="form-select">
						<option value="sedan">รถเก๋ง</option>
						<option value="van">รถตู้</option>
					</select>
				 </div>
				 <div class="form-group mb-3">
					<label for="seats_car">จำนวนที่นั่ง </label>
					<input type="text" name="seats_car" placeholder="จำนวนที่นั่ง" class="form-control" required="">
				 </div>
				 <div class="form-group mb-3">
					<label for="status_car">สถานะ</label>
					<select name="status_car" id="status_car" class="form-select">
						<option value="free">สามารถใช้งานได้</option>
						<option value="unavailable">ไม่สามารถใช้งานได้</option>
						<option value="repair">ส่งซ่อม</option>
					</select>
				
				 </div>
				 <div class="form-group mb-3">
            <input type="file" name="upload_new" id="upload_new"/>
            </div>
		

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" id="insert" name="save_car" value="save_car" class="btn btn-primary">
      </div>
      </form>
    </div>
  </div>
</div>