<?php
    session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/input.css">
    <link rel="stylesheet" href="dist/output.css">
    <title>Document</title>
</head>
<body>
    <?php
        include("php/config.php");
        if(isset($_POST["submit"])){
            $email = mysqli_real_escape_string($con,$_POST['email']);
            $password = mysqli_real_escape_string($con,$_POST['password']);

            $result = mysqli_query($con,"SELECT * FROM `users` WHERE email = '$email' AND password = '$password'") or die("Select Error");
            $row = mysqli_fetch_assoc($result);

            if(is_array($row) && !empty($row)){
                $_SESSION['valid'] = $row['Email'];
                $_SESSION['username'] = $row['Username'];
                $_SESSION['password'] = $row['Password'];
                $_SESSION['age'] = $row['Age'];
                $_SESSION['id'] = $row['Id'];

            } else{
                echo "<script>alert('Invalid credentials'); window.location.href='index.php';</script>";
            }
            if(isset($_SESSION['id'] , $_SESSION['password'])){
               echo "<script>window.location.href='home.php';</script>";
            }
        } else{
            

    
    
    ?>
<form action="" method="post" class=" p-4 flex justify-center items-center h-screen align-middle">
    <div class=" flex-flex-col p-4 bg-red-400 w-96 rounded-md">
        <h1 class=" flex justify-center text-xl">
            Login
        </h1>

        <div class=" my-4 flex gap-4 items-center">
            <label for="email">Email</label>
            <input type="text" name="email" placeholder="Email" class=" p-2 rounded">
</div>
        <div class="flex gap-4 items-center">
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Password" class=" p-2 rounded">
        </div>
        <div class="flex justify-center mt-4">
        <input type="submit" name="submit" value="Login" class=" bg-blue-500 p-2 rounded" >
            
            </input>
        </div>
        <div class="flex gap-4 mt-4 justify-center">
            <p>Don't Have an account?</p>
            <span><a href="/phpproject/register.php" class=" text-blue-500">SignUp</a></span>
        </div>
    </div>
        </form>
        <?php } ?>
</body>
</html>