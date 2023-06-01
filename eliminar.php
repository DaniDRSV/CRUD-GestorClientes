<?php 
    session_start();

    include('conexion.php');

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "DELETE FROM task WHERE id = $id";
        $result = mysqli_query($connection,$query);
        if(!$result){
            die("Query failed");
        }

        $_SESSION['message'] = "Removido correctamente";
        $_SESSION['message_type'] = 'danger';
        header('Location: dash.php');
    }
?>