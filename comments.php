<?php include_once('header.php') ?>

<?php

$sql = "SELECT comments.Author AS x_author, comments.Text FROM comments LEFT JOIN posts ON posts.Id=comments.post_Id WHERE comments.post_Id={$_GET['Id']}";
$statement = $connection->prepare($sql);

$statement->execute();

$statement->setFetchMode(PDO::FETCH_ASSOC);

$comments = $statement->fetchAll();

?>

<?php

foreach($comments as $comment){
    ?>
    <article class="comment-box">
        <p class="comment-heading">comment</p>
        <ul class="comment-content">
            <li><?php echo($comment['Text'])?></br>
            by <strong><?php echo($comment['x_author'])?></strong></li>
        </ul>
    </article>
<?php

}
?>
