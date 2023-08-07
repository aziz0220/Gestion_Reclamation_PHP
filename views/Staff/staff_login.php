
<?php

while ($sys = $bank_settings->fetch_object()) {
    include_once 'views/Staff/staff_index.php';
}

?>
