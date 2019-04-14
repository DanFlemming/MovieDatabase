<?php
    
    include('tmdb-api.php');
    include('Database/database.php');
    include('Database/Movie_db.php');
    
    // if you have no $conf it uses the default config
    $tmdb = new TMDB(); 
    
    //Insert your API Key of TMDB
    //Necessary if you use default conf
    $tmdb->setAPIKey('778c312ca7d0e33e1dc9009ff22e4d59');


    if(isset($_POST['search'])) {
        $search = $_POST['search'];
        $movies = $tmdb->searchMovie($search);
    }
    else
       
    
    
    //var_dump($movies[0]);
    //echo $movies[0];
    //echo $movies['id'];
    //echo $movies[0]['id']. "------------";



/*    $movieId        = $movies['id'];
    echo $movieId;
    $j = count($movies);
    for($i=0; $i<$j; $i++) {
        $movieId[$i]        = $movies['id'];
        
        $movie[$i]['id']              = $movies['id'];
        $movie[$i]['title']           = $movies['movie_title'];
        $movie[$i]['poster_path']     = $movies['movie_poster'];
        $movie[$i]['overview']        = $movies['movie_overview'];
        $movie[$i]['rating']          = $movies['movie_rating'];
        $movie[$i]['release_date']    = $movies['movie_date'];

        
        echo $movieId['id'];
        echo $movie[$i]['title'] . "<br>"; 

        echo $movieId[$i];   
    }
*/
    
 /*   
    for($i=0; $i<$j; $i++) {
        $data[] = $movies[$i];
        //var_dump($data[$i]); 
        //echo $data[$i] ."<br>";
        //send $data to database
        //add_product($data);

    }*/
    //echo $movies;
    //var_dump($array["foo"]);
    //echo $movies[$movieId]['id'];
    //var_dump($movies['id']);

/*    $items['name'] = $movies['movie_title'];
    $items['id']   = $movies['movie_id'];
    $items['poster']   = $movies['movie_poster'];
    
    $j = count($movies);
    for($i=0; $i<=$j; $i++) {
        $items['name'] = $movies['movie_title'];
        $items['id']   = $movies['movie_id'];
        $items['poster']   = $movies['movie_poster'];
        echo $items['poster'];
        echo $items['id'];
        echo $items['name'] . "<br>";
    }
    */

    //echo count($data) . "Movies Displayed";


// Get the last product ID that was automatically generated
            //$product_id = $db->lastInsertId();
            //return $product_id;

    /*echo '  <div class="panel panel-default">
                <div class="panel-heading">
                    Popular Movies
                </div>
                <div class="panel-body">
                    <ul>';*/
    //$movies.getTitle();

    //foreach($movies as $movie){
        //$movieTitle[] = $movie->getTitle() ;
        //insert statement into database
        //$movieTitles = explode(PHP_EOL, $movieTitle);
        //echo $movieTitle[0];
        //var_dump($movieTitle);// $movieTitle ;
        //echo $movies[0];

        /*echo '          <li>'. $movie->getTitle() .' (<a href="https://www.themoviedb.org/movie/'. $movie->getID() .'">'. $movie->getID() .'</a>)</li>';
        echo '<img src="http://cf2.imgobject.com/t/p/' . $tmdb->getImageURL('w185') . $movie->getPoster() . '"/></li>';*/
    //}/
 

?>


