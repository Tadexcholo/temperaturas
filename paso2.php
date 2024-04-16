<?php
require "vendor/autoload.php";

$options = array(
    "cluster" => "us2",
    "useTLS" => true
);  
$pusher = new Pusher\Pusher(
    "34091ea15b1a362fb38d",
    "9a986831a832e499c9e4",
    "1767967",
    $options
);
    $pusher->trigger("my-channel", "my-event", $_POST);
?>