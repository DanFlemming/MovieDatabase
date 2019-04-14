<?php

function add_movie($movieId, $movieTitle, $moviePoster, $movieOverview, $movieRating, $movieDate, $movieTrailer, $movieBackdrop) {
    global $db;
    $query = 'INSERT IGNORE INTO movies 
                    (movie_id, movie_title, movie_poster, movie_overview, movie_rating, movie_date, movie_trailer, movie_backdrop)
              VALUES
                    (:movieId, :movieTitle, :moviePoster, :movieOverview, :movieRating, :movieDate, :movieTrailer, :movieBackdrop)';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':movieId', $movieId);
        $statement->bindValue(':movieTitle', $movieTitle);
        $statement->bindValue(':moviePoster', $moviePoster);
        $statement->bindValue(':movieOverview', $movieOverview);
        $statement->bindValue(':movieRating', $movieRating);
        $statement->bindValue(':movieDate', $movieDate);
        $statement->bindValue(':movieBackdrop', $movieBackdrop);
        $statement->bindValue(':movieTrailer',$movieTrailer);
        $statement->execute();
        $statement->closeCursor();

    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function get_movie($movieId) {
    global $db;
    $query = 'SELECT * FROM movies
              WHERE movie_id = :movieId';
    $statement = $db->prepare($query);
    $statement->bindValue(":movieId", $movieId);
    $statement->execute();
    $movie = $statement->fetch();
    $statement->closeCursor();
    

    //$movie_name = $movie['movie_title'];
    //$movie_= $movie['movie_id'];
    
    //$items[$product_id]['name'] = $product['productName'];
    //echo $movie_name;
    //echo $movie_hello;
    //$movie_name = $movie['movie_title'];
    //$movie_name = $movie['movie_title'];//testing this 
    //echo $movie_name . "<br>";

    
    return $movie;

}





?>