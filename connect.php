<?php
$server='localhost';
$user='root';
$pass='';
$db='monday_company';

$con= new mysqli($server,$user,$pass,$db);
if($con->connect_error){

	die($con->connect_error);

}



