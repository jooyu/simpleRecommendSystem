<?php

include("header.php");

if ($_GET['signup'] == "yes") {
	// Get The Input
	$first_name = mysqli_real_escape_string($db, trim($_POST['first_name']));
	$last_name = mysqli_real_escape_string($db, trim($_POST['last_name']));
	$username = mysqli_real_escape_string($db, trim($_POST['username']));
	$password = mysqli_real_escape_string($db, trim($_POST['password']));

	$price = $_POST[group1];
	$delivery = $_POST[group2];
 	$takeout = $_POST[group3];
	$groups = $_POST[group4];
 	$reservations = $_POST[group5];
	$outsideSeating = $_POST[group6];
	$bar = $_POST[group7];
	$kids = $_POST[group8];
 	$speed = $_POST[group9];
	$steakhouse = $_POST[group10];
	$american = $_POST[group11];
	$middleEastern = $_POST[group12];
	$asian = $_POST[group13];
	$italian = $_POST[group14];
 	$chinese = $_POST[group15];
	$japanese = $_POST[group16];
	$indian = $_POST[group17];
	$french = $_POST[group18];
	$greek = $_POST[group19];
	$mexican = $_POST[group20];
 	$vegetarian = $_POST[group21];
	$seafood = $_POST[group22];



	$errormess = "";

	// Make Sure All Fields Are Entered
	if ($first_name == "" || $last_name == "" || $username == "" || $password == "" || $price == "" || $delivery == "" || $takeout == "" || $groups == "" || $reservations == "" || $outsideSeating == "" || $bar == "" || $kids == "" || $speed == "" || $steakhouse == "" || $american == "" || $middleEastern == "" || $asian == "" || $italian == "" || $chinese == "" || $japanese == "" || $indian == "" || $french == "" || $greek == "" || $mexican == "" || $vegetarian == "" || $seafood == "") {
		$errormess = "<b><font size=3 face=Georgia color=black>你必须填满</b></font>";
	}

	// Check If username Exists
	$checkexists = mysqli_query($db, "Select COUNT(*) AS num from `Users` where username='$username'");
	$exists = mysqli_fetch_array($checkexists);
	if ($exists['num'] > 0) {
		$errormess = "<b><font size=3 face=Georgia color=black>用户名已经被注册.</b></font>";
	}


	if ($errormess == "") {
		@mysqli_query($db, "Insert into `Users` (first_name, last_name, username, password, price, delivery, takeout, accommodate_groups, reservations, outside_seating, bar, kids, fast_food, steakhouse_influence, american_influence, middle_eastern_influence, asian_influence, italian_influence, chinese_influence, japanese_influence, indian_influence, french_influence, greek_influence, mexican_influence, vegetarian_influence, seafood_influence) values ('$first_name', '$last_name', '$username', SHA('$password'), $price, $delivery, $takeout, $groups, $reservations, $outsideSeating, $bar, $kids, $speed, $steakhouse, $american, $middleEastern, $asian, $italian, $chinese, $japanese, $indian, $french, $greek, $mexican, $vegetarian, $seafood)");
		echo("用户创建成功. <p><a href='login.php'>点击此处登录</a> 准备开始进入!</p>");
		include("footer.php");
		exit;
	} else {
		echo($errormess);
		include("footer.php");
		exit;
	}

	
}

?>
<center>
<b><p><i><font size="5.5" face="Georgia" color="000066">注册</font><font size="4.5" face="Georgia"></p></b></i></font>

<form action="signup.php?signup=yes" method="post">
<table border="0" cellpadding="3" cellspacing="0">
<tr><td align="right"><b><i><font size="4.5" face="Georgia" color="CC6600">姓:</font><font size="3.5" face="Georgia"></font></b></i><b><i><font size="4.5" face="Georgia" color="CC6600"> </font><font size="3.5" face="Georgia"></font></b></i></td><td align="left"><input type="text" name="first_name" value=""></td</tr>
<tr><td align="right"><b><i><font size="4.5" face="Georgia" color="CC6600">名:</font><font size="3.5" face="Georgia"></font></b></i><b><i><font size="4.5" face="Georgia" color="CC6600"> </font><font size="3.5" face="Georgia"></font></b></i></td><td align="left"><input type="text" name="last_name" value=""></td</tr>
<tr><td align="right"><b><i><font size="4.5" face="Georgia" color="CC6600">用户名:</font><font size="3.5" face="Georgia"></font></b></i><b></td><td align="left"><input type="text" name="username" value=""></td</tr>
<tr><td align="right"><b><i><font size="4.5" face="Georgia" color="CC6600">密码:</font><font size="3.5" face="Georgia"></font></b></i><b></td><td align="left"><input type="password" name="password" value=""></td</tr>
</table></center>

<br/><hr/>
<center>
<b><p><i><font size="5.5" face="Georgia" color="000066">调查问卷</font><font size="4.5" face="Georgia"></p></b></i></font>
</center>

