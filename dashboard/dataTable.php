    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {

            
                    $.extend(true, $.fn.dataTable.defaults, {
                            "language": {
                                "sProcessing": "กำลังดำเนินการ...",
                                "sLengthMenu": "แสดง_MENU_ แถว",
                                "sZeroRecords": "ไม่พบข้อมูล",
                                "sInfo": "แสดง _START_ ถึง _END_ จาก _TOTAL_ แถว",
                                "sInfoEmpty": "แสดง 0 ถึง 0 จาก 0 แถว",
                                "sInfoFiltered": "(กรองข้อมูล _MAX_ ทุกแถว)",
                                "sInfoPostFix": "",
                                "sSearch": "ค้นหา:",
                                "sUrl": "",
                                "oPaginate": {
                                    "sFirst": "เิริ่มต้น",
                                    "sPrevious": "ก่อนหน้า",
                                    "sNext": "ถัดไป",
                                    "sLast": "สุดท้าย"
                                }
                            }
                        });

                        $('#myTable').DataTable({

                        dom: 'Bfrtip',
                        buttons: [ 'copy', 'excel','print', 'pageLength' ],
                        responsive: true
                    });

                    $('#myTable2').DataTable();
                    $('#myTable3').DataTable();


        });
    </script>