<?php 
 include('config/db_connect.php');
    //querry for all cameras
$sql = 'SELECT name, category, id FROM camera ORDER BY created_at';

    //query and result
$result = mysqli_query($conn, $sql);

    // fetch resulting rows as an array
$camera = mysqli_fetch_all($result, MYSQLI_ASSOC);

    //free result
mysqli_free_result($result);

   //close db connection
mysqli_close($conn);

    //cycle through array
//explode(',', $camera[0]['category']);


?>

<!DOCTYPE html>
<html lang="en">

    <?php include_once 'template/header.php'; ?>

    <h4 class="center grey-text">Cameras</h4>

    <div class="container">
        <div class="row">
            <?php foreach($camera as $camera): ?> 

                <div class="col s6 md3 ">

                    <div class="card z-depth-0">
                    <img src="img/2.jpg" class="camera" alt="">
                        <div class="card-content ceter">
                            <h6> <?php echo htmlspecialchars($camera['name']); ?> </h6>
                            <div> <?php echo htmlspecialchars($camera['category']); ?> </div>
                        </div>
                        <div class="card-action right-align">
                            <a href="details.php?id=<?php echo $camera['id']; ?>" class="brand-text blue ">+</a>
                        </div>
                    </div>

                </div>

            <?php endforeach; ?>
        </div>
    </div>

    <?php include_once 'template/footer.php'; ?>

</html>
