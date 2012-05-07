<?php $dbc = mysqli_connect('mysql2.commajor.com', 'com315', 'WAT004', '315_aueats')
	or die('Could not reach the database'); ?>
	
	<?php
$atmosphere="select * from atmosphere order by atmosphere asc";
$atmosphere_result=mysqli_query($dbc, $atmosphere) or die ("Problem with the atmosphere!");
$food_type="select * from foodtype order by food_type asc";
$food_type_result=mysqli_query($dbc, $food_type) or die ("Problem with the food type!");
$typical_price="select * from price";
$typical_price_result=mysqli_query($dbc, $typical_price) or die ("Problem with the price!");

?>

<!DOCTYPE hmtl PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en" >
	<head> 
    	<meta name="Description" content="Anderson, SC restaurants in one, easy-to-use database.">
		<meta http-equiv="content-Type" content="text/html; charset=ISO-8859-1" />
		<title>Anderson Appetite</title>
        

    <link href="cssstuff.css" rel="stylesheet" type="text/css" />
	</head> 
	<body>
	<div id="allcontent">
	<div id="header">
			<img src="logo.png" />
	
	</div>
    
    <div id="about">
    <p>Anderson Appetite is here to help you choose restaurants in Anderson, SC. You can search by the type of food you want, the ambiance of the restaurant, or the price of a typical meal. Enjoy quenching your Anderson Appetite!</p>
	</div>
    
	<div id="content"><table>
		<tr>
		
			<th>Type of Food</th>
			<th>Ambiance</th>
			<th>Price</th>
		</tr>
		<tr>
			<td>
				<ul>
<?php 

while ($row=mysqli_fetch_array($food_type_result))
	{ ?>
	
	<li><a href="category.php?cat_name=food_id&cat_val=<?php echo $row['id'];?>"><?php echo $row['food_type'];
	
	?> </a></li>
	<?php } ?>
				</ul>	
			</td>
			<td>
				<ul>
<?php 

while ($row=mysqli_fetch_array($atmosphere_result))
	{ ?>
	
	<li><a href="category.php?cat_name=atmosphere_id&cat_val=<?php echo $row['id'];?>"><?php echo $row['atmosphere'];
	
	?> </a></li>
	<?php } ?>
				</ul>	
			</td>
			<td>
				<ul>
<?php 

while ($row=mysqli_fetch_array($typical_price_result))
	{ ?>
	
	<li><a href="category.php?cat_name=price&cat_val=<?php echo $row['id'];?>"><?php echo $row['typical_price'];
	
	?> </a></li>
	<?php } ?>
				</ul>	
			</td>
		</tr>
	</table></div>
	<h1> 
	</h1>
    
	</div>
    
    <div id="footer">
    	<p>Anderson Appetite&trade; was created April 2011&copy; by Anderson University Students</p>
    </div>
    
	</body>
	</html>