<?php 
 include('db.php');
 ?>
    <?php include_once('header.php');
   
    ?>

<main role="main" class="container">
    <div class="row">
        <div class="col-sm-8 blog-main">
        <?php 
            $sql = "SELECT * FROM posts ORDER BY created_at DESC LIMIT 3";
            $statement = $connection->prepare($sql);

            $statement->execute();

            $statement->setFetchMode(PDO::FETCH_ASSOC);
            $posts = $statement->fetchAll();
            ?>

            <?php
            foreach ($posts as $post) {
            ?>
            <div>
                <h2><a class="blog-title" href="single-post.php?id=<?php echo ($post['Id']) ?>"> <?php echo $post['Title'];?></a></h2>
                <p class="blog-post-meta"><?php echo $post['Created_at']?> by <a href="#"><?php echo $post['Author']?></a></p>

                <p><?php echo $post['Body']?></p>
            </div>
            <?php } ?>

            <nav class="blog-pagination">
                <a class="btn btn-outline-primary" href="#">Older</a>
                <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
            </nav>
        </div>
        <?php include('sidebar.php') ?>
    </div>
</main>
<?php include('footer.php')?>