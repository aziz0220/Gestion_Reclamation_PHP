<?php
$title='Complaints Management';
$ref1='Dashboard';
$ref2='Complaints Management';
$ref3='Manage Complaints';
ob_start();
?>
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Select any action options to manage your complaints</h3>
                    </div>
                    <div class="card-body">
                        <table id="export" class="table table-hover table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Type</th>
                                <th>Rating</th>
                                <th>Status</th>
                                <th>Description</th>
                                <th>Client Name</th>
                                <th>Client Phone</th>
                                <th>Client Email</th>
                                <th>Created At</th>
                                <th>Treated At</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $cnt = 1;
                            while ($row = $complaints->fetch_object()) {
                                ?>
                                <tr>
                                    <td><?php echo $cnt; ?></td>
                                    <td><?php echo $row->rec_title; ?></td>
                                    <td><?php echo $row->rec_type; ?></td>
                                    <td><?php echo $row->rec_rating; ?></td>
                                    <td><?php echo $row->rec_status; ?></td>
                                    <td><?php echo $row->Description; ?></td>
                                    <td><?php echo $row->client_name; ?></td>
                                    <td><?php echo $row->client_phone; ?></td>
                                    <td><?php echo $row->client_email; ?></td>
                                    <td><?php echo $row->created_at; ?></td>
                                    <td><?php
                                        if($row->treated_at==null)
                                        {    echo 'Not yet.';}
                                        else{
                                        echo $row->treated_at;} ?></td>
                                    <td>
                                        <a class="btn btn-success btn-sm" href="Staff.php?rec_id=<?php echo $row->rec_id; ?>">
                                            <i class="fas fa-cogs"></i>
                                            Manage
                                        </a>
                                        <a class="btn btn-danger btn-sm delete-btn" data-id="<?php echo $row->rec_id; ?>" href="Staff.php?deleteReclamation=<?php echo $row->rec_id; ?>">
                                            <i class="fas fa-trash"></i>
                                            Delete
                                        </a>

                                    </td>
                                </tr>
                                <?php $cnt = $cnt + 1;
                            } ?>
                            </tfoot>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        $('#export').DataTable({
            dom: '<"row"<"col-md-12"<"row"<"col-md-6"B><"col-md-6"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>> >',
            buttons: {
                buttons: [{
                    extend: 'copy',
                    className: 'btn'
                },
                    {
                        extend: 'csv',
                        className: 'btn'
                    },
                    {
                        extend: 'excel',
                        className: 'btn'
                    },
                    {
                        extend: 'print',
                        className: 'btn'
                    }
                ]
            },
            "oLanguage": {
                "oPaginate": {
                    "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                    "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
                },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
                "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 7
        });
    </script>



<?php $dashboard_view = ob_get_clean(); ?>
<?php include 'views/Staff/include/dashboard.php'; ?>