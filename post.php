<?php
  require './inc/db.inc.php';
  $id = mysqli_real_escape_string($conn, $_GET['id']);
  $query = 'SELECT * FROM blogposts WHERE postid = '.$id;
  $result = mysqli_query($conn, $query);
  $post = mysqli_fetch_assoc($result);
  mysqli_free_result($result);

  if(isset($_POST['delete'])) {
    $stmt = 'DELETE FROM blogposts WHERE postid = '.$id;
    if(mysqli_query($conn, $stmt)) {
      header("Location: http://blog.brittanycassell.com/index.php");
    } else {
      //Post error
      echo 'ERROR';
    }

}
  include 'header.php';
?>


<div class="container m-auto text-center p-4">
  <h3 class=""> <?php echo $post['title']; ?> </h3>
  <h5 class=""> by: <?php echo $post['author']; ?> </h5>
  <h6 class=""> Posted: <?php echo date('d M Y h:i:s A', strtotime($post['postdate'])); ?> </h6>
  <p class="p-4"> <?php echo $post['body']; ?> </p>

<div class="container row justify-content-between">
  <form method="POST" action="./editpost.php?id=<?php echo $post['postid']; ?>">
    <button name="edit" class="btn btn-info">Edit Post</button>
  </form>

  <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
    <button name="delete" class="btn btn-danger">Delete</button>
  </form>
</div>
</div>


<?php
include 'footer.php'
?>
