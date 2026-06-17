<?php
class Connect extends PDO{
    public function __construct(){
        parent::__construct("mysql:host=localhost;dbname=sonic_scholar", 'root','',
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    }
}

class Controller{
    //check if user is Logged in or not
    function checkUserStatus($id,$session){
        $db = new Connect;
        $user = $db->prepare("SELECT ID_USER FROM user WHERE ID_USER = :id AND Session = :Session");
        $user -> execute([
            ':id' => intval($id),
            ':Session' => $session
        ]);
        $userInfo = $user -> fetch(PDO::FETCH_ASSOC);
        if(!$userInfo["ID_USER"]){
            return FALSE;
        }
        else{
            return TRUE;
        }
    }

    //generate session
    function generateCode($length){
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
        $code = "";
        $clean = strlen($chars) - 1;
        while(strlen($code) < $length){
            $code .= $chars[mt_rand(0, $clean)];
        }
        return $code;
    }

    //insert data
    function insertData($data){
        $db = new Connect;    
        $checkUser = $db->prepare("SELECT * FROM user WHERE Email=:Email");
        $checkUser->execute(['Email' => $data["Email"]]);
        $info = $checkUser->fetch(PDO::FETCH_ASSOC);
        
        if(!$info['ID_USER']){
            $session = $this -> generateCode(10);
            $H_session = password_hash($session, PASSWORD_DEFAULT);
            $password = $this -> generateCode(5);
            $H_password = password_hash($password, PASSWORD_DEFAULT);
            $insertUser = $db->prepare("INSERT INTO user (Username, Avatar, Email, Password, Session) VALUES (:f_name, :Avatar, :Email, :Password, :Session)");
            $insertUser -> execute([
                ':f_name'   => $data["givenName"],
                ':Avatar'   => $data["Avatar"],
                ':Email'    => $data["Email"],
                ':Password' => $H_password,
                ':Session'  => $H_session
            ]);

            if($insertUser){
                setcookie("id", $db->lastInsertId(), time()+60*60*24*30, "/", NULL);
                setcookie("session", $H_session, time()+60*60*24*30, "/", NULL);
                header('Location: SS_home.php');
                exit();
            }
            else{
                return "Error Inserting User";
            }
        }
        else{
            setcookie("id", $info['ID_USER'], time()+60*60*24*30, "/", NULL);
            setcookie("session", $info['Session'], time()+60*60*24*30, "/", NULL);
            header('Location: SS_home.php');
            exit();
        }   
    }
}
?>