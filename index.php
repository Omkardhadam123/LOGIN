<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    
    <div>
    <h1 class="text-5xl text-center">Login</h1>
</div>

<section class="max-w-[100%] pt-[100px]">
<form method="POST" action="index.php" class="max-w-[700px] sm:mx-auto mx-[20px] bg-gray-200 rounded shadow-lg  py-[20px] px-[20px]">
  <div class="mb-5">
    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
    <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter Your Email" required />
  </div>
  <div class="mb-5">
    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your password</label>
    <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
  </div>
  
  <div class="text-center">
  <button type="submit" name="submit" id="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login</button>
  </div>

  <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 my-[10px]"><a href="register.php">Registration</a></button>
  <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 my-[10px]"><a href="forgot.php">Forgot Password</a></button>
  
</form>
</section>  

<?php
include 'connect.php';

if(isset($_POST['submit'])){

    $email=$_POST['email'];
    $password=$_POST['password'];

    $sql="select * from `users`";
    $result=mysqli_query($conn,$sql);

    if($result){
        while($row=mysqli_fetch_assoc($result)){
            if($row['email']==$email && $row['password']==$password){
                $check=1;
            }else{
                $check=0;
            }
        }
    }

        if($check==1){
            echo "<div class='p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400' role='alert'>
                    <span class='font-medium'>WELCOMEE</span> 
                    </div>";
            echo '<META HTTP-EQUIV="Refresh" Content="0.5;URL=wlc.php">';
        }else{
            echo "<div class='p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400' role='alert'>
                    <span class='font-medium'> WRONG Email/Password || User Not Found Please Register first !!</span>
                    </div>";
        }

    }


?>


<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>