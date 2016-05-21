<?php

session_start();

include("header.php");

if (!isset($_SESSION['user_id']) || !is_numeric($_SESSION['user_id'])) {
echo("<p><b>对不起，您必须登录到该页的访问！</b></p>");
exit;
}

if ($_GET['edit'] == "yes") {
	// Get The Input
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


	if ($errormess == "") {
		@mysqli_query($db, "Update `Users` set price=$price, delivery=$delivery, takeout=$takeout, accommodate_groups=$groups, reservations=$reservations, outside_seating=$outsideSeating, bar=$bar, kids=$kids, fast_food=$speed, steakhouse_influence=$steakhouse, american_influence=$american, middle_eastern_influence=$middleEastern, asian_influence=$asian, italian_influence=$italian, chinese_influence=$chinese, japanese_influence=$japanese, indian_influence=$indian, french_influence=$french, greek_influence=$greek, mexican_influence=$mexican, vegetarian_influence=$vegetarian, seafood_influence=$seafood where user_id='".$_SESSION['user_id']."'") or die("你必须回答所有的问题.");
		echo("<p>您的调查结果已经更新！<br /><br /><a href=\"index.php\">点击这里进入主页</a></p>");
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

<form action="survey.php?edit=yes" method="post">
<center>
<b><p><i><font size="5.5" face="Georgia" color="000066">调查问卷</font><font size="4.5" face="Georgia"></p></b></i></font>
</center>

<font size="2" face="Georgia" color="black">

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
<tr><td>&nbsp;</td><td align="center"><input type="submit" value="提交调查"></td></tr>
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