<?php
  include('view/header.php');
  include('tmdb-api.php');
  include('Database/database.php');
  include('Database/Movie_db.php');

  // if you have no $conf it uses the default config
  $tmdb = new TMDB(); 

  //Insert your API Key of TMDB
  //Necessary if you use default conf
  $tmdb->setAPIKey('778c312ca7d0e33e1dc9009ff22e4d59');

    
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<div class = "header">
    <h1>My Movie Database</h1>
    <p> A <b>Movie Database</b> for the new age.</p>
  </div>


<div class="main">

  


  <?php 
    /*if($movies[0]['title']){
      if the movie title was searched then display movies 
      else just display plain screen

      we can user _session to pass php variables 
      another way to do that would be make an object variable line $movieID = new Movie();
      then get the variable like getmovieTitle; session may be be

    }
*/


    if(isset($_POST['submit'])) {
        foo();
        $movies = $tmdb->getPopularMovies(2);
    }

    

   $movies = $tmdb->getPopularMovies(1);
    $j = count($movies); 
    for($i=0; $i<$j; $i++) :
      $movieID = $movies[$i]['id'];        
      $movieTitle = $movies[$i]['title'];     
      $moviePoster = "http://cf2.imgobject.com/t/p/original/" . $movies[$i]['poster_path'] ; //"<img src=http://cf2.imgobject.com/t/p/w185" 
      $movieOverview = $movies[$i]['overview'];    
      $movieRating = $movies[$i]['rating'];      
      $movieDate = $movies[$i]['release_date'];        
  ?>  
  
      <div class="row">
        <div class="column">
          <a href ="MovieInformation?movie_id=<?php echo $movieID; ?>"> <img src="<?php echo $moviePoster; ?>" width= "185" height= "300" border="0" onerror="this.onerror=null; this.src='Images/GenericMovieTheater.jpg'" > </a>
          
           <!-- <div class="ItemCard__layer cover"></div>
                 <div class="ItemCard__summary cover">
                   <span class="ItemCard__meta category">Fonts</span>
                   <h2 class="ItemCard__title"><?php echo $movieTitle?></h2>
                   <h4 class="ItemCard__meta designer"><?php echo $movieDate?></h4>
                 </div> --> 
        </div>   
      </div>

   <?php endfor; ?>

  <form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
    <input type="button" name="submit" value="Submit">
</form>





 
<script>






  (function() {
          $( document )
            .on( "mousemove", ".row", function( event ) {

            var halfW = ( this.clientWidth / 2 );
            var halfH = ( this.clientHeight / 2 );

            var coorX = ( halfW - ( event.pageX - this.offsetLeft ) );
            var coorY = ( halfH - ( event.pageY - this.offsetTop ) );

            var degX  = ( ( coorY / halfH ) * 10 ) + 'deg'; // max. degree = 10
            var degY  = ( ( coorX / halfW ) * -10 ) + 'deg'; // max. degree = 10

            $( this ).css( 'transform', function() {

              return 'perspective( 600px ) translate3d( 0, -2px, 0 ) scale(1.1) rotateX('+ degX +') rotateY('+ degY +')';
            } )
              .children( '.ItemCard__summary' )
              .css( 'transform', function() {
              return 'perspective( 600px ) translate3d( 0, 0, 0 ) rotateX('+ degX +') rotateY('+ degY +')';
            } );
          } )
            .on( "mouseout", ".row", function() {
            $( this ).removeAttr( 'style' )
              .children( '.ItemCard__summary' )
              .removeAttr( 'style' );
          } );
        })();





</script>
