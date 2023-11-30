<?php
    session_start();

    include("php/config.php");
    if(!isset($_SESSION['valid'])){
        header("location:index.php");
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="input.css">
    <link rel="stylesheet" href="dist/output.css">
    <title>Edit</title>
</head>
<body>
<div class="bg-gray-400" >
        <nav class=" flex justify-between p-4">
            <div class="logo text-4xl">
                <a href="home.php">

                    Logo
                </a>
</div>
<div class=" flex gap-4 items-center">
    <a href="#" class=" text-white underline">Change Profile</a>
    <a href="logout.php"><button class=" bg-blue-500 p-2 rounded text-white">Logout</button></a>
</div>
        </nav>
    </div>
    <?php
        if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $email = $_POST['email'];
            $age = $_POST['age'];

            $id = $_SESSION['id'];

            $edit_query = mysqli_query($con , "UPDATE users SET Username = '$username' , Email = '$email' , Age = '$age' WHERE Id = $id");
        
            if($edit_query){
                echo "<script>alert('Data Updated Successfully'); window.location.href='home.php';</script>";
            }} else {

                $id = $_SESSION['id'];
                $query = mysqli_query($con , "SELECT*FROM users WHERE Id = '$id'") or die("error occured");
            
                while($result = mysqli_fetch_assoc($query)){
                    $res_Uname = $result['Username'];
                    $res_Email = $result['Email'];
                    $res_Age= $result['Age'];
                }

    ?>
<form action="" method="post" class=" p-4 flex justify-center items-center h-screen align-middle">
    <div class=" flex-flex-col p-4 bg-blue-400 w-[500px] rounded-md text-center">
    <h1 class=" flex justify-center text-xl">
            Edit
        </h1>
        <div class=" my-4 flex flex-col gap-4">
                <label for="username" class="text-left flex">Username</label>
                <input type="text" name="username" placeholder="UserName" value = "<?php echo $res_Uname; ?>" class=" p-2 rounded">
            </div>
            <div class=" my-4 flex flex-col gap-4  ">                <label for="email" class="text-left flex">Email</label>
                <input type="text" name="email" placeholder="email"  value = "<?php echo $res_Email; ?>" class=" p-2 rounded">
            </div>
            <div class=" my-4 flex flex-col gap-4 ">                <label for="age" class="text-left flex">Age</label>
                <input type="text" name="age" placeholder="Age"  value = "<?php echo $res_Age; ?>" class=" p-2 rounded">
            </div>
            <div class="flex justify-center mt-4">
            <input type="submit" name="submit" value="update" class=" bg-red-500 p-2 rounded" >
            
            </input>
        </div>
        
        </div>
        </form>
        <?php } ?>
    </body>
    </html>