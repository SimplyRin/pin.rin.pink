<?php

session_start();

header("Content-type: text/html; charset=utf-8"); 

//インクルード
require_once 'config.php';
require "vendor/autoload.php";

use Abraham\TwitterOAuth\TwitterOAuth;

### アクセストークン確認
if(empty($_SESSION['twAccessToken'])){
 echo '認証に失敗しました。003';
 header("Location: /fail.php?code=003");
 exit;
}

$objTwitterConnection = new TwitterOAuth (
 $sTwitterConsumerKey,
 $sTwitterConsumerSecret,
 $_SESSION['twAccessToken']['oauth_token'],
 $_SESSION['twAccessToken']['oauth_token_secret']
);

// 認証終了

$id = explode("/", $_SESSION['url'])[5];
$id = explode("?", $id)[0];

if (empty($id)){	
	 header("Location: /fail.php?code=004");
	 exit;
}

$objTwitterConnection->post('statuses/unretweet', ['id' => $id]);

// リツイート
$tweet = $objTwitterConnection->post('statuses/retweet', ['id' => $id]);

$rtid = $tweet->id_str;

// PIN
$pin = $objTwitterConnection->post('account/pin_tweet', ['tweet_mode' => 'extended', 'id' => $rtid]);

if (empty($pin->pinned_tweets)) {
	// FAIL
	header("Location: /fail.php?code=005");	
	exit;
}

// OK
header("Location: /done.php");	

?>
