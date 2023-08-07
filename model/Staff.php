<?php

namespace GestionReclam;


include_once 'Bank.php';

use GestionReclam\Db_connection;

class Staff
{
    private $mysqli;

    public function __construct() {
        $dbConnection = new Db_connection();
        $this->mysqli = $dbConnection->database_connection();
    }

    public  function login(){
        if (isset($_POST['login'])) {
            $email = $_POST['email'];
            $password = sha1(md5($_POST['password']));
            $stmt = $this->mysqli->prepare("SELECT email, password, staff_id  FROM staff  WHERE email=? AND password=?");
            $stmt->bind_param('ss', $email, $password);
            $stmt->execute();
            $stmt->bind_result($email, $password, $staff_id);
            $rs = $stmt->fetch();
            if($rs){
                $_SESSION['staff_id'] = $staff_id;
                return $rs;
            }
        }
        return null;
    }

    public function check_login(){
        if(strlen($_SESSION['staff_id'])==0)
        {
            $host = $_SERVER['HTTP_HOST'];
            $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
            $extra="staff.php?page=login";
            $_SESSION["staff_id"]="";
            header("Location: http://$host$uri/$extra");
        }

    }


    public function get_profile_picture(){
        $staff_id = $_SESSION['staff_id'];
        $ret = "SELECT * FROM  staff  WHERE staff_id = ? ";
        $stmt = $this->mysqli->prepare($ret);
        $stmt->bind_param('i', $staff_id);
        $stmt->execute();
        $res = $stmt->get_result();
        return $res;
    }

    public function get_all_clients(){
        $ret = "SELECT * FROM  clients ORDER BY RAND() ";
        $stmt = $this->mysqli->prepare($ret);
        $stmt->execute();
        $res = $stmt->get_result();
        return $res;
    }



    public function get_by_rate()
    {
        $query = "SELECT rec_rating, COUNT(*) as count FROM reclamations GROUP BY rec_rating";
        $stmt = $this->mysqli->prepare($query);
        $stmt->execute();
        $res = $stmt->get_result();
        return $res;
    }

    public function get_by_status()
    {
        $query = "SELECT rec_status, COUNT(*) as count FROM reclamations GROUP BY rec_status";
        $stmt = $this->mysqli->prepare($query);
        $stmt->execute();
        $res = $stmt->get_result();
        return $res;
    }
    public function get_type_reclamation(){
        $result = "SELECT count(*) FROM types_reclamation";
        $stmt = $this->mysqli->prepare($result);
        $stmt->execute();
        $stmt->bind_result($RecTypes);
        $stmt->fetch();
        $stmt->close();
        return $RecTypes;
    }


    public function get_today_staff_complaints(){
        $today = date('Y-m-d');
        $staff_id = $_SESSION['staff_id'];
        $query = "SELECT DISTINCT r.* FROM reclamations r JOIN staff s ON r.rec_type = s.direction WHERE DATE(r.created_at) = ? AND s.staff_id=?;";
        $stmt = $this->mysqli->prepare($query);
        $stmt->bind_param('ss', $today, $staff_id);
        $stmt->execute();
        $res = $stmt->get_result();
        return $res;
    }

    public function get_nbr_clients(){
        $result = "SELECT count(*) FROM clients";
        $stmt = $this->mysqli->prepare($result);
        $stmt->execute();
        $stmt->bind_result($Clients);
        $stmt->fetch();
        $stmt->close();
        return $Clients;
    }

    public function get_nbr_relamations(){
        $result = "SELECT count(*) FROM reclamations";
        $stmt = $this->mysqli->prepare($result);
        $stmt->execute();
        $stmt->bind_result($complaints);
        $stmt->fetch();
        $stmt->close();
        return $complaints;
    }

    public function update_profile(){
        if (isset($_POST['update_staff_account'])) {
            $name = $_POST['name'];
            $staff_id = $_SESSION['staff_id'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $agence = $_POST['agence'];
            //$profile_pic = $_FILES["profile_pic"]["name"];
            //move_uploaded_file($_FILES["profile_pic"]["tmp_name"], "dist/img/" . $_FILES["profile_pic"]["name"]);
            $query = "UPDATE staff SET name=?, phone=?, email=?, agence=? WHERE staff_id=?";
            $stmt = $this->mysqli->prepare($query);
            $rc = $stmt->bind_param('ssssi', $name, $phone, $email, $agence, $staff_id);
            $stmt->execute();
            return $stmt;
        }
        return null;
    }


    public function change_pass()
    {
        if (isset($_POST['change_staff_password'])) {
            $oldpassword = sha1(md5($_POST['oldpassword11']));
            $writtenpass = $_POST['password'];
            $confirmpass = $_POST['passwordconfirm11'];
            $staff_id = $_SESSION['staff_id'];

            if ($writtenpass === $confirmpass) {
                $query = "SELECT password FROM Staff WHERE staff_id=?";
                $stmt = $this->mysqli->prepare($query);
                $stmt->bind_param('i', $staff_id);
                $stmt->execute();
                $res = $stmt->get_result();

                if ($res && $res->num_rows === 1) {
                    $row = $res->fetch_assoc();
                    $hashedPassword = $row['password'];

                    if ($hashedPassword === $oldpassword) {
                        $newPassword = sha1(md5($writtenpass));
                        $query = "UPDATE Staff SET password=? WHERE staff_id=?";
                        $stmt = $this->mysqli->prepare($query);
                        $stmt->bind_param('si', $newPassword, $staff_id);
                        $stmt->execute();
                        return $stmt;
                    }
                }
            }
        }
        return null;
    }

    public function change_pass1(){

        if (isset($_POST['change_staff_password'])) {
            $writtenpass = $_POST['password'];
            $staff_id = $_SESSION['staff_id'];
            $newPassword = sha1(md5($writtenpass));
            $query = "UPDATE Staff SET password=? WHERE staff_id=?";
            $stmt = $this->mysqli->prepare($query);
            $stmt->bind_param('si', $newPassword, $staff_id);
            $stmt->execute();
            return $stmt;}
        return null;
    }



    public function AllReclam(){
        $staff_id = $_SESSION['staff_id'];
        $query = "SELECT DISTINCT r.* FROM reclamations r JOIN staff s ON r.rec_type = s.direction WHERE s.staff_id=?;";
        $stmt = $this->mysqli->prepare($query);
        $rc = $stmt->bind_param('i', $staff_id);
        $stmt->execute();
        $res = $stmt->get_result();
        return $res;
    }

    public function AllReclam1()
    {
        $staff_id = $_SESSION['staff_id'];
        $query = "SELECT DISTINCT r.* FROM reclamations r JOIN staff s ON r.rec_type = s.direction WHERE s.staff_id=?;";
        $stmt = $this->mysqli->prepare($query);
        $rc = $stmt->bind_param('i', $staff_id);
        $stmt->execute();
        $res = $stmt->get_result();
        $complaints = $res->fetch_all(MYSQLI_ASSOC);
        return $complaints;
    }

    public function open_reclam()
    {
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

    public function delete_complaint(){

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



    public function get_rec_types()
    {
        $typesQuery = "SELECT * FROM types_reclamation";
        $typesResult = $this->mysqli->query($typesQuery);
        $typesOptions = "";
        while ($row = $typesResult->fetch_assoc()) {
            $typesOptions .= "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
        }
        return $typesOptions;
    }


    public function redirect_complaint()
    {
        if (isset($_GET['Redirect'])) {
            $id = intval($_GET['Redirect']);
            $new_direction = $_POST['reclamation_type'];
            $treat_message = 'Votre réclamation a été redirigée vers la direction : ' . $new_direction . '.';
            $current_time = date('Y-m-d H:i:s');

            // Update the reclamations table with the new values
            $query = "UPDATE reclamations SET rec_type=?, Treat_message=?, treated_at=? WHERE rec_id=?";
            $stmt = $this->mysqli->prepare($query);
            $stmt->bind_param('sssi', $new_direction, $treat_message, $current_time, $id);
            $stmt->execute();
            $stmt->close();

            return $stmt;
        }
        return null;
    }


    public function upgrade_complaint()
    {
        if (isset($_GET['Boss'])) {
            $id = intval($_GET['Boss']);
            $treat_message = 'Votre réclamation a été redirigée vers l administration .';
            $current_time = date('Y-m-d H:i:s');
            $query = "UPDATE reclamations SET Treat_message=?, treated_at=?, send_to_boss=TRUE WHERE rec_id=?";
            $stmt = $this->mysqli->prepare($query);
            $stmt->bind_param('ssi',  $treat_message, $current_time, $id);
            $stmt->execute();
            $stmt->close();
            return $stmt;
        }
        return null;
    }



    public function response_complaint()
    {
        if (isset($_GET['Respond'])) {
            $id = intval($_GET['Respond']);
            $treat_message= $_POST['response_message'];
            $current_time = date('Y-m-d H:i:s');
            $query = "UPDATE reclamations SET Treat_message=?, treated_at=? WHERE rec_id=?";
            $stmt = $this->mysqli->prepare($query);
            $stmt->bind_param('ssi',  $treat_message, $current_time, $id);
            $stmt->execute();
            $stmt->close();
            return $stmt;
        }
        return null;
    }


    public function Close_complaint()
    {
        if (isset($_GET['Close'])) {
            $id = intval($_GET['Close']);
            $current_time = date('Y-m-d H:i:s');
            $closed_status = "Closed";
            $treat_message="Votre Reclamation a été rejetée.";
            $query = "UPDATE reclamations SET Treat_message=?, treated_at=?, rec_status=? WHERE rec_id=?";
            $stmt = $this->mysqli->prepare($query);
            $stmt->bind_param('sssi',  $treat_message, $current_time, $closed_status, $id);
            $stmt->execute();
            $stmt->close();
            return $stmt;
        }
        return null;
    }





}