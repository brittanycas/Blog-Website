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


<h2 class="text-center p-4">Blog List</h2>

<div class="container">
<?php foreach($posts as $post) : ?>
  <div class="row justify-content-center">
    <h3 class= "col-sm-3 mx-auto text-right"> <a href="./post.php?id=<?php echo $post['postid']; ?>"><?php echo $post['title']; ?> </a> </h3>
    <h6 class= "text-muted col-sm-3 mx-auto text-left"> Posted: <?php echo date('d M Y h:i:s A', strtotime($post['postdate'])); ?> </h6>
  </div>
  <?php endforeach; ?>
</div>

<?php
include 'footer.php'
?>
