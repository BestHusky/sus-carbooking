<?php
    session_start();
    if(isset($_SESSION['UserID'])){
        header('location: manage_page.php');
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="login.css">
	<link rel="shortcut icon" href="icon.svg" type="image/x-icon">
    <title>SUS-ระบบยืมรถยนต์</title>
</head>
<body>

<div class="container h-100vh mt-5 pt-5 mb-5" id="login-form">
<h4 class="text-center text-light">
<i class="fa-solid fa-car-side"></i> CAR BOOKING
</h4>
  <div class="row justify-content-center align-item-center">
	 <div class="col-md-6 col-lg-4 col-xl-4">
		<div class="card">
		   <div class="card-body">
			  <div class="text-center m-auto">
				 <h4 class="text-uppercase text-center">Login</h4>
			  </div>
			  <form action="./model/chk_login.php" method="post">
				 <input type="hidden" name="csrftoken" value="ea49375f43c7e6a59c77df1e4de562b3f1350124eeb70e5d5124e4ce3b5251c2b4d12e9aaf2a3ddc618c178c8dc4620b">
				 <div class="form-group mb-3">
					<label for="text">Username </label>
					<input type="text" name="username" placeholder="username" class="form-control">
				 </div>
				 <div class="form-group mb-3">
					<label for="password">Password</label>
					<div class="input-group bg-light" id="show_hide_password">
					   <input type="password" name="password" class="form-control" id="password" name="password"  placeholder="Enter Password" required="">
					   
					</div>
				 </div>
				 <div class="form-group mb-3">
					<div class="custom-control custom-checkbox checkbox-success">
					   <input type="checkbox" class="custom-control-input" id="checkbox-signin" checked>
					   <label class="custom-control-label" for="checkbox-signin">Remember me</label>
					</div>
				 </div>
				 <div class="form-group mb-0 text-center">
					<button class="btn btn-primary btn-block" type="submit" name="submit"> Log In </button>
					<button class="btn btn-primary btn-block" type="button" id="register-form">register</button>
				
				 </div>
				 <script>
					$(document).ready(function() {
						$("#show_hide_password a").on('click', function(event) {
							event.preventDefault();
							if($('#show_hide_password input').attr("type") == "text"){
								$('#show_hide_password input').attr('type', 'password');
								$('#show_hide_password i').addClass( "fa-eye-slash" );
								$('#show_hide_password i').removeClass( "fa-eye" );
							}else if($('#show_hide_password input').attr("type") == "password"){
								$('#show_hide_password input').attr('type', 'text');
								$('#show_hide_password i').removeClass( "fa-eye-slash" );
								$('#show_hide_password i').addClass( "fa-eye" );
							}
						});
					});
				 </script>
			  </form>
		   </div>
		</div>
	 </div>
  </div>
</div>


<div class="container mt-5 pt-5 mb-5" style="display: none;" id="register">
  <div class="row justify-content-center">
	 <div class="col-md-6 col-lg-4 col-xl-4">
		<div class="card">
		   <div class="card-body">
			  <div class="text-center m-auto">
				 <h4 class="text-uppercase text-center">Register</h4>
			  </div>
			  <form action="./model/chk_register.php" method="post" >
				 <input type="hidden" name="csrftoken" value="ea49375f43c7e6a59c77df1e4de562b3f1350124eeb70e5d5124e4ce3b5251c2b4d12e9aaf2a3ddc618c178c8dc4620b">
				 <div class="form-group mb-3">
					<label for="username">Username </label>
					<input type="text" name="username" placeholder="username" class="form-control" required="">
				 </div>
				 <div class="form-group mb-3">
					<label for="password">Password </label>
					<input type="password" name="password" placeholder="password" class="form-control" required="">
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
					<input type="text" name="department" placeholder="Ex.หัวหน้าแผนกIT" class="form-control" required="">
				 </div>
				 <div class="form-group mb-3">
					<label for="phone">เบอร์โทร</label>
					<input type="text" name="phone" placeholder="099-999-9999" class="form-control" required="">
				 </div>
				 <!-- <div class="form-group mb-3">
					<label for="username">upload</label>
					<input type="file" name="upload_img" placeholder="upload_img" class="form-control" required="">
				 </div> -->
				 <input type="hidden" name="status_user" class="form-control" value="USER">
				 <div class="form-group mb-0 text-center">
					<button class="btn btn-primary btn-block" type="submit" name="submit">Register</button>
					<button class="btn btn-primary btn-block" type="button" id="login">Login</button>
				</div>
				 
			  </form>
		   </div>
		</div>
	 </div>
  </div>
</div>
		


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
	$(document).ready(function(){
		$('#register-form').click(function(){
			$('#register').show();
			$('#login-form').hide();
		})
		$('#login').click(function(){
			
			$('#login-form').show();
			$('#register').hide();
		})
	})
</script>
</html>