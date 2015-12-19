<?php
include('header.php');
session_start();

$movies=$_POST['movies'];
$h=$_POST['rating'];
$id=$_SESSION['uid'];

//echo "<h1>".$movies."</h1>";
//echo $h;

$query="select * from rating where uid=$id and movieid=$movies";
$res=mysqli_query($con,$query);

$flag=0;
while($row = mysqli_fetch_array($res)){
	echo "hi";
	$flag=1;
	
}
if($flag==0){
	echo "hello";
	$id=$_SESSION['uid'];
	$query="select rated from user where id=$id";
	$res=mysqli_query($con,$query);
	$flag=0;
	while($row = mysqli_fetch_array($res)){
		$flag=$row['rated'];
	}
	$flag=$flag+1;
	$query="update user set rated = $flag where id=$id";
	$res=mysqli_query($con,$query);

	$query="insert into rating values('$id','$movies','$h')";
	mysqli_query($con,$query);
	$app = "$id\t$movies\t$h\t9798798\n";
	echo $app;
	$myFile = "./input/u.data";
	$fh = fopen($myFile, 'a');
	fwrite($fh, $app);
	fclose($fh);
	$_SESSION["flag"]=2;
	header("Location: rating.php");
}
else
{
	$_SESSION["flag"]=1;
	header("Location: rating.php");
	
	//echo '<script> alert("You have already rated this") </script>';
	
}
?>