<?php
$title='Historique des réclamations';
$ref1='Dashboard';
$ref2='Historique des réclamations';
$ref3='Réclamations';
ob_start();
?>
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Select any action options to manage Complaints</h3>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-hover table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Type</th>
                                <th>Rating</th>
                                <th>Status</th>
                                <th>Description</th>
                                <th>Client Name</th>
                                <th>Created At</th>
                                <th>Treated At</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php include "views/Admin/include/all_complaints.php"; ?>
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