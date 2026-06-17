<?php
 include 'auth_id.php';
 require_once "vendor/autoload.php";

 // Initialize the Google client
 $client = new Google\Client;

 // Set client credentials
 $client->setClientId($id);
 $client->setClientSecret($secret);
 $client->setRedirectUri($url);

 // Set scopes
 $client->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");


 // Create Google login URL
 $url = $client->createAuthUrl();    
?>