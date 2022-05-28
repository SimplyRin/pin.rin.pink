<?php

session_start();

header("Content-type: text/html; charset=utf-8"); 
 
//インクルード
require_once 'config.php';
require "vendor/autoload.php";

use Abraham\TwitterOAuth\TwitterOAuth;

if (empty($_SESSION['twOauthToken']) || empty($_SESSION['twOauthTokenSecret']) || empty($_REQUEST['oauth_token']) || empty($_REQUEST['oauth_verifier'])){
		echo '認証に失敗しました。001';
		 header("Location: /fail.php?code=001");
		exit;
}

if($_SESSION['twOauthToken'] !== $_REQUEST['oauth_token']) {
 echo '認証に失敗しました。002';
  header("Location: /fail.php?code=002");
 exit;
}

//取得したoauthトークンでTwitterOAuthクラスをインスタンス化
$objTwitterConnection = new TwitterOAuth (
  $sTwitterConsumerKey,
  $sTwitterConsumerSecret,
  $_SESSION['twOauthToken'],
  $_SESSION['twOauthTokenSecret']
);

//アクセストークンの取得
$_SESSION['twAccessToken'] = $objTwitterConnection->oauth("oauth/access_token", array("oauth_verifier" => $_REQUEST['oauth_verifier']));

header("Location: pin.php")
?>
