<?php
$title='Admin Dashboard';
$ref1='Home';
$ref2='';
$ref3='Dashboard';
ob_start();
?>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Clients</span>
                            <span class="info-box-number">
                    <?= $Clients; ?>
                  </span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Staff</span>
                            <span class="info-box-number">
                    <?= $Staff; ?>
                  </span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user-tie"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Réclamations</span>
                            <span class="info-box-number">
                    <?= $complaints; ?>
                  </span>
                        </div>
                    </div>
                </div>

                <div class="clearfix hidden-md-up"></div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-briefcase"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Types de réclamations</span>
                            <span class="info-box-number"><?= $RecTypes; ?></span>
                        </div>
                    </div>
                </div>

            </div>



            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header border-transparent">
                            <h3 class="card-title">Réclamations les plus récentes</h3>
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
                                        <th>Description</th>
                                        <th>Client Name</th>
                                        <th>Created At</th>
                                        <th>Treated At</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php include 'views/Admin/include/todays_complaints.php';?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer clearfix">
                            <a href="Admin.php?page=view_complaints" class="btn btn-sm btn-info float-left">View All</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $dashboard_view = ob_get_clean(); ?>
<?php include 'views/Admin/include/dashboard.php'; ?>