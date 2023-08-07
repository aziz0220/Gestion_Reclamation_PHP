<?php
namespace GestionReclam;
require 'model/Admin.php';

class Admin_controller
{
    private $adminModel;
    private $bankModel;

    public function __construct() {
        $this->adminModel = new Admin();
        $this->bankModel = new Bank();
    }
    public function AdminLoginAction() {
        session_start();
        $bank_settings= $this->bankModel->getBankSettings();
        require_once 'views/Admin/admin_login.php';
    }

    public function RedirectAction() {
        $rs=$this->adminModel->login();
        if ($rs){
            $success = "Successful login";
            require 'views/Admin/include/success_message.php';
            echo '<script>
                setTimeout(function() {
                    window.location.href = "Admin.php?page=dashboard";
                }, 2000); // 2000 milliseconds = 2 seconds
              </script>';
        } else {
            $err = "Access Denied Please Check Your Credentials";
            require 'views/Admin/include/error_message.php';
        }
    }

    public function DashboardAction() {
        session_start();
        $bank_settings= $this->bankModel->getBankSettings();
        $this->adminModel->checkLogin();
        $Clients=$this->adminModel->getClients();
        $Staff=$this->adminModel->get_Staff();
        $complaints=count($this->adminModel->get_nb_rec());
        $RecTypes=$this->adminModel->getRecType();
        $res1=$this->adminModel->get_profile_picture();
        $bss= $this->bankModel->getBankSettings();
        $res2= $this->adminModel->get_today_complaints();
        require 'views/Admin/main_view.php';
    }

    public function ViewComplaintsAction() {
        session_start();
        $bank_settings= $this->bankModel->getBankSettings();
        $this->adminModel->checkLogin();
        $reclams=$this->adminModel->get_all_complaints();
        $res1=$this->adminModel->get_profile_picture();
        $bss= $this->bankModel->getBankSettings();
        require 'views/Admin/view_all_complaints.php';
    }

    public function ManageComplaintsAction() {
        session_start();
        $bank_settings= $this->bankModel->getBankSettings();
        $this->adminModel->checkLogin();
        $reclams=$this->adminModel->get_all_complaints();
        $res1=$this->adminModel->get_profile_picture();
        $bss= $this->bankModel->getBankSettings();
        $res= $this->adminModel->get_all_complaints1();
        require 'views/Admin/manage_complaints.php';
    }

    public function DeleteReclamAction() {
        session_start();
        $bank_settings= $this->bankModel->getBankSettings();
        $this->adminModel->checkLogin();
        $reclams=$this->adminModel->get_all_complaints();
        $res1=$this->adminModel->get_profile_picture();
        $bss= $this->bankModel->getBankSettings();
        $stmt=$this->adminModel->delete_complaint();
        if ($stmt) {
            $info = "Reclamation Deleted Successfully";
            require 'views/Admin/include/info_message.php';
            echo '<script>
                setTimeout(function() {
                    window.location.href = "Admin.php";
                }, 2000); // 2000 milliseconds = 2 seconds
              </script>';

        } else {
            $this->ManageComplaintsAction();
            $err = "Try Again Later";
            require 'views/Admin/include/error_message.php';
        }
    }

    public function OpenReclamAction() {
        session_start();
        $bank_settings= $this->bankModel->getBankSettings();
        $this->adminModel->checkLogin();
        $reclams=$this->adminModel->get_all_complaints();
        $res1=$this->adminModel->get_profile_picture();
        $bss= $this->bankModel->getBankSettings();
        $result=$this->adminModel->open_complaint();
        if ($result->num_rows > 0) {
            $complaint = $result->fetch_assoc();
            require 'views/Admin/open_complaint.php';
        } else {
            $err = "Complaint Not found";
            require 'views/Admin/include/error_message.php';
        }
    }

    public function LogoutAction(){
        session_start();
        unset($_SESSION['admin_id']);
        session_destroy();
        header("Location: Admin.php");
        exit;
    }

    public function AccountAction() {
        session_start();
        $bank_settings= $this->bankModel->getBankSettings();
        $this->adminModel->checkLogin();
        $res1=$this->adminModel->get_profile_picture();
        $res=$this->adminModel->get_profile_picture();
        $bss= $this->bankModel->getBankSettings();
        $result=$this->adminModel->open_complaint();
        require 'views/Admin/admin_account.php';
    }


    public function UpdateAccountAction() {
        session_start();
        $bank_settings= $this->bankModel->getBankSettings();
        $this->adminModel->checkLogin();
        $res1=$this->adminModel->get_profile_picture();
        $bss= $this->bankModel->getBankSettings();
        $stmt=$this->adminModel->update_account();
        if ($stmt!=null) {
            $success = "Account Updated";
            require 'views/Admin/include/success_message.php';
            echo '<script>
            setTimeout(function() {
                    window.location.href = "Admin.php";
            }, 1000); // 1000 milliseconds = 1 second
          </script>';
        } else {
            $err = "Please Try Again Or Try Later";
            require 'views/Admin/include/error_message.php';
        }
    }


