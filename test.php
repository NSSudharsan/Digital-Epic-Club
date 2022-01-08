<?php 
	
	$database = "dec";
  	$user = "root";
	$pass = "";
	$hostname = "localhost";
	$db = mysql_connect("$hostname", "$user","$pass");
	mysql_select_db("$database",$db);
    $count=0;
    $result=0;


session_start();  
 $name=$_SESSION["name"];
 $email=$_SESSION["email"];
 $year=$_SESSION["year"];
 
echo $name,$email,$year;
if(isset($_POST['Submit']))
{
    $t=$_POST["mytimer"];
    echo $t;
}

?> 