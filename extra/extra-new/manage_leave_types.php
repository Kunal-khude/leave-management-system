<?php
// echo "Welcome to Admin";
include '../templates/header.php';
?>


<?php
?>
<!-- <p class="display-4 text-center fw-bold">Welcome to Admin</p> -->
<div class="container-fluid">
    <div class="row">
        <div class="col-2 p-0">
            <?php
            include '../templates/sidebar.php';
            ?>
        </div>
        <div class="col-10 p-0 relative">
            <?php
            include '../templates/header-admin.php';

            ?>
            <p class="display-4 text-center fw-bold">Leave Type</p>

            <html>

            <head>
                <title>Table Demo</title>
                <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
                <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
                <script src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>
                <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
                <link href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap4.min.css" rel="stylesheet">
                <script>
                    $(document).ready(function() {

                        $("#datatable").dataTable();

                    });
                </script>
            </head>

            <body>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Leave Type</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = 'SELECT * FROM leavetype';
                        $result = $conn->query($sql);

                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
        <td scope='row'>" . $row['id'] . "</td>
        <td>" . $row['leave_type'] . "</td>
        <td>" . $row['description'] . "</td>
    </tr>";
                        }
                        ?>


                    </tbody>
                </table>
            </body>

            </html>
            <?php


            // include '../templates/table.php';
            include '../templates/footer.php';

            ?>
        </div>
    </div>

</div>