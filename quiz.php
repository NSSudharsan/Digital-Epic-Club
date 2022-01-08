<?php

	$database = "dec";
	$user = "root";
	$pass = "";
	$hostname = "localhost";
	$table = "quiz2";
	$db = mysql_connect("$hostname", "$user","$pass");
	mysql_select_db("$database",$db);
	$i=1;

	session_start();
	$name=$_SESSION['name'];

    
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<head>	<title>Quiz</title>
				
    <style type="text/css">
    
        body { 
                    
                    font-family: sans-serif;
                    background-image:url(css/background.png);
                    background-size: cover;
            
                }
				
     .box{
                    position:absolute;
                    top: 300%;
                    left: 50%;
                    transform: translate(-50%,-50%);
                    width: 800px;
                    padding: 40px;
                    background:rgba(65,166,10,.5) ;
                    box-sizing:border-box;
                    box-shadow: 15px 25px rgba(0,0,0,.5);
                    border-radius: 20px;
               }
        .image{
	               width: 280px;
	               height: 290px;
	               border-radius: 20%;
	               position:absolute;
                   top: -90px;
	               left: 580px;
    
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
        #r1:hover{
            cursor: pointer;
            
        }
        .qus{
                    font-family: times new roman;
                    font-size: 20px;
                    color: coral;
            
        }
        .op{
            font-family:monospace;
            font-size: 18px;
            color: white;
            font-style: oblique;
            
        }
        a{
            color:darkblue;
            font-family:  times new roman;
            font-size: 18px;
        }
        
        #timer{
                font-family: monospace;
                font-size: 20px;
                color: chartreuse;
                border: 3px solid red;
                width:100;
                padding: 1em;
                background-color: black;
                font-style: bold;
        }
        #clock{
            position: fixed;
        }
        td{
            color:black;
            font-family: times new roman;
        }
#introduction {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 500%;
            background-color: #4CAF50;
        }
#introduction-message {
            padding: 2em;
            width: 30em;
            margin: 220px auto 0 auto;
            background-color: #fff;
            border: 2px solid blue;
            border-width: thick;
        }

#introduction-message > p {
            margin-top: 0.4em;
            margin-bottom: 1.3em;
        }
#start-new-game {
            font-size: 15px;
            border: 2px solid #4CAF50;
            border-width: medium;
            color: black;
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
            border-radius: 10px;
	        position:absolute;
            padding: 0.2em;
        }
#start-new-game:hover {
            background-color: #4CAF50; /* Green */
            color: white;
            font-style: italic;
            cursor: pointer;
        }
        #num{
            color: aliceblue;
        }
		
</style>

<script type="text/javascript" src="js/event.js"></script>
    
<script type="text/javascript"> //script for timer

    function mytimer(){ 
        
    var timerVar = setInterval(countTimer, 1000);
    var totalSeconds = 0;
    function countTimer() {
       ++totalSeconds;
       var hour = Math.floor(totalSeconds /3600);
       var minute = Math.floor((totalSeconds - hour*3600)/60);
       var seconds = totalSeconds - (hour*3600 + minute*60);
       if(hour < 10)
         hour = "0"+hour;
       if(minute < 10)
         minute = "0"+minute;
       if(seconds < 10)
         seconds = "0"+seconds;
        var time=hour + ":" + minute + ":" + seconds;
       document.getElementById("timer").innerHTML= time;
        document.getElementById("hid").innerHTML="<input type='hidden' name='time' value='"+time+"'/>";
    
    }

    }
</script>
    
    <script>//introduction the Quiz.

function init() {
  document.getElementById('start-new-game').addEventListener('click', function() {
    document.getElementById('introduction').style.display = 'none';
  }, false);
}
window.addEventListener('load', init, false);

</script>

		</head>
<body>
        
  <!-- from for the quiz -->    
<!--show the timer-->
  <div id="clock">
    <img alt="timer" src="images/timer.png" style="padding:0.2em;">
      <div id="timer">00:00:00</div>   
    </div>
    
	<div class="box">
			@<lable style="font-family:Times New Roman;color:white;font-size:25px"><b><?php echo $name; ?></b></lable><!--name for the participant-->
			<img src="Snow_Occasional.ico" class="image">
        
			<form id="frame" method=post action="anscheck.php">
            <fieldset>
            <legend align=center style="background-color: aliceblue; font-size: 20px;border:20px; color: blue;font-family:monospace"> CSE Quiz</legend>
		<table id=myTable style="color:black">
		
<?php 
	$result=mysql_query("select * from quiz3");         //get tha table data
	while($row=mysql_fetch_array($result))
	{
?>

<!--show questions-->
            <tr><td><div class="qus"><b><?php echo $row['q_no'];?>. <?php echo $row['question']; ?></b></div></td></tr>

<!--choice 1-->
<tr><td><input type = "radio" value="<?php echo $row['ch1'];?>" name = "g[<?php echo $i; ?>]" id="r1" ><lable class="op"><?php echo $row['ch1'];?></lable></td>
</tr>

<!--choice 2-->
<tr><td><input type = "radio" value ="<?php echo $row['ch2'];?>" name = "g[<?php echo $i; ?>]" id="r1" ><lable class="op"><?php echo $row['ch2'];?></lable></td>
</tr>

<!--choice 3-->
<tr><td><input type = "radio" value ="<?php echo $row['ch3'];?>" name = "g[<?php echo $i; ?>]" id="r1" ><lable class="op"><?php echo $row['ch3']; ?></lable></td>
</tr>
<!--choice 4-->
<tr><td><input type = "radio" value ="<?php echo $row['ch4'];?>" name = "g[<?php echo $i; ?>]" id="r1" ><lable class="op"><?php echo $row['ch4']; ?></lable><br /><br /></td>
</tr>

<tr></tr>
<?php
$i++;
}
?>
</table>
              <center>
                  <div id=butt><input type="submit" class="OBJ-3" name="Submit"></div>
                  <div id=but></div>
               </center>
            </fieldset>
       
                <div id="hid"></div>
		<a href="index.html">Log out</a>
    </form>
    </div>
    <div id="introduction">
      <div id="introduction-message">
        <h1>Quiz</h1>
        <p>If you start the Quiz then click the button.</p>
        <input id="start-new-game" type="button" value="Start game" onclick="mytimer()" />
      </div>
    </div>
    
</body>
</html>
