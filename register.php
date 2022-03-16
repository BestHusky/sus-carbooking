<?php include('headLogin.php');?>

    <div>
    <h1>Register</h1>
        <form action="./model/chk_register.php" method="post">
            <div>
                <label for="" class="form-label">username</label>
                <input type="text" name="username" class="form-control">
            </div>
            <div>
                <label for="" class="form-label">password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div>
                <label for="" class="form-label">firstname</label>
                <input type="text" name="fname" class="form-control">
            </div>
            <div>
                <label for="" class="form-label">lastname</label>
                <input type="text" name="lname" class="form-control">
            </div>
            <div>
                <input type="hidden" name="status_user" class="form-control" value="USER">
            </div>
            <!-- <div>
            <input type="submit" class="w-100 btn btn-lg btn-primary" value="register">
            </div> -->
        </form>
    </div>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>