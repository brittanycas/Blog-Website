<?php
  include 'header.php';
  require 'db.inc.php';
  $id = mysqli_real_escape_string($conn, $_GET['id']);
  $query = 'SELECT * FROM blogposts WHERE postid = '.$id;
  $result = mysqli_query($conn, $query);
  $post = mysqli_fetch_assoc($result);
  mysqli_free_result($result);

  if(isset($_POST['submit'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $author = mysqli_real_escape_string($conn, $_POST['author']);
    $body = mysqli_real_escape_string($conn, $_POST['body']);

    $query = "UPDATE blogposts SET title = '$title', author ='$author', body = '$body' WHERE postid = ".$id;

    if(mysqli_query($conn, $query)) {
      header("Location: ./index.php");
    } else {
      //Post error
      echo 'ERROR';
    }
  }


?>

<div class="p-4 m-4"></div>
<form class="m-3 text-center" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
  <div class="form-group">
    <label class="mx-auto">Title</label>
    <input class="form-control col-sm-3 mx-auto" type="text" name="title" value="<?php echo $post['title']; ?>">
  </div>
  <div class="form-group">
    <label>Author</label>
    <input class="form-control col-sm-3 mx-auto" type="text" name="author" value="<?php echo $post['author']; ?>">
  </div>
  <div class="form-group">
    <label>Body</label>
    <textarea class="form-control col-sm-3 mx-auto" rows="6" name="body"><?php echo $post['body']; ?></textarea>
  </div>
  <button class="btn btn-primary" type="submit" name="submit" value="Submit">Submit</button>

</form>
