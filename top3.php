<?php
include 'connect.php';

//session------------------->
session_start();
  if(!isset($_SESSION['user']))
  {
      header('Location:forms');
  }

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

      <a href="home.php" class="w3-bar-item w3-button"></i> Home</a>
      <a href="ritch.php" class="w3-bar-item w3-button"><i class="fa fa-th"></i> Ritch Clients</a>
      <a href="customers.php" class="w3-bar-item w3-button"><i class="fa fa-th"></i> Customers</a>
      <a href="orders.php" class="w3-bar-item w3-button"><i class="fa fa-th"></i> Orders</a>
      <a href="bestSelles.php" class="w3-bar-item w3-button"><i class="fa fa-th"></i> best-selles</a>
      <a href="search.php" class="w3-bar-item w3-button"><i class="fa fa-th"></i> search</a>
      <a href="city.php" class="w3-bar-item w3-button"><i class="fa fa-th"></i> City</a>
      <a href="largPro.php" class="w3-bar-item w3-button"><i class="fa fa-th"></i> Larg-Pro</a>
      <a href="top3.php" class="w3-bar-item w3-button"><i class="fa fa-th"></i> Top-3</a>
      <a href="proDt.php" class="w3-bar-item w3-button"><i class="fa fa-th"></i>pro-Details</a>
      <a href="employee.php" class="w3-bar-item w3-button"><i class="fa fa-th"></i> emp</a>

            <a href="logOut.php" class="w3-bar-item w3-button"><i class="fa"><span><svg width="2em" height="1.3em" viewBox="0 0 15 15" class="bi bi-box-arrow-in-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/>
  <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
</svg></span></i> Log out</a>
    </nav>
    </div>
       <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
      <i class="fa fa-bars"></i>
    </a>
  </div>
</div>
<div class="container">

<center>




<!-- Select city--------------------------->
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<select name="city" style="padding: 5px">
   <option >
<?php 
    
    if(isset($_POST['city']))
    {
        echo $_POST['city']; 
     }?>
    </option>

<?php
  $sql="SELECT distinct city from customers  ";
  
  $result=$con->query($sql);
  while($row=$result->fetch_assoc()){
  $city=$row['city'];
?>
  <option value="<?php echo $city;?>"  >

<?php echo $city; ?>
    </option>
<?php
  }
?>
</select>
<input type="submit" name="submit" class="sub">
  </form>
<!--show clients------------------>

<?php
    if(isset($_POST['submit'])){?>
  <table border="1" id="t01">
    <tr>
        <th>no</th>
        <th>customer Name</th>
        <th>credit</th>
    </tr>

<?php
  $i=1;
  $city=$_POST['city'];
  $sql="SELECT customerName,creditLimit from customers 
  where city ='$city'
  order by creditLimit DESC 
  limit 3";
  $result=$con->query($sql);
  while($row=$result->fetch_assoc()){

?>
 <tr>
    <td><?php echo $i++?></td>
      <td><?php echo $row['customerName'];?></td>
      <td><?php echo $row['creditLimit'];?> </td>
  </tr>
<?php
    }
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