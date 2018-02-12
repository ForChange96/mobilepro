<?php
    include_once "Facebook/autoload.php";
    $fb = new \Facebook\Facebook([
        'app_id' => '179596892805880', // Replace {app-id} with your app id
        'app_secret' => 'dba4dfe51d3bc3ac9e303cbe70c3e859',
        'default_graph_version' => 'v2.12',
    ]);
    $helper=$fb->getRedirectLoginHelper();
    if (isset($_GET['state'])) {
        $helper->getPersistentDataHandler()->set('state', $_GET['state']);
    }
?>