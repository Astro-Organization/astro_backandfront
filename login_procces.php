<?php
include 'passwords.php';
define('HOST', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');
define('DB', 'project');
$con = mysqli_connect(HOST, USERNAME, PASSWORD, DB);
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
echo "You did not write anything!";

$id = $_POST['number'];
$pass = $_POST['password'];
$username = $_POST['username'];




if($id == $addstudents){
    $username_real = explode(".", $username)[0];
    $username_class = explode(".", $username)[1];
    $sql = "insert into students (name, password, class_origin) values ('$username_real', '$pass', '$username_class')";
    if(mysqli_query($con, $sql)){
        echo "<meta HTTP-EQUIV='REFRESH' content='0; url=./index.php>";

    }
    else{
        echo "Error when connecting to server.";
    }
}else{
    if($id == $addprofessor){
    $username_real = explode(".", $username)[0];
    $username_job = explode(".", $username)[1];
    $sql = "insert into professor (name, password, job) values ('$username_real', '$pass', '$username_job')";
    if(mysqli_query($con, $sql)){
        echo "<meta HTTP-EQUIV='REFRESH' content='0; url=./index.php>";

    }
    else{
        echo "Error when connecting to server.";
    }
    
    }else{

        if($id == $addclass){
            $username_real = explode(".", $username)[0];
            $username_floor = explode(".", $username)[1];
            $username_number = explode(".", $username)[2];
            $sql = "insert into classes (name, floor, number) values ('$username_real', '$username_floor', $username_number)";
            if(mysqli_query($con, $sql)){
                echo "<meta HTTP-EQUIV='REFRESH' content='0; url=./index.php'>";
        
            }
            else{
                echo "Error when connecting to server.";
            }
        }
        if($id == $addcourse){
            $username_real = explode(".", $username)[0];
            $username_owner = explode(".", $username)[1];
            $username_class = explode(".", $username)[2];
            $username_image = explode(".", $username)[3];
            $sql = "insert into courses (name, owner, class, image) values ('$username_real', '$username_owner', '$username_class', '$username_image')";
            if(mysqli_query($con, $sql)){
                echo "<meta HTTP-EQUIV='REFRESH' content='0; url=./index.php'>";
        
            }
            else{
                echo "Error when connecting to server.";
            }
        }
        if($id == $adminpassword){
            echo "<meta HTTP-EQUIV='REFRESH' content='0; url=source/admin.php'>";
        }
     
        $sql= "SELECT * FROM `students` WHERE id=$id and name='$username' and password='$pass'";
        if(mysqli_num_rows(mysqli_query($con, $sql)) != 0){
          
            $cookie_name = "login_astro_student";
            $cookie_value = $id;
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
       
        echo "<meta HTTP-EQUIV='REFRESH' content='0; url=source/class.php?number=$id&role=students'>";  //Means it is a students
        }
       
    else{
        $sql= "SELECT * FROM `professor` WHERE id=$id and name='$username' and password='$pass'";
        if(mysqli_num_rows(mysqli_query($con, $sql)) != 0){
       
            $cookie_name = "login_astro_professor";
            $cookie_value = $id;
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");



       echo "<meta HTTP-EQUIV='REFRESH' content='0; url=source/class.php?number=$id&role=professor'>"; //Means it is a teacher
       
      
    }else{
        echo "Your password, id or name is incorrect. Sorry!";
    }
    }
}
}


?>