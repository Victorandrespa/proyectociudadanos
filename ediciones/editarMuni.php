<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="../main/style.css">
    <title>Editar Municipio</title>
</head>

<body>

    <?php

    $codigo = $_POST["h_codigo_editar_muni"];

    //Buscar el codigo en la base de datos en la tabla de regiones
    require_once("../main/conexion.php");
    $sql = "select * from municipios where cod_muni = " . $codigo;
    $ejecutar = mysqli_query($conexion, $sql);
    $datos = mysqli_fetch_assoc($ejecutar);

    //imprime el contenido del array que tiene el resultado
    //print_r($datos);

    ?>


    <h1 class="m-5">Editar Municipio</h1>

    <div class="d-flex flex-row">
        <a href="../vistas/municipios.php" class="btn btn-outline-danger m-1 ms-5 p-2">Volver</a>
    </div>



    <div class="m-5">

        <form action="../main/functions.php" method="post" class="w-75 mx-auto">

            <label for="txt_cod_muni">Codigo Municipio</label>
            <input type="number" name="txt_cod_muni" id="txt_cod_muni" class="form-control" value="<?php echo $codigo ?>" readonly>

            <label for="txt_nombre_municipio">Nombre Municipio</label>
            <input type="text" name="txt_nombre_municipio" id="txt_nombre_municipio" class="form-control" value="<?php echo $datos["nombre_municipio"]; ?>">

            <label for="txt_cod_depto">Codigo Deptartamento</label>
            <input type="text" name="txt_cod_depto" id="txt_cod_depto" class="form-control" value="<?php echo $datos["cod_depto"]; ?>">

            <div class="d-flex flex-column justify-content-center align-items-center">
                <button type="submit" class="form-control btn btn-outline-primary mt-5 w-25" name="btn_modificar_muni">Guardar Edicion</button>
            </div>

        </form>

    </div>


</body>

</html>