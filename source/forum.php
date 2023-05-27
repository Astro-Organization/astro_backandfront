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
<div class="px-8 mt-4 flex justify-between items-center">
    <h1 class="text-2xl font-bold">All discussions</h1>
    <div>
    <?php $id=$_GET['number']; $role = $_GET['role']; echo"<a href='./post.php?number=$id&role=$role'>"; ?>
        <button
          class="p-2 bg-astro-blue rounded-md flex font-semibold items-center text-white transition-colors hover:bg-blue-700"><svg
            xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24">
            <path fill="currentColor" d="M11 19v-6H5v-2h6V5h2v6h6v2h-6v6h-2Z" />
          </svg><span>Add a post</span></button>
      </a>
    </div>
  </div>
<?php

$numberofposts = 100;


$con = mysqli_connect(HOST, USERNAME, PASSWORD, DB);
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
$sql = mysqli_query($con, "SELECT MAX( ID ) AS max FROM `forum`;");
$row = mysqli_fetch_array($sql);
$lastpostid = $row['max']; //To generate all of the posts. The last one will be the one with the highest ID. 
$check_nr_of_posts = 0; ?>








  <div id="staticModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="fixed top-0 right-0 m-4">
      <button type="button" data-modal-hide="staticModal"
        class="text-white hover:text-error rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
          <path fill="currentColor"
            d="M19 6.41L17.59 5L12 10.59L6.41 5L5 6.41L10.59 12L5 17.59L6.41 19L12 13.41L17.59 19L19 17.59L13.41 12z" />
        </svg>
        <span class="sr-only">Close menu</span>
      </button>
    </div>
    <div class="h-[500px] flex flex-col">
      <img src="./assets/forum/library2.avif" class="w-full h-full object-contain">
      <a href="./assets/forum/library2.avif"
        class="text-gray-300 hover:text-white hover:underline transition-transform duration-200 cursor-pointer">Download
        image</a>
    </div>
  </div>
  <script src="./scripts/index.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
  <?php
