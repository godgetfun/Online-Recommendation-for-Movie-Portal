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
    $jsondata = file_get_contents('imdbratingdata.json');
    
    //convert json object to php associative array
    $data = json_decode($jsondata, true);
	$cou=count($data);
    for($i=0;$i<$cou;$i++){
		//get the employee details
		$id = $data[$i]['url'];
		//echo $id;
		$title = $data[$i]['rating'];
		if(!isset($title[0]))
			$title[0]=0;
		$img = $data[$i]['img'];
		if(!isset($img[0]))
			$img[0]=NULL;
		echo " ".$title[0]."\n";
		$query = "INSERT INTO imdbrating VALUES('$id', $title[0], '$img[0]')";
		mysqli_query($con,$query);
	}

    
    //insert into mysql table
   
?>