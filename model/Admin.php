<?php
namespace GestionReclam;


include_once 'Bank.php';

use GestionReclam\Db_connection;

class Admin {
    private $mysqli;

    public function __construct() {
        $dbConnection = new Db_connection();
        $this->mysqli = $dbConnection->database_connection();
    }

    public function login(){
        if (isset($_POST['login'])) {
            $email = $_POST['email'];
            $password = sha1(md5($_POST['password']));
            $stmt = $this->mysqli->prepare("SELECT email, password, admin_id  FROM Admins  WHERE email=? AND password=?");
            $stmt->bind_param('ss', $email, $password);
            $stmt->execute();
            $stmt->bind_result($email, $password, $admin_id);
            $rs = $stmt->fetch();
            if($rs){
                $_SESSION['admin_id'] = $admin_id;
            }
            return($rs);
        }
    }

    public function checkLogin() {
        if(strlen($_SESSION['admin_id'])==0)
        {
            $host = $_SERVER['HTTP_HOST'];
            $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
            $extra="admin.php?page=login";
            $_SESSION["admin_id"]="";
            header("Location: http://$host$uri/$extra");
        }
    }

    public function getRecType() {
        $result = "SELECT count(*) FROM types_reclamation";
        $stmt = $this->mysqli->prepare($result);
        $stmt->execute();
        $stmt->bind_result($RecTypes);
        $stmt->fetch();
        $stmt->close();
        return($RecTypes);
    }

    public function getClients() {
        $result = "SELECT count(*) FROM clients";
        $stmt = $this->mysqli->prepare($result);
        $stmt->execute();
        $stmt->bind_result($Clients);
        $stmt->fetch();
        $stmt->close();
        return($Clients);
    }

        public function getAllClients() {
            $ret = "SELECT * FROM  clients ORDER BY RAND() ";
            $stmt = $this->mysqli->prepare($ret);
            $stmt->execute();
            $res = $stmt->get_result();
            return($res);
        }






    public function get_Staff() {
        $result = "SELECT count(*) FROM staff";
        $stmt = $this->mysqli->prepare($result);
        $stmt->execute();
        $stmt->bind_result($Staff);
        $stmt->fetch();
        $stmt->close();
        return($Staff);
    }

    public function get_nb_rec() {
        $stmt = $this->mysqli->prepare("SELECT * FROM reclamations ORDER BY created_at DESC");
        $stmt->execute();
        $res = $stmt->get_result();
        $complaints = $res->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        return($complaints);
    }


    public function get_profile_picture() {
        $admin_id = $_SESSION['admin_id'];
        $ret = "SELECT * FROM  admins  WHERE admin_id = ? ";
        $stmt = $this->mysqli->prepare($ret);
        $stmt->bind_param('i', $admin_id);
        $stmt->execute();
        $res = $stmt->get_result();
        return($res);
    }


    public function client_profile_pic() {
        $client_number = $_GET['client_number'];
        $ret = "SELECT * FROM  clients  WHERE client_number = ? ";
        $stmt = $this->mysqli->prepare($ret);
        $stmt->bind_param('s', $client_number);
        $stmt->execute();
        $res = $stmt->get_result();
        return $res;
    }


    public function staff_profile_pic() {
        $staff_number = $_GET['staff_number'];
        $ret = "SELECT * FROM  staff  WHERE staff_number = ? ";
        $stmt = $this->mysqli->prepare($ret);
        $stmt->bind_param('s', $staff_number);
        $stmt->execute();
        $res = $stmt->get_result();
        return $res;
    }


    public function get_today_complaints() {
        $today = date('Y-m-d');
        $query = "SELECT DISTINCT * FROM reclamations WHERE DATE(created_at) = ? AND send_to_boss = TRUE";
        $stmt = $this->mysqli->prepare($query);
        $stmt->bind_param('s', $today);
        $stmt->execute();
        $res = $stmt->get_result();
        $stmt->close();
        return($res);
    }

    public function get_all_complaints() {
        $query = "SELECT DISTINCT * FROM reclamations WHERE send_to_boss = TRUE";
        $stmt = $this->mysqli->prepare($query);
        $stmt->execute();
        $res = $stmt->get_result();
        $complaints = $res->fetch_all(MYSQLI_ASSOC);
        return($complaints);
    }

    public function get_all_complaints1() {
        $query = "SELECT * FROM reclamations";
        $stmt = $this->mysqli->prepare($query);
        $stmt->execute();
        $res = $stmt->get_result();
        return $res;
    }

    public function update_account() {
        if (isset($_POST['update_account'])) {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $admin_id = $_SESSION['admin_id'];
            $email = $_POST['email'];
            $query = "UPDATE Admins  SET nom=?,prenom=?, email=? WHERE  admin_id=?";
            $stmt = $this->mysqli->prepare($query);
            $rc = $stmt->bind_param('sssi',$nom, $prenom, $email, $admin_id);
            $stmt->execute();
            return($stmt);
        }
        return null;
    }

    public function update_password() {
        if (isset($_POST['change_password'])) {
            $oldpassword = sha1(md5($_POST['oldpassword']));
            $writtenpass = $_POST['password'];
            $confirmpass = $_POST['passwordconfirm'];
            $admin_id = $_SESSION['admin_id'];
            if ($writtenpass === $confirmpass) {
                $query = "SELECT password FROM Admins WHERE admin_id=?";
                $stmt = $this->mysqli->prepare($query);
                $stmt->bind_param('i', $admin_id);
                $stmt->execute();
                $res = $stmt->get_result();
                if ($res && $res->num_rows === 1) {
                    $row = $res->fetch_assoc();
                    $hashedPassword = $row['password'];
                    if ($hashedPassword === $oldpassword) {
                        $newPassword = sha1(md5($writtenpass));
                        $query = "UPDATE Admins SET password=? WHERE admin_id=?";
                        $stmt = $this->mysqli->prepare($query);
                        $stmt->bind_param('si', $newPassword, $admin_id);
                        $stmt->execute();
                        return $stmt;
                    }
                }
            }
        }
        return null;}


    public function get_all_staff(){
        $ret = "SELECT * FROM  staff ORDER BY RAND() ";
        $stmt = $this->mysqli->prepare($ret);
        $stmt->execute();
        $res = $stmt->get_result();
        return $res;
    }

    public function fire_staff() {
        if (isset($_GET['fireStaff'])) {
            $id = intval($_GET['fireStaff']);
            $adn = "DELETE FROM  staff  WHERE staff_id = ?";
            $stmt = $this->mysqli->prepare($adn);
            $stmt->bind_param('i', $id);
            $stmt->execute();
            $stmt->close();
            return $stmt;
        }
        return null;
    }

    public function update_staff() {
        if (isset($_POST['update_staff_account'])) {
            $name = $_POST['name'];
            $staff_number = $_GET['staff_number'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $agence = $_POST['agence'];
            $profile_pic = $_FILES["profile_pic"]["name"];
            move_uploaded_file($_FILES["profile_pic"]["tmp_name"], "dist/img/" . $_FILES["profile_pic"]["name"]);
            $query = "UPDATE staff SET name=?, phone=?, email=?, agence=?, profile_pic=? WHERE staff_number=?";
            $stmt = $this->mysqli->prepare($query);
            $rc = $stmt->bind_param('ssssss', $name, $phone, $email, $agence, $profile_pic, $staff_number);
            $stmt->execute();
            return $stmt;
        }
        return null;
    }

    public function password_staff() {
        if (isset($_POST['change_staff_password'])) {
            $password = sha1(md5($_POST['password']));
            $staff_number = $_GET['staff_number'];
            $query = "UPDATE agence  SET password=? WHERE  staff_number=?";
            $stmt = $this->mysqli->prepare($query);
            $rc = $stmt->bind_param('ss', $password, $staff_number);
            $stmt->execute();
            return $stmt;
        }
        return null;
    }


    public function new_staff() {
        if (isset($_POST['create_staff_account'])) {
            $name = $_POST['name'];
            $staff_number = $_POST['staff_number'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $password = sha1(md5($_POST['password']));
            $agence = $_POST['agence'];
            $profile_pic = $_FILES["profile_pic"]["name"];
            move_uploaded_file($_FILES["profile_pic"]["tmp_name"], "dist/img/" . $_FILES["profile_pic"]["name"]);
            $query = "INSERT INTO staff (name, staff_number, phone, email, password, agence, profile_pic) VALUES (?,?,?,?,?,?,?)";
            $stmt = $this->mysqli->prepare($query);
            $rc = $stmt->bind_param('sssssss', $name, $staff_number, $phone, $email, $password, $agence, $profile_pic);
            $stmt->execute();
            return $stmt;
        }
        return null;
    }


    public function delete_complaint() {
        if (isset($_GET['deleteReclamation'])) {
            $id = intval($_GET['deleteReclamation']);
            $query = "DELETE FROM reclamations WHERE rec_id = ?";
            $stmt = $this->mysqli->prepare($query);
            $stmt->bind_param('i', $id);
            $stmt->execute();
            $stmt->close();
            return ($stmt);
        }
        return null;
    }


    public function open_complaint() {
        if (isset($_GET['rec_id'])) {
            $complaint_id = $_GET['rec_id'];
            $stmt = $this->mysqli->prepare("SELECT * FROM reclamations WHERE rec_id = ?");
            $stmt->bind_param('i', $complaint_id);
            $stmt->execute();
            $result = $stmt->get_result();
            return ($result);
        }
        return null;
    }
}
