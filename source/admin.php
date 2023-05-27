<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="./assets/logo/logo.png">
  <title>Astro</title>

</head>

<body>
<?php
define('HOST', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');
define('DB', 'project');
$con = mysqli_connect(HOST, USERNAME, PASSWORD, DB);
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
?>



<h1><b> Forum management </b></h1>
<br>
<form method="post">
<h3>Delete post by ID:</h3>
<input type="text" name="delid"></input>
<br>
<button name="godel">GO</button>
</form>

<?php
if(isset($_POST['godel'])){
  $id = $_POST['delid'];
  $sql = "DELETE FROM forum WHERE id=$id";
  mysqli_query($con, $sql);
}
?>
<h1><b> Class management </b></h1>
<form method="post">
<h3>Delete course by ID:</h3>
<input type="text" name="delid"></input>
<br>
<button name="godel2">GO</button>
</form>
<?php
if(isset($_POST['godel2'])){
  $id = $_POST['delid'];
  $sql = "DELETE FROM courses WHERE id=$id";
  mysqli_query($con, $sql);
}
?>
<form method="post">
<h3>Create course</h3>
<input type="text" name="name">Name</input>
<br>
<br>
<input type="text" name="owner">Owner</input>
<br>
<br>
<input type="text" name="class">What class has acces to it(9A, 9B etc.)</input>
<br>
<br>
<input type="text" name="image">Image number(number required)</input>
<br>

<button name="gomake">GO</button>
</form>
<?php
if(isset($_POST['gomake'])){
  $name = $_POST['name'];
  $owner = $_POST['owner'];
  $class = $_POST['class'];
  $image = $_POST['image'];
  $sql = "INSERT INTO courses (name, owner, class, image) VALUES ('$name', '$owner', '$class', '$image')";
  mysqli_query($con, $sql);
}
?>
</body>