<?php
$title='STB Staffs';
$ref1='Dashboard';
$ref2='STB Staffs';
$ref3='Manage Staffs';
ob_start();
?>
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Select on any action options to manage your staffs</h3>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-hover table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Staff Number</th>
                                <th>Contact</th>
                                <th>Email</th>
                                <th>Agence</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                            $cnt = 1;
                            while ($row = $res->fetch_object()) {

                                ?>

                                <tr>
                                    <td><?php echo $cnt; ?></td>
                                    <td><?php echo $row->name; ?></td>
                                    <td><?php echo $row->staff_number; ?></td>
                                    <td><?php echo $row->phone; ?></td>
                                    <td><?php echo $row->email; ?></td>
                                    <td><?php echo $row->agence; ?></td>
                                    <td>
                                        <a class="btn btn-success btn-sm" href="Admin.php?staff_number=<?php echo $row->staff_number; ?>">
                                            <i class="fas fa-cogs"></i>
                                            Manage
                                        </a>

                                        <a class="btn btn-danger btn-sm" href="Admin.php?fireStaff=<?php echo $row->staff_id; ?>">
                                            <i class="fas fa-trash"></i>
                                            Delete
                                        </a>


                                    </td>

                                </tr>
                                <?php $cnt = $cnt + 1;
                            } ?>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        $(function() {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
            });
        });
    </script>
<?php $dashboard_view = ob_get_clean(); ?>
<?php include 'views/Admin/include/dashboard.php'; ?>