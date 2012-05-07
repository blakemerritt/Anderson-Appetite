<?php $dbc = mysqli_connect('mysql2.commajor.com', 'com315', 'WAT004', '315_aueats')
	or die('Could not reach the database');
	
   $field=$_GET['cat_name'];
   $value=$_GET['cat_val'];
   
$query="select * from restaurant_info where $field=$value order by restaurant_info";
$query_result=mysqli_query($dbc, $query) or die ("Problem with the query!");
?>
	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
		<title>Anderson Appetite</title>
			<link type="text/css" rel="stylesheet" href="cssstuff.css"/>
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
	
	<h1>List of Restaurants</h1>
		<ul>
		
<?php while ($row=mysqli_fetch_array($query_result)) {
	?>
		
			<li><a href="detail.php?id=<?php echo $row['id'];?>"><?php echo $row['restaurant_name'];
?> </a>
   
</li> <?php } ?>
		</ul>
			
	
	
	</div>
	
	</body>
	
</html>