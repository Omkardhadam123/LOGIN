<?php
error_reporting(0);
session_start();
include 'connect.php';
if(isset($_SESSION['email'])){
  $eemail = $_SESSION['email'];
  $sql="select * from `users`";
  $result=mysqli_query($conn,$sql);

  if($result){
      while($row=mysqli_fetch_assoc($result)){
      if($row['email']==$eemail){
        $iid=$row['id'];
        $name=$row['name'];
        $email=$row['email'];
        $opassword=$row['password'];
        
        echo $iid;
        echo $name;
        echo $email;
        echo $opassword;
  }
      }
  }
    
  unset($_SESSION['email']);
  unset($_SESSION['otp']);
  session_destroy();
}
if(isset($_POST['submit'])){
    $nname=$_POST['name'];
    $nemail=$_POST['email'];
    $npassword=$_POST['password'];
    
    $sql="UPDATE users SET name='$nname',email='$nemail',password='$npassword' WHERE id='$iid'";
    $result2=mysqli_query($conn,$sql);
    if($result2){
      echo "<div class='p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400' role='alert'>
                    <span class='font-medium'>DATA UPDATED</span>
                    </div>";
                    echo '<META HTTP-EQUIV="Refresh" Content="0.5;URL=index.php">';
    }else{
      echo "<div class='p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400' role='alert'>
  <span class='font-medium'>DATA NOT UPDATED !!</span>
</div>";
    }

  }

  
?>

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

<section class="max-w-[100%] pt-[100px]">
<form method="POST" action="update.php" class="max-w-[700px] sm:mx-auto mx-[20px] bg-gray-200 rounded shadow-lg  py-[20px] px-[20px]">
<div class="mb-5">
    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Enter New Name</label>
    <input type="text" id="name" name="name" value="<?php echo $name ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="New Name" required />
  </div>
  <div class="mb-5">
    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Enter New Email</label>
    <input type="text" id="email" name="email" value="<?php echo $email ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="New Email" required />
  </div>
  <div class="mb-5">
    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Enter New Password</label>
    <input type="text" id="password" name="password" value="<?php echo $opassword ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="New Password" required />
  </div>

  <div class="text-center">
  <button type="submit" name="submit" id="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
  </div>

</form>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>    
</body>
</html>