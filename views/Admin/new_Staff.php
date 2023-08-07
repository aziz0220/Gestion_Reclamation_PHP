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
            <div class="col-md-12">
                <div class="card card-purple">
                    <div class="card-header">
                        <h3 class="card-title">Fill All Fields</h3>
                    </div>
                    <form method="post" action="Admin.php?create_staff_account" enctype="multipart/form-data" role="form">
                        <div class="card-body">
                            <div class="row">
                                <div class=" col-md-6 form-group">
                                    <label for="exampleInputEmail1">Staff Name</label>
                                    <input type="text" name="name" required class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class=" col-md-6 form-group">
                                    <label for="exampleInputPassword1">Staff Number</label>
                                    <?php
                                    $length = 4;
                                    $_staffNumber =  substr(str_shuffle('0123456789'), 1, $length);
                                    ?>
                                    <input type="text" readonly name="staff_number" value="STB-STAFF-<?php echo $_staffNumber; ?>" class="form-control" id="exampleInputPassword1">
                                </div>
                            </div>

                            <div class="row">
                                <div class=" col-md-6 form-group">
                                    <label for="exampleInputEmail1">Staff Phone Number</label>
                                    <input type="text" name="phone" required class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class=" col-md-6 form-group">
                                    <label for="exampleInputPassword1">Agence</label>
                                    <select class="form-control" name="agence">
                                        <option>Select Agence</option>
                                        <option>Tunis</option>
                                        <option>Bizerte</option>
                                        <option>Ben Arous</option>
                                        <option>Sousse</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class=" col-md-6 form-group">
                                    <label for="exampleInputEmail1">Staff Email</label>
                                    <input type="email" name="email" required class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class=" col-md-6 form-group">
                                    <label for="exampleInputPassword1">Staff Password</label>
                                    <input type="password" name="password" required class="form-control" id="exampleInputEmail1">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Staff Profile Picture</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="profile_pic" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="">Upload</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" name="create_staff_account" class="btn btn-success">Add Staff</button>
                        </div>
                    </form>
                </div>
            </div>
</section>

    <script type="text/javascript">
        $(document).ready(function() {
            bsCustomFileInput.init();
        });
    </script>
<?php $dashboard_view = ob_get_clean(); ?>
<?php include 'views/Admin/include/dashboard.php'; ?>