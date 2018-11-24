<?php 

session_start();

$mysqli = new mysqli('localhost', 'root', '', 'crud') or die(mysqli_error($mysqli));

if (isset($_POST['save'])){
    $name = $_POST['name'];
    $location = $_POST['location'];
    // script d'insert 
    $mysqli->query("INSERT INTO data(name, location) VALUES ('$name', '$location')") 
        or die($mysqli->error);
    $_SESSION['message'] = " Recoord has been saved!";
    $_SESSION['msg_type'] = "success";

    header("location: ../index.php");
}

if (isset($_GET['delete'])){
    $id = $_GET['delete'];
    // script de de delete 
    $mysqli->query("DELETE FROM data where id = $id") or die($mysqli->error);
    $_SESSION['message'] = " Recoord has been deleted!";
    $_SESSION['msg_type'] = "danger";
    
    header("location: ../index.php");
}