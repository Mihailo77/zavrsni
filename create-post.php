<?php include_once('db.php')?>
<?php include_once('header.php') ?>



<?php
  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(!empty($_POST['title'])) {
      $title = $_POST['title'];
    }
    if(!empty($_POST['body'])) {
      $body = $_POST['body'];
    }
    if(!empty($title) && !empty($body)) {
      $sql = "INSERT INTO posts (title, body) VALUES ('$title', '$body')";
      try {
        $statement = $connection->prepare($sql);
        $statement->execute();
        echo 'New record created succefully.';
      } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
      }
    }
    
  }
?>
<form method="post" action="create-post.php">
  <div class="container">
    Title: <input type="text" name="title"> <br><br>
    Body: <textarea name="body" rows="20" cols="80"></textarea> <br><br>
    <button type="submit" name="post-button" id="create-post">submit</button>
  </div>
</form>
