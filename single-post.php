<?php include('header.php')?>
       <?php 
       if (isset($_GET['id'])) {
            $sql = "SELECT * FROM posts WHERE id={$_GET['id']}";
            $statement = $connection->prepare($sql);

            $statement->execute();

            $statement->setFetchMode(PDO::FETCH_ASSOC);

            $post = $statement->fetch();
            
            ?>


<main role="main" class="container">

    <div class="row">

        <div class="col-sm-8 blog-main">

       

            <div class="blog-post">
                <h2 class="blog-post-title"><?php echo $post['title'];?></a></h2>
                <p class="blog-post-meta"><?php echo $post['created_at']?> by <a href="#"><?php echo $post['author']?></a></p>

                <p><?php echo $post['body']?></p>
            </div>

            <?php include('comments.php') ?>


        </div>
       <?php
       }
       ?>
        <?php include('sidebar.php') ?>

    </div>

</main>

<?php include('footer.php')?>

