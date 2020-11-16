<?php
include 'connect.php';



?>

!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
  <meta charset="utf-8">
  <meta name="viewport" content="with=device-width,initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="css/bootstrap.min.css" >

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}

body, html {
  height: 100%;
  line-height: 1.8;
}

/* Full height image header */
.bgimg-1 {
  background-position: center;
  background-size: cover;
  background-image: url("https://www.w3schools.com/w3images/mac.jpg");
  min-height: 100%;
}

.w3-bar .w3-button {
  padding: 16px;
}
.container{margin-top: 50px}
table {
  width:60%;
}
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 15px;
  text-align: left;
}
#t01 tr:nth-child(even) {
  background-color: #eee;
}
#t01 tr:nth-child(odd) {
 background-color: #fff;
}
#t01 th {
  background-color: black;
  color: white;
}

</style>
<body>
<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-card" id="myNavbar">
    <a href="#home" class="w3-bar-item w3-button w3-wide">LOGO</a>
    <!-- Right-sided navbar links -->
    <div class="w3-right w3-hide-small">
      <nav>

      <a href="#team" class="w3-bar-item w3-button"></i> Home</a>
      <a href="ritch.php" class="w3-bar-item w3-button"><i class="fa fa-th"></i> Ritch Clients</a>
      <a href="account" class="w3-bar-item w3-button"><i class="fa fa-user"></i> Account</a>
      <a href="logOut.php" class="w3-bar-item w3-button"><i class="fa fa-user"></i> Log out</a>
    </nav>
    </div>
       <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
      <i class="fa fa-bars"></i>
    </a>
  </div>
</div>
<div class="container">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<input type="text" name="i">
	<input type="submit" name="submit" value="submit">

</form>
 <center>
   <table border="1" id="t01">
   <tr>
    <th>no</th>
    <th>CustomerNAme</th>
    <th>Salary</th>
  </tr>

<?php
$i=1;
$id=$_POST['i'];
$sql="SELECT * from customers where customerNumber='$id'";
$result=$con->query($qsl);
while($row=$result->fetch_assoc()){

?>
 <tr>
    <td><?php echo $i++?></td>
      <td>

<?php
        echo $row['customerName'];

?>
        
      </td>
      <td>
<?php
        echo $row['creditLimit'];

?>
        
      </td>

  </tr>
<?php
    }
?>
 </table>
 </center>
</div>

    <script src="js/jquery-3.5.1.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>