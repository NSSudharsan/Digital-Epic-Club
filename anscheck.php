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


if(isset($_POST['Submit']))
{
    $d=$_POST['time'];
    
if(!empty($_POST['g']))
	{
		$count=count($_POST['g']);
		//echo "out of 10, you have selected  ".$count."  options";
		
		$result=0;
		$i=1;
		
		$selected=$_POST['g'];
		
		$query=mysql_query("select * from quiz3");      //get the table value
		while($rows=mysql_fetch_array($query))
		{
			//echo "<br />".$rows['answer'];
			if($rows['answer']==$selected[$i])
			{
				$result++;
			}
			$i++;
		}
}

   $str="insert into result set year='$year',email='$email',name='$name',score='$result',time='$d'";
    $db.mysql_query($str);
}
?> 

<html>
<head>
<title>Quiz Result </title>
    <style type="text/css">
    
        body { 
                    margin:0px;
                    padding:0px;
                    font-family: sans-serif;
                    background-image: url(images/back.jpg);
                    background-blend-mode: darken;
                    background-size: cover;
                }
         .box{
	               position:absolute;
	               top: 363px;
	               left: 50%;
	               transform: translate(-50%,-50%);
	               width: 600px;
	               padding: 40px;
	               background:rgba(200,50,50,1);
	               box-sizing:border-box;
	               box-shadow: 15px 25px rgba(0,0,0,.5);
	               border-radius: 20px;
               }
        .image{
	               width: 250px;
	               height: 250px;
	               border-radius: 20%;
	               position:absolute;
                   top: -90px;
	               left: 450px;
    
                }
        .OBJ-3 { 
                    cursor: pointer;
                    border-radius:20PX;
                    background-color:blueviolet;
                    font-family:sans-serif;
                    font-size:18px;
                    color:#ffffff;
                    font-style:bold;
                    font-variant:small-caps;
                    text-align:center;
                }
        .OBJ-3:hover{
                    cursor: pointer;
                    background:rgb(0,117,0);
                    font-style:oblique;
                    color:black;
                    }
        table{
                    color:black;
                    text-align: center;
                    position: relative;
                    padding: inherit;
                    font-family: sans-serif;
                    font-size: 0.6cm;
                    
            }
    
    </style>
    <script type="application/javascript">
    
    
    </script>
</head>
<body>
     
    <div class="box">
        <img src="images/clip1.png"  class="image">
  
<form id="frame" method=post action="logout.php">
            <fieldset>
                <legend align=center style="background-color: aliceblue; font-size: 20px;border:20px; color: blue;font-family:monospace"><b> CSE Quiz Result:</b></legend>
    <table id=myTable>
        
        <tr><td width="589"><?php echo "out of 20 , you have selected  ".$count."  options"; ?></td>
      </tr>
        <tr><td height="32"><?php echo "<b>your total Score is :" .$result." with time :" .$d;"</b>" ?></td>
      </tr>
        
    </table>
                <center><input type="submit" class="OBJ-3" value="OK" ></center>
            </fieldset>
        </form>
    </div>
</body>
</html>


 