<font size="2" face="Georgia" color="black"/>

<table border="0" cellpadding="0" cellspacing="0">

<tr><td align="left"><b>你更倾向于每个人的支出（平均）？</b></td></tr>
<tr><td align="left"><input type="radio" name="group1" value="1"> 便宜 (最多 $60)</td></tr>
<tr><td align="left"><input type="radio" name="group1" value="2"> 中等 (最多 $30)</td></tr>
<tr><td align="left"><input type="radio" name="group1" value="3"> 昂贵 (最多 $60)</td></tr>


<tr><td align="left"><b>你更喜欢一家提供送餐的餐厅吗？</b></td></tr>
<tr><td align="left"><input type="radio" name="group2" value="1"> 是 </td></tr>
<tr><td align="left"><input type="radio" name="group2" value="0"> 否 </td></tr>

<tr><td align="left"><b>你喜欢的那家餐馆提供外卖？</b></td></tr>
<tr><td align="left"><input type="radio" name="group3" value="1"> 是 </td></tr>
<tr><td align="left"><input type="radio" name="group3" value="0"> 否</td></tr>

<tr><td align="left"><b>你更喜欢一家可以容纳多人的餐馆吗？</b></td></tr>
<tr><td align="left"><input type="radio" name="group4" value="1"> 是 </td></tr>
<tr><td align="left"><input type="radio" name="group4" value="0"> 否 </td></tr>

<tr><td align="left"><b>你更喜欢接受预订的餐厅吗？</b></td></tr>
<tr><td align="left"><input type="radio" name="group5" value="1"> 是 </td></tr>
<tr><td align="left"><input type="radio" name="group5" value="0"> 否 </td></tr>

<tr><td align="left"><b>你更喜欢有外座位的餐厅吗？</b></td></tr>
<tr><td align="left"><input type="radio" name="group6" value="1"> 是 </td></tr>
<tr><td align="left"><input type="radio" name="group6" value="0"> 否 </td></tr>

<tr><td align="left"><b>你更喜欢有一个餐厅带一个完整的酒吧吗？</b></td></tr>
<tr><td align="left"><input type="radio" name="group7" value="1"> 是 </td></tr>
<tr><td align="left"><input type="radio" name="group7" value="0"> 否 </td></tr>

<tr><td align="left"><b>你更喜欢一家适合小孩的餐馆吗？</b></td></tr>
<tr><td align="left"><input type="radio" name="group8" value="1"> 是 </td></tr>
<tr><td align="left"><input type="radio" name="group8" value="0"> 否</td></tr>

<tr><td align="left"><b>在1到5的规模，你希望你的服务有多快？</b></td></tr>
<tr><td align="left"><input type="radio" name="group9" value="1"> 1 (缓慢的) </td></tr>
<tr><td align="left"><input type="radio" name="group9" value="2"> 2 </td></tr>
<tr><td align="left"><input type="radio" name="group9" value="3"> 3 (中等的)</td></tr>
<tr><td align="left"><input type="radio" name="group9" value="4"> 4 </td></tr>
<tr><td align="left"><input type="radio" name="group9" value="5"> 5 (超快的)</td></tr>
<tr> </tr><tr> </tr>
<tr><td align="left"><b>在1到5的评分，你更喜欢哪种类型的餐厅？</b></tr>
<tr><td ><b>西式牛排</b></td></tr>
<tr><td ><input type="radio" name="group10" value="1"> 1 </td></tr>
<tr><td ><input type="radio" name="group10" value="2"> 2 </td></tr>
<tr><td ><input type="radio" name="group10" value="3"> 3 </td></tr>
<tr><td ><input type="radio" name="group10" value="4"> 4 </td></tr>
<tr><td ><input type="radio" name="group10" value="5"> 5 </td></tr>

<tr><td ><b>美食餐厅</b></td></tr>
<tr><td ><input type="radio" name="group11" value="1"> 1 </td></tr>
<tr><td ><input type="radio" name="group11" value="2"> 2 </td></tr>
<tr><td ><input type="radio" name="group11" value="3"> 3 </td></tr>
<tr><td ><input type="radio" name="group11" value="4"> 4 </td></tr>
<tr><td ><input type="radio" name="group11" value="5"> 5 </td></tr>

<tr><td ><b>中东餐厅</b></td></tr>
<tr><td><input type="radio" name="group12" value="1"> 1 </td></tr>
<tr><td><input type="radio" name="group12" value="2"> 2 </td></tr>
<tr><td><input type="radio" name="group12" value="3"> 3 </td></tr>
<tr><td><input type="radio" name="group12" value="4"> 4 </td></tr>
<tr><td><input type="radio" name="group12" value="5"> 5 </td></tr>

