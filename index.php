<?php

session_start();

require 'twconfig.php';
require 'twitteroauth/autoload.php';

use Abraham\TwitterOauth\TwitterOauth;

if (isset($_SESSION['tw_access_token']) && !empty($_SESSION['tw_access_token'])) {
    
    $connection = new TwitterOauth(CONSUMER_KEY, CONSUMER_SECRET, $_SESSION['tw_access_token']['oauth_token'],
    $_SESSION['tw_access_token']['oauth_token_secret']);

    if (isset($_POST['msg']) && !empty($_POST['msg'])) {
        $connection->post('statuses/update', array(
            'status' => $_POST['msg']
        ));

        echo 'tweet publicado com sucesso!';
    }

} else {
    echo '<a href="login.php">Login com Twitter</a>';
}

?>

<form action="" method="post">
    <input type="text" name="msg" id=""><br><br>

    <input type="submit" value="Enviar">
</form>