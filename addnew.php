<?php
  require './inc/db.inc.php';

  if(isset($_POST['submit'])) {
    $title = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['title']));
    $author = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['author']));
    $body = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['body']));

    $query = "INSERT INTO blogposts(title, author, body) VALUES ('$title', '$author', '$body')";

    if(mysqli_query($conn, $query)) {
      header("Location: http://blog.brittanycassell.com/index.php");
    } else {
      //Post error
      echo 'ERROR';
    }
  }
include 'header.php';
?>
<div class="p-4 m-4"></div>
<form class="m-3 text-center" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
  <div class="form-group">
    <label class="mx-auto">Title</label>
    <input class="form-control col-sm-3 mx-auto" type="text" name="title">
  </div>
  <div class="form-group">
    <label>Author</label>
    <input class="form-control col-sm-3 mx-auto" type="text" name="author">
  </div>
  <div class="form-group">
    <label>Body</label>
    <textarea class="form-control col-sm-3 mx-auto" rows="6" name="body"></textarea>
  </div>
  <button class="btn btn-primary" type="submit" name="submit" value="Submit">Submit</button>

</form>

<?php
include 'footer.php'
?>
