<?php
session_start();

include ('conexion.php');

if(isset($_POST['save_task'])){
    $title = $_POST['title'];
    $description = $_POST['description'];
    
    $query = "INSERT INTO task(title,description) VALUES('$title', '$description')";
    $result = mysqli_query($connection,$query);
    if(!$result){
        die('Query Failed');
    }

    $_SESSION['message'] = 'Guardado correctamente';
    $_SESSION['message_type'] = 'success';

    header("Location: dash.php");
}

?>