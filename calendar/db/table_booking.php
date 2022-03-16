<?php

        $sql = "SELECT 
            b.*,
            u.*,
            c.*
            FROM ((tb_booking as b
            INNER JOIN tb_users as u ON b.id_user = u.id_user)
            INNER JOIN tb_cars as c ON b.id_car = c.id_car)";
        $query = mysqli_query($conn, $sql);
        $fetch = mysqli_num_rows($query);

?>
       