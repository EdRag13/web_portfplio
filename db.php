<?php
$servername="localhost"; //127.0.0.1
$username="root";        //mysql phpmyadmin felh.név
$password="";            //jelszó (nincs)  
$dbname="web_portfolio";         //amit létrehoztunk adatbázist 

//Kapcsolat létrehozás
$conn=new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error)
{
	die("Kapcsolati hiba!".$conn->connect_error);
}
?>