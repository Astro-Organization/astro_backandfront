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
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css" rel="stylesheet" />

</head>

<body>
 <?php include "../objects/navbar.php" ?>

  <div class="px-8 mt-4 grid place-content-center md:place-content-start grid-cols-[repeat(1,300px)] md:grid-cols-[repeat(2,400px)] xl:grid-cols-[repeat(3,400px)] gap-4 gap-y-6">

<?php
 $con = mysqli_connect(HOST, USERNAME, PASSWORD, DB);
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
  } 
$id = $_GET['number'];
$role = $_GET['role'];
$sql = mysqli_query($con, "SELECT MAX( ID ) AS max FROM `courses`;");
$row = mysqli_fetch_array($sql);
$lastpostid = $row['max']; 
if($role == "students"){
  $sql = "SELECT * FROM students WHERE id=$id";
  $student = mysqli_fetch_assoc(mysqli_query($con, $sql));
  $student_origin = $student['class_origin'];
  for($x = 1; $x<=$lastpostid; $x = $x+1){
    $sql = "SELECT * FROM courses WHERE id=$x";
    $courses = mysqli_fetch_assoc(mysqli_query($con, $sql));

    if($courses['class'] == $student_origin){
        $course_owner = $courses['owner'];
        $course_name = $courses['name'];
        $course_class = $courses['class'];
        $course_image = $courses['image'];
        $course_name_trim = str_replace(' ', '', $course_name);
        if($courses['image'] == 1){
          echo"
        <a href='./course_page.php?number=$id&role=$role&name=$course_name_trim'>
        <div class='flex bg-[#94e3ac] p-4  h-[200px] rounded-md font-poppins hover:translate-y-[-5px] transition-transform duration-200'>
        <div class='w-1/2 flex justify-center items-center'>
          <img src='../assets/ilustrations/$course_image.png' alt=''>
        </div>
        <div class='w-1/2 ml-4 flex flex-col justify-between'>
          <div class='flex flex-col mt-3'>
            <h1 class='text-xl text-white'>$course_name</h1>
            <p class='text-md text-gray-500'>$course_owner</p>
          </div>
          <div class='mb-4'>
            
            
          </div>
        </div>
      </div>
      </a>";
        } //$colour = "#94e3ac 
        if($courses['image'] == 2){
          echo"
          <a href='./course_page.php?number=$id&role=$role&name=$course_name_trim'>
          <div class='flex bg-[#9ed4ff] p-4  h-[200px] rounded-md font-poppins hover:translate-y-[-5px] transition-transform duration-200'>
          <div class='w-1/2 flex justify-center items-center'>
            <img src='../assets/ilustrations/$course_image.png' alt=''>
          </div>
          <div class='w-1/2 ml-4 flex flex-col justify-between'>
            <div class='flex flex-col mt-3'>
              <h1 class='text-xl text-white'>$course_name</h1>
              <p class='text-md text-gray-500'>$course_owner</p>
            </div>
            <div class='mb-4'>
              
              
            </div>
          </div>
        </div>
        </a>";} //$colour = "#9ed4ff";
        if($courses['image'] == 3){
          echo"
          <a href='./course_page.php?number=$id&role=$role&name=$course_name_trim'>
          <div class='flex bg-black p-4  h-[200px] rounded-md font-poppins hover:translate-y-[-5px] transition-transform duration-200'>
          <div class='w-1/2 flex justify-center items-center'>
            <img src='../assets/ilustrations/$course_image.png' alt=''>
          </div>
          <div class='w-1/2 ml-4 flex flex-col justify-between'>
            <div class='flex flex-col mt-3'>
              <h1 class='text-xl text-white'>$course_name</h1>
              <p class='text-md text-gray-500'>$course_owner</p>
            </div>
            <div class='mb-4'>
              
              
            </div>
          </div>
        </div>
        </a>";
        } //$colour = "#f7fafc";
        if($courses['image'] == 4){
          echo"
          <a href='./course_page.php?number=$id&role=$role&name=$course_name_trim'>
          <div class='flex bg-[#de9fc8] p-4  h-[200px] rounded-md font-poppins hover:translate-y-[-5px] transition-transform duration-200'>
          <div class='w-1/2 flex justify-center items-center'>
            <img src='../assets/ilustrations/$course_image.png' alt=''>
          </div>
          <div class='w-1/2 ml-4 flex flex-col justify-between'>
            <div class='flex flex-col mt-3'>
              <h1 class='text-xl text-white'>$course_name</h1>
              <p class='text-md text-gray-500'>$course_owner</p>
            </div>
            <div class='mb-4'>
              
              
            </div>
          </div>
        </div>
        </a>";
        } //$colour = "#de9fc8";
        if($courses['image'] == 5){
          echo"
          <a href='./course_page.php?number=$id&role=$role&name=$course_name_trim'>
          <div class='flex bg-[#de9fc8] p-4  h-[200px] rounded-md font-poppins hover:translate-y-[-5px] transition-transform duration-200'>
          <div class='w-1/2 flex justify-center items-center'>
            <img src='../assets/ilustrations/$course_image.png' alt=''>
          </div>
          <div class='w-1/2 ml-4 flex flex-col justify-between'>
            <div class='flex flex-col mt-3'>
              <h1 class='text-xl text-white'>$course_name</h1>
              <p class='text-md text-gray-500'>$course_owner</p>
            </div>
            <div class='mb-4'>
              
              
            </div>
          </div>
        </div>
        </a>";
        }
    }
  
  }
}
else{
  $sql = "SELECT * FROM professor WHERE id=$id";
  $professor = mysqli_fetch_assoc(mysqli_query($con, $sql));
  $professor_job = explode(" ", $professor['class_job']);

  for($x = 1; $x<=$lastpostid; $x = $x+1){
    $sql = "SELECT * FROM courses WHERE id=$x";
    $courses = mysqli_fetch_assoc(mysqli_query($con, $sql));

    if(in_array($courses['class'], $professor_job)){
        $course_owner = $courses['owner'];
        $course_name = $courses['name'];
        $course_class = $courses['class'];
        $course_image = $courses['image'];
        $course_name_trim = str_replace(' ', '', $course_name);
        if($courses['image'] == 1){
          echo"
        <a href='./course_page.php?number=$id&role=$role&name=$course_name_trim'>
        <div class='flex bg-[#94e3ac] p-4  h-[200px] rounded-md font-poppins hover:translate-y-[-5px] transition-transform duration-200'>
        <div class='w-1/2 flex justify-center items-center'>
          <img src='../assets/ilustrations/$course_image.png' alt=''>
        </div>
        <div class='w-1/2 ml-4 flex flex-col justify-between'>
          <div class='flex flex-col mt-3'>
            <h1 class='text-xl text-white'>$course_name</h1>
            <p class='text-md text-gray-500'>$course_class</p>
          </div>
          <div class='mb-4'>
            
            
          </div>
        </div>
      </div>
      </a>";
        } //$colour = "#94e3ac 
        if($courses['image'] == 2){
          echo"
          <a href='./course_page.php?number=$id&role=$role&name=$course_name_trim'>
          <div class='flex bg-[#9ed4ff] p-4  h-[200px] rounded-md font-poppins hover:translate-y-[-5px] transition-transform duration-200'>
          <div class='w-1/2 flex justify-center items-center'>
            <img src='../assets/ilustrations/$course_image.png' alt=''>
          </div>
          <div class='w-1/2 ml-4 flex flex-col justify-between'>
            <div class='flex flex-col mt-3'>
              <h1 class='text-xl text-white'>$course_name</h1>
              <p class='text-md text-gray-500'>$course_class</p>
            </div>
            <div class='mb-4'>
              
              
            </div>
          </div>
        </div>
        </a>";} //$colour = "#9ed4ff";
        if($courses['image'] == 3){
          echo"
          <a href='./course_page.php?number=$id&role=$role&name=$course_name_trim'>
          <div class='flex bg-black p-4  h-[200px] rounded-md font-poppins hover:translate-y-[-5px] transition-transform duration-200'>
          <div class='w-1/2 flex justify-center items-center'>
            <img src='../assets/ilustrations/$course_image.png' alt=''>
          </div>
          <div class='w-1/2 ml-4 flex flex-col justify-between'>
            <div class='flex flex-col mt-3'>
              <h1 class='text-xl text-white'>$course_name</h1>
              <p class='text-md text-gray-500'>$course_class</p>
            </div>
            <div class='mb-4'>
              
              
            </div>
          </div>
        </div>
        </a>";
        } //$colour = "#f7fafc";
        if($courses['image'] == 4){
          echo"
          <a href='./course_page.php?number=$id&role=$role&name=$course_name_trim'>
          <div class='flex bg-[#de9fc8] p-4  h-[200px] rounded-md font-poppins hover:translate-y-[-5px] transition-transform duration-200'>
          <div class='w-1/2 flex justify-center items-center'>
            <img src='../assets/ilustrations/$course_image.png' alt=''>
          </div>
          <div class='w-1/2 ml-4 flex flex-col justify-between'>
            <div class='flex flex-col mt-3'>
              <h1 class='text-xl text-white'>$course_name</h1>
              <p class='text-md text-gray-500'>$course_class</p>
            </div>
            <div class='mb-4'>
              
              
            </div>
          </div>
        </div>
        </a>";
        } //$colour = "#de9fc8";
        if($courses['image'] == 5){
          echo"
          <a href='./course_page.php?number=$id&role=$role&name=$course_name_trim'>
          <div class='flex bg-[#de9fc8] p-4  h-[200px] rounded-md font-poppins hover:translate-y-[-5px] transition-transform duration-200'>
          <div class='w-1/2 flex justify-center items-center'>
            <img src='../assets/ilustrations/$course_image.png' alt=''>
          </div>
          <div class='w-1/2 ml-4 flex flex-col justify-between'>
            <div class='flex flex-col mt-3'>
              <h1 class='text-xl text-white'>$course_name</h1>
              <p class='text-md text-gray-500'>$course_class</p>
            </div>
            <div class='mb-4'>
              
              
            </div>
          </div>
        </div>
        </a>";
        } //$colour = "#de9fc8";
   
    }
  }
}


?>


   

   



  <script src="./scripts/index.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
</body>


</html>