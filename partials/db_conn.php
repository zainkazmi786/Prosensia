<?php
$server="localhost";
$username="root";
$password="";
$dbname="onlineinternship";

$conn=mysqli_connect($server,$username,$password,$dbname);

if(!$conn)
{
    die("Error".mysqli_connect_error());
}


?>