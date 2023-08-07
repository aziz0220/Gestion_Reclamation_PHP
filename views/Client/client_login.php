
<?php

while ($sys = $bank_settings->fetch_object()) {
    include_once 'views/Client/client_index.php';
}

?>
