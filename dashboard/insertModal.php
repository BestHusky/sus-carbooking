<?php

if(!isset($_SESSION['UserID'])){
    header('location: ../index.php');
}
?>
<div class="modal fade" id="addModal"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body ">
        <form action="insertData.php" method="post" id="insert-form">
            <label for="" class="text-dark">username</label>
            <input type="text" name="username" id="username" class="form-control">
            <label for="" class="text-dark">password</label>
            <input type="text" name="password"  id="password" class="form-control">
            <label for="" class="text-dark">fname</label>
            <input type="text"name="fname"  id="fname" class="form-control">
            <label for="" class="text-dark">lname</label>
            <input type="text" name="lname"  id="lname" class="form-control">
            <label for="" class="text-dark">status</label>
            <select name="status_user" id="status_user" class="form-select bg-info">
            <option value="ADMIN">ADMIN</option>
            <option value="USER">USER</option>
            </select>
            <br>
            <input type="submit" id="insert" value="save" class="btn btn-primary">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">cancel</button>
        </form>
      </div>
   
    </div>
  </div>
</div>

