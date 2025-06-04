<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="../main/style.css">
    <title>Editar Registro</title>
</head>

<body>

    <?php

    $codigo = $_POST["h_codigo_editar"];

    //Buscar el codigo en la base de datos en la tabla de regiones
    require_once("../main/conexion.php");
    $sql = "select * from ciudadanos where dpi = " . $codigo;
    $ejecutar = mysqli_query($conexion, $sql);
    $datos = mysqli_fetch_assoc($ejecutar);

    //imprime el contenido del array que tiene el resultado
    //print_r($datos);

    ?>


    <h1 class="m-5">Editar Region</h1>


    <div class="m-5">

        <form action="../main/functions.php" method="post" class="w-75 mx-auto">

            <label for="txt_dpi">DPI</label>
            <input type="number" name="txt_dpi" id="txt_dpi" class="form-control" value="<?php echo $codigo ?>" readonly>

            <label for="txt_nombre">Nombre</label>
            <input type="text" name="txt_nombre" id="txt_nombre" class="form-control" value="<?php echo $datos["nombre"]; ?>">

            <label for="txt_apellido">Apellido</label>
            <input type="text" name="txt_apellido" id="txt_apellido" class="form-control" value="<?php echo $datos["apellido"]; ?>">

            <label for="txt_direccion">Direccion</label>
            <input type="text" name="txt_direccion" id="txt_direccion" class="form-control" value="<?php echo $datos["direccion"]; ?>">

            <label for="txt_tel_casa">Telefono Casa</label>
            <input type="text" name="txt_tel_casa" id="txt_tel_casa" class="form-control" value="<?php echo $datos["tel_casa"]; ?>">

            <label for="txt_tel_movil">Telefono Movil</label>
            <input type="text" name="txt_tel_movil" id="txt_tel_movil" class="form-control" value="<?php echo $datos["tel_movil"]; ?>">

            <label for="txt_email">E-mail</label>
            <input type="text" name="txt_email" id="txt_email" class="form-control" value="<?php echo $datos["email"]; ?>">

            <label for="txt_fechanac">Fecha de nacimientoc</label>
            <input type="text" name="txt_fechanac" id="txt_fechanac" class="form-control" value="<?php echo $datos["fechanac"]; ?>">

            <label for="txt_nivel_acad">Nivel Academico</label>
            <input type="text" name="txt_nivel_acad" id="txt_nivel_acad" class="form-control" value="<?php echo $datos["cod_nivel_acad"]; ?>">

            <label for="txt_cod_muni">Codigo Municipalidad</label>
            <input type="text" name="txt_cod_muni" id="txt_cod_muni" class="form-control" value="<?php echo $datos["cod_muni"]; ?>">

            <label for="txt_contra">Contraseña</label>
            <input type="text" name="txt_contra" id="txt_contra" class="form-control" value="<?php echo $datos["contra"]; ?>">

            <div class="d-flex flex-column justify-content-center align-items-center">
                <button type="submit" class="form-control btn btn-outline-primary mt-5 w-25" name="btn_modificar">Guardar Edicion</button>
            </div>

        </form>

    </div>


</body>

</html>