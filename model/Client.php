<?php

namespace GestionReclam;

include_once 'Bank.php';

use GestionReclam\Db_connection;

class Client
{
    private $mysqli;

    public function __construct()
    {
        $dbConnection = new Db_connection();
        $this->mysqli = $dbConnection->database_connection();
    }

    public function login()
    {
        if (isset($_POST['login'])) {
            $email = $_POST['email'];
            $password = sha1(md5($_POST['password']));
            $stmt = $this->mysqli->prepare("SELECT email, password, client_id FROM clients WHERE email=? AND password=?");
            $stmt->bind_param('ss', $email, $password);
            $stmt->execute();
            $stmt->bind_result($email, $password, $client_id);
            $rs = $stmt->fetch();
            if ($rs) {
                $_SESSION['client_id'] = $client_id;
            }
            return ($rs);
        }
        return null;
    }

    public function checklogin()
    {
        if (strlen($_SESSION['client_id']) == 0) {
            $host = $_SERVER['HTTP_HOST'];
            $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
            $extra = "Client.php?page=login";
            $_SESSION["client_id"] = "";
            header("Location: http://$host$uri/$extra");
        }
    }

    public function get_profile_picture()
    {
        $client_id = $_SESSION['client_id'];
        $ret = "SELECT * FROM  clients  WHERE client_id = ? ";
        $stmt = $this->mysqli->prepare($ret);
        $stmt->bind_param('i', $client_id);
        $stmt->execute(); //ok
        $res = $stmt->get_result();
        return $res;
    }

    public function get_reclamations()
    {
        $ret = "SELECT * FROM reclamations WHERE client_id = ?";
        $stmt = $this->mysqli->prepare($ret);
        $stmt->bind_param('i', $client_id);
        $stmt->execute();
        $res = $stmt->get_result();
        return $res;
    }



