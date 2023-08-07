<?php
$title='complaints';
$ref1='Dashboard';
$ref2='Manage';
$ref3='rzg ';
ob_start();
?>


    <section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">My Complaints</h3>
                </div>
                <div class="card-body">
                    <table id="complaintsTable" class="table table-bordered table-hover table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Subject</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        $cnt = 1;
                        while ($row = $res->fetch_object()) {
                            ?>

                            <tr>
                                <td><?php echo $cnt; ?></td>
                                <td><?php echo $row->rec_title; ?></td>
                                <td><?php echo date("d-M-Y", strtotime($row->created_at)); ?></td>
                                <td><?php echo $row->rec_status; ?></td>
                            </tr>
                            <?php $cnt = $cnt + 1;
                        } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $dashboard_view = ob_get_clean(); ?>

<?php include 'views/Client/include/dashboard.php'; ?>