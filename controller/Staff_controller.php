<?php

namespace GestionReclam;
require 'model/Staff.php';
use GestionReclam\Db_connection;
use GestionReclam\Bank;
use GestionReclam\Staff;
class Staff_controller
{
    private $staffModel;

    private $bankModel;

    public function __construct() {
        $this->staffModel = new Staff();
        $this->bankModel = new Bank();
    }

    public function StaffLoginAction() {
        session_start();
        $bank_settings= $this->bankModel->getBankSettings();
        require_once 'views/Staff/staff_login.php';
    }

    public function  RedirectStaffAction(){
        $bank_settings=$this->bankModel->getBankSettings();
        $rs=$this->staffModel->login();
        if ($rs){
            $success = "Successful login";
            require 'views/Admin/include/success_message.php';
            echo '<script>
                setTimeout(function() {
                    window.location.href = "Staff.php?page=dashboard";
                }, 2000); // 2000 milliseconds = 2 seconds
              </script>';
        } else {
            $err = "Access Denied Please Check Your Credentials";
            require 'views/Admin/include/error_message.php';
        }

    }


    public function StaffDashboardAction(){
        session_start();
        $bank_settings=$this->bankModel->getBankSettings();
        $this->staffModel->check_login();
        $client_id = $_SESSION['staff_id'];
        $res1=$this->staffModel->get_profile_picture();
        $bss= $this->bankModel->getBankSettings();
        $Clients=$this->staffModel->get_nbr_clients();
        $complaints=$this->staffModel->get_nbr_relamations();
        $RecTypes=$this->staffModel->get_type_reclamation();
        $res=$this->staffModel->get_today_staff_complaints();
        $res2=$this->staffModel->get_by_rate();
        $res3=$this->staffModel->get_by_status();
        require 'views/Staff/main_view.php';
    }

    public function StaffLogoutAction(){
        session_start();
        unset($_SESSION['staff_id']);
        session_destroy();
        header("Location: index.php");
        exit;
    }


    public function StaffAccountAction(){
        session_start();
        $bank_settings=$this->bankModel->getBankSettings();
        $this->staffModel->check_login();
        $res1=$this->staffModel->get_profile_picture();
        $bss= $this->bankModel->getBankSettings();
        $res=$this->staffModel->get_profile_picture();
        require 'views/Staff/staff_account.php';
    }


    public function UpdateStaffAccountAction(){
        session_start();
        $bank_settings=$this->bankModel->getBankSettings();
        $this->staffModel->check_login();
        $res1=$this->staffModel->get_profile_picture();
        $bss= $this->bankModel->getBankSettings();
        $stmt=$this->staffModel->update_profile();

        // Check if the update was successful or not
        if ($stmt!=null) {
            header("Location: Staff.php?page=account&status=success");
        } else {
            header("Location: Staff.php?page=account&status=error");
        }

        exit;
    }


    public function UpdatePassAction(){
        session_start();
        $bank_settings=$this->bankModel->getBankSettings();
        $this->staffModel->check_login();
        $res1=$this->staffModel->get_profile_picture();
        $bss= $this->bankModel->getBankSettings();
        $stmt=$this->staffModel->change_pass1();
        header("refresh:1; url=Staff.php?page=account");
        if ($stmt) {
            $success = "Staff Password Updated";
            require 'views/Admin/include/success_message.php';
        } else {
            $err = "Please Try Again Or Try Later";
            require 'views/Admin/include/error_message.php';
        }

        exit;
    }
    public function ManageClientAction(){
        session_start();
        $bank_settings=$this->bankModel->getBankSettings();
        $this->staffModel->check_login();
        $res1=$this->staffModel->get_profile_picture();
        $bss= $this->bankModel->getBankSettings();
        $res=$this->staffModel->get_all_clients();
        require 'views/Staff/Clients.php';
    }


    public function ReclamationAction(){
        session_start();
        $bank_settings=$this->bankModel->getBankSettings();
        $this->staffModel->check_login();
        $complaints=$this->staffModel->AllReclam();
        $res1=$this->staffModel->get_profile_picture();
        $res=$this->staffModel->get_profile_picture();
        $bss= $this->bankModel->getBankSettings();
        require 'views/Staff/manage_reclamation.php';
    }

    public function AllComplaintsAction(){
        session_start();
        $bank_settings=$this->bankModel->getBankSettings();
        $this->staffModel->check_login();
        $complaints=$this->staffModel->AllReclam1();
        $res1=$this->staffModel->get_profile_picture();
        $res=$this->staffModel->get_profile_picture();
        $bss= $this->bankModel->getBankSettings();
        require 'views/Staff/view_all_complaints.php';
    }

    public function OpenRecAction(){
        session_start();
        $bank_settings=$this->bankModel->getBankSettings();
        $this->staffModel->check_login();
        $reclams=$this->staffModel->AllReclam();
        $res1=$this->staffModel->get_profile_picture();
        $res=$this->staffModel->get_profile_picture();
        $bss= $this->bankModel->getBankSettings();
        $result=$this->staffModel->open_reclam();
        $typesOptions=$this->staffModel->get_rec_types();
        if ($result->num_rows > 0) {
            $complaint = $result->fetch_assoc();
            require 'views/Staff/open_reclam.php';
        } else {
            $err = "Complaint Not found";
            require 'views/Admin/include/error_message.php';
        }
    }

    public function ManageReclamsAction(){
        session_start();
        $bank_settings=$this->bankModel->getBankSettings();
        $this->staffModel->check_login();
        $res1=$this->staffModel->get_profile_picture();
        $res=$this->staffModel->get_profile_picture();
        $bss= $this->bankModel->getBankSettings();
        $reclams=$this->staffModel->AllReclam();
        $result=$this->staffModel->open_reclam();
        require 'views/Staff/manage_reclam.php';
    }


    public function DeleteComplaintAction(){
        session_start();
        $bank_settings=$this->bankModel->getBankSettings();
        $this->staffModel->check_login();
        $res1=$this->staffModel->get_profile_picture();
        $res=$this->staffModel->get_profile_picture();
        $reclams=$this->staffModel->AllReclam();
        $bss= $this->bankModel->getBankSettings();
        $stmt=$this->staffModel->delete_complaint();
        if ($stmt) {
            $info = "Reclamation Deleted Successfully";
            require 'views/Admin/include/info_message.php';
            echo '<script>
                setTimeout(function() {
                    window.location.href = "Staff.php?page=reclamation";
                }, 2000); // 2000 milliseconds = 2 seconds
              </script>';

        } else {
            $this->ReclamationAction();
            $err = "Try Again Later";
            require 'views/Admin/include/error_message.php';
        }
    }

    public function RedirectRecAction(){
        session_start();
        $bank_settings=$this->bankModel->getBankSettings();
        $this->staffModel->check_login();
        $res1=$this->staffModel->get_profile_picture();
        $res=$this->staffModel->get_profile_picture();
        $reclams=$this->staffModel->AllReclam();
        $bss= $this->bankModel->getBankSettings();
        $stmt=$this->staffModel->redirect_complaint();
        if ($stmt) {
            $info = "Reclamation Redirected Successfully";
            require 'views/Admin/include/info_message.php';
            echo '<script>
                setTimeout(function() {
                    window.location.href = "Staff.php?page=reclamation";
                }, 2000); // 2000 milliseconds = 2 seconds
              </script>';

        } else {
            ReclamationAction();
            $err = "Try Again Later";
            require 'views/Admin/include/error_message.php';
        }
    }



    public function BossSendAction(){
        session_start();
        $bank_settings=$this->bankModel->getBankSettings();
        $this->staffModel->check_login();
        $res1=$this->staffModel->get_profile_picture();
        $res=$this->staffModel->get_profile_picture();
        $reclams=$this->staffModel->AllReclam();
        $bss= $this->bankModel->getBankSettings();
        $stmt=$this->staffModel->upgrade_complaint();
        if ($stmt) {
            $info = "Reclamation Sent TO Admin Successfully";
            require 'views/Admin/include/info_message.php';
            echo '<script>
                setTimeout(function() {
                    window.location.href = "Staff.php?page=reclamation";
                }, 2000); // 2000 milliseconds = 2 seconds
              </script>';

        } else {
            $err = "Try Again Later";
            require 'views/Admin/include/error_message.php';
            $this->ReclamationAction();
        }
    }

    public function ResponseAction(){
        session_start();
        $bank_settings=$this->bankModel->getBankSettings();
        $this->staffModel->check_login();
        $res1=$this->staffModel->get_profile_picture();
        $res=$this->staffModel->get_profile_picture();
        $reclams=$this->staffModel->AllReclam();
        $complaints=$this->staffModel->AllReclam();
        $bss= $this->bankModel->getBankSettings();
        $stmt=$this->staffModel->Response_complaint();
        if ($stmt) {
            $info = "Response sent Successfully";
            require 'views/Admin/include/info_message.php';
            echo '<script>
                    setTimeout(function() {
                        window.location.href = "Staff.php?page=reclamation";
                    }, 2000); // 2000 milliseconds = 2 seconds
                  </script>';

        } else {
            $err = "Try Again Later";
            require 'views/Admin/include/error_message.php';
            require 'views/Staff/manage_reclamation.php';
        }
    }



    public function CloseRecAction(){
        session_start();
        $bank_settings=$this->bankModel->getBankSettings();
        $this->staffModel->check_login();
        $res1=$this->staffModel->get_profile_picture();
        $res=$this->staffModel->get_profile_picture();
        $reclams=$this->staffModel->AllReclam();
        $complaints=$this->staffModel->AllReclam();
        $bss= $this->bankModel->getBankSettings();
        $stmt=$this->staffModel->Close_complaint();
        if ($stmt) {
            $info = "Response sent Successfully";
            require 'views/Admin/include/info_message.php';
            echo '<script>
                setTimeout(function() {
                    window.location.href = "Staff.php?page=reclamation";
                }, 2000); // 2000 milliseconds = 2 seconds
              </script>';

        } else {
            $err = "Try Again Later";
            require 'views/Admin/include/error_message.php';
            require 'views/Staff/manage_reclamation.php';
        }
    }

}