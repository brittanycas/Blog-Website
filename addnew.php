<?php
  include 'header.php';
  require 'db.inc.php';

  if(isset($_POST['submit'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $author = mysqli_real_escape_string($conn, $_POST['author']);
    $body = mysqli_real_escape_string($conn, $_POST['body']);

    $query = "INSERT INTO blogposts(title, author, body) VALUES ('$title', '$author', '$body')";

    if(mysqli_query($conn, $query)) {
      header("Location: ./index.php");
    } else {
      //Post error
      echo 'ERROR';
    }
  }

?>

<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
  <label>Title</label>
  <input type="text" name="title">

  <label>Author</label>
  <input type="text" name="author">

  <label>Body</label>
  <textarea name="body"></textarea>

  <button type="submit" name="submit" value="Submit">Submit</button>

</form>

</body>
</html>
