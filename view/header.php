<!DOCTYPE html>
<html>	
<head>
    <title>Movie Database</title>
     <link rel="stylesheet" href="main.css" type="text/css"> 
</head>

<header>
	<nav class="navbar">
        <a href ="/MovieRatings/Home.php"> <img src="Images/Logo.jpg" width= "50" height= "50" border="0"> </a>
        <ul class="main-nav" id="js-menu">
            <li>
                <a href="../MovieRatings/Home.php" class="nav-links">Home</a>
            </li>
            <li>
                <a href="../MovieRatings/TopRated.php" class="nav-links">Popular</a>
            </li>
            <li>
                <a href="#" class="nav-links">Discover</a>
            </li>
            <li>
                <form action ="/MovieRatings/Search.php" method="post">
			    	<input type="text" name="search" placeholder="Search movies">
			    	<input type="submit" value=">>" class="search-button">
	    		</form>
            </li>
        </ul>
	</nav>

</header>

<!-- <header>
	<div class = "header">
		<h1>My Movie Database</h1>
		<p> A <b>Movie Database</b> for the new age.</p>
	</div>

	<div class="navbar">

	  Centered link
	  <div class="navbar-centered">
	    <a href="#home" class="active">Home</a>
	  </div>
	  
	  Left-aligned links (default)
	  <a href="#Popular">Popular</a>
	  <a href="#Discover">Discover</a>
	  
	  Right-aligned links
	  <div class="navbar-right">
	    <form action ="" method="post">
	    	<input type="text" name="search" placeholder="Search for movie">
	    	<input type="submit" value="Search">
	    </form>
	  </div>

	</div>

</header> -->
<body>

