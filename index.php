<?php include 'header.php';
  require 'db.inc.php';
  $query = 'SELECT * FROM blogposts';
  $result = mysqli_query($conn, $query);
  $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
  mysqli_free_result($result);
  mysqli_close($conn);
?>

<div class="jumbotron jumbotron-fluid bg-primary text-white">
  <h1 class="text-center">My Blog</h1>
  <p class="text-center lead pt-2">Welcome to my Blog. Please contact my with any questions you may have, I am always open for discussion</p>
</div>

  <h2 class="text-center p-4">Posts</h2>
  <?php foreach($posts as $post) : ?>
    <div class="container text-center p-4">
      <div class="card bg-light">
      <div class="card-body p-0">
      <h3 class="card-title p-2 bg-secondary text-white"> <?php echo $post['title']; ?> </h3>
      <h5 class="card-subtitle p-2 text-secondary"> by: <?php echo $post['author']; ?> </h5>
      <p class="card-text p-3"> <?php echo $post['body']; ?> </p>
      <h6 class="card-footer m-0"> Posted: <?php echo $post['postdate']; ?> </h6>
    </div>
  </div>
  </div>
  <br>
  <?php endforeach; ?>




</body>
</html>
