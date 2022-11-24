<?php

    include_once 'conexion.php';

    if (isset($_GET['id']))
    {
        $id = $_GET['id'];
        $sql="select * from contacto where id_contacto='$id'";
        $resultado=mysqli_query($con,$sql);

        if ($fila=mysqli_fetch_assoc($resultado))
        {
            //Emvio los valores al formulario
        }
    }

    if ($_SERVER['REQUEST_METHOD']=="POST")
    {
        $id=$_POST['id'];
        $nombre=$_POST['nombre'];
        $direccion=$_POST['direccion'];
        $email=$_POST['email'];
        $tel=$_POST['telefono'];
        $cel=$_POST['cel'];
        $whatsapp=$_POST['whatsapp'];

        $sql = "UPDATE contacto SET nombre_suc='$nombre', direccion='$direccion', email='$email', tel='$tel', cel='$cel', whatsapp='$whatsapp' WHERE id_contacto='$id'";
        $resultado = mysqli_query($con,$sql);

        if ($resultado)
        {
            echo "<script>
            alert('¡Contacto Actualizado Correctamente!');
            location.href='administrar.php';
            </script>";
        }
        else {
            echo "<script>
            alert('No fue posible actualizar el contacto, intentelo nuevamente... por favor :(');
            </script>";
        }
    }

    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Contacto</title>
</head>
<body>
    <br>
    <h3><a href="administrar.php">Contactos->Administrar</a></h3>
    <center>
    <h1>Actualizar Contacto</h1>
    <hr>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <table border="1">
            <tr>
                <td><label for="nombre">Nombre:</label></td>
                <td><input type="text" name="nombre" value="<?php echo $fila['nombre_suc']?>" require></td>
            </tr>
            <tr>
                <td><label for="direccion">Direccion: </label></td>
                <td><input type="text" name="direccion" value="<?php echo $fila['direccion']?>" require></td>
            </tr>
            <tr>
                <td><label for="email"></label>E-mail:</td>
                <td><input type="email" name="email" value="<?php echo $fila['email']?>" require></td>
            </tr>
            <tr>
                <td><label for="telefono">Teléfono</label></td>
                <td><input type="tel" name="telefono" value="<?php echo $fila['tel']?>" require></td>
            </tr>
            <tr>
                <td><label for="cel">Celular: </label></td>
                <td><input type="tel" name="cel" value="<?php echo $fila['cel']?>" require></td>
            </tr>
            <tr>
                <td><label for="whatsapp"></label>Whatsapp: </td>
                <td><input type="tel" name="whatsapp" value="<?php echo $fila['whatsapp']?>" require></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="guardar" value="Guardar">
                </td>
            </tr>
        </table>
        <input type="hidden" value="<?php echo $fila['id_contacto']?>" name="id">
    </form>
    <hr>
    </center>
</body>
</html>