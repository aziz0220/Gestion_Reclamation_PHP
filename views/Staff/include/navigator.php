<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <?php

    while ($row = $res1->fetch_object()) {
        if ($row->profile_pic == '') {
            $profile_picture = "<img src='dist/img/user_icon.png' class='img-circle elevation-2' alt='User Image'>
                ";
        } else {
            $profile_picture = "<img src='dist/img/$row->profile_pic' class='img-circle elevation-2' alt='User Image'>
                ";
        }

        while ($sys = $bss->fetch_object()) {
            include 'views/Staff/include/sidebar.php';
        }
    } ?>


