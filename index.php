<?php
  require './inc/db.inc.php';
  $query = 'SELECT * FROM blogposts ORDER BY postdate DESC';
  $result = mysqli_query($conn, $query);
  $posts = array();
  while ($post = $result->fetch_assoc()) {
      $posts[] = $post;
  }
  mysqli_free_result($result);
  mysqli_close($conn);
  include 'header.php';
?>


<div class="jumbotron jumbotron-fluid bg-primary text-white">
  <h1 class="text-center">My Blog</h1>
  <p class="text-center lead pt-2">Welcome to my Blog! Please contact me with any questions you may have. I am always open for discussion!</p>
</div>

  <h2 class="text-center p-4">Posts</h2>
  <?php foreach($posts as $post) : ?>
    <div class="container text-center p-4">
      <div class="card bg-light">
      <div class="card-body p-0">
      <h3 class="card-title p-2 bg-secondary text-white"> <?php echo $post['title']; ?> </h3>
      <h5 class="card-subtitle p-2 text-secondary"> by: <?php echo $post['author']; ?> </h5>
      <p class="card-text p-3"> <?php echo $post['body']; ?> </p>
      <div class="card-footer row justify-content-between m-0">
        <h6 class="col-2 text-muted"> Posted: <?php echo date('d M Y h:i:s A', strtotime($post['postdate'])); ?> </h6>
        <a class="btn btn-primary text-white col-2" href="./post.php?id=<?php echo $post['postid']; ?>">More Info</a>
      </div>
    </div>
  </div>
  </div>
  <br>

  <?php endforeach; ?>



  <?php
  include 'footer.php'
  ?>
