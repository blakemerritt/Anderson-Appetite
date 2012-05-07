<?php $dbc = mysqli_connect('mysql2.commajor.com', 'com315', 'WAT004', '315_aueats')
	or die('Could not reach the database'); ?>
	<?php
$atmosphere="select * from atmosphere";
$atmosphere_result=mysqli_query($dbc, $atmosphere) or die ("Problem with the atmosphere!");
$food_type="select * from foodtype";
$food_type_result=mysqli_query($dbc, $food_type) or die ("Problem with the food type!");

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
		<title>Anderson Appetite</title>
	</head>
<?php	
if (isset($_POST['submit'])) {
$restaurant_name=addslashes($_POST['restaurant_name']);
$food_type=$_POST['food_type'];
$atmosphere=$_POST['atmosphere'];
$typical_price=$_POST['price'];
$address=$_POST['address'];
$website=$_POST['website'];
$bio=addslashes($_POST['bio']);
$phone_number=$_POST['phone_number'];
$query="insert into restaurant_info (restaurant_name, food_id, atmosphere_id, price, address, website, bio, phone_number)
		values ('$restaurant_name', '$food_type', '$atmosphere', '$typical_price', '$address', '$website', '$bio', '$phone_number')";
$result=mysqli_query ($dbc, $query) or die (mysql_error() ."Oh no! Something's wrong!");
}
?>
<body>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
<p>
	Restaurant Name: <input type="text" name="restaurant_name" /><br />
	Food Type: <select name="food_type">
		<?php while($row=mysqli_fetch_array($food_type_result)){
	echo "<option value=\"" . $row['id'] . "\">" . $row['food_type'] . " </option>";
	} ?>
		</select> <br />
	Atmosphere: <select name="atmosphere" >
	<?php while($row=mysqli_fetch_array($atmosphere_result)){
	echo "<option value=\"" . $row['id'] . "\">" . $row['atmosphere'] . " </option>";
	} ?>
		</select> <br />
	Price: <select name="price" >
		<option value="1">$</option>
		<option value="2">$$</option>
		<option value="3">$$$</option>
		<option value="4">$$$$</option>
		<option value="5">$$$$$</option>
		</select><br /><br />
	Physical Address: <input type="text" name="address" /><br /><br />
	Website: <input type="text" name="website" /><br /><br />
	Restaurant Bio: <textarea name="bio" rows="10" cols="50"></textarea><br /><br />
	Phone Number: <input type="text" name="phone_number" /><br /><br />



	
</p>
<p>
<input type="submit" name="submit" value="Submit" />
</p>
<ul>
	
</form>
</body>
</html>