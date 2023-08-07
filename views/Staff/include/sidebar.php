<a href="staff.php?page=dashboard" class="brand-link">
    <img src="dist/img/<?php echo $sys->sys_logo;?>" alt="STB Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light"><?php echo $sys->sys_name;?></span>
</a>


<div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <?php echo $profile_picture; ?>
        </div>
        <div class="info">
            <a href="#" class="d-block"><?php echo $row->name; ?></a>
        </div>
    </div>


    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


            <li class="nav-item has-treeview">
                <a href="staff.php?page=dashboard" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard

                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="staff.php?page=account" class="nav-link">
                    <i class="nav-icon fas fa-user-tie"></i>
                    <p>
                        Account
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="Staff.php?page=client" class="nav-link">
                    <i class="fas fa-user-cog nav-icon"></i>
                    <p>
                        Clients
                    </p>
                </a>
            </li>

            <li class="nav-header">Advanced Modules</li>
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-receipt"></i>
                    <p>
                        Réclamations
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">

                    <li class="nav-item">
                        <a href="Staff.php?page=reclamation" class="nav-link">
                            <i class="fas fa-cogs nav-icon"></i>
                            <p>Gérer les réclamations</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="Staff.php?page=all_complaints" class="nav-link">
                            <i class="nav-icon fas fa-exchange-alt"></i>
                            <p>
                                Historique des réclamations
                            </p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="Staff.php?page=logout" class="nav-link">
                    <i class="nav-icon fas fa-power-off"></i>
                    <p>
                        Log Out
                    </p>
                </a>
            </li>
        </ul>
    </nav>
</div>
</aside>