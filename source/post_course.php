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
<form method="post" enctype="multipart/form-data">
  <div class="flex justify-center gap-1 items-center mt-4">
    <div class="w-[1200px] h-full bg-gray-100 rounded-md p-6">
      
        <div class="mb-6">
          <label for="text" class="block mb-2 text-md font-medium text-gray-900">Subject</label>
          <input type="text" name="subject"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-astro-blue focus:border-astro-blue block w-full p-2.5"
            required>
        </div>
        <label for="message" class="block mb-2 text-md font-medium text-gray-900">Description</label>

        <textarea id="message" rows="4" name="ttext"
          class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-astro-blue focus:border-astro-blue"
          placeholder="Write your thoughts.."></textarea>

        <label class="block mb-2 mt-4 text-md font-medium text-gray-900" for="file_input">Upload file</label>
        <input
          class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
          id="file_input" type="file" name="fileToUpload">
        <div class="flex justify-between items-center mt-4">
          <div class="flex items-center">
            <input id="default-checkbox" type="checkbox" value=""
              class="w-4 h-4 text-astro-blue bg-gray-100 border-gray-300 rounded focus:ring-astro-blue focus:ring-2">
            <label for="default-checkbox" class="ml-2 text-md font-medium text-gray-900">Only for teachers</label>
          </div>
          <button
            class="p-2 bg-astro-blue rounded-md flex font-semibold items-center text-white transition-colors hover:bg-blue-700" name="submit">Submit</button>
        </div>
      
    </div>
    </div>
</form>
  <script src="./scripts/index.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
<?php
include "../passwords.php";

if(isset($_POST["submit"])){
$target_dir = "../uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));




  
  



if ($_FILES["fileToUpload"]["size"] > $storagelimit) {
  $uploadOk = 0;
}


if ($uploadOk == 0) {
  echo "";

} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "";
  } else {
    echo "";
  }
}
$filename = "";
if(isset($target_file)) $filename =  htmlspecialchars( basename( $_FILES["fileToUpload"]["name"]));
$con = mysqli_connect(HOST, USERNAME, PASSWORD, DB);
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
$id = $_GET['number'];
$origin = $_GET['origin'];
$subject = $_POST['subject'];
$ttext = $_POST['ttext'];
echo $origin;
echo $subject;
echo $ttext; //Pentru ca nu vr sa am probleme cu php nu am numit "text", ci "ttext".
$sql = "insert into courses_forum (subject, ttext, filename, origin) values ('$subject', '$ttext', '$filename', '$origin')";
    if(mysqli_query($con, $sql)){
        echo "<meta HTTP-EQUIV='REFRESH' content='0; url=./forum.php?number=$id>";
    }
    else{
        echo "Error when connecting to server.";
    }
}

?>
</body>
</html>