<tr><td><b>亚洲餐厅</b></td></tr>
<tr><td><input type="radio" name="group13" value="1"> 1 </td></tr>
<tr><td><input type="radio" name="group13" value="2"> 2 </td></tr>
<tr><td><input type="radio" name="group13" value="3"> 3 </td></tr>
<tr><td><input type="radio" name="group13" value="4"> 4 </td></tr>
<tr><td><input type="radio" name="group13" value="5"> 5 </td></tr>

<tr><td><b>意大利餐厅</b></td></tr>
<tr><td><input type="radio" name="group14" value="1"> 1 </td></tr>
<tr><td><input type="radio" name="group14" value="2"> 2 </td></tr>
<tr><td><input type="radio" name="group14" value="3"> 3 </td></tr>
<tr><td><input type="radio" name="group14" value="4"> 4 </td></tr>
<tr><td><input type="radio" name="group14" value="5"> 5 </td></tr>

<tr><td><b>中式餐厅</b></td></tr>
<tr><td><input type="radio" name="group15" value="1"> 1 </td></tr>
<tr><td><input type="radio" name="group15" value="2"> 2 </td></tr>
<tr><td><input type="radio" name="group15" value="3"> 3 </td></tr>
<tr><td><input type="radio" name="group15" value="4"> 4 </td></tr>
<tr><td><input type="radio" name="group15" value="5"> 5 </td></tr>

<tr><td><b>日式餐厅</b></td></tr>
<tr><td><input type="radio" name="group16" value="1"> 1 </td></tr>
<tr><td><input type="radio" name="group16" value="2"> 2 </td></tr>
<tr><td><input type="radio" name="group16" value="3"> 3 </td></tr>
<tr><td ><input type="radio" name="group16" value="4"> 4 </td></tr>
<tr><td ><input type="radio" name="group16" value="5"> 5 </td></tr>

<tr><td ><b>印度餐厅</b></td></tr>
<tr><td ><input type="radio" name="group17" value="1"> 1 </td></tr>
<tr><td ><input type="radio" name="group17" value="2"> 2 </td></tr>
<tr><td ><input type="radio" name="group17" value="3"> 3 </td></tr>
<tr><td ><input type="radio" name="group17" value="4"> 4 </td></tr>
<tr><td ><input type="radio" name="group17" value="5"> 5 </td></tr>

<tr><td ><b>法式餐厅</b></td></tr>
<tr><td ><input type="radio" name="group18" value="1"> 1 </td></tr>
<tr><td ><input type="radio" name="group18" value="2"> 2 </td></tr>
<tr><td ><input type="radio" name="group18" value="3"> 3 </td></tr>
<tr><td ><input type="radio" name="group18" value="4"> 4 </td></tr>
<tr><td ><input type="radio" name="group18" value="5"> 5 </td></tr>

<tr><td ><b>希腊餐厅</b></td></tr>
<tr><td ><input type="radio" name="group19" value="1"> 1 </td></tr>
<tr><td ><input type="radio" name="group19" value="2"> 2 </td></tr>
<tr><td ><input type="radio" name="group19" value="3"> 3 </td></tr>
<tr><td ><input type="radio" name="group19" value="4"> 4 </td></tr>
<tr><td ><input type="radio" name="group19" value="5"> 5 </td></tr>

<tr><td ><b>墨西哥餐厅</b></td></tr>
<tr><td ><input type="radio" name="group20" value="1"> 1 </td></tr>
<tr><td ><input type="radio" name="group20" value="2"> 2 </td></tr>
<tr><td ><input type="radio" name="group20" value="3"> 3 </td></tr>
<tr><td ><input type="radio" name="group20" value="4"> 4 </td></tr>
<tr><td ><input type="radio" name="group20" value="5"> 5 </td></tr>

<tr><td ><b>素食餐厅</b></td></tr>
<tr><td ><input type="radio" name="group21" value="1"> 1 </td></tr>
<tr><td ><input type="radio" name="group21" value="2"> 2 </td></tr>
<tr><td ><input type="radio" name="group21" value="3"> 3 </td></tr>
<tr><td ><input type="radio" name="group21" value="4"> 4 </td></tr>
<tr><td ><input type="radio" name="group21" value="5"> 5 </td></tr>

<tr><td ><b>海鲜餐厅</b></td></tr>
<tr><td ><input type="radio" name="group22" value="1"> 1 </td></tr>
<tr><td ><input type="radio" name="group22" value="2"> 2 </td></tr>
<tr><td ><input type="radio" name="group22" value="3"> 3 </td></tr>
<tr><td ><input type="radio" name="group22" value="4"> 4 </td></tr>
<tr><td ><input type="radio" name="group22" value="5"> 5 </td></tr>
</table>
<table>
<tr><td>&nbsp;</td><td align="center"><input type="submit" value="创建账户"></td></tr>
</table>
</form>

<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</center>

<?php
include("footer.php");
exit;
?>