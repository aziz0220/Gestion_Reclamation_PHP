<?php
$title='Complaints Management';
$ref1='Dashboard';
$ref2='Complaints';
$ref3='Complaint Details';
ob_start();
?>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Complaint Details</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="complaintTitle">Title</label>
                                    <input type="text" class="form-control" id="complaintTitle" value="<?php echo $complaint['rec_title']; ?>" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="complaintDescription">Description</label>
                                    <textarea class="form-control" id="complaintDescription" rows="5" readonly><?php echo $complaint['Description']; ?></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="clientId">Client ID</label>
                                    <input type="text" class="form-control" id="clientId" value="<?php echo $complaint['client_id']; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="clientName">Client Name</label>
                                    <input type="text" class="form-control" id="clientName" value="<?php echo $complaint['client_name']; ?>" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="clientNationalId">Client National ID</label>
                                    <input type="text" class="form-control" id="clientNationalId" value="<?php echo $complaint['client_national_id']; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="clientPhone">Client Phone</label>
                                    <input type="text" class="form-control" id="clientPhone" value="<?php echo $complaint['client_phone']; ?>" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="clientNumber">Client Number</label>
                                    <input type="text" class="form-control" id="clientNumber" value="<?php echo $complaint['client_number']; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="clientEmail">Client Email</label>
                                    <input type="text" class="form-control" id="clientEmail" value="<?php echo $complaint['client_email']; ?>" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="clientAddress">Client Address</label>
                                    <textarea class="form-control" id="clientAddress" rows="3" readonly><?php echo $complaint['client_adr']; ?></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="createdAt">Created At</label>
                                    <input type="text" class="form-control" id="createdAt" value="<?php echo $complaint['created_at']; ?>" readonly>
                                </div>
                            </div>
                        </div>
    <style>
        .redirect-complaint-btn {
            display: none;
        }

        .action-menu {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 20px;
        }

        .action-item {
            flex-basis: 48%;
            text-align: center;
            margin-bottom: 10px;
        }

        .action-item label {
            display: block;
            margin-bottom: 5px;
        }

        .response-input {
            width: 100%;
            margin-bottom: 10px;
        }
    </style>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="action-menu">
                    <div class="col-md-6 action-item">
                        <form method="post" action="Staff.php?Redirect=<?php echo $complaint['rec_id']; ?>">
                            <label><i class="fa-solid fa-rectangle-list"></i> Redirect Complaint</label>
                            <div class="form-group">
                                <select name="reclamation_type" class="form-control" id="reclamationTypeSelect">
                                    <option value="">Select Reclamation Type</option>
                                    <?php echo $typesOptions ?>
                                </select>
                            </div>
                            <button type="submit" name="redirectComplaint" data-id="<?php echo $complaint['rec_id']; ?>" class="btn btn-warning redirect-complaint-btn">
                                <i class="fa-solid fa-diamond-turn-right"></i> Redirect Complaint
                            </button>
                        </form>
                    </div>

                    <div class="col-md-6 action-item">
                        <form action="Staff.php?Boss=<?php echo $complaint['rec_id']; ?>" method="post">
                            <label><i class="fa-solid fa-upload"></i> Send to Admin</label>
                            <button type="submit" name="sendtoboss" data-id="<?php echo $complaint['rec_id']; ?>" class="btn btn-info">
                                <i class="fa-solid fa-share-from-square"></i> Send to admin
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="action-menu">
                    <div class="col-md-6 action-item">
                        <form action="Staff.php?Respond=<?php echo $complaint['rec_id']; ?>" method="post">
                            <label><i class="fa-solid fa-reply"></i> Respond</label>
                            <input type="text" name="response_message" class="form-control response-input" placeholder="Enter your response message...">
                            <button type="submit" name="response" data-id="<?php echo $complaint['rec_id']; ?>" class="btn btn-success">
                                <i class="fa-solid fa-reply"></i> Respond
                            </button>
                        </form>
                    </div>

                    <div class="col-md-6 action-item">
                        <form action="Staff.php?Close=<?php echo $complaint['rec_id']; ?>" method="post">
                            <label><i class="fa-solid fa-xmark"></i> Close Reclamation</label>
                            <button type="submit" name="closebtn" data-id="<?php echo $complaint['rec_id']; ?>" class="btn btn-danger">
                                <i class="fa-solid fa-xmark"></i> Close Reclamation
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.getElementById('reclamationTypeSelect').addEventListener('change', function () {
            var redirectBtn = document.querySelector('.redirect-complaint-btn');
            if (this.value === '') {
                redirectBtn.style.display = 'none';
            } else {
                redirectBtn.style.display = 'block';
            }
        });
    </script>


<?php $dashboard_view = ob_get_clean(); ?>
<?php include 'views/Staff/include/dashboard.php'; ?>