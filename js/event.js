
        var i=1, num_Of_Question=5;
        questions = new Array() 
        questions[1]="The term Computer is derived from..........";
        questions[2] ="Who is the father of Computer?";
        questions[3] ="Which of the following controls the process of interaction between the user and the operating system?";
        questions[4] ="Which device is required for the Internet connection?";
        questions[5] ="VGA is..................";

        answerA=new Array()
        answerA[1]="Latin";
        answerA[2]="Allen Turing";
        answerA[3]="Platform";
        answerA[4]="Joystick";
        answerA[5]="Video Graphics Array";
        
        answerB=new Array()
        answerB[1]="German";
        answerB[2]="Simur Cray";
        answerB[3]="User interface";
        answerB[4]="Modem";
        answerB[5]="Visual Graphics Array";
        
        answerC=new Array()
        answerC[1]="French";
        answerC[2]="Charles Babbage";
        answerC[3]="Language translator";
        answerC[4]="CD Drive";
        answerC[5]="Video Graphics Adapter";
        
        rightAnswer=new Array()
        rightAnswer[1]=1;
        rightAnswer[2]=3;
        rightAnswer[3]=2;
        rightAnswer[4]=2;
        rightAnswer[5]=3;
        
        var score=0;
        
        function nextQuestion()
    {

            var radios = document.getElementsByName("quiz");
            var option;

        for (var j = 0; j < radios.length; j++) {       
        if (radios[j].checked) {
           	option=radios[j].value;
		radios[j].checked=false;
            	break;
        }
        }

	   if(option==rightAnswer[i])
	   {
		score=score+1;
		
       }
	   i++;
	   if(i>num_Of_Question)
	   {
	       alert("This is last Question");
	   i--;
	   }	
	   var x=document.getElementById('myTable').rows
       var y=x[0].cells
    	   y[0].innerHTML=i + ".\t";
	       y[1].innerHTML=questions[i];
	       getOptionA();
    }
function getOptionA()
{
    var x=document.getElementById('myTable').rows
    var y=x[1].cells
        y[1].innerHTML=answerA[i];
        getOptionB();
}
function getOptionB()
{
    var x=document.getElementById('myTable').rows
    var y=x[2].cells
        y[1].innerHTML=answerB[i];
        getOptionC();
}
function getOptionC()
{
    var x=document.getElementById('myTable').rows
    var y=x[3].cells
        y[1].innerHTML=answerC[i];
}

function showScore()
{
    var radios = document.getElementsByName("quiz");


    for (var j = 0; j < radios.length; j++) 
    {       
		radios[j].checked=false;
        }
    alert("Your score is "+ (score/5)*100+"%");
}
	
