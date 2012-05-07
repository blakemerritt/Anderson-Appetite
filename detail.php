<?php $dbc = mysqli_connect('mysql2.commajor.com', 'com315', 'WAT004', '315_aueats')
	or die('Could not reach the database'); 
	
	  $value=$_GET['id'];
   
$query="select * from restaurant_info
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
		<link type="text/css" rel="stylesheet" href="../../../COM 315/Anderson Appetite/cssstuff.css" />
	</head>

<body>

<div id="allcontent">
</div>

	<div id="header">
			<img src="../../../COM 315/Anderson Appetite/logo.png" />
	</div>
	
    <div id="content">
    
	<div id="hometag">
		<a href="http://com315.commajor.com/aueats/index.php">Home</a>
	</div>
    
		
<h1><?php echo $row['restaurant_name'];?> </h1>
<div id="sidebar">
<p><?php echo $row['bio'];?></p>
</div>
<p>Type: <?php echo $row['food_type'];?></p>
<p>Ambiance: <?php echo $row['atmosphere'];?></p>
<p>Typical Price (for one): <?php echo $row['typical_price'];?></p>
<p><?php echo $row['address'];?></p>
<?php if (isset($row['website'])) { ?>
        <p>Website:
        <a href="<?php echo $row['../../../COM 315/Anderson Appetite/website'];?>"><?php echo $row['restaurant_name'];?></a>
        </p>
<?php } ?>
<p><?php echo $row['phone_number'];?></p>

<?php if (isset($row['photo_1'])) { ?>
<p><img src="Pictures/<?php echo $row['photo_1'];?>"></p>
<?php } ?>


</div>
</div>
    
    <div id="footer">
    	<p>Anderson Appetite&trade; was created April 2011&copy; by Anderson University Students</p>
    </div>

</body>

</html>