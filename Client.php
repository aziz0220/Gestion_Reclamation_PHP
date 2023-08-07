<?php
require_once 'controller/Client_controller.php';

use GestionReclam\Client_controller;

$clientController = new Client_controller();


if (isset($_GET['page'])) {
    $page = $_GET['page'];
    switch ($page) {
        case 'login':
            $clientController->ClientLoginAction();
            break;
        case 'submit':
            $clientController->ClientLoginAction();
            $clientController->RedirectClientAction();
            break;
        case 'reset':
            $clientController->ResetPassAction();
            break;
        case 'newpass':
            $clientController->NewPassAction();
            break;
        case 'confirm':
            $clientController->ConfirmResetAction();
            break;
        case 'signup':
            $clientController->SignupAction();
            break;
        case 'create':
            $clientController->SignupAction();
            $clientController->CreateAccountAction();
            break;
        case 'dashboard':
            $clientController->ClientDashboardAction();
            break;
        case 'logout':
            $clientController->ClientLogoutAction();
            break;

        case 'account':
            $clientController->ClientAccountAction();
            break;
        case 'update_account':
            $clientController->ClientAccountAction();
            $clientController->UpdateClientAccountAction();
            break;
        case 'reset_account_password':
            $clientController->ClientAccountAction();
            $clientController->ResetAccountPassAction();
            break;
        case 'all_complaints':
            $clientController->ViewAllComplaintsAction();
            break;
        case 'new_complaint':
            $clientController->NewComplaintAction();
            break;
        case 'nouvrec':
            $clientController->RecSubmitAction();
            break;
    }
} else {
    $clientController->ClientDashboardAction();
}

?>

