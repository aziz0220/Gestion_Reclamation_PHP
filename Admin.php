<?php
require_once 'controller/Admin_controller.php';

use GestionReclam\Admin_controller;

$adminController = new Admin_controller();

if (isset($_GET['rec_id'])) {
    $adminController->OpenReclamAction();
} elseif  (isset($_GET['deleteReclamation'])) {
    $adminController->ManageComplaintsAction();
    $adminController->DeleteReclamAction();
} elseif (isset($_GET['create_staff_account'])) {
    $adminController->NewStaffAction();
    $adminController->AddStaffAction();
} elseif (isset($_GET['staff_number'])) {
    $adminController->StaffDetailsAction();
} elseif (isset($_GET['change_staff_password'])) {
    $adminController->PasswordStaffAction();
} elseif  (isset($_GET['update_staff_account'])) {
    $adminController->UpdateStaffAction();
} elseif  (isset($_GET['fireStaff'])) {
    $adminController->StaffDeleteAction();
} elseif (isset($_GET['client_number'])) {
    $adminController->ClientDetailsAction();
} elseif (isset($_GET['page'])) {
    $page = $_GET['page'];
    switch ($page) {
        case 'submit':
            $adminController->AdminLoginAction();
            $adminController->RedirectAction();
            break;
        case 'dashboard':
            $adminController->DashboardAction();
            break;
        case 'view_complaints':
            $adminController->ViewComplaintsAction();
            break;
        case 'manage_complaints':
            $adminController->ManageComplaintsAction();
            break;
        case 'logout':
            $adminController->LogoutAction();
            break;
        case 'account':
            $adminController->AccountAction();
            break;
        case 'client':
            $adminController->ClientsAction();
            break;
        case 'staff':
            $adminController->StaffAction();
            break;
        case 'add':
            $adminController->NewStaffAction();
            break;
        case 'update':
            $adminController->AccountAction();
            $adminController->UpdateAccountAction();
            break;
        case 'password':
            $adminController->AccountAction();
            $adminController->PasswordAccountAction();
            break;
        case 'login':
            $adminController->AdminLoginAction();
            break;
    }
} else {
    $adminController->DashboardAction();
}
?>
