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
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


</head>

<body>
 <?php include "../objects/navbar.php" ?>

 

    <div class="flex gap-3 md:flex-row flex-col">
      <div class="w-full h-full md:h-[350px] relative bg-gray-100 rounded-md py-4 text-left">
        <div class="px-6">
          <p class="text-lg font-medium text-astro-black">Recent activity</p>
          <p class="text-sm font-medium text-gray-500">Here you will see your activity in all your classes</p>
        </div>



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
                <th scope="col" class="px-6 py-3">
                  Activity
                </th>
              </tr>
            </thead>
            <tbody>


            <?php 
            $id = $_GET['number'];
            $role = $_GET['role'];
            $con = mysqli_connect(HOST, USERNAME, PASSWORD, DB);
            if ($con->connect_error) {
                  die("Connection failed: " . $con->connect_error);
            }
            ?>
            <?php 
            if($role == "students"){
              $classes = ['Matematica', 'Logica', 'Geografie', 'Fizica', 'Educatie fizica', 'Istorie', 'TIC', 'Romana', 'Chimie', 'Franceza', 'Engleza', 'Religie', 'Desen'];
              $grades=array();
              $sql = "SELECT * FROM $role WHERE id=$id";
              $row = mysqli_fetch_assoc(mysqli_query($con, $sql));
              $class_origin = $row['class_origin'];
              unset($row['name']);
              unset($row['id']);
              unset($row['password']);
              unset($row['class_origin']);
              foreach($row as $x => $x_value) {
              $grades[] = $x_value;
}
            
            
            $i = 0;
            $professor_found = array();
            $sql = mysqli_query($con, "SELECT MAX( ID ) AS max FROM `professor`;");
            $row = mysqli_fetch_array($sql);
            $lastpostid = $row['max'];
            for ($x = 1; $x <= $lastpostid; $x = $x + 1) {
              $sql = "SELECT * FROM professor WHERE id=$x";
              $professor = mysqli_fetch_assoc(mysqli_query($con, $sql));
              if(isset($professor['class_job'])){
              $professor_classes = explode(" ", $professor['class_job']);
         
              if(in_array($class_origin, $professor_classes)){
                $professor_found[] = $professor['name'];
                $i = $i+1;
                
              }
            }
            }
          
         
            $all_grades = 0; 
            for($x = 0;$x<=$i-1;$x = $x+1){
              $name_professor = $professor_found[$x];
              $classes_echo = $classes[$x];
              $grades_echo = $grades[$x];
              $all_grades = $all_grades+$grades_echo;
              echo "<tr class=''>
              <th scope='row' class='px-6 py-4 font-medium text-gray-900 whitespace-nowrap'>
                $classes_echo
              </th>
              <td class='px-6 py-4'>
                $name_professor
              </td>
              <td class='px-6 py-4'>
                <span>$grades_echo</span>
              </td>
              
            </tr>
           ";
            }
            $all_grades = floor($all_grades/($i-1));
          }
            else{
              $i = 0;
              $students_grade = array();
              $sql = "SELECT * FROM $role WHERE id=$id";
              $row = mysqli_fetch_assoc(mysqli_query($con, $sql));
              $job = $row['job']."_grade";
              $class_job = explode(" ", $row['class_job']);
              $sql = mysqli_query($con, "SELECT MAX( ID ) AS max FROM `students`;");
              $row = mysqli_fetch_array($sql);
              $lastpostid = $row['max'];
              for ($x = 1; $x <= $lastpostid; $x = $x + 1) {
                $sql = "SELECT * FROM students WHERE id=$x";
                $students = mysqli_fetch_assoc(mysqli_query($con, $sql));
                if(isset($students['class_origin'])){
             
                $students_origin = $students['class_origin'];
                if(in_array($students_origin, $class_job)){
                  $students_grades[] = $students[$job];
                  $students_origin_array[] = $students['class_origin'];
                  $students_name[] = $students['name'];
                  $i = $i+1;
                }
              }

            }
            $all_grades = 0;
            for($x = 0;$x<=$i-1;$x = $x+1){
              $name_students = $students_name[$x];
              $students_origin_echo = $students_origin_array[$x];
              $grade_students = $students_grades[$x];
              $all_grades = $all_grades+$grade_students;
              echo "<tr class=''>
              <th scope='row' class='px-6 py-4 font-medium text-gray-900 whitespace-nowrap'>
                $students_origin_echo
              </th>
              <td class='px-6 py-4'>
                $name_students
              </td>
              <td class='px-6 py-4'>
                <span>$grade_students</span>
              </td>
              
            </tr>
           ";
            }
            $all_grades = floor($all_grades/($i-1));
          }
            ?>
            
              

            </tbody>
          </table>
        </div>
      


      </div>
      <div class="w-full md:w-2/5 lg:w-2/5 xl:w-2/5 bg-gray-100 rounded-md p-4">
        <p class="text-lg font-medium text-astro-black">Total Activity Goal</p>
        <p class="text-sm font-medium text-gray-500">It is calculated by the sum of all your activity points, divided by the number of classes/students, plus 50</p>
        <div class="flex relative">
          <p class="text-5xl"><?php echo $all_grades + 50?></p>
          <span class="mt-[1.2rem]">%</span>
        </div>
      </div>
    </div>
  




  <script src="./scripts/index.js"></script>
  <script src="./scripts/stats.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
</body>


</html>