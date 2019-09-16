<?php

session_start();


require 'twconfig.php';
require 'twitteroauth/autoload.php';

use Abraham\TwitterOauth\TwitterOauth;

$connection = new TwitterOauth(CONSUMER_KEY, CONSUMER_SECRET);

$request_token = $connection->oauth('oauth/request_token', array(
    'oauth_callback' => OAUTH_CALLBACK
));


$_SESSION['oauth_token'] = $request_token['oauth_token'];

$_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];

$url = $connection->ulr('oauth/authorize', array(
    'oauth_token' => $request_token['oauth_token']
));

header("Location: " . $url);