    public function password_reset()
    {
        if (isset($_POST['reset_password'])) {
            $error = 0;
            if (isset($_POST['email']) && !empty($_POST['email'])) {
                $email = mysqli_real_escape_string($this->mysqli, trim($_POST['email']));
            } else {
                $error = 1;
                $err = "Enter Your Email";
                require 'views/Admin/include/error_message.php';
            }
            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $err = 'Invalid Email';
                require 'views/Admin/include/error_message.php';
            }
            $checkEmail = mysqli_query($this->mysqli, "SELECT `email` FROM `clients` WHERE `email` = '" . $_POST['email'] . "'") or exit(mysqli_error($this->mysqli));
            if (mysqli_num_rows($checkEmail) > 0) {

                $n = date('y');
                $new_password = bin2hex(random_bytes($n));
                $query = "UPDATE clients SET  password=? WHERE email =?";
                $stmt = $this->mysqli->prepare($query);
                $rc = $stmt->bind_param('ss', $new_password, $email);
                $stmt->execute();
                $_SESSION['email'] = $email;
                return $stmt;
            } else
            {
                $err = "Email Does Not Exist";
                require 'views/Admin/include/error_message.php';
            }
        }
        return null;
    }



    public function New_user_account()
    {
        if (isset($_POST['create_account'])) {
            $nom = $_POST['Nom'];
            $prenom = $_POST['Prenom'];
            $national_id = $_POST['national_id'];
            $client_number = $_POST['client_number'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $password = sha1(md5($_POST['password']));
            $address  = $_POST['address'];
            //$profile_pic  = $_FILES["profile_pic"]["Nom"];
            //move_uploaded_file($_FILES["profile_pic"]["tmp_Nom"],"dist/img/".$_FILES["profile_pic"]["Nom"]);
            $query = "INSERT INTO clients (Nom, Prenom, national_id, phone, address, email, password, client_number) VALUES (?,?,?,?,?,?,?,?)";
            $stmt = $this->mysqli->prepare($query);
            $rc = $stmt->bind_param('ssssssss', $nom ,$prenom, $national_id, $address, $phone, $email, $password, $client_number);
            $stmt->execute();
            return $stmt;
        }
        return null;
    }

    public function update_client_account()
    {
        if (isset($_POST['update_client_account'])) {
            $Nom = $_POST['Nom'];
            $Prenom = $_POST['Prenom'];
            $national_id = $_POST['national_id'];
            $client_number = isset($_GET['client_number']) ? $_GET['client_number'] : null;
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $address  = $_POST['address'];
            $profile_pic  = $_FILES["profile_pic"]["name"];
            move_uploaded_file($_FILES["profile_pic"]["tmp_name"], "../admin/dist/img/" . $_FILES["profile_pic"]["name"]);
            $query = "UPDATE  clients SET Nom=?, Prenom=?, national_id=?, phone=?, email=?, address=?, profile_pic=? WHERE client_number = ?";
            $stmt = $this->mysqli->prepare($query);
            $stmt->bind_param('ssssssss', $Nom, $Prenom, $national_id, $phone, $email,  $address, $profile_pic, $client_number);
            $stmt->execute();
            return $stmt;
        }
        return null;
    }

     public function change_password()
    {
        if (isset($_POST['change_client_password'])) {
            $password = sha1(md5($_POST['password']));
            $client_number = $_GET['client_number'];
            $query = "UPDATE clients  SET password=? WHERE  client_number=?";
            $stmt = $this->mysqli->prepare($query);
            $rc = $stmt->bind_param('ss', $password, $client_number);
            $stmt->execute();
            return $stmt;
        }
        return null;
    }

    public function get_complait_types()
    {
        $typesQuery = "SELECT * FROM types_reclamation";
        $typesResult = $this->mysqli->query($typesQuery);
        $typesOptions = "";
        while ($row = $typesResult->fetch_assoc()) {
            $typesOptions .= "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
        }
        return $typesOptions;
    }

    public function submit_reclamation()
    {
        if (isset($_POST['submit_complaint'])) {
            $rec_title = $_POST['rec_title'];
            $rec_type = $_POST['rec_type'];
            $rec_rating = $_POST['rec_rating'];
            $Description = $_POST['Description'];
            $client_id = $_SESSION['client_id'];
            $rec_number = uniqid();
            $clientQuery = "SELECT * FROM clients WHERE client_id = ?";
            $stmtClient = $this->mysqli->prepare($clientQuery);
            $stmtClient->bind_param('i', $client_id);
            $stmtClient->execute();
            $clientResult = $stmtClient->get_result();
            $clientData = $clientResult->fetch_assoc();
            $client_name = $clientData['Nom'] . ' ' . $clientData['Prenom'];
            $client_national_id = $clientData['national_id'];
            $client_phone = $clientData['phone'];
            $client_number = $clientData['client_number'];
            $client_email = $clientData['email'];
            $client_adr = $clientData['address'];
            $query = "INSERT INTO reclamations (rec_title, rec_number, rec_type, rec_rating, rec_status, Description, client_id, client_name, client_national_id, client_phone, client_number, client_email, client_adr) VALUES (?, ?, ?, ?, 'Open', ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $this->mysqli->prepare($query);
            $stmt->bind_param('sssssissssss', $rec_title, $rec_number, $rec_type, $rec_rating, $Description, $client_id, $client_name, $client_national_id, $client_phone, $client_number, $client_email, $client_adr);
            $stmt->execute();
            return $stmt;
        }
        return null;
    }

    public function get_responses()
    {
        $client_id=$_SESSION['client_id'];
        $query = "SELECT DISTINCT r.* FROM reclamations r JOIN clients c ON r.client_id = c.client_id WHERE r.Treat_message IS NOT NULL AND c.client_id=?;";
        $stmtClient = $this->mysqli->prepare($query);
        $stmtClient->bind_param('i', $client_id);
        $stmtClient->execute();
        $res = $stmtClient->get_result();
        return $res;
    }

}