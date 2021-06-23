<?php

    include_once '/opt/lampp/htdocs/p1/template/header.php';

    $email = $password = " ";
    $errors = array('email' => " ", 'password'=> " " );

    if(isset($_POST['submit'])){

        if(empty($_POST['email'])){
            $errors['email'] = "An email is required";

        }else{
            $email = $_POST['email'];
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                echo 'not a valid email';


            }
        }

        if(empty($_POST['password'])){
            $errors['password'] = "A password is required";
        }else{
            $password = $_POST['password'];
            if(!preg_match('/^[a-zA-Z0-9]+$/')){
                $errors['password'] = "Not a valid password";

            }

        }
        
        
    }

?>


<!-- action="/opt/lampp/htdocs/p1/panel/user_panel.php" -->

<!DOCTYPE html>
<html lang="en">
<form class="form white"  method="POST">

    <label for="email"> Email</label>
    <input type="text" name="email"> <br>
    <label for="password"> Password </label>
    <input type="text" name="password"> <br>
    <input type="submit" name="submit" value="submit"  class="btn brand z-depth=0">

    

</form>

<?php include_once '/opt/lampp/htdocs/p1/template/footer.php'; ?>
</html>