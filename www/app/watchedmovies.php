<?php
include 'header.php';
session_start();
?>
<html>
<head>
	<title>Movie Time</title>
	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.4.2/pure.css">
	<link rel="stylesheet" href="css/layouts/side-menu.css">
	<style>
	img {
		width: 120px;
		height: 120px;
	}
	table{
		margin-top: 20px;
		margin-left: 120px;
	}
	</style>
</head>
<body>
	<div id="layout">

		<a href="#menu" id="menuLink" class="menu-link">
			<span></span>
		</a>

		<div id="menu">
			<div class="pure-menu pure-menu-open">
				<!-- <a class="pure-menu-heading" href="#">Company</a> -->

				<ul>
					<li><a href="./dashboard.php">Home</a></li>
					<li><a href="./displayMovies.php">Movies</a></li>
					<li class="menu-item-divided pure-menu-selected"><a href="#">Watched Movies</a></li>
					<li><a href="./rating.php">Rate Movies</a></li>
					<?php
					    $id=$_SESSION['uid'];
					    $query="select rated from user where id=$id";
					    $res=mysqli_query($con,$query);
					    $flag=0;
					    while($row = mysqli_fetch_array($res)){
					        if($row['rated']>=20){
					            $flag=1;
					        }
					    }
					    if($flag==1)
					    {
					        echo "<li><a href='./suggest.php'>Suggest Me !</a></li>";
					    }
					?>
					<li><a href="./logout.php">Logout</a></li>
				</ul>
			</div>
		</div>
		<div class="content">
			<table class="pure-table pure-table-horizontal">
				<thead>
					<tr>
						<th align:'center'>Image</th>
						<th align:'center'>Name</th>
						<th align:'center'>Your Rating</th>
					</tr>
				</thead>

				<tbody>
					<?php

					$id=$_SESSION['uid'];
					$users=$_SESSION['users'];

					$query="select * from rating where uid=$id";
					$res=mysqli_query($con,$query);

					$ct=0;

					while($row = mysqli_fetch_array($res)){
						$x=$row['movieid'];
						$rating=$row['rating'];
						
						$query="select name,url from movie where id=$x";
						$res1=mysqli_query($con,$query);

						$moviename='';
						$urlname='';
						while($row1 = mysqli_fetch_array($res1)){
							$moviename=$row1['name'];
							$urlname=$row1['url'];
						}

						if($ct%2==0)
						{
							echo '<tr class="pure-table-odd">';
						}
						$lin="'https://www.google.co.in/images/nav_logo242.png'";
						//echo "<td><img src=./image/$x.jpg /></td>";
						echo "<td><img src=".$lin."/></td>";
						echo "<td><a href='$urlname' >$moviename</a><br/></td>";
						echo "<td>$rating</td></tr>";

						$ct=$ct+1;
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>
