<?php include 'header.php';
  require 'db.inc.php';
  $query = 'SELECT * FROM blogposts';
  $result = mysqli_query($conn, $query);
  $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
  mysqli_free_result($result);
  mysqli_close($conn);
?>

  <p>Welcome to my Blog. Please contact my with any questions you may have, I am always open for discussion</p>

  <h2>Posts</h2>
  <?php foreach($posts as $post) : ?>
    <div>
      <h3> <?php echo $post['title']; ?> </h3>
      <h4> <?php echo $post['author']; ?> </h4>
      <h4> <?php echo $post['postdate']; ?> </h4>
      <p> <?php echo $post['body']; ?> </p>
    </div>
  <?php endforeach; ?>




</body>
</html>
