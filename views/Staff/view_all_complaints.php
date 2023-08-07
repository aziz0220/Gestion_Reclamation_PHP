<?php
include 'views/Admin/include/profile_pic.php';
$title='Create Staff Account';
$ref1='Dashboard';
$ref2='STB Staffs';
$ref3='Add';
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
                            <th>Number</th>
                            <th>Type</th>
                            <th>Rating</th>
                            <th>Status</th>
                            <th>Description</th>
                            <th>Client ID</th>
                            <th>Client Name</th>
                            <th>Client National ID</th>
                            <th>Client Phone</th>
                            <th>Client Number</th>
                            <th>Client Email</th>
                            <th>Client Address</th>
                            <th>Created At</th>
                            <th>Treated At</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($complaints as $complaint) { ?>
                            <tr>
                                <td><?php echo $complaint['rec_id']; ?></td>
                                <td><?php echo $complaint['rec_title']; ?></td>
                                <td><?php echo $complaint['rec_number']; ?></td>
                                <td><?php echo $complaint['rec_type']; ?></td>
                                <td><?php echo $complaint['rec_rating']; ?></td>
                                <td><?php echo $complaint['rec_status']; ?></td>
                                <td><?php echo $complaint['Description']; ?></td>
                                <td><?php echo $complaint['client_id']; ?></td>
                                <td><?php echo $complaint['client_name']; ?></td>
                                <td><?php echo $complaint['client_national_id']; ?></td>
                                <td><?php echo $complaint['client_phone']; ?></td>
                                <td><?php echo $complaint['client_number']; ?></td>
                                <td><?php echo $complaint['client_email']; ?></td>
                                <td><?php echo $complaint['client_adr']; ?></td>
                                <td><?php echo $complaint['created_at']; ?></td>
                                <td><?php echo $complaint['treated_at']; ?></td>
                            </tr>
                        <?php } ?>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $dashboard_view = ob_get_clean(); ?>
<?php include 'views/Staff/include/dashboard.php';?>