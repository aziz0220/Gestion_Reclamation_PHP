<?php
$title='STB Clients';
$ref1='Dashboard';
$ref2='STB Clients';
$ref3='View Clients';

ob_start();
?>
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">clients list</h3>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-hover table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Client Number</th>
                                <th>ID No.</th>
                                <th>Contact</th>
                                <th>Address</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $cnt = 1;
                            while ($row = $res->fetch_object()) {

                                ?>

                                <tr>
                                    <td><?php echo $cnt; ?></td>
                                    <td><?php echo $row->Nom; ?></td>
                                    <td><?php echo $row->Prenom; ?></td>
                                    <td><?php echo $row->client_number; ?></td>
                                    <td><?php echo $row->national_id; ?></td>
                                    <td><?php echo $row->phone; ?></td>
                                    <td><?php echo $row->email; ?></td>
                                    <td><?php echo $row->address; ?></td>
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

<?php include 'views/Staff/include/dashboard.php'; ?>