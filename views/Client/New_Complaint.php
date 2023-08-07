<?php
$title='complaints';
$ref1='Dashboard';
$ref2='Manage';
$ref3='rzg ';
ob_start();
?>


<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="client.php?page=nouvrec">
                        <div class="form-group">
                            <label for="rec_title">Title</label>
                            <input type="text" class="form-control" name="rec_title" required>
                        </div>
                        <div class="form-group">
                            <label for="rec_type">Type</label>
                            <select class="form-control" name="rec_type" required>
                                <option value="">Select Type</option>
                                <?php echo $typesOptions; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="rec_rating">Rating</label>
                            <select class="form-control" name="rec_rating" required>
                                <option value="" selected disabled>Select Rating</option>
                                <option value="Low">Low</option>
                                <option value="Medium">Medium</option>
                                <option value="High">High</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Description">Description</label>
                            <textarea class="form-control" name="Description" rows="5" required></textarea>
                        </div>
                        <button type="submit" name="submit_complaint" class="btn btn-primary">Submit Reclamation</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


<?php $dashboard_view = ob_get_clean(); ?>

<?php include 'views/Client/include/dashboard.php'; ?>