<?php include_once('header.php') ?>

<?php

$sql = "SELECT comments.author AS x_author, comments.text FROM comments LEFT JOIN posts ON posts.id=comments.post_id WHERE comments.post_id={$_GET['id']}";
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
