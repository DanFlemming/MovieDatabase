<?php
  include 'view/header.php';  
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
    
?>

  <!-- Bootstrap 3 -->
    
    <script src="https://code.jquery.com/jquery-2.1.4.min.js" type="text/javascript"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>



 <?php 
  $movieID      = $_GET['movie_id'];
  $movie        = get_movie($movieID);
  $movieID      = $movie['movie_id'];
  $movieTitle   = $movie['movie_title'];

  $moviePoster    = "http://cf2.imgobject.com/t/p/original/".$movie['movie_poster'];
  $movieOverview  = $movie['movie_overview'];
  $movieRating    = $movie['movie_rating'];
  $movieDate      = $movie['movie_date']; 
  $movieTrailer   = $movie['movie_trailer'];
  $movieBackdrop  = "http://cf2.imgobject.com/t/p/original/".$movie['movie_backdrop'];


 ?>
<div class="main">
  <div class="backdrop">
    <img src="<?php echo $movieBackdrop; ?>" width= "100%" height= "100%" border="0" onerror="this.onerror=null; this.src='Images/GenericMovieTheater.jpg'" >
  </div>

  <div class="info">
    <div class="left">
      <div class="trailer" data-trailer-youtube-id="<?php echo $movieTrailer;?>" data-toggle="modal" data-target="#trailer">
           
           <img class="movie-img" src="<?php echo $moviePoster; ?>" alt="<?php echo $movieTitle;?>"  width= "185" height= "250" border="0" onerror="this.onerror=null; this.src='Images/GenericMovieTheater.jpg'">
      
            <img class="play" src="Images/Play.svg">
       
      </div>
      <p> Rating: <?php echo $movieRating ?> </p>
    </div>

    <div class="modal " id="trailer">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <a href="#" class="hanging-close" data-dismiss="modal" aria-hidden="true">
            <img src='Images/Asset 1.png' alt='Close' />
          </a>
          <div class="scale-media" id="trailer-video-container">
          </div>
        </div>
      </div>
    </div>

    <div class="right">
      <div class="title">
        <h1><?php echo $movieTitle; ?></h1> 
      </div>
      <div class="description">
        <p> <?php echo $movieOverview; ?></p>
      </div>
    </div> 
  </div> 

  

<script type="text/javascript" charset="utf-8">
    // Pause the video when the modal is closed
    $(document).on('click', '.hanging-close, .modal-backdrop, .modal', function (event) {
        // Remove the src so the player itself gets removed, as this is the only
        // reliable way to ensure the video stops playing in IE
        $("#trailer-video-container").empty();
    });
    // Start playing the video whenever the trailer modal is opened
    $(document).on('click', '.trailer',  function (event) {
        var trailerYouTubeId = $(this).attr('data-trailer-youtube-id')
        var sourceUrl = '//www.youtube.com/embed/' + trailerYouTubeId;
        $("#trailer-video-container").empty().append($("<iframe></iframe>", {
          'id': 'trailer-video',
          'type': 'text-html',
          'src': sourceUrl,
          'frameborder': 0
        }));
    });
    // Animate in the movies when the page loads
    $(document).ready(function () {
      var deferred = $.Deferred();
      $(".movie-btn").hide();
      var movie_tile_length = $('.movie-tile').length
      i = 0;
      $('.movie-tile').hide().first().show("fast", function showNext() {
        $(this).next("div").show("fast", showNext);
        i++;
        if(i == movie_tile_length)
            $(".movie-btn").show('slow');
        console.log(i);
      });
          
      //is_touch_device see -> http://stackoverflow.com/a/15691248/1815624
      var is_touch_device = ("ontouchstart" in window) || window.DocumentTouch && document instanceof DocumentTouch;
      $('[data-toggle="popover"]').popover({ html : true, trigger: is_touch_device ? "focus" : "hover focus"});
      
    });
    /**
     * Vertically center Bootstrap 3 modals
     * see -> https://gist.github.com/CrandellWS/8bcd88c6eca4a8260e16
     */
    $(function() {
        function reposition() {
            var modal = $(this),
                dialog = modal.find('.modal-dialog');
            modal.css('display', 'block');
            dialog.css("margin-top", Math.max(0, ($(window).height() - dialog.height()) / 2));
        }
        $('.modal').on('show.bs.modal', reposition);
        $(window).on('resize', function() {
            $('.modal:visible').each(reposition);
        });
    });
    </script>

</div>
<?php include 'view/footer.php'; ?>