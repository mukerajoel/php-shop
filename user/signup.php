<?php
    include_once '/opt/lampp/htdocs/p1/template/header.php';
?>

<!DOCTYPE html>
<html lang="en">



<form action="" method="POST">
<label for="fname"> First Name</label>
    <input type="text" name="fname"> <br>
    <label for="lname"> Last Name</label>
    <input type="text" name="lname"> <br>
    <label for="email"> Email</label>
    <input type="text" name="email"> <br>
    <label for="password"> Password </label>
    <input type="text" name="password"> <br>
    <label for="password"> Repeat Password </label>
    <input type="text" name="password"> <br>
     <input type="submit" name="submit" value="submit"  class="btn brand z-depth=0">


</form>
    <?php include_once '/opt/lampp/htdocs/p1/template/footer.php'; ?>

</html>


