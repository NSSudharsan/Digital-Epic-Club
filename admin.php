<?php
$con= new mysqli('localhost','root','','dec')or die("Could not connect to mysql".mysqli_error($con));
  $i=1;
?>
<html lang="en">
    <head><title>admin</title>
    <link rel="stylesheet" href="scripts/bootstrap/bootstrap.min.css">
		<link rel="stylesheet" href="scripts/ionicons/css/ionicons.min.css">
		<link rel="stylesheet" href="css/form.css">
        
        <style type="text/css">
         body { 
                    
                   position: fixed;
                    width:100%;
                    font-family: sans-serif;
                    background-image:url(css/images.png);
                    background-size: cover;
             
                }
            th{
                position:inherit;
                text-align:center;
            }
            td{
                color: darkgoldenrod;
            }
            td:hover{
                color:blue;
                font-style: bold;
            }
        .scrollable {
        height: 700px;
        overflow-y: scroll;
        position: relative;
            
      }
            tr{
                font-family: times new romen;
                font-size: 20px;
                font-style: bold;
            }
        </style>
        
    </head>
    <meta charset="utf-8">
    <body>
         
            <h4 style="font-family: Noto Sans;color:red; font-size:1cm;position:absolute;">Techno_Quiz System</h4>
        <form style="padding:10px 450px;scroll-behavior: smooth;position:fixed;">
        <div class="scrollable">
        <table class="table table-hover " style="width:50%; text-align:center;">
           <thead class="black white-text">
            <tr style="background-color:#4caf50;"><th>S_NO</th><th>YEAR</th><th>NAME</th><th>E-MAIL</th><th>SCORE</th><th>TIME</th></tr>
            </thead>

<?php	$sql="select * from result ORDER BY score DESC,Time ASC";
	$r=mysqli_query($con,$sql)or die("Could not connect to mysql".mysqli_error($con));
	while($row=mysqli_fetch_array($r,MYSQLI_BOTH))
	{
?>
            
        <tr><td><?php echo $i++ ?>.</td><td><?php echo $row['year'] ?></td><td><?php echo $row['name'] ?></td><td><?php echo $row['email'] ?></td><td><?php echo $row['score'] ?></td><td><?php echo $row['Time'] ?></td></</tr>
<?php } ?>
                    
        </table>
              </div>  
            <a href="index.html">Log out</a>
        </form>
          
</body>
</html>