<?php
$title='Create Staff Account';
$ref1='Dashboard';
$ref2='STB Staffs';
$ref3='Add';
ob_start();
?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-4">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text"> Clients</span>
                        <span class="info-box-number">
                    <?php echo $Clients; ?>
                  </span>
                    </div>
                </div>
            </div>



            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user-tie"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Réclamations</span>
                        <span class="info-box-number">
                    <?php echo $complaints; ?>
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
                        <span class="info-box-number"><?php echo $RecTypes; ?></span>
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
                                    <th>Reclamation ID</th>
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
                                <?php
                                while ($complaint = $res->fetch_assoc()) {
                                    ?>
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
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer clearfix">
                        <a href="Staff.php?page=all_complaints" class="btn btn-sm btn-info float-left">View All</a>

                    </div>
                </div>
            </div>
        </div>

        <!-- Reclamations by Rating Chart -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Reclamations by Rating</h3>
                </div>
                <div class="card-body">
                    <canvas id="reclamationsChart" height="200"></canvas>
                </div>
            </div>
        </div>

        <!-- Reclamations by Status Chart -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Reclamations by Status</h3>
                </div>
                <div class="card-body">
                    <canvas id="statusChart" height="200"></canvas>
                </div>
            </div>
        </div>


</section>
    <script>
        <?php

        $ratings = [];
        $counts = [];

        // Loop through the results and populate the arrays
        while ($row = $res2->fetch_assoc()) {
            $ratings[] = $row['rec_rating'];
            $counts[] = $row['count'];
        }
        ?>

        var ctx1 = document.getElementById('reclamationsChart').getContext('2d');
        var myChart1 = new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($ratings); ?>,
                datasets: [{
                    label: 'Reclamations by Rating',
                    data: <?php echo json_encode($counts); ?>,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 206, 86, 0.5)',
                        // Add more colors for additional ratings if needed
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        // Add more colors for additional ratings if needed
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        stepSize: 1 // Adjust the step size as needed
                    }
                },
                responsive: true,
                maintainAspectRatio: false // Make the chart fit its container
            }
        });


    </script>
    <script>
        <?php
        // Fetch the number of reclamations by each status


        // Initialize arrays to hold status labels and corresponding counts
        $statuses = [];
        $statusCounts = [];

        // Loop through the results and populate the arrays
        while ($row = $res3->fetch_assoc()) {
            $statuses[] = $row['rec_status'];
            $statusCounts[] = $row['count'];
        }
        ?>

        // Reclamations by Status Chart
        var ctx2 = document.getElementById('statusChart').getContext('2d');
        var myPieChart = new Chart(ctx2, {
            type: 'pie',
            data: {
                labels: <?php echo json_encode($statuses); ?>,
                datasets: [{
                    data: <?php echo json_encode($statusCounts); ?>,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 206, 86, 0.5)',
                        // Add more colors for additional statuses if needed
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        // Add more colors for additional statuses if needed
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                legend: {
                    position: 'bottom',
                }
            }
        });
    </script>

<?php $dashboard_view = ob_get_clean(); ?>
<?php include 'views/Staff/include/dashboard.php'; ?>