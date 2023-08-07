<?php
include 'views/Admin/include/profile_pic.php';
$title=$row->Nom.' '.$row->Prenom.' Profile';
$ref1='Dashboard';
$ref2='STB Clients';
$ref3=$row->Nom.' '.$row->Prenom;

ob_start();
?>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="card card-purple card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <?php echo $profile_picture; ?>
                        </div>

                        <h3 class="profile-username text-center"><?php echo $row->Nom; ?> <?php echo $row->Prenom; ?> </h3>

                        <p class="text-muted text-center">Client @STB </p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>ID No.: </b> <a class="float-right"><?php echo $row->national_id; ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Email: </b> <a class="float-right"><?php echo $row->email; ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Phone: </b> <a class="float-right"><?php echo $row->phone; ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>ClientNo: </b> <a class="float-right"><?php echo $row->client_number; ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Address: </b> <a class="float-right"><?php echo $row->address; ?></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <button type="button" name="change_client_password" class="btn btn-outline-success">Get Login</button>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">


                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">

                                        </div>
                                    </div>
                            <div id="clientPasswordAccount" ">
                                <li class="list-group-item">
                                    <b>Email: </b> <a class="float-right"><?php echo $row->email; ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Password: </b> <a class="float-right"><?php echo $row->password; ?></a>
                                </li>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Get references to the button and the client password account div
        const showPasswordBtn = document.getElementById("showPasswordBtn");
        const clientPasswordAccount = document.getElementById("clientPasswordAccount");

        // Add a click event listener to the button
        showPasswordBtn.addEventListener("click", function() {
            // Hide the button
            showPasswordBtn.style.display = "none";
            // Show the client password account
            clientPasswordAccount.style.display = "block";
        });
    });
</script>
<?php $dashboard_view = ob_get_clean(); ?>

<?php include 'views/Admin/include/dashboard.php'; ?>