<?php
$server = "localhost";
$user = "root";
$password= "";
$db="sopas";
$conn = new mysqli($server,$user,$password,$db);

if ($conn->connect_error){
    die("Error de conexion: " .$conn->connect_error);
}


?>