<?php

$host="sql309.byethost7.com"; // Host name 
$username="b7_18749088"; // Mysql username 
$password="matthew811"; // Mysql password 
$db_name="b7_18749088_login"; // Database name 
$tbl_name="user-logins"; // Table name 

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

// username and password sent from form 
$username=$_POST['username']; 
$pass=$_POST['pass']; 

// To protect MySQL injection (more detail about MySQL injection)
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);
$sql="SELECT * FROM $tbl_name WHERE username='$username' and password='$password'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched $username and $password, table row must be 1 row
if($count==1){

// Register $myusername, $mypassword and redirect to file "login_success.php"
session_register("username");
session_register("password"); 
session_register("flname");
header("location:index.php");
}
else {
echo "Wrong Username or Password";
}
?>