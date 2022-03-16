<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
    session_start();

if(!isset($_SESSION['UserID'])){
    header('location: ../index.php');
}
    include 'conn.php';
    $id = $_SESSION["UserID"];
    
    $theme = $_POST["theme"];

    if($_SESSION["Userlevel"] == "ADMIN"){
        $line_token = $_POST["line_token"];
    }


    $sql ="SELECT * FROM tb_setting WHERE id_user='$id'";
    $query = mysqli_query($conn,$sql);
    $fetch = mysqli_num_rows($query);
    $row = mysqli_fetch_assoc($query);

    if($fetch > 0){
            if($id == $row["id_user"]){
                if($_SESSION['Userlevel'] != "ADMIN"){
                $update = "UPDATE tb_setting SET color_theme='$theme' WHERE id_user='$id'";
                $q_update = mysqli_query($conn,$update);
                
    
                echo "<script>
                    $(document).ready(function(){
                        Swal.fire(
                            'บันทึกการตั้งค่า',
                            '',
                            'success'
                          )
                          .then((result) => {
                            if (result.isConfirmed) {
                                window.location.replace('../setting.php');
                            }
                        })
                    })
    
                </script>";
            
            }else{
            if($id == $row["id_user"]){
                
                $update1 = "UPDATE tb_setting SET line_token='$line_token',color_theme='$theme' WHERE id_user";
                $q_update1 = mysqli_query($conn,$update1);
            
    
                echo "<script>
                    $(document).ready(function(){
                        Swal.fire(
                            'บันทึกการตั้งค่า',
                            '',
                            'success'
                          )
                          .then((result) => {
                            if (result.isConfirmed) {
                                window.location.replace('../setting.php');
                            }
                    })
    
                </script>";
            
        }
    }
} 
    }else{
        $sql2 ="INSERT INTO tb_setting(id_user,line_token,color_theme) VALUES('$id','$line_token','$theme')";
        $query2 = mysqli_query($conn,$sql2);
        echo "ื";
    }

    
?>