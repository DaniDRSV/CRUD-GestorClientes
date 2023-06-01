<?php
session_start();

include_once ('conexion.php');
include_once ('includes/header.php');
?>


<div class="container p-4">
    <div class="row">
        <?php if(isset($_SESSION['message'])) {?>

            <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            
        <?php } ?>
        <div class="col-md-4 ">
            <div class="card card-body ">
                <form action="guardar.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" class='form-control' placeholder="Titulo de tarea" autofocus>
                    </div>
                    <div class="form-group">
                        <textarea name="description" rows="2" class= 'form-control' placeholder='Descripcion de tarea'></textarea>
                    </div>
                    <input type="submit" class= "btn btn-success btn-block" 
                     name='save_task' value= 'Guardar'>
                </form>
            </div>
        </div>

        <div class="col-md-8">
            <table class = "table table-bordered">
                <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Descripcion</th>
                        <th>Creado en</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                   <?php 
                        $query = "SELECT * FROM task";
                        $result_task = mysqli_query($connection,$query);

                        while($row = mysqli_fetch_array($result_task)){ ?>
                            <tr>
                                <td><?php echo $row['title']  ?></td>
                                <td><?php echo $row['description']  ?></td>
                                <td><?php echo $row['created_at']  ?></td>
                                <td>
                                    <!-- editar -->
                                    <a href="editar.php?id=<?php echo $row['id']?>" class = "btn btn-secondary">
                                        <i class= "fas fa-marker"></i>
                                    </a>
                                    <!-- eliminar -->
                                    <a href="eliminar.php?id=<?php echo $row['id']?>" class = "btn btn-danger">
                                        <i class= "far fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?> 
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include('includes/footer.php') ?>