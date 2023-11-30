<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="input.css">
    <link rel="stylesheet" href="dist/output.css">
    <title>Resister</title>
</head>
<body>
        <?php
            include("php/config.php");
            if(isset($_POST['submit'])) {
                $username = $_POST['username'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $age = $_POST['age'];
                
                //Verifying the unique email

                $verify_query = mysqli_query($con, "SELECT Email FROM users WHERE Email='$email'");
                if(mysqli_num_rows($verify_query) !=0 ) {
                    echo "<script>alert('Email already exists'); window.location.href='register.php';</script>";
                } else{
                    mysqli_query($con, "INSERT INTO users(Username,Email,Age,Password) VALUES ('$username','$email','$age','$password')") or die("Error occured");
                    echo "<script>alert('Registration Successful');window.location.href='index.php';</script>";
                    
                }
            }
            else{
        ?>
<form action="" method="post" class=" p-4 flex justify-center items-center h-screen align-middle">
    <div class=" flex-flex-col p-4 bg-blue-400 w-[500px] rounded-md text-center">
    <h1 class=" flex justify-center text-xl">
            Sign Up
        </h1>
        <div class=" my-4 flex flex-col gap-4">
                <label for="username" class="text-left flex">Username</label>
                <input type="text" name="username" placeholder="UserName" class=" p-2 rounded">
            </div>
            <div class=" my-4 flex flex-col gap-4  ">                <label for="email" class="text-left flex">Email</label>
                <input type="text" name="email" placeholder="email" class=" p-2 rounded">
            </div>
            <div class=" my-4 flex flex-col gap-4 ">                <label for="password" class="text-left flex">Password</label>
                <input type="text" name="password" placeholder="Password" class=" p-2 rounded">
            </div>
            <div class=" my-4 flex flex-col gap-4 ">                <label for="age" class="text-left flex">Age</label>
                <input type="text" name="age" placeholder="Age" class=" p-2 rounded">
            </div>
            <div class="flex justify-center mt-4">
            <input type="submit" name="submit" value="Register" class=" bg-red-500 p-2 rounded" >
            
            </input>
        </div>
        <div class="flex gap-4 mt-4 justify-center">
            <p>Already Have an account?</p>
            <span><a href="/phpproject/index.php" class=" text-red-500">Login</a></span>
        </div>
        </div>
        </form>
        <?php } ?>
    </body>
    </html>