
function updateClock(){
	var time = getDate();
	timer = document.getElementById("clock");
	timer.innerHTML=time;
	time = "the time now is: "+time+".";
	timeholder = document.getElementById("timeparts");
	timeholder.innerHTML=time;
}
function loaded(){
	updateClock();
}
function interact(){
	alert("hello. you'll get a prompt next. enter your name there.");
	var name=null;
	var prtext = "what's the name?";
		name = prompt(prtext, null);
		prtext="sorry. "+prtext;
	while(name==null || name==""){
		name = prompt(prtext, null);
	}
	alert("this document is full of interaction with elements. enjoy the ride!");
}

function fib(){
	var num = document.getElementById("num");
	index = num.value;
	var answer = document.getElementById("ans");
	if(index > 20){
		answer.innerHTML = "i can only process 20 :(";
		return;
	}
	answer.innerHTML="";
	var total = 0;
	var sum=0;
	var prevsum = 0;
	var prevprevsum = 1;
	for(var i = 1; i<=index;i++){
		answer.innerHTML+=sum+"<br />";
		total+=sum;
		sum = prevsum + prevprevsum;
		prevprevsum=prevsum;
		prevsum = sum;
	}
	if(index!=0) answer.innerHTML+= "------ <br />"+total+"<br />------";
}
function clearfib(){
	var answer = document.getElementById("ans");

	answer.innerHTML="";
}
function clearwords(){
	var answer = document.getElementById("ans_words");
	answer.innerHTML="";
}

function getDate(){
	var time = new Date();
var objToday = new Date(),
                weekday = new Array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'),
                dayOfWeek = weekday[objToday.getDay()],
                domEnder = new Array( 'th', 'st', 'nd', 'rd', 'th', 'th', 'th', 'th', 'th', 'th' ),
                dayOfMonth = today + (objToday.getDate() < 10) ? '0' + objToday.getDate() + domEnder[objToday.getDate()] : objToday.getDate() + domEnder[parseFloat(("" + objToday.getDate()).substr(("" + objToday.getDate()).length - 1))],
                months = new Array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'),
                curMonth = months[objToday.getMonth()],
                curYear = objToday.getFullYear(),
                curHour = objToday.getHours() > 12 ? objToday.getHours() - 12 : (objToday.getHours() < 10 ? "0" + objToday.getHours() : objToday.getHours()),
                curMinute = objToday.getMinutes() < 10 ? "0" + objToday.getMinutes() : objToday.getMinutes(),
                curSeconds = objToday.getSeconds() < 10 ? "0" + objToday.getSeconds() : objToday.getSeconds(),
                curMeridiem = objToday.getHours() > 12 ? "PM" : "AM";
var today = curHour + ":" + curMinute + "." + curSeconds + curMeridiem + ", " + dayOfWeek + ", " + dayOfMonth + " of " + curMonth + ", " + curYear;
	return today;
}	

function runLoop(){
	var num = document.getElementById("num_loop");
	index = num.value;
	var then = +new Date();
	var count=0;
	for(var i = 0; i< index; i++){
		count+=1;
	}
	var now = +new Date();
	var answer = document.getElementById("ans_loop");
	answer.innerHTML="ran loop "+count+" times";
	answer.innerHTML+="<br /><br />time taken: "+(now-then)+" milliseconds.";
}

function words(){
	var words = document.getElementById("sentence");
	sentence = words.value;
	var letter = sentence.charAt(sentence.length-1);
	if(letter==" " || letter == "." || letter==","){
		process_words();
	}
}
function process_words(){
	var words = document.getElementById("sentence");
	sentence = words.value;
	var answer = document.getElementById("ans_words");
		var wordlist=sentence.replace(/  */g, " ", "g").replace(/\. /g," ", "g").replace(/\./g, "", "g").replace(/^ /,"").replace(/ $/,"");
		wordlist = wordlist.split(" ").sort();
		var order = document.getElementById("order");
		if(order.innerHTML=="(descending)"){
			wordlist.reverse();	
		}
		answer.innerHTML = "sorted word list: <br />"+wordlist.join(", ");
}
function swap(){
	var order = document.getElementById("order");
	if(order.innerHTML=="(ascending)"){
		order.innerHTML = "(descending)";
	}
	else{
		order.innerHTML = "(ascending)";
	}
	process_words();
}
