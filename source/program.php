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
<?php
$numberofposts = 1000;
$id = $_GET['number'];
$con = mysqli_connect(HOST, USERNAME, PASSWORD, DB);
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
$sql = mysqli_query($con, "SELECT MAX( ID ) AS max FROM `forum`;");
$row = mysqli_fetch_array($sql);
$lastpostid = $row['max']; //To generate all of the posts. The last one will be the one with the highest ID. 
$check_nr_of_posts = 0;

?>


     
   


  <div class="px-8 mt-4 flex justify-between items-center">
    <h1 class="text-2xl font-bold">Classrooms</h1>
  </div>

  <div class="px-8 mt-4 mb-4">
  <div class="h-full md:h-[350px] relative bg-gray-100 rounded-md py-4 text-left">
    <div class="relative overflow-x-auto">
      <table class="w-full text-sm text-left text-gray-500">
        <thead class="text-xs text-gray-700 uppercase">
          <tr>
            <th scope="col" class="px-6 py-3">
              Class
            </th>
            <th scope="col" class="px-6 py-3">
              Index
            </th>
            <th scope="col" class="px-6 py-3">
              Floor
            </th>
            <th scope="col" class="px-6 py-3">
              Number of classes
            </th>
            
          </tr>
        </thead>
        <tbody>
<?php 
  for ($x = 1; $x <= $lastpostid; $x = $x + 1) {
    if ($check_nr_of_posts == $numberofposts)
        break;
    $sql = "SELECT * FROM classes WHERE id=$x";
    $classes = mysqli_fetch_assoc(mysqli_query($con, $sql));
    if (isset($classes['name']) && isset($classes['number']) && isset($classes['floor'])) { //"Nu fa cum a facut unchiul Alex aici. Este un idiot." -unchiul Alex
      $class_name = $classes['name'];
      $class_id = $classes['id'];
      $class_floor = $classes['floor'];
      $class_number = $classes['number'];
     echo" <tr class=''>
      <th scope='row' class='px-6 py-4 font-medium text-gray-900 whitespace-nowrap'>
        $class_name
      </th>
      <td class='px-6 py-4'>
        $class_id
      </td>
      <td class='px-6 py-4'>
       $class_floor
      </td>
      <td class='px-6 py-4'>
       $class_number
      </td>
    </tr>";

    }
  }



?>



  
        </tbody>
      </table>
    </div>
  </div>



<script src="./scripts/index.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
</body>
</html>