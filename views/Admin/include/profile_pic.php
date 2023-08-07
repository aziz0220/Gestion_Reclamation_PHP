<?php
if ($row = $res->fetch_object()) {
    if ($row->profile_pic == '') {
        $profile_picture = " <img class='img-fluid'  src='dist/img/user_icon.png'   alt='User profile picture'>   ";
    } else {
        $profile_picture = " <img class=' img-fluid'  src='dist/img/$row->profile_pic' alt='User profile picture'>   ";
    }
}

