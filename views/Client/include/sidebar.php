    <a href="Client.php?page=dashboard" class="brand-link">
        <img src="dist/img/<?php echo $sys->sys_logo;?>" alt="STB Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><?php echo $sys->sys_name;?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <?php echo $profile_picture; ?>
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo $row->Nom; ?> <?php echo $row->Prenom; ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->

                <li class="nav-item has-treeview">
                    <a href="Client.php?page=dashboard" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <!-- ./DAshboard -->

                <!--Account -->
                <li class="nav-item">
                    <a href="Client.php?page=account" class="nav-link">
                        <i class="nav-icon fas fa-user-tie"></i>
                        <p>
                            Account
                        </p>
                    </a>
                </li>
                <li class="nav-header">Modules avancés</li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-briefcase"></i>
                        <p>
                            RECLAMATIONS
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="Client.php?page=new_complaint" class="nav-link">
                                <i class="fas fa-lock-open nav-icon"></i>
                                <p>Nouvelle réclamation</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="Client.php?page=all_complaints" class="nav-link">
                                <i class="fas fa-cog nav-icon"></i>
                                <p>Mes Reclamations</p>
                            </a>
                        </li>
                    </ul>
                </li>



                <!-- Log Out -->
                <li class="nav-item">
                    <a href="Client.php?page=logout" class="nav-link">
                        <i class="nav-icon fas fa-power-off"></i>
                        <p>
                            Se déconnecter
                        </p>
                    </a>
                </li>
                <!-- ./Log Out -->
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