    public function PasswordAccountAction() {
        session_start();
        $bank_settings= $this->bankModel->getBankSettings();
        $this->adminModel->checkLogin();
        $res1=$this->adminModel->get_profile_picture();
        $bss= $this->bankModel->getBankSettings();
        $pass=$this->adminModel->update_password();
        if ($pass!=null) {
            $success = "Password Updated";
            require 'views/Admin/include/success_message.php';
            echo '<script>
            setTimeout(function() {
                    window.location.href = "Admin.php";
            }, 1000); // 1000 milliseconds = 1 second
          </script>';
        } else {
            $err = "Please Try Again Or Try Later";
            require 'views/Admin/include/error_message.php';
        }
    }


    public function ClientsAction() {
        session_start();
        $bank_settings= $this->bankModel->getBankSettings();
        $res1=$this->adminModel->get_profile_picture();
        $bss= $this->bankModel->getBankSettings();
        $res=$this->adminModel->getAllClients();
        $this->adminModel->checkLogin();
        require 'views/Admin/clients.php';
    }

    public function ClientDetailsAction() {
        session_start();
        $bank_settings= $this->bankModel->getBankSettings();
        $res1=$this->adminModel->get_profile_picture();
        $bss= $this->bankModel->getBankSettings();
        $res=$this ->adminModel->client_profile_pic();
        $this->adminModel->checkLogin();
        require 'views/Admin/clientDetails.php';
    }


    public function StaffAction(){
        session_start();
        $bank_settings= $this->bankModel->getBankSettings();
        $res1=$this->adminModel->get_profile_picture();
        $bss= $this->bankModel->getBankSettings();
        $this->adminModel->checkLogin();
        $res=$this->adminModel->get_all_staff();
        require 'views/Admin/Staff.php';
    }

    public function StaffDeleteAction(){
        session_start();
        $bank_settings= $this->bankModel->getBankSettings();
        $res1=$this->adminModel->get_profile_picture();
        $bss= $this->bankModel->getBankSettings();
        $this->adminModel->checkLogin();
        $stmt=$this->adminModel->fire_staff();
        if ($stmt) {
            $info = "STB Staff Account Deleted";
            require 'views/Admin/include/info_message.php';
        } else {
            $err = "Try Again Later";
            require 'views/Admin/include/error_message.php';
        }
        require 'views/Admin/Staff.php';
    }

    public function UpdateStaffAction(){
        session_start();
        $bank_settings= $this->bankModel->getBankSettings();
        $res1=$this->adminModel->get_profile_picture();
        $bss= $this->bankModel->getBankSettings();
        $this->adminModel->checkLogin();
        $stmt=$this->adminModel->update_staff();
        if ($stmt) {
            $success = "Staff Account Updated";
            require 'views/Admin/include/success_message.php';
        } else {
            $err = "Please Try Again Or Try Later";
            require 'views/Admin/include/error_message.php';
        }
    }


    public function PasswordStaffAction(){
        session_start();
        $bank_settings= $this->bankModel->getBankSettings();
        $res1=$this->adminModel->get_profile_picture();
        $bss= $this->bankModel->getBankSettings();
        $this->adminModel->checkLogin();
        $stmt=$this->adminModel->password_staff();
        if ($stmt) {
            $success = "Staff Password Updated";
            require 'views/Admin/include/success_message.php';
        } else {
            $err = "Please Try Again Or Try Later";
            require 'views/Admin/include/error_message.php';
        }
    }



    public function StaffDetailsAction(){
        session_start();
        $bank_settings= $this->bankModel->getBankSettings();
        $res1=$this->adminModel->get_profile_picture();
        $res=$this->adminModel->staff_profile_pic();
        $bss= $this->bankModel->getBankSettings();
        $this->adminModel->checkLogin();
        require 'views/Admin/staffDetails.php';
    }



    public function NewStaffAction(){
        session_start();
        $bank_settings= $this->bankModel->getBankSettings();
        $res1=$this->adminModel->get_profile_picture();
        $bss= $this->bankModel->getBankSettings();
        $this->adminModel->checkLogin();
        require 'views/Admin/new_Staff.php';
    }

    public function AddStaffAction(){
        session_start();
        $bank_settings= $this->bankModel->getBankSettings();
        $res1=$this->adminModel->get_profile_picture();
        $bss= $this->bankModel->getBankSettings();
        $this->adminModel->checkLogin();
        $stmt=$this->adminModel->new_staff();
        if ($stmt) {
            $success = "Staff Account Created";
            require 'views/Admin/include/success_message.php';
        } else {
            $err = "Please Try Again Or Try Later";
            require 'views/Admin/include/error_message.php';
        }
    }

}