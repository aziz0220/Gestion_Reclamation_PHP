<?php
$title='Client Dashboard';
$ref1='Home';
$ref2='';
$ref3='Dashboard';
ob_start();
?>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header border-transparent">
                    <h3 class="card-title">Les réponses</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-striped m-0">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Type</th>
                                <th>Rating</th>
                                <th>Status</th>
                                <th>Response</th>
                                <th>Created At</th>
                                <th>Treated At</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            while ($complaint = $res->fetch_assoc()) {
                                ?>
                                <tr>
                                    <td><?php echo $complaint['rec_title']; ?></td>
                                    <td><?php echo $complaint['rec_type']; ?></td>
                                    <td><?php echo $complaint['rec_rating']; ?></td>
                                    <td><?php echo $complaint['rec_status']; ?></td>
                                    <td><?php echo $complaint['Treat_message']; ?></td>
                                    <td><?php echo $complaint['created_at']; ?></td>
                                    <td><?php echo $complaint['treated_at']; ?></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer clearfix">
                    <a href="Client.php?page=all_complaints" class="btn btn-sm btn-info float-left">View All</a>

                </div>
            </div>
        </div>
    </div>







<?php $dashboard_view = ob_get_clean(); ?>
<?php include 'views/Client/include/dashboard.php'; ?>