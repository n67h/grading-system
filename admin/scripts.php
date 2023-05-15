<!-- </div> -->
    <!-- </div> -->
    <!-- end of main container -->

    <!-- js section -->
    <!-- bootstrap js popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    <!-- jquery cdn -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <!-- jquery datatable js cdn -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
    <script>
       $(document).ready( function () {
            $('#datatable').DataTable({
                "responsive": false, 
                "lengthChange": true, 
                "autoWidth": false,
                "searching": true,
                "paging": true,
                "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
                "iDisplayLength": 10,
                "ordering": true,
            });
        } );

        // start of edit student
        $(document).ready(function () {
            // $('body').on('click', '.edit', function(event) {
            $('body').on('click', '.edit', function(event) {

                $('#edit_student_modal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#edit_student_id').val(data[0]);
                $('#edit_year_level_id').val(data[1]).change();
                $('#edit_first_name').val(data[4]);
                $('#edit_last_name').val(data[5]);
                $('#edit_middle_name').val(data[6]);
                $('#edit_gender').val(data[7]);
                $('#edit_birthdate').val(data[8]);
                $('#edit_email').val(data[9]);

            });
        });
        // end of edit student

        // start of edit grades
        $(document).ready(function () {
            // $('body').on('click', '.edit', function(event) {
            $('body').on('click', '.edit', function(event) {

                $('#edit_grades_modal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#edit_grades_id').val(data[0]);
                $('#edit_student_id1').val(data[1]);
                $('#edit_first_quarter').val(data[4]);
                $('#edit_second_quarter').val(data[5]);
                $('#edit_third_quarter').val(data[6]);
                $('#edit_fourth_quarter').val(data[7]);
            });
        });
        // end of edit grades
    </script>
</body>
</html>