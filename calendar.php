<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ปฏิทินผู้มาใช้บริการ | boychawin.com </title>
    <?php include './libaryCalendar.php'; ?>
    
    <script type="text/javascript">
        jQuery(document).ready(function() {

            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                eventLimit: true, 
                defaultDate: new Date(),
                timezone: 'Asia/Bangkok',
                events: {
                    url: './dataEvents.php',
                },
                loading: function(bool) {
                    $('#loading').toggle(bool);
                },

                eventClick: function(event) {
                    if (event.url) {
                        $.fancybox({
                            'href': event.url,
                            'type': 'iframe',
                            'autoScale': false,
                            'openEffect': 'elastic',
                            'openSpeed': 'fast',
                            'closeEffect': 'elastic',
                            'closeSpeed': 'fast',
                            'closeBtn': true,
                            onClosed: function() {
                                parent.location.reload(true);
                            },
                            helpers: {
                                thumbs: {
                                    width: 50,
                                    height: 50
                                },

                                overlay: {
                                    css: {
                                        'background': 'rgba(49, 176, 213, 0.7)'
                                    }
                                }
                            }
                        });
                        return false;
                    }
                },
            });
        });
    </script>

</head>

<body >

    <div id="wrapper">
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="panel panel-default h-100vh">
                        <div class="panel-heading bg-dark fs-4 p-2" style="color:aliceblue">
                            ตารางวัน-เวลาการใช้รถนอกสถานที่
                        </div>
                        <div class="panel-body">


                            <div class="row">
                                <div class="col-lg-12 col-md-6">
                                    <div id='calendar'></div>
                                    <div align="center">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>