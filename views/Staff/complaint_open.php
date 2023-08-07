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

                        <divclass="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="treatedAt">Treated At</label>
                                <input type="text" class="form-control" id="treatedAt" value="<?php echo $complaint['treated_at']; ?>" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <form action="" method="post">
                                <button type="submit" name="treatComplaint" class="btn btn-success">Treat Complaint</button>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <form action="" method="post">
                                <button type="submit" name="refuseComplaint" class="btn btn-danger">Refuse Complaint</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>


<?php $dashboard_view = ob_get_clean(); ?>
<?php include 'views/Staff/include/dashboard.php'; ?>