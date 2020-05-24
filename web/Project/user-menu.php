<html>
<title>User Menu</title>
<body>
 <?php
     session_start();
     $username = $_SESSION['username'];
 ?>
 
 <div style="text-align:center"><h1>User Menu</h1></div>
 <br/>
 
 <div style="font-weight:bold"> Welcome <?php echo $username ?> </div>
 <a href="search-books.php">Search for a Book</a>
  
 <div style="text-align: right"><a href="logout.php">Logout</a></div>
 
 <?php
 if(!isset($_SESSION['username']))
 {
     header("location:login-form.php");
 }
 ?>
</body>
</html>