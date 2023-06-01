<?php
session_start();

include_once ('conexion.php');
include_once ('includes/header.php');
?>

<h5>Bienvenido: <?php echo $_SESSION['usuario'] ?></h5>

<div class="container p-4">
    <table class = "table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>DUI</th>
                <th>Numero de telefono</th>
                <th>Direccion</th>
                <th>Comentarios</th>
                <th>Creado en</th>
                <th>Ultima actualizacion</th>
                <th>Actualizado por</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $query = "SELECT * FROM task";
                $result_task = mysqli_query($connection,$query);

                while($row = mysqli_fetch_array($result_task)){ ?>
                    <tr>
                        <td><?php echo $row['nombre']  ?></td>
                        <td><?php echo $row['apellido']  ?></td>
                        <td><?php echo $row['dui']  ?></td>
                        <td><?php echo $row['telefono']  ?></td>
                        <td><?php echo $row['direccion']  ?></td>
                        <td><?php echo $row['comentarios']  ?></td>
                        <td><?php echo $row['created_at']  ?></td>
                        <td><?php echo $row['updated_at']  ?></td>
                        <td><?php echo $row['id_usuario']  ?></td>
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

<?php include('includes/footer.php') ?>