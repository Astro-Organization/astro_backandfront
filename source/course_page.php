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


  <div class="px-4 py-2 font-poppins">
    <div class="w-full h-full rounded-md bg-gray-100">
      <div class="relative">
        <img src="../assets/courses/classroom.avif" alt="Your Image" class="w-full h-[180px] object-cover rounded-t-md">
        <div class="absolute inset-0 bg-black opacity-50 rounded-t-md"></div>
      </div>
      <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-3 px-8 py-4">
        <div>
<?php
$con = mysqli_connect(HOST, USERNAME, PASSWORD, DB);
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
$name = $_GET['name'];
$id = $_GET['number'];
$role = $_GET['role'];
 $sql = "SELECT * FROM courses WHERE name='$name'";
 $courses = mysqli_fetch_assoc(mysqli_query($con, $sql));
 $owner = $courses['owner'];
 $class = $courses['class']
 
?>

         <?php echo" <h1 class='text-2xl'>$name<span class='text-gray-500'> • $class</span></h1>" ?>
          <?php echo" <p class='text-gray-500'>$owner</p> "?>
        </div>
        <div class="flex gap-2">
          <button  data-modal-target="materials" data-modal-toggle="materials"
            class="py-2 flex gap-1 px-2 rounded-md bg-astro-blue text-white transition-colors duration-150 hover:bg-blue-700"><svg
              xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="md:block hidden">
              <path fill="currentColor"
                d="M15 13q.825 0 1.413-.588T17 11q0-.825-.588-1.413T15 9q-.825 0-1.413.588T13 11q0 .825.588 1.413T15 13Zm-4 4h8v-.55q0-1.125-1.1-1.788T15 14q-1.8 0-2.9.663T11 16.45V17Zm-7 3q-.825 0-1.413-.588T2 18V6q0-.825.588-1.413T4 4h6l2 2h8q.825 0 1.413.588T22 8v10q0 .825-.588 1.413T20 20H4ZM4 6v12h16V8h-8.825l-2-2H4Zm0 0v12V6Z" />
            </svg>Materials</button>
            <button data-modal-target="materials2" data-modal-toggle="materials2"
              class="py-2 flex gap-1 px-2 rounded-md bg-astro-blue text-white transition-colors duration-150 hover:bg-blue-700">Studenti</button>
          
            <?php
            if($_GET['role'] == "professor"){
              echo
              "
              <a href='post_course.php?number=$id&role=$role&origin=$name'> 
              <button
              class='py-2 flex gap-1 px-2 rounded-md bg-astro-blue text-white transition-colors duration-150 hover:bg-blue-700'>Post</button>
              <a href = 'note.php?number=$id&role=$role&origin=$name'</a>'
              <button class='text-white bg-[#56AEFF] hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-[#56AEFF] font-medium rounded-lg text-sm sm:w-auto px-5 py-2.5 text-center'>Add note</button>";
            }
            ?>
           
        </div>
      </div>
    </div>
  </div>
  

  

