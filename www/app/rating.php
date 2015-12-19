<?php
include_once 'header.php';
session_start();
    ?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/pure/0.4.2/pure-min.css">
    <link rel="stylesheet" href="./pure-layout-side-menu/css/layouts/side-menu.css">
	<link rel="stylesheet" href="./css/layouts/bootstrap.min.css">
    <script src="js/ui.js"></script>
    <style>
    img {
      width: 120px;
      height: 120px;
    }
    form{
        margin-top: 180px;
        margin-left: 150px;
    }
</style>
</head>
<body>
<?php
if(isset($_SESSION["flag"]) && $_SESSION["flag"]==1) {
	echo "<center><div class='alert alert-warning'>
  <strong><h1>Warning!</strong> You already rated this movie.</h1>
</div></center>";
	$_SESSION["flag"]=0;
} else if(isset($_SESSION["flag"]) && $_SESSION["flag"]==2){
	echo "<center><div class='alert alert-success'>
  <strong><h1>Success!</strong> We got your rating.</h1>
</div></center>";
	$_SESSION["flag"]=0;
}
?>
    <div id="layout">
        <a href="#menu" id="menuLink" class="menu-link">
            <span></span>
        </a>
        <div id="menu">
            <div class="pure-menu pure-menu-open">

                <ul>
                    <li><a href="./dashboard.php">Home</a></li>
                    <li><a href="./displayMovies.php">Movies</a></li>
                    <li><a href="./watchedmovies.php">Watched Movies</a></li>
                    <li class="menu-item-divided pure-menu-selected"><a href="#">Rate Movies</a></li>
                    <?php
                        $id=$_SESSION['uid'];
                        $query="select rated from user where id=$id";
						////echo $id;
                        $res=mysqli_query($con,$query);
                        $flag=0;
                        while($row = mysqli_fetch_array($res)){
							//echo $row['rated'];
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
                    <li><a href="./fb/connect.php">Facebook !</a></li>
                </ul>
            </div>
        </div>
        <div class="content">
         <form class="pure-form pure-form-stacked" method="POST" action="sharad_action.php" >   
          <fieldset> 
           <div class="pure-g">
            <div class="pure-u-1 pure-u-med-1-3">
             <label for="state">Movies</label>
             <select name="movies"  class="pure-input-1-2">
                    <!-- <option>AL</option>
                    <option>CA</option>
                    <option>IL</option> -->

                    <?php
                    $query = 'select id,name from movie';
                    $result = mysqli_query($con,$query);

                    while($row = mysqli_fetch_array($result)){
                    	$name = $row['name'];
                    	$id = $row['id'];
                    	echo "<option value='$id' >";
                    	echo $name;
                    	echo '</option>';
                    }
                    ?>
                </select>
                
                <label for="sta">Rating</label>
                <select name="rating"  class="pure-input-1-2">
                	<option>1</option>
                	<option>2</option>
                	<option>3</option>
                	<option>4</option>
                	<option>5</option>
                </select>
            </div>
        </div>
        <button type="submit" class="pure-button pure-button-primary">Rate It !</button>
    </fieldset>
</form>
</div>
</div>
</body>
</html>
