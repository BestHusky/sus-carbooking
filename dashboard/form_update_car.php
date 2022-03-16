<?php

if(!isset($_SESSION['UserID'])){
    header('location: ../index.php');
}
?>
<div class="modal fade" id="updateModal"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ฟอร์มแก้ไขข้อมูลรถ</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="select_car">

      </div>
   
    </div>
  </div>
</div>

