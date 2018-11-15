
<html>
<head>
<title>Friends Book</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

  
<style>
/* Style the header */
.header {
 background-color: #666;
 padding: 30px;
 text-align: center;
 font-size: 35px;
 color: white;
}
/* Style the footer */
.footer {
 background-color: #777;
 padding: 30px;
 text-align: center;
 color: white;
}

.milieu{
	margin-left: 20px;
}

</style>

</head>

<body>

<div class = 'header'>
<center><p>Friends Book</p>
<i class="far fa-address-book"></i>
</center>
</div>

<br>

<center>
<form class="form-horizontal" action="index.php" method="post" >
    <div class="form-group">
      <label class="control-label col-sm-2" for="name">Name:</label>
      <div class="col-sm-3">
        <input type="text" class="form-control" placeholder="Enter name" name="name">
			<br>
			<button type="submit" class="btn btn-success"><i class="far fa-edit"></i> Add new friend </button> 

      </div>
    </div>
   
</form>
</center>


<div class='milieu'>
<?php
$nameFilter= '';
echo "<h1><i>My Best Friends: </i></h1><br>";

$filename = 'friends.txt';

$file= fopen($filename,"a");
fclose( $file );

$file = fopen( $filename, "r" );

if ($file){
	
	echo "<ul>";
	
while (!feof($file)) 
{
	$n = fgets($file);
	
	if (isset($_POST['nameFilter']) && !empty($_POST['nameFilter']))
	{
		$nameFilter = $_POST['nameFilter'];
		
		if (strstr($n, $_POST['nameFilter']) ) 
		{
			
		echo "	<li>" . $n. "</li><br>";
		}
	}
	
	else {
	
		if(!empty($n))
			echo "	<li>" . $n . "</li><br>";
		
	}
	
}
	
	if (isset($_POST['name'])) {
	 $name = $_POST['name'];
	 
	 echo "<li><b>" . $name. "</b></li><br>";
	}


echo "</ul>";
}

// appending to file

	if(isset($_POST['name'])){
		
		$file = fopen( $filename, "a" );

		fwrite( $file, $name);
		fwrite( $file, "\n");
		fclose( $file );
	}
	
	
	
?>
</div>

<div class='footer'>
<center>
<form class="form-horizontal" action="index.php" method="post" >
	<div class="form-group">
      <label class="control-label col-sm-2" for="filter">Search:</label>
      <div class="col-sm-3">          
        <input type="text" class="form-control" placeholder="Enter name" name="nameFilter" value="<?=$nameFilter?>">
			<br>
			<button type="submit" class="btn btn-primary"><i class="fas fa-filter"></i> Filter List </button> 

      </div>
    </div>
</form>
</center>
</div>

</body>

</html>













