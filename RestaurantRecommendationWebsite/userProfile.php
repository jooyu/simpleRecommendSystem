<?php

session_start();
include ("header.php");

                $name = $_POST['username'];
                $pw = $_POST['password'];
                $query = "SELECT * FROM Users WHERE username = '$name' AND password = SHA('$pw');";
                $result = mysqli_query($db, $query)
                        or die("Error querying database.");
$row = mysqli_fetch_array($result);
$firstName = $row['first_name'];
$user_id = $row['user_id'];

                $confirmation = mysqli_num_rows($result);

                if ($confirmation == 0){
                     echo "<p><center><b><i><font size=4 face=Georgia color=000066>用户名或密码错误 <br/>";
		   echo "请再次尝试.</font></p></b></i><br/>";
		   echo "<p><center><b><i><font size=4 face=Georgia color=000066><a href='login.php'>登录</a></b></i></center></p>";
                }else{

			$_SESSION['username'] = $name;
			$_SESSION['password'] = $pw;
			$_SESSION['user_id'] = $user_id;
			
			$firstLetterOfName = substr($firstName, 0, 1);
 			$theRestOfName = substr($firstName,  1, strlen($firstName)-1);
			echo "<p><center><b><i><font size=7 face=Georgia color=000066>欢迎</font><font size=6 face=Georgia> </font><font size=7 face=Georgia color=000066></font><font size=6 face=Georgia>!</font></p></b></i>\n";
?>
<hr/>
<br/>  
<p><center><b><font size=5 face=Georgia color=000066>最适合你的餐厅：</font>
<?php
$username = $_SESSION['username'];
//echo "username: $username";	

$query = "SELECT * FROM `Users` WHERE 
		username = '$username';";

	$result = mysqli_query($db, $query) 
		or die("Error Querying Database 1");

$numOfRows = mysqli_num_rows($result);	



$userAnswers[0] = mysqli_fetch_array($result);
//echo "<li>{$userAnswers[0]['username']}</li>";
//echo "<li>{$userAnswers[0]['price']}</li>";
$query = "SELECT name, price, delivery, takeout, accommodate_groups,
reservations, outside_seating, bar, kids, fast_food,
steakhouse_influence, american_influence, middle_eastern_influence,
asian_influence, italian_influence, chinese_influence,
japanese_influence, indian_influence, french_influence,
greek_influence, mexican_influence, vegetarian_influence,
seafood_influence FROM $table;";

$result = mysqli_query($db, $query) 
		or die("Error Querying Database");

$numOfRestaurants = mysqli_num_rows($result);	


$restaurantVectors[] = array();

if ($numOfRestaurants == 0) {
	echo "<h1>没有符合的搜索结果</h1>";
} else {
 
for($i=0; $i<$numOfRestaurants; ++$i) {

$restaurantVectors[$i] = mysqli_fetch_array($result);
}


//echo "<li>RV: {$restaurantVectors[$i]['name']}</li>";

for ($m = 0; $m <$numOfRestaurants; ++$m) {
	$totalDistance = 0;
	$numOfAttributes = 22;

		$restaurantToCompareName = $restaurantVectors[$m]['name'];
		$restaurantToComparePrice = $restaurantVectors[$m]['price'];
		$restaurantToCompareDelivery= $restaurantVectors[$m]['delivery'];
		$restaurantToCompareTakeOut = $restaurantVectors[$m]['takeout'];
		$restaurantToCompareGroups = $restaurantVectors[$m]['accommodate_groups'];
		$restaurantToCompareReservations = $restaurantVectors[$m]['reservations'];
		$restaurantToCompareOutsideSeating = $restaurantVectors[$m]['outside_seating'];
		$restaurantToCompareBar = $restaurantVectors[$m]['bar'];
		$restaurantToCompareKids= $restaurantVectors[$m]['kids'];
		$restaurantToCompareFF = $restaurantVectors[$m]['fast_food'];
		$restaurantToCompareSteak = $restaurantVectors[$m]['steakhouse_influence'];
		$restaurantToCompareAmer = $restaurantVectors[$m]['american_influence'];
		$restaurantToCompareME= $restaurantVectors[$m]['middle_eastern_influence'];
		$restaurantToCompareAsian= $restaurantVectors[$m]['asian_influence'];
		$restaurantToCompareItal = $restaurantVectors[$m]['italian_influence'];
		$restaurantToCompareChin = $restaurantVectors[$m]['chinese_influence'];
		$restaurantToCompareJap = $restaurantVectors[$m]['japanese_influence'];
		$restaurantToCompareIndian = $restaurantVectors[$m]['indian_influence'];
		$restaurantToCompareFrench = $restaurantVectors[$m]['french_influence'];
		$restaurantToCompareGreek = $restaurantVectors[$m]['greek_influence'];
		$restaurantToCompareMex = $restaurantVectors[$m]['mexican_influence'];
		$restaurantToCompareVeg = $restaurantVectors[$m]['vegetarian_influence'];
		$restaurantToCompareSeaFood = $restaurantVectors[$m]['seafood_influence'];

		

//		$totalDistance = abs($restaurantToComparePrice - $userAnswers[0]['price']) + abs($restaurantToCompareDelivery - $userAnswers[0]['delivery']) +
//abs($restaurantToCompareTakeOut - $userAnswers[0]['takeout']) + abs($restaurantToCompareGroups - $userAnswers[0]['accommodate_groups']) + abs($restaurantToCompareReservations - $userAnswers[0]['reservations']) +
//abs($restaurantToCompareOutsideSeating - $userAnswers[0]['outside_seating']) + abs($restaurantToCompareBar - $userAnswers[0]['bar']) +
//abs($restaurantToCompareKids - $userAnswers[0]['kids']) + abs($restaurantToCompareFF - $userAnswers[0]['fast_food']) + abs($restaurantToCompareSteak - $userAnswers[0]['steakhouse_influence']) +
//abs($restaurantToCompareAmer - $userAnswers[0]['american_influence']) + abs($restaurantToCompareME - $userAnswers[0]['middle_eastern_influence']) + abs($restaurantToCompareAsian - $userAnswers[0]['asian_influence']) +
//abs($restaurantToCompareItal - $userAnswers[0]['italian_influence'])+ abs($restaurantToCompareChin - $userAnswers[0]['chinese_influence']) + abs($restaurantToCompareJap - $userAnswers[0]['japanese_influence']) +
//abs($restaurantToCompareIndian - $userAnswers[0]['indian_influence']) + abs($restaurantToCompareFrench - $userAnswers[0]['french_influence']) +
//abs($restaurantToCompareGreek - $userAnswers[0]['greek_influence']) + abs($restaurantToCompareMex - $userAnswers[0]['mexican_influence']) + abs($restaurantToCompareVeg - $userAnswers[0]['vegetarian_influence']) +
//abs($restaurantToCompareSeaFood - $userAnswers[0]['seafood_influence']);


		$totalDistance = sqrt(pow($restaurantToComparePrice - $userAnswers[0]['price'], 2) + pow($restaurantToCompareDelivery - $userAnswers[0]['delivery'], 2) +
pow($restaurantToCompareTakeOut - $userAnswers[0]['takeout'], 2) + pow($restaurantToCompareGroups - $userAnswers[0]['accommodate_groups'], 2) + pow($restaurantToCompareReservations - $userAnswers[0]['reservations'], 2) +
pow($restaurantToCompareOutsideSeating - $userAnswers[0]['outside_seating'], 2) + pow($restaurantToCompareBar - $userAnswers[0]['bar'], 2) +
pow($restaurantToCompareKids - $userAnswers[0]['kids'], 2) + pow($restaurantToCompareFF - $userAnswers[0]['fast_food'], 2) + pow($restaurantToCompareSteak - $userAnswers[0]['steakhouse_influence'], 2) +
pow($restaurantToCompareAmer - $userAnswers[0]['american_influence'], 2) + pow($restaurantToCompareME - $userAnswers[0]['middle_eastern_influence'], 2) + pow($restaurantToCompareAsian - $userAnswers[0]['asian_influence'], 2) +
pow($restaurantToCompareItal - $userAnswers[0]['italian_influence'], 2)+ pow($restaurantToCompareChin - $userAnswers[0]['chinese_influence'], 2) + pow($restaurantToCompareJap - $userAnswers[0]['japanese_influence'], 2) +
pow($restaurantToCompareIndian - $userAnswers[0]['indian_influence'], 2) + pow($restaurantToCompareFrench - $userAnswers[0]['french_influence'], 2) +
pow($restaurantToCompareGreek - $userAnswers[0]['greek_influence'], 2) + pow($restaurantToCompareMex - $userAnswers[0]['mexican_influence'], 2) + pow($restaurantToCompareVeg - $userAnswers[0]['vegetarian_influence'], 2) +
pow($restaurantToCompareSeaFood - $userAnswers[0]['seafood_influence'], 2));
$distances[$m][0] = $restaurantToCompareName;
$distances[$m][1] = $totalDistance;

}

//echo "<p>{$distances[$m][0]} = {$distances[$m][1]}</p>";


//$minDistance = $distances[0][1];
$minDistance = 100;
//echo "min dist 1: $minDistance";
//echo "<p>{$distances[1][1]}, {$distances[2][1]}, {$distances[3][1]}</p>";

for($n=1; $n<$numOfRestaurants-1; $n++)
{
$distToCompare = $distances[$n][1];
//echo "distToCompare: $distToCompare";	

if($distToCompare < $minDistance)
	{
		
		$minDistance = $distances[$n][1];
		//echo "min dist in if: $minDistance";
	}
}

//echo "min dist: $minDistance";
//echo "numOfRest: $numOfRestaurants";

for($n=0; $n<$numOfRestaurants; ++$n)
{
	if($distances[$n][1] == $minDistance)
	{

		echo "<h2><i><font color=CC6600>{$distances[$n][0]}</font></i></h2>";
	}
}
}
?>

<hr/>
<p><center><b><font size=5 face=Georgia color=000066>与你选择最相似的用户推荐:</font></b>


<?php
//$username = $_SESSION['username'];
//echo "username: $username";	

//$query = "SELECT * FROM `Users` WHERE 
		//username = '$username';";

	//$result = mysqli_query($db, $query) 
		//or die("Error Querying Database 1");

//$numOfRows = mysqli_num_rows($result);	



//$userAnswers[0] = mysqli_fetch_array($result);
//echo "<li>{$userAnswers[0]['username']}</li>";
//echo "<li>{$userAnswers[0]['price']}</li>";
$query = "SELECT username, first_name, last_name, price, delivery, takeout, accommodate_groups,
reservations, outside_seating, bar, kids, fast_food,
steakhouse_influence, american_influence, middle_eastern_influence,
asian_influence, italian_influence, chinese_influence,
japanese_influence, indian_influence, french_influence,
greek_influence, mexican_influence, vegetarian_influence,
seafood_influence FROM Users;";

$result = mysqli_query($db, $query) 
		or die("Error Querying Database");

$numOfUsers = mysqli_num_rows($result);	


$userVectors[] = array();

if ($numOfUsers == 0) {
	echo "<h1>没有符合的搜索结果</h1>";
} else {
 
for($i=0; $i<$numOfUsers; ++$i) {

$userVectors[$i] = mysqli_fetch_array($result);
//echo "<li>user vector: {$userVectors[$i]['username']}</li>";
}
for ($m = 0; $m <$numOfUsers; ++$m) {
	$totalDistance = 0;
	$numOfAttributes = 22;

		$userToCompareUserName = $userVectors[$m]['username'];
$userToCompareFirstName = $userVectors[$m]['first_name'];
$userToCompareLastName = $userVectors[$m]['last_name'];
		$userToComparePrice = $userVectors[$m]['price'];
		$userToCompareDelivery= $userVectors[$m]['delivery'];
		$userToCompareTakeOut = $userVectors[$m]['takeout'];
		$userToCompareGroups = $userVectors[$m]['accommodate_groups'];
		$userToCompareReservations = $userVectors[$m]['reservations'];
		$userToCompareOutsideSeating = $userVectors[$m]['outside_seating'];
		$userToCompareBar = $userVectors[$m]['bar'];
		$userToCompareKids= $userVectors[$m]['kids'];
		$userToCompareFF = $userVectors[$m]['fast_food'];
		$userToCompareSteak = $userVectors[$m]['steakhouse_influence'];
		$userToCompareAmer = $userVectors[$m]['american_influence'];
		$userToCompareME= $userVectors[$m]['middle_eastern_influence'];
		$userToCompareAsian= $userVectors[$m]['asian_influence'];
		$userToCompareItal = $userVectors[$m]['italian_influence'];
		$userToCompareChin = $userVectors[$m]['chinese_influence'];
		$userToCompareJap = $userVectors[$m]['japanese_influence'];
		$userToCompareIndian = $userVectors[$m]['indian_influence'];
		$userToCompareFrench = $userVectors[$m]['french_influence'];
		$userToCompareGreek = $userVectors[$m]['greek_influence'];
		$userToCompareMex = $userVectors[$m]['mexican_influence'];
		$userToCompareVeg = $userVectors[$m]['vegetarian_influence'];
		$userToCompareSeaFood = $userVectors[$m]['seafood_influence'];
//echo "$userToCompareUserName, $userToCompareTakeOut, $userToCompareAmer";

		

//		$totalDistance = abs($userToComparePrice - $userAnswers[0]['price']) + abs($userToCompareDelivery - $userAnswers[0]['delivery']) +
//abs($userToCompareTakeOut - $userAnswers[0]['takeout']) + abs($userToCompareGroups - $userAnswers[0]['accommodate_groups']) + abs($userToCompareReservations - $userAnswers[0]['reservations']) +
//abs($userToCompareOutsideSeating - $userAnswers[0]['outside_seating']) + abs($userToCompareBar - $userAnswers[0]['bar']) +
//abs($userToCompareKids - $userAnswers[0]['kids']) + abs($userToCompareFF - $userAnswers[0]['fast_food']) + abs($userToCompareSteak - $userAnswers[0]['steakhouse_influence']) +
//abs($userToCompareAmer - $userAnswers[0]['american_influence']) + abs($userToCompareME - $userAnswers[0]['middle_eastern_influence']) + abs($userToCompareAsian - $userAnswers[0]['asian_influence']) +
//abs($userToCompareItal - $userAnswers[0]['italian_influence'])+ abs($userToCompareChin - $userAnswers[0]['chinese_influence']) + abs($userToCompareJap - $userAnswers[0]['japanese_influence']) +
//abs($userToCompareIndian - $userAnswers[0]['indian_influence']) + abs($userToCompareFrench - $userAnswers[0]['french_influence']) +
//abs($userToCompareGreek - $userAnswers[0]['greek_influence']) + abs($userToCompareMex - $userAnswers[0]['mexican_influence']) + abs($userToCompareVeg - $userAnswers[0]['vegetarian_influence']) +
//abs($userToCompareSeaFood - $userAnswers[0]['seafood_influence']);

		$totalDistance = sqrt(pow($userToComparePrice - $userAnswers[0]['price'], 2) + pow($userToCompareDelivery - $userAnswers[0]['delivery'], 2) +
  pow($userToCompareTakeOut - $userAnswers[0]['takeout'], 2) + pow($userToCompareGroups - $userAnswers[0]['accommodate_groups'], 2) + pow($userToCompareReservations - $userAnswers[0]['reservations'], 2) +
  pow($userToCompareOutsideSeating - $userAnswers[0]['outside_seating'], 2) + pow($userToCompareBar - $userAnswers[0]['bar'], 2) +
  pow($userToCompareKids - $userAnswers[0]['kids'], 2) + pow($userToCompareFF - $userAnswers[0]['fast_food'], 2) + pow($userToCompareSteak - $userAnswers[0]['steakhouse_influence'], 2) +
  pow($userToCompareAmer - $userAnswers[0]['american_influence'], 2) + pow($userToCompareME - $userAnswers[0]['middle_eastern_influence'], 2) + pow($userToCompareAsian - $userAnswers[0]['asian_influence'], 2) +
  pow($userToCompareItal - $userAnswers[0]['italian_influence'], 2)+ pow($userToCompareChin - $userAnswers[0]['chinese_influence'], 2) + pow($userToCompareJap - $userAnswers[0]['japanese_influence'], 2) +
  pow($userToCompareIndian - $userAnswers[0]['indian_influence'], 2) + pow($userToCompareFrench - $userAnswers[0]['french_influence'], 2) +
  pow($userToCompareGreek - $userAnswers[0]['greek_influence'], 2) + pow($userToCompareMex - $userAnswers[0]['mexican_influence'], 2) + pow($userToCompareVeg - $userAnswers[0]['vegetarian_influence'], 2) +
  pow($userToCompareSeaFood - $userAnswers[0]['seafood_influence'], 2));
$userDistances[$m][0] = $userToCompareUserName;
$userDistances[$m][1] = $totalDistance;
$userDistances[$m][2] = $userToCompareFirstName;
$userDistances[$m][3] = $userToCompareLastName;

//echo "totalDist: $totalDistance";
//echo "<p>{$userDistances[$m][0]} = {$userDistances[$m][1]}</p>";

}
//$minDistance = $distances[0][1];
$minDistance = 100;
//echo "min dist 1: $minDistance";
//echo "<p>{$distances[1][1]}, {$distances[2][1]}, {$distances[3][1]}</p>";

//echo "$numOfUsers";

for($n=0; $n<$numOfUsers; $n++)
{
	if($userDistances[$n][0] != $username)
	{
//echo "n: $n";		
$distToCompare = $userDistances[$n][1];
		//echo "distToCompare: $distToCompare";	

		if($distToCompare < $minDistance)
		{
			
			$minDistance = $userDistances[$n][1];
			//echo "min dist in if: $minDistance";
		}
	}

	//echo "min dist: $minDistance";
	//echo "numOfRest: $numOfRestaurants";
}

	$maxRating = 0;
	$numOfClosest=0;
	for($n=0; $n<$numOfUsers; ++$n)
	{
		
		if($userDistances[$n][1] == $minDistance)
		{
			echo "<h2><i><font color=cc6600>{$userDistances[$n][2]}</font></i></h2>";
			$closestUsers[$numOfClosest] = $userDistances[$n][0];
			$numOfClosest++;
		}
	}
//echo "numOfClosest: $numOfClosest";

$restaurantIDs[0] = 0;
$count = 1;

	$query = "SELECT * FROM UserRatings WHERE user_id = '$user_id';";
			$result = mysqli_query($db, $query) 
				or die("Error Querying Database");	

	while($row = mysqli_fetch_array($result)) {
	$restaurantIDs[$count] = $row['restaurant_id'];
	//echo "restaurantIDs[count]: $restaurantIDs[$count]";
	$count++;
	}
echo("<hr/>");
	for($v = 0; $v<$numOfClosest; ++$v)
	{	
			//pull all restaurant ratings for this user
			
			$query = "SELECT * FROM Users WHERE username = '$closestUsers[$v]';";
			$result = mysqli_query($db, $query) 
				or die("Error Querying Database");	


				$row = mysqli_fetch_array($result);
				$userToCompareID = $row['user_id'];
				$userToCompareName = $row['first_name'];
				//echo "userID $userToCompareID";

			
			$query = "SELECT * FROM UserRatings WHERE user_id = '$userToCompareID';";
			$result = mysqli_query($db, $query) 
				or die("Error Querying Database");

			$numOfRatings = mysqli_num_rows($result);
			//echo "numRatings $numOfRatings";

				


			if ($numOfRatings == 0) {
				echo "<font size=4 face=Georgia color=000066>$userToCompareName 还没有评价任何东西!</font><br/>";
			} else {
 
				
				for($i=0; $i<$numOfRatings; ++$i) {
					$row = mysqli_fetch_array($result);
					$rating = $row['rating'];
					$restID = $row['restaurant_id'];
					
				  //for($j=0; $j<$count; ++$j)
			    	     //{
				       //echo "restIDs[j]: $restaurantIDs[$j] <br/>";
					//echo "restID: $restID <br/>";
				       if(!in_array($restID, $restaurantIDs))
				       {
					//echo"in 1st if <br/>";
					if($rating > $maxRating)
					{
						
						//echo "in 2nd if <br/>";
						$maxRating = $rating;
						//$maxRatings[$i][0] = $maxRating;
						//$maxRatings[0][1] = $restID;
					}
				       //}
				      }
				}
			}
			
		}
	}

	//echo "Max rating: $maxRating";
	

	for($v = 0; $v<$numOfClosest; ++$v)
	{
		$query = "SELECT * FROM Users WHERE username = '$closestUsers[$v]';";
			$result = mysqli_query($db, $query) 
				or die("Error Querying Database");	


				$row = mysqli_fetch_array($result);
				$userToCompareID = $row['user_id'];

			
			$query = "SELECT * FROM UserRatings WHERE user_id = '$userToCompareID';";
			$result = mysqli_query($db, $query) 
				or die("Error Querying Database");
			$numOfRatings = mysqli_num_rows($result);
			if ($numOfRatings == 0) {
				//echo "<h1>No results matched your search!</h1>";
			} else {
				for($i=0; $i<$numOfRatings; ++$i) {
					$row = mysqli_fetch_array($result);
					$rating = $row['rating'];
					$restID = $row['restaurant_id'];
				     
						//echo "
					if($rating == $maxRating)
					{
						$query = "SELECT * FROM RestaurantInfo WHERE restaurant_id = '$restID';";
						$result = mysqli_query($db, $query) 
							or die("Error Querying Database");
						$row = mysqli_fetch_array($result);
						$restName = $row['name'];
			
						echo "<font size=4 face=Georgia color=000066>你可以尝试: $restName ($maxRating)</font><br/>";
					}
				       
				      
				}
			}
		}
	





echo "<hr><hr>";
//echo "<h2><b><font color=000066>Calculated Distances:</h2></font></b>";

//for($n=0; $n<$numOfUsers; ++$n)
//{
//	if($userDistances[$n][0] != $username)
//	{
//		echo "</b><i><font color=cc6600>{$userDistances[$n][0]} = {$userDistances[$n][1]}</font></i><br/>";
//	}
//}

	
}

?>
			
                
   



