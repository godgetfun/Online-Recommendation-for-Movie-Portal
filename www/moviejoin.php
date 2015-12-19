<?php
    $host="localhost"; //replace with database hostname 
$username="root"; //replace with database username 
$password=""; //replace with database password 
$db_name="json"; //replace with database name

$con=mysqli_connect("$host", "$username", "$password","$db_name"); 
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  } else
	  echo "connected";
mysqli_select_db($con,"$db_name");

    //read the json file contents
    $jsondata = file_get_contents('moviejoin.json');
    
    //convert json object to php associative array
    $data = json_decode($jsondata, true);
	$cou=count($data);
    for($i=0;$i<$cou;$i++){
		//get the employee details
		$id = $data[$i]['url'];
		//echo $id;
		$title = $data[$i]['link'];
		//echo " ".$title."\n";
		$query = "INSERT INTO imdb
		VALUES('$id', '$title')";
		mysqli_query($con,$query);
	}

    
    //insert into mysql table
   
?>