<?php
//start session
session_start();
//db connect-------------->
include 'connect.php';
//check-session-------->
if(isset($_SESSION['user']))
{
	header('Location:home.php');
}

if(!isset($_SESSION['user']))
{
	header('Location:forms/index.php');
}


function clean_data($input){

	$input=htmlspecialchars($input);
	$input=trim($input);

	return $input;
}
//post data
$name=$_POST['name'];
$password=$_POST['pass'];

//clean data
$name=clean_data($name);
$password=clean_data($password);

//validate data

$is_right_date=TRUE;

if(strlen($name)>100)
{
	$_SESSION['alert']='';
	$is_right_date=False;
}
if(empty($password))
{
	$_SESSION['alerts']='';
	$is_right_date=False;
}

//db-check----------------->
if($is_right_date)
{
		$sql="SELECT * from customers where customerName = '$name' and password='$password'";
		$result=$con->query($sql);
	if ($result->num_rows>0)
	 {

		$row=$result->fetch_assoc();
		$id=$row['customerNumber'];
		$_SESSION['user']=$id;

		header('location:home.php');
	}
	else
	{
		$_SESSION['error']='';

		echo '<script>window.open("forms","_self")</script>';
      }
  

}  


