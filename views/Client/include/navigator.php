<aside class="main-sidebar sidebar-dark-primary elevation-4">

<?php

while ($row = $res1->fetch_object()) {
    //set automatically logged in user default image if they have not updated their pics
    if ($row->profile_pic == '') {
        $profile_picture = "<img src='dist/img/user_icon.png' class=' elevation-2' alt='User Image'>
                ";
    } else {
        $profile_picture = "<img src='dist/img/$row->profile_pic' class='elevation-2' alt='User Image'>
                ";
    }


    while ($sys = $bss->fetch_object()) {
        include 'views/Client/include/sidebar.php';
    }
}