error_reporting(0);
        for ($x = 1; $x <= $lastpostid; $x = $x + 1) {
            if ($check_nr_of_posts == $numberofposts)
                break;
            $sql = "SELECT * FROM forum WHERE id=$x";
            $posts = mysqli_fetch_assoc(mysqli_query($con, $sql));
            if (isset($posts['id']) and isset($posts['subject']) and isset($posts['ttext'])) { //"Nu fa cum a facut unchiul Alex aici. Este un idiot." -unchiul Alex
                $id_post = $posts['id'];
                $id_op = $posts['id_op'];
                $subject = $posts['subject'];
                $text = $posts['ttext'];



                if(isset($posts['filename'])){
                $filename = $posts['filename'];
                if(isset($filename)) $filename_termination = explode(".", $filename)[1];
                 if(isset($filename)) $filename_title = explode(".", $filename)[0];
              if($filename_termination != "jpg" and $filename_termination != "jpeg" and $filename_termination != "png" and $filename_termination != "gif" and $filename_termination != "webp"){
                echo " 
                <div class='flex flex-col gap-3 px-8 mt-8 items-center mb-8'>
                <div class='relative w-full md:w-[1200px] h-full bg-gray-100 px-6 py-4 rounded-md'>
            
                  <div class='text-sm flex justify-between'>
                    <div class='flex gap-1 justify-center'>
                      <p class='text-gray-500'>Id of poster:$id_op</p>
                      <p class='text-gray-500'>•</p>
                      <p class='text-gray-500'>$id_post</p>
                    </div>
                  </div>
            
                  <div class='mt-2'>
                    <h1 class='text-lg font-semibold'>$subject</h1>
                    <p class='text-md'>
                     $text
                    </p>
                    </div>
                  <div class='flex mt-2 sm:w-[350px] sm:h-[100px] cursor-pointer'>
                  <div class='p-4 rounded-md'>
                  <div class='flex flex-col gap-2'>
                    <div class='flex items-center gap-2 border-b border-spacing-2'>
                      <svg width='35' height='35' viewBox='0 0 109 105' fill='none' xmlns='http://www.w3.org/2000/svg'>
                        <path
                          d='M93.6773 22.4642C94.1944 20.1452 94.7741 18.5236 95.4165 17.5994C96.0576 16.676 97.185 15.7632 98.7986 14.8608C100.202 14.0918 101.296 13.3963 102.08 12.7741C102.866 12.1534 103.367 11.3563 103.584 10.3829C103.845 9.20913 103.669 8.14802 103.055 7.1996C102.439 6.25093 101.43 5.6202 100.027 5.30741C98.5671 4.98185 97.3584 5.17818 96.4013 5.89641C95.4453 6.61489 94.7077 7.39709 94.1885 8.24301L90.1866 5.36721C91.1963 3.66898 92.6529 2.32581 94.5561 1.3377C96.4594 0.349596 98.6278 0.12684 101.061 0.669438C104.067 1.33971 106.193 2.69294 107.437 4.72913C108.681 6.76392 109.041 8.95513 108.518 11.3027C108.198 12.7342 107.618 13.8899 106.776 14.7697C105.934 15.6481 104.71 16.5846 103.106 17.5793C101.403 18.6121 100.324 19.4454 99.8674 20.0794C99.4097 20.7142 98.9925 21.8762 98.6159 23.5654L93.6773 22.4642ZM93.7841 33.307C92.8393 33.0964 92.1058 32.58 91.5834 31.7579C91.0602 30.9344 90.9039 30.0502 91.1146 29.1055C91.3252 28.1607 91.8423 27.4267 92.6658 26.9035C93.4879 26.3811 94.3714 26.2253 95.3161 26.436C96.2609 26.6466 96.995 27.1631 97.5185 27.9855C98.0406 28.8087 98.1963 29.6927 97.9857 30.6375C97.775 31.5823 97.2585 32.3164 96.4361 32.8399C95.6129 33.362 94.7289 33.5177 93.7841 33.307Z'
        <div class='px-4 py-4 flex flex-col gap-1' >
          <h1 class='hover:text-astro-blue text-lg'><a href='../uploads/$filename' download>$filename_title</a></h1>
          <p class='text-gray-500 uppercase'>$filename_termination</p>
        </div>
                  </div>
                  </div>
                  </div>
                  </div>
                  </div>
                  
      ";}else{
        echo " <div class='flex flex-col gap-3 px-8 mt-8 items-center mb-8'>
                <div class='relative w-full md:w-[1200px] h-full bg-gray-100 px-6 py-4 rounded-md'>
            
                  <div class='text-sm flex justify-between'>
                    <div class='flex gap-1 justify-center'>
                      <p class='text-gray-500'>Id of poster:$id_op</p>
                      <p class='text-gray-500'>•</p>
                      <p class='text-gray-500'>$id_post</p>
                    </div>
                  </div>
            
                  <div class='mt-2'>
                    <h1 class='text-lg font-semibold'>$subject</h1>
                    <p class='text-md'>
                     $text
                    </p>
                    </div>
                  <img src='../uploads/$filename' id='myImg' alt = 'A file posted in the Astro forums'
                    class='h-48 object-cover bg-center rounded-md mr-[15px]' alt=''> </div>
                  </div>
                  
      </div>";

      }
            
            

                
             }
                else{
                  echo " 
                  
                  <div class='flex flex-col gap-3 px-8 mt-8 items-center mb-8'>
                  <div class='relative w-full md:w-[1200px] h-full bg-gray-100 px-6 py-4 rounded-md'>
              
                    <div class='text-sm flex justify-between'>
                      <div class='flex gap-1 justify-center'>
                        <p class='text-gray-500'>Id of poster:$id_op</p>
                        <p class='text-gray-500'>•</p>
                        <p class='text-gray-500'>$id_post</p>
                      </div>
                    </div>
              
                    <div class='mt-2'>
                      <h1 class='text-lg font-semibold'>$subject</h1>
                      <p class='text-md'>
                       $text
                      </p>
                    </div>
                    </div>
                    </div>
                    </div>
                    ";
                }
                $check_nr_of_posts++;
            }
        }
        ?>








</html>