<?php
error_reporting(0);
$sql = mysqli_query($con, "SELECT MAX( ID ) AS max FROM `courses_forum`;");
$row = mysqli_fetch_array($sql);
$lastpostid = $row['max']; //To generate all of the posts. The last one will be the one with the highest ID. 
$check_nr_of_posts = 0;
$numberofposts = 100;



        for ($x = 1; $x <= $lastpostid; $x = $x + 1) {
            if ($check_nr_of_posts == $numberofposts)
                break;
            $sql = "SELECT * FROM courses_forum WHERE id=$x and origin='$name'";
          
            $posts = mysqli_fetch_assoc(mysqli_query($con, $sql));
            if (isset($posts['id']) and isset($posts['subject']) and isset($posts['ttext'])) { //"Nu fa cum a facut unchiul Alex aici. Este un idiot." -unchiul Alex
                $id_post = $posts['id'];
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
   <?php
            $sql = mysqli_query($con,"SELECT * FROM courses WHERE name='$name'");
            $row = mysqli_fetch_array($sql);
            $test = $row['owner'];
            ?>
<div id="materials" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
  class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
  <div class="relative w-full max-w-2xl max-h-full">
    <!-- Modal content -->
    <div class="relative bg-white rounded-lg shadow">
      <!-- Modal header -->
      <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
        <h3 class="text-xl font-semibold text-gray-900">
          Materials
        </h3>
        <button type="button"
          class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
          data-modal-hide="materials">
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
              clip-rule="evenodd"></path>
          </svg>
        </button>
    </div>
    <div class="px-4 py-4 space-y-6">
  
      <div class="mt-4 grid grid-cols-2 md:grid-cols-3 gap-4 overflow-y-scroll">
        
        <?php
        for ($x = 1; $x <= $lastpostid; $x = $x + 1) {
          if ($check_nr_of_posts == $numberofposts)
              break;
            
          $sql = "SELECT * FROM courses_forum WHERE id=$x and origin='$name'";
          $posts = mysqli_fetch_assoc(mysqli_query($con, $sql));
   
          $filename = $posts['filename'];
          if($filename != ""){
          echo " <a href='' class='w-40 h-40 items-center justify-center  bg-gray-100 rounded-md flex flex-col hover:border hover:border-astro-blue transition-colors duration-200'>
          <div class='h-4/6    text-[#56AEFF] flex justify-center items-center'>
            <svg xmlns='http://www.w3.org/2000/svg' class='w-24 h-24' viewBox='0 0 24 24'>
              <path fill='currentColor'
                d='M13 9V3.5L18.5 9M6 2c-1.11 0-2 .89-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6H6Z' />
            </svg>
          </div>
          <div class='flex items-center justify-center'>
            <p class='text-lg text-gray-700' style='user-select: none;'  href='../uploads/$filename' download>$filename</p>
          </div>
        </a>";
         
          }
        }
        ?>
      </div>
    </div>
  </div>
</div>


      </div>


<div id="materials2" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
  class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
  <div class="relative w-full max-w-2xl max-h-full">
    <!-- Modal content -->
    <div class="relative bg-white rounded-lg shadow">
      <!-- Modal header -->
      <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
        <h3 class="text-xl font-semibold text-gray-900">
          Students
        </h3>
        <button type="button"
          class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
          data-modal-hide="materials2">
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
              clip-rule="evenodd"></path>
          </svg>
        </button>
    </div>
    <div class="px-4 py-4 space-y-6">
    <div class="flex justify-center items-center">
      <div class="mt-4 grid grid-cols-2 md:grid-cols-3 gap-4 overflow-y-scroll">
      <div class="relative"> 
      <div class="flex justify-center items-center">
      <div class="relative overflow-x-auto">
    
          <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase">
              <tr>
                <th scope="col" class="px-6 py-3">
                  Class
                </th>
                <th scope="col" class="px-6 py-3">
                  Student / Teacher
                </th>
                
              </tr>
            </thead>
            <tbody>      
      <?php
      $i = 0;
      $students_grades = array();
      $students_names = array();
            $sql = mysqli_query($con,"SELECT * FROM courses WHERE name='$name'");
            $row = mysqli_fetch_array($sql);
            $class = $row['class'];
            $job = $row['job']."_grade";
            for ($x = 1; $x <= $lastpostid; $x = $x + 1) {
              if ($check_nr_of_posts == $numberofposts)
                  break;
              $sql = "SELECT * FROM students WHERE id=$x";
              $students = mysqli_fetch_assoc(mysqli_query($con, $sql));
              if(isset($students['id']) && $students['class_origin'] == $class){
                $students_grades[] = $students[$job];
                $students_names[] = $students['name']; 
                $i++;
                }
            
            }
            for ($x = 0; $x <= $i-1; $x = $x + 1) {
              $grade_student = $students_grades[$x];
              $name_student = $students_names[$x];
              echo"<tr class=''>
              <td class='px-6 py-4'>
                $name_student
              </td>
              <td class='px-6 py-4'>
                <span>$grade_student</span>
              </td>
              
            </tr>
           ";
            }
            ?>
              
            
      
      
          </div>
    </div>
  </div>
</div>



      </div>
          </div>
          </div>
          </div>
          </div>
          




  <script src="./scripts/index.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
</body>


</html>