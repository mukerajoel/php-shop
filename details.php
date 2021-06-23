<?php

    include('config/db_connect.php');  

    //delete
    if(isset($_POST['delete'])){
        $id_to_delete= mysqli_real_escape_string($conn, $_POST['id_to_delete']);

        $sql = "DELETE FROM camera WHERE id = $id_to_delete";

        if(mysqli_query($conn, $sql)){
            //success
            header('location: index.php');
        }{
            //fail
            echo 'querry error: ' . mysqli_error($conn);
        }
    }

    //check GET request id param
    if(isset($_GET['id'])){
        $id = mysqli_real_escape_string($conn, $_GET['id']);

        //make sql
        $sql = "SELECT * FROM camera WHERE id = $id";

        //get querry result
        $result = mysqli_query($conn, $sql);

        //fetch result
        $camera = mysqli_fetch_assoc($result);

        //free$clse
        mysqli_free_result($result);

        mysqli_close($conn);

    }

?>

<!DOCTYPE html>
<html lang="en">
<?php include_once 'template/header.php'; ?>

<div class="container center">
    <?php if($camera): ?>
        <h4> <?php echo htmlspecialchars($camera['name']); ?> </h4>
        <p> Model: <?php echo htmlspecialchars($camera['category']); ?></p>
        <p> <?php echo date($camera['created_at']); ?></p>
        <h5>Serial Number <?php echo htmlspecialchars($camera['serial']); ?> </h5>

        <!--delete form -->
        <form action="details.php" method="POST">
            <input type="hidden" name="id_to_delete" value="<?php echo $camera['id'] ?>">
            <input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">
        </form>

    <?php else: ?>
        <h5>Does not exist</h5>
    <?php endif;?>
</div>

<?php include_once 'template/footer.php'; ?>
</html>