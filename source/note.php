<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../dist/output.css">
  <link rel="stylesheet" href="../css/index.css">
  <link rel="icon" type="image/x-icon" href="./assets/logo/logo.png">
  <title>Astro</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>

<body>
 <?php include "../objects/navbar.php" ?>
<center>
 <form method="post" class="flex items-center gap-2 mt-4 px-4">
  <div>
  <input type="text" name="name" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-[#56AEFF] focus:ring-[#56AEFF]" placeholder="Elev" required />
</div>
  <div>
    <input type="text" name="note" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-[#56AEFF] focus:ring-[#56AEFF]" placeholder="Nota" required />
  </div>
  <button type="submit" name="submit" class= "text-white bg-[#56AEFF] hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-[#56AEFF] font-medium rounded-lg text-sm sm:w-auto px-5 py-2.5 text-center">Done</button>
</form>
</center>
<?php
$id = $_GET['number'];
if(isset($_POST['submit'])){
    $sql = "SELECT * FROM professor WHERE id=$id";
    $prof = mysqli_fetch_assoc(mysqli_query($con, $sql));
    $job = $prof['job']."_grade";
    $note = $_POST['note'];
    $name = $_POST['name'];
    $sql= "SELECT * FROM `students` WHERE id=$id and name='$name'";
    if(mysqli_num_rows(mysqli_query($con, $sql)) != 0){
       $sql = "UPDATE `students` SET $job = $note WHERE id = $id";
       if(!mysqli_query($con, $sql)){echo"Something went wrong!";}else{
            echo"All done!";
       }
    }else{
        echo "This student does not exist!";
    }
}
?>


 <script src="./scripts/index.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
</body>

</body>