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
    $jsondata = file_get_contents('movielist.json');
    
    //convert json object to php associative array
    $data = json_decode($jsondata, true);
	$cou=count($data);
    for($i=0;$i<$cou;$i++){
		//get the employee details
		$id = $data[$i]['id'];
		echo $id;
		$title = $data[$i]['Title'];
		echo " ".$title."\n";
		$director = $data[$i]['Director'];
		$cast = $data[$i]['Cast'];
		$genre = $data[$i]['Genre'];
		$year = $data[$i]['year'];
		$imbdlink = $data[$i]['imbd link'];
		$query = "INSERT INTO list
		VALUES('$id', '$title', '$director', '$cast', '$genre', '$year', '$imbdlink')";
		mysqli_query($con,$query);
	}

    
    //insert into mysql table
   
?>