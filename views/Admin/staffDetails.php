<?php
include 'views/Admin/include/profile_pic.php';
$title=$row->name.' Profile';
$ref1='Dashboard';
$ref2='STB Clients';
$ref3=$row->name;

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

                            <h3 class="profile-username text-center"><?php echo $row->name; ?></h3>

                            <p class="text-muted text-center">Staff @STB </p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Email: </b> <a class="float-right"><?php echo $row->email; ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Phone: </b> <a class="float-right"><?php echo $row->phone; ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>StaffNo: </b> <a class="float-right"><?php echo $row->staff_number; ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Agence: </b> <a class="float-right"><?php echo $row->agence; ?></a>
                                </li>

                            </ul>

                        </div>

                    </div>

                </div>

                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#update_Profile" data-toggle="tab">Update Profile</a></li>
                                <li class="nav-item"><a class="nav-link" href="#Change_Password" data-toggle="tab">Change Password</a></li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">

                                <div class="tab-pane active" id="update_Profile">
                                    <form method="post" enctype="multipart/form-data" class="form-horizontal">
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="name" required class="form-control" value="<?php echo $row->name; ?>" id="inputName">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" name="email" required value="<?php echo $row->email; ?>" class="form-control" id="inputEmail">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputName2" class="col-sm-2 col-form-label">Contact</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" required readonly name="phone" value="<?php echo $row->phone; ?>" id="inputName2">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputName2" class="col-sm-2 col-form-label">Profile Picture</label>
                                            <div class="input-group col-sm-10">
                                                <div class="custom-file">
                                                    <input type="file" name="profile_pic" class=" form-control custom-file-input" id="exampleInputFile">
                                                    <label class="custom-file-label  col-form-label" for="exampleInputFile">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputName2" class="col-sm-2 col-form-label">Agence</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="agence">
                                                    <option>Tunis</option>
                                                    <option>Bizerte</option>
                                                    <option>Ben Arous</option>
                                                    <option>Sousse</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button name="update_staff_account" type="submit" class="btn btn-outline-success">Update Account</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>


                                <div class="tab-pane" id="Change_Password">
                                    <form method="post" class="form-horizontal">
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Old Password</label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control" required id="inputName">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 col-form-label">New Password</label>
                                            <div class="col-sm-10">
                                                <input type="password" name="password" class="form-control" required id="inputEmail">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputName2" class="col-sm-2 col-form-label">Confirm New Password</label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control" required id="inputName2">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" name="change_staff_password" class="btn btn-outline-success">Change Password</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section>
<?php $dashboard_view = ob_get_clean(); ?>

<?php include 'views/Admin/include/dashboard.php'; ?>