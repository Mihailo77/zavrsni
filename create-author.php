<?php include_once('db.php') ?>
<?php include_once('header.php') ?>


<?php
 if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['first_name'])) {
            $first_name = $_POST['first_name'];
        }
        if (!empty($_POST['last_name'])) {
            $last_name = $_POST['last_name'];
        }
        if (!empty($_POST['gender'])) {
            $gender = $_POST['gender'];
        }
        if(!empty($first_name) && !empty($last_name) && !empty($gender)) {
            $sql = "INSERT INTO author (first_name, last_name, gender) VALUES ('$first_name', '$last_name', '$gender')";
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
    <form action="create-author.php" method="POST">
        First Name: <input type="text" name="first_name"><br>
        Last Name: <input type="text" name="last_name"><br>
        <input type="radio"  name="gender" value="M">
        <label for="male">Male</label>
        <input type="radio" name="gender" value="F">
        <label for="male">Female</label><br>
        <input type="submit">
    </form>
