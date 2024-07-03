<?php

$request=$_SERVER['REQUEST_URI'];
$router=$request;

if ($router=='/')
{
    include "dashboard.php";
}
elseif ($router=='/signin') {
    include "signin.php";
}

?>