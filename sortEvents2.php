<?php
	require('connect.php');
	session_start();
	
	# Check if user is logged in or not
	if(!isset($_SESSION['user'])) {
		echo "User is not signed in";
		header("refresh:2; url=main.html");
	}
	
	echo "<span style='font-size: 18px;'> Current signed in as ".$_SESSION['user']." </span>";
?>

<!DOCTYPE html>
<html>
<head>
<style>
p{
	color:blue;
}
input.inn{
	width:2.5%;
}
select {
    width:40px;
}
</style>
<script type="text/javascript" src="jsEvents.js"></script>
</head>

<body>
	
	<p>Enter in the format "YYYY-MM-DD HH:MI:SS"</p>
	<form action="insertE.php" method="get">
	Start Time: 
	<span>YYYY</span><input class="inn" id="startYear" type="text" name="startyr" value="0000" maxlength="4" onkeypress="return isNumberKey(event)">
	<span>MM</span>
	<select name="startmth">
		<option value="00" selected>00</option>
		<option value="01">1</option>
		<option value="02">2</option>
		<option value="03">3</option>
		<option value="04">4</option>
		<option value="05">5</option>
		<option value="06">6</option>
		<option value="07">7</option>
		<option value="08">8</option>
		<option value="09">9</option>
		<option value="10">10</option>
		<option value="11">11</option>
		<option value="12">12</option>
	</select>
	
	<span>DD</span>
	<select name="startdt">
		<option value="00" selected>00</option>
		<option value="01">1</option>
		<option value="02">2</option>
		<option value="03">3</option>
		<option value="04">4</option>
		<option value="05">5</option>
		<option value="06">6</option>
		<option value="07">7</option>
		<option value="08">8</option>
		<option value="09">9</option>
		<option value="10">10</option>
		<option value="11">11</option>
		<option value="12">12</option>
		<option value="13">13</option>
		<option value="14">14</option>
		<option value="15">15</option>
		<option value="16">16</option>
		<option value="17">17</option>
		<option value="18">18</option>
		<option value="19">19</option>
		<option value="20">20</option>
		<option value="21">21</option>
		<option value="22">22</option>
		<option value="23">23</option>
		<option value="24">24</option>
		<option value="25">25</option>
		<option value="26">26</option>
		<option value="27">27</option>
		<option value="28">28</option>
		<option value="29">29</option>
		<option value="30">30</option>
		<option value="31">31</option>
	</select>
	<!--<span>HH</span><input class="inn" id="startHour" type="text" name="starthr">
	<span>MI</span><input class="inn" id="startMinute" type="text" name="startmin">
	<span>SS</span><input class="inn" id="startSecond" type="text" name="startsec"> -->
	End Time:
	<span>YYYY</span><input class="inn" id="endYear" type="text" name="endyr" value="0000" maxlength="4" onkeypress="return isNumberKey(event)">
	<select name="endmth">
		<option value="00" selected>00</option>
		<option value="01">1</option>
		<option value="02">2</option>
		<option value="03">3</option>
		<option value="04">4</option>
		<option value="05">5</option>
		<option value="06">6</option>
		<option value="07">7</option>
		<option value="08">8</option>
		<option value="09">9</option>
		<option value="10">10</option>
		<option value="11">11</option>
		<option value="12">12</option>
	</select>
	
	<select name="enddt">
		<option value="00" selected>00</option>
		<option value="01">1</option>
		<option value="02">2</option>
		<option value="03">3</option>
		<option value="04">4</option>
		<option value="05">5</option>
		<option value="06">6</option>
		<option value="07">7</option>
		<option value="08">8</option>
		<option value="09">9</option>
		<option value="10">10</option>
		<option value="11">11</option>
		<option value="12">12</option>
		<option value="13">13</option>
		<option value="14">14</option>
		<option value="15">15</option>
		<option value="16">16</option>
		<option value="17">17</option>
		<option value="18">18</option>
		<option value="19">19</option>
		<option value="20">20</option>
		<option value="21">21</option>
		<option value="22">22</option>
		<option value="23">23</option>
		<option value="24">24</option>
		<option value="25">25</option>
		<option value="26">26</option>
		<option value="27">27</option>
		<option value="28">28</option>
		<option value="29">29</option>
		<option value="30">30</option>
		<option value="31">31</option>
	</select>
	<br>
	<input type="submit">
	<br>
	</form>
	Entered Start:
	<div id="outS" ></div>
	<br>
	Entered End:
	<div id="outE" ></div>
	<p id="demo"></p>

	<div> <input type="button" value="Go Back" class="button_active" onclick="location.href='meetindex.php';"> </div>
<script>

function myFunction() {
    document.getElementById("demo").innerHTML = "Hello World";
	return false;
}


</script>

</body>
</html>