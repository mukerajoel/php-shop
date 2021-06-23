<?php

include_once '/opt/lampp/htdocs/p1/template/header.php';

include('/opt/lampp/htdocs/p1/config/db_connect.php');

$name = $category = $serial = '';
$errors = array('name'=>'', 'category'=>'', 'serial'=>'');


if(isset($_POST['submit'])){;

    
    if(empty($_POST['name'])){
        $errors['name'] = 'An name is required';
    }else{
        $name = $_POST['name'];
        if(!preg_match('/^[a-zA-Z\s]+$/', $name)){
        $errors['name'] = 'Enter a name';
        }
       // if(!filter_var($name, FILTER_VALI)){
     //       Echo 'Must be a name';
       // }
        //echo htmlspecialchars($_POST['name']);
    }

    if(empty($_POST['category'])){
        $errors['category'] = 'A category is required';
    }else{
        $category = $_POST['category'];
        if(!preg_match('/^[a-zA-Z\s]+$/', $category)){
            $errors['category'] = 'Category must be valid';
        }
        //echo htmlspecialchars($_POST['category']);
    }

    if(empty($_POST['serial'])){
        $errors['serial'] = 'A serial number is required';
    }else{
        $serial = $_POST['serial'];
        if(!preg_match('/^[a-zA-Z0-9]+$/', $serial)){
            $errors['serial'] = 'Not a valid serial';
        }
       //echo htmlspecialchars($_POST['serial']);
    }

    if(array_filter($errors)){

    }else{

        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $category = mysqli_real_escape_string($conn, $_POST['category']);
        $serial = mysqli_real_escape_string($conn, $_POST['serial']);

        //create  sql
         $sql = "INSERT INTO camera(name,category,serial) VALUES('$name','$category', '$serial')";

         //save to db
        
         if(mysqli_query($conn, $sql)){
            //success
             //redirect
            header('Location:index.php');
         }else{
            echo "querry error: " . mysqli_error($conn);

         }

       
    }
}




?>
<!DOCTYPE html>
<html lang="en">  

<section class="container grey-text">
    <form class="white" action="add.php" method="POST"> 
        <div class="red-text"><?php echo$errors['name'];?></div>
        <label for="name">Product Name</label>
        <input type="text" name="name" value=<?php echo htmlspecialchars($name);?>>
        <div class="red-text"><?php echo$errors['category'];?></div>
        <label for="name"> Category</label>
        <input type="text" name="category" value=<?php echo htmlspecialchars($category);?>>
        <div class="red-text"><?php echo$errors['serial'];?></div>
        <label for="name"> Serial Number</label>
        <input type="text" name="serial" value=<?php echo htmlspecialchars($serial);?>>
        <div class="center">
            <input type="submit" class="btn brand z-depth-0" name="submit" value="submit">
        </div>


    </form>

</section>
<?php include_once '/opt/lampp/htdocs/p1/template/footer.php'; ?>
</html>