<?php

$data = array();
include('conn.php');
mysqli_set_charset($conn, 'utf8');
if (!$conn) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

$query = "SELECT * FROM tb_event";

if ($result = $conn->query($query)) {

    /* fetch object array */
    while ($obj = $result->fetch_object()) {
       $data[] = array(
                    'id' => $obj->id,
                    'title'=> $obj->title,
                    'start'=> $obj->start,
                    'end'=> $obj->end
                    );
    }

    /* free result set */
    $result->close();
}

mysqli_close($conn);

/*
$array = array(
            array('title'=> 'Long Event',
                    'start'=> '2015-02-07',
                    'end'=> '2015-02-10'),
            array('id'=> 999,
                    'title'=> 'Repeating Event',
                    'start'=> '2015-02-16T16:00:00')
         );
         */

?>

<script>

    $(document).ready(function() {
       
        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,basicWeek,basicDay'
            },
            defaultDate: '<?php echo date('Y-m-d');?>',
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            events : <?php echo json_encode($data);?>
        });
       
    });

</script>
<h3>ทดสอบ Fullcalendar</h2>


<div id='calendar'></div>