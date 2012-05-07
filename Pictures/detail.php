<?php $dbc = mysqli_connect('mysql2.commajor.com', 'com315', 'WAT004', '315_aueats')
	or die('Could not reach the database'); 
	
	  $value=$_GET['id'];
   
$query="select * from restaurant_info order
inner join atmosphere on atmosphere.id=restaurant_info.atmosphere_id
inner join foodtype on foodtype.id=restaurant_info.food_id
inner join price on price.id=restaurant_info.price
where restaurant_info.id=$value
";
$query_result=mysqli_query($dbc, $query) or die ("Problem with the restaurant info query!");

$row=mysqli_fetch_array($query_result);

?>
	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
		<title>Anderson Appetite</title>
		<link type="text/css" rel="stylesheet" href="cssstuff.css" />
	</head>

<body>

<div id="allcontent">
</div>

	<div id="header">
			<img src="logo.png" />
	</div>
	
	<div id="hometag">
		<a href="http://com315.commajor.com/aueats/index.php">Home</a>
	</div>
		
<h1><?php echo $row['restaurant_name'];?> </h1>
<p>Type: <?php echo $row['food_type'];?></p>
<p>Ambiance: <?php echo $row['atmosphere'];?></p>
<p>Typical Price (for one): <?php echo $row['typical_price'];?></p>
<p>Address: <?php echo $row['address'];?></p>
<?php if (isset($row['website'])) { ?>
        <p>Website:
        <a href="<?php echo $row['website'];?>"><?php echo $row['restaurant_name'];?></a>
        </p>
<?php } ?>
<div style=" width: 500px;">
<p>Bio: <?php echo $row['bio'];?></p>
</div>
<p>Phone Number: <?php echo $row['phone_number'];?></p>

<p><img src="Pictures/<?php echo $row['photo_1'];?>"></p>




</body>

</html>