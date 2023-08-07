<?php

namespace GestionReclam;
require 'model/Client.php';
use GestionReclam\Db_connection;
use GestionReclam\Bank;
use GestionReclam\Client;
class Client_controller
{
    private $clientModel;
    private $bankModel;

    public function __construct() {
        $this->clientModel = new Client();
        $this->bankModel = new Bank();
    }
    public function ClientLoginAction() {
        session_start();
        $bank_settings= $this->bankModel->getBankSettings();
        require_once 'views/Client/client_login.php';
    }

    public function RedirectClientAction() {
        $rs= $this->clientModel->login();
        if ($rs){
            $success = "Successful login";
            require 'views/Admin/include/success_message.php';
            echo '<script>
                setTimeout(function() {
                    window.location.href = "Client.php?page=dashboard";
                }, 2000); // 2000 milliseconds = 2 seconds
              </script>';
        } else {
            $err = "Access Denied Please Check Your Credentials";
            require 'views/Admin/include/error_message.php';
        }
    }

    public function ClientLogoutAction() {
        session_start();
        unset($_SESSION['client_id']);
        session_destroy();
        header("Location: Client.php");
        exit;
    }

    public function ClientDashboardAction() {
        session_start();
        $bank_settings= $this->bankModel->getBankSettings();
        $this->clientModel->checklogin();
        $res1=$this->clientModel->get_profile_picture();
        $bss= $this->bankModel->getBankSettings();
        $res=$this->clientModel->get_responses();
        require 'views/Client/main_view.php';
        exit;
    }

    public function ResetPassAction() {
        session_start();
        $bank_settings= $this->bankModel->getBankSettings();
        require 'views/Client/password_reset.php';
        exit;
    }

    public function ConfirmResetAction() {
        session_start();
        $bank_settings= $this->bankModel->getBankSettings();
        $this->clientModel->checklogin();
        $client_id = $_SESSION['client_id'];
        $stmt=$this->clientModel->password_reset();
        if ($stmt) {
            $success = "Confim Your Password" && header("refresh:1; url=client.php?page=newpass");
            require 'views/Admin/include/success_message.php';
        } else {
            $err = "Password reset failed";
            require 'views/Admin/include/error_message.php';
        }
        exit;
    }

    public function SignupAction() {
        session_start();
        $bank_settings= $this->bankModel->getBankSettings();
        $length = 4;
        $_Number = substr(str_shuffle('0123456789'), 1, $length);
        require 'views/Client/new_account.php';
        exit;
    }


    public function CreateAccountAction(){
        $stmt=$this->clientModel->New_user_account();
        if ($stmt) {
            $success = "Account Created";
            require 'views/Admin/include/success_message.php';
            echo '<script>
                setTimeout(function() {
                    window.location.href = "Client.php?page=login";
                }, 2000); // 2000 milliseconds = 2 seconds
              </script>';
        } else {
            $err = "Please Try Again Or Try Later";
            require 'views/Admin/include/error_message.php';
        }

    }

    public function NewPassAction(){
        $stmt=$this->clientModel->New_user_account();
        require 'views/Client/confirm_pass_reset.php';
        //TODO: look up for a stategy on the internet!!
    }




    public function ClientAccountAction(){
        session_start();
        $bank_settings= $this->bankModel->getBankSettings();
        $this->clientModel->checklogin();
        $res1=$this->clientModel->get_profile_picture();
        $bss= $this->bankModel->getBankSettings();
        $res=$this->clientModel->get_profile_picture();
        require 'views/Client/client_account.php';
    }


    public function UpdateClientAccountAction(){

        $bank_settings= $this->bankModel->getBankSettings();
        $this->clientModel->checklogin();
        $res1=$this->clientModel->get_profile_picture();
        $bss= $this->bankModel->getBankSettings();
        $stmt=$this->clientModel->update_client_account();
        if ($stmt) {
            $success = "Client Account Updated";
            require 'views/Admin/include/success_message.php';
        } else {
            $err = "Please Try Again Or Try Later";
            require 'views/Admin/include/error_message.php';
        }
        require 'views/Client/client_account.php';
    }

    public function ResetAccountPassAction()
    {

        $bank_settings = $this->bankModel->getBankSettings();
        $this->clientModel->checklogin();
        $res1 = $this->clientModel->get_profile_picture();
        $bss = $this->bankModel->getBankSettings();
        $stmt = $this->clientModel->change_password();
        if ($stmt) {
            $success = "Client Password Updated";
            require 'views/Admin/include/success_message.php';
        } else {
            $err = "Please Try Again Or Try Later";
            require 'views/Admin/include/error_message.php';
        }
    }


    public function ViewAllComplaintsAction()
    {
        session_start();
        $bank_settings = $this->bankModel->getBankSettings();
        $this->clientModel->checklogin();
        $res1 = $this->clientModel->get_profile_picture();
        $bss = $this->bankModel->getBankSettings();
        $res = $this->clientModel->get_reclamations();
        require 'views/Client/All_compaints.php';
    }




    public function NewComplaintAction()
    {
        session_start();
        $bank_settings = $this->bankModel->getBankSettings();
        $this->clientModel->checklogin();
        $res1 = $this->clientModel->get_profile_picture();
        $bss = $this->bankModel->getBankSettings();
        $typesOptions=$this->clientModel->get_complait_types();
        require 'views/Client/New_Complaint.php';
    }


    public function RecSubmitAction()
    {
        session_start();
        $bank_settings = $this->bankModel->getBankSettings();
        $this->clientModel->checklogin();
        $res1 = $this->clientModel->get_profile_picture();
        $bss = $this->bankModel->getBankSettings();
        $stmt=$this->clientModel->submit_reclamation();
        if ($stmt) {
            $success = "Reclamation submitted successfully";
            require 'views/Admin/include/success_message.php';
            echo '<script>
                setTimeout(function() {
                    window.location.href = "Client.php?page=all_complaints";
                }, 2000); // 2000 milliseconds = 2 seconds
              </script>';
        } else {
            $err = "Failed to submit reclamation";
            require 'views/Admin/include/error_message.php';
        }
    }


}