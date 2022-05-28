<?php

session_start();

header("Content-type: text/html; charset=utf-8");

require_once 'config.php';
require "vendor/autoload.php";

use Abraham\TwitterOAuth\TwitterOAuth;


$url = $_POST['url'];
$url = trim($url);

if (str_starts_with($url, 'https://mobile.twitter.com/') || str_starts_with($url, 'https://twitter.com/')) {
	$objTwitterConnection = new TwitterOAuth($sTwitterConsumerKey, $sTwitterConsumerSecret);
	$aTwitterRequestToken = $objTwitterConnection->oauth('oauth/request_token', array('oauth_callback' => $sTwitterCallBackUri));

	$_SESSION['twOauthToken'] = $aTwitterRequestToken['oauth_token'];
	$_SESSION['twOauthTokenSecret'] = $aTwitterRequestToken['oauth_token_secret'];
	$_SESSION['url'] = $url;

	$sTwitterRequestUrl = $objTwitterConnection->url('oauth/authenticate', array('oauth_token' => $_SESSION['twOauthToken']));
 
	//Twitter認証画面へリダイレクト
	header('Location: ' . $sTwitterRequestUrl);

	// print("true");
	exit;
}

?>
