<?php
require_once 'controller/Staff_controller.php';

use GestionReclam\Staff_controller;

$staffController = new Staff_controller();

if (isset($_GET['Close'])) {
    $staffController->CloseRecAction();
} elseif (isset($_GET['Respond'])) {
    $staffController->ResponseAction();
} elseif  (isset($_GET['Boss'])) {
    $staffController->BossSendAction();
} elseif (isset($_GET['Redirect'])) {
    $staffController->RedirectRecAction();
} elseif  (isset($_GET['rec_id'])) {
    $staffController->OpenRecAction();
} elseif  (isset($_GET['deleteReclamation'])) {
    $staffController->ManageReclamsAction();
    $staffController->DeleteComplaintAction();
} elseif (isset($_GET['page'])) {
    $page = $_GET['page'];
    switch ($page) {
        case 'login':
            $staffController->StaffLoginAction();
            break;
        case 'submit':
            $staffController->StaffLoginAction();
            $staffController->RedirectStaffAction();
            break;
        case 'dashboard':
            $staffController->StaffDashboardAction();
            break;
        case 'logout':
            $staffController->StaffLogoutAction();
            break;
        case 'account':
            if (isset($_SESSION['status'])) {
                if ($_SESSION['status'] === 'success') {
                    $success = "Staff Account Updated";
                    require 'views/Admin/include/success_message.php';
                } else if ($_SESSION['status'] === 'error') {
                    $err = "Please Try Again Or Try Later";
                    require 'views/Admin/include/error_message.php';
                }
                unset($_SESSION['status']);
            }
            else{
                $staffController->StaffAccountAction();
            }

            break;
        case 'update':
            $staffController->UpdateStaffAccountAction();
            break;
        case 'pass':
            $staffController->UpdatePassAction();
            break;
        case 'client':
            $staffController->ManageClientAction();
            break;
        case 'reclamation':
            $staffController->ReclamationAction();
            break;
        case 'all_complaints':
            $staffController->AllComplaintsAction();
            break;

    }
} else {
    $staffController->StaffDashboardAction();
}