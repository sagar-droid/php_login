
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
    <title>Document</title>
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
    <?php
        $id = $_SESSION['id'];
        $query = mysqli_query($con , "SELECT * FROM users WHERE Id = '$id'");

        while($result = mysqli_fetch_assoc($query)){
            $res_Uname = $result['Username'];
            $res_Email = $result['Email'];
            $res_Age = $result['Age'];
            $res_id = $result['Id'];
        }
    
    
        echo"<a href='edit.php?Id=$res_id' class=' text-white underline'>Change Profile</a>";
    ?>
    <a href="/phpproject"><button class=" bg-blue-500 p-2 rounded text-white">Logout</button></a>
</div>
        </nav>
    </div>
    <main class=" gap-4 flex w-full justify-center mt-4">
        <div class="gap-4 flex flex-col">
            <div class=" flex gap-4">
                <div class=" bg-gray-300 p-4 rounded-md">
                    <p>Hello <b><?php echo $res_Uname ?></b>, Welcome</p>
                </div>
                <div class=" bg-gray-200 p-4 rounded-md">
                    <p>Your email is <b><?php echo $res_Email ?></b></p>
                </div>
            </div>
            <div>
            <div class=" bg-gray-100 p-4 rounded-md">
                    <p>And you are <b><?php echo $res_Age ?></b></p>
                </div>
            </div>
        </div>
    </main>
</body>
</html>