<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="../main/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <title>Municipios</title>
</head>

<body class="container mt-4 min-vh-100">


    <!-- conexion con base de datos -->

    <?php
    require_once("../main/conexion.php");
    $sql = "select * from municipios";
    $ejecutar = mysqli_query($conexion, $sql);
    if (!$conexion) {
        die("Error de conexion en base de datos:" . mysqli_connect_error());
    }
    ?>

    <h1 class="m-2">Municipios</h1>

    <!-- Botones de edicion y regresar -->

    <div class="d-flex flex-row">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-outline-dark m-1" data-bs-toggle="modal"
            data-bs-target="#exampleModal-muni" >Agregar</button>
        <a href="../index.php" class="btn btn-outline-dark m-1 p-2">Volver</a>
    </div>


    <!-- Modal para agregar Municipio -->

    <div class="modal fade" id="exampleModal-muni" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Agrega un Municipio</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Formulario para agregar registro -->
                <div class="modal-body">
                    <form action="../main/functions.php" method="post">
                        <label for="txt_cod_muni">Codigo Muni</label>
                        <input type="number" name="txt_cod_muni" id="txt_cod_muni" class="form-control">

                        <label for="txt_nombre_municipio">Municipio</label>
                        <input type="text" name="txt_nombre_municipio" id="txt_nombre_municipio" class="form-control">

                        <label for="txt_cod_depto">Codigo Departamento</label>
                        <input type="text" name="txt_cod_depto" id="txt_cod_depto" class="form-control">

                        <div class="d-flex justify-content-center mt-3">
                            <button type="submit" class="form-control btn btn-outline-primary w-50 "
                                name="btn_insertar_municipio" id="btn_insertar_municipio">Agregar Registro</button>
                        </div>
                    </form>
                </div>

                <!-- Agrega nuevo registro -->

                <div class="modal-footer d-flex flex-row">
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancelar</button>
                </div>

            </div>
        </div>
    </div>




    <div class="table-responsive table-responsive-fixed">

        <!-- Impresion tabla Municipios -->
        <table class="table table-hover mx-2">
            <thead class="table-dark">
                <tr>
                    <th>Codigo Muni</th>
                    <th>Municipio</th>
                    <th>Depto</th>
                    <th class="table-info">Editar Registro</th>
                </tr>
            </thead>
            <tbody>
                <!-- Impresion de datos en Tabla Municipios -->
                <?php
                while ($datos = mysqli_fetch_assoc($ejecutar)) {
                    ?>
                    <tr>
                        <td><?php echo $datos["cod_muni"]; ?></td>
                        <td><?php echo $datos["nombre_municipio"]; ?></td>
                        <td><?php echo $datos["cod_depto"]; ?></td>
                        <td class="d-flex flex-row justify-content-center">

                            <form action="../ediciones/editarMuni.php" method="post">
                                <input type="hidden" name="h_codigo_editar_muni" id="h_codigo_editar_muni"
                                    value="<?php echo $datos["cod_muni"]; ?>">
                                <button type="submit" name="btn_editar_muni" id="btn_editar_muni"
                                    class="btn btn-outline-primary me-1"><i class="bi bi-pencil-square"></i></button>
                            </form>
                            <form action="../main/functions.php" method="post">
                                <input type="hidden" name="h_codigo_borrar_muni" id="h_codigo_borrar_muni"
                                    value="<?php echo $datos["cod_muni"]; ?>">
                                <button type="submit" name="btn_eliminar_muni" id="btn_eliminar_muni"
                                    class="btn btn-outline-danger ms-1"><i class="bi bi-trash3-fill"></i></button>
                            </form>

                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>

    </div>


    <footer>
        <hr>
        <br><br>
        <h5 class="text-center">Creado por Victor</h5>
    </footer>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous"></script>


</body>

</html>