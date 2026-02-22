<?php
    require_once('class/controller.Class.php');
    require_once('google-api/google_config.php');

    if(isset($_GET["code"])){
        $token = $client->fetchAccessTokenWithAuthCode($_GET["code"]);
    }
    else{
        header('Location: register.php');
    }

    if(isset($token["error"]) != "invalid_grant"){
    
        $oAuth = new Google_Service_Oauth2($client);
        $userData = $oAuth->userinfo_v2_me->get();

        //insert data
        $Controller = new Controller;
        echo $Controller->insertData(array(
            'Email' => $userData['email'],
            'Avatar' => $userData['picture'],
            'picture' => $userData['picture'],
            'familyName' => $userData['familyName'],
            'givenName' => $userData['givenName'],
        ));
    }else{
        header('Location: register.php');
        exit();
    }
?>