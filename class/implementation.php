<?php
    include 'web_client.php';
    $client = new JSON_WebClient("http://localhost/jaguarlabs/login_access_token/class/server.php");
    $client->call("getServerTime", array("format"=>"d/m/o H:i:s"), "onSucceededCallback", "onErrorCallback");
    
    function onSucceededCallback($result)
    {
        print $result;
    }
    
    function onErrorCallback($error)
    {
        print "Error: ".$error->{"message"};
    }
?>