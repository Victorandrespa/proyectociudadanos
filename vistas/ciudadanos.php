<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="../main/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <title>Ciudadanos</title>

</head>

<body class="container mt-4 min-vh-100">

    <!-- conexion a base de datos -->
    <?php
    require_once("../main/conexion.php");
    $sql = "select * from ciudadanos";
    $ejecutar = mysqli_query($conexion, $sql);
    if (!$conexion) {
        die("Error de conexion a la base de datos: " . mysqli_connect_error());
    }
    ?>

    <h1 class="m-2">Ciudadanos</h1>

    <!-- Botones de edicion y regresar -->

    <div class="d-flex flex-row">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-outline-dark m-1" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Agregar
        </button>
        <a href="../index.php" class="btn btn-outline-dark m-1 p-2">Volver</a>
    </div>


    <!-- Modal para agregar registro -->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Agrega un Registro</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Formulario para agregar registro -->
                <div class="modal-body">
                    <form action="../main/functions.php" method="post">
                        <label for="txt_dpi">DPI</label>
                        <input type="number" name="txt_dpi" id="txt_dpi" class="form-control">

                        <label for="txt_nombre">Nombre</label>
                        <input type="text" name="txt_nombre" id="txt_nombre" class="form-control">

                        <label for="txt_apellido">Apellido</label>
                        <input type="text" name="txt_apellido" id="txt_apellido" class="form-control">

                        <label for="txt_direccion">Direccion</label>
                        <input type="text" name="txt_direccion" id="txt_direccion" class="form-control">

                        <label for="txt_tel_casa">Telefono Casa</label>
                        <input type="text" name="txt_tel_casa" id="txt_tel_casa" class="form-control">

                        <label for="txt_tel_movil">Telefono Movil</label>
                        <input type="text" name="txt_tel_movil" id="txt_tel_movil" class="form-control">

                        <label for="txt_email">E-mail</label>
                        <input type="text" name="txt_email" id="txt_email" class="form-control">

                        <label for="txt_fechanac">Fecha de nacimientoc</label>
                        <input type="text" name="txt_fechanac" id="txt_fechanac" class="form-control">

                        <label for="txt_nivel_acad">Nivel Academico</label>
                        <input type="text" name="txt_cod_nivel_acad" id="txt_cod_nivel_acad" class="form-control">

                        <label for="txt_cod_muni">Codigo Municipalidad</label>
                        <input type="text" name="txt_cod_muni" id="txt_cod_muni" class="form-control">

                        <label for="txt_contra">Contraseña</label>
                        <input type="text" name="txt_contra" id="txt_contra" class="form-control">

                        <div class="d-flex justify-content-center mt-3">
                            <button type="submit" class="form-control btn btn-outline-primary w-50 " name="btn_insertar"
                                id="btn_insertar">Agregar Registro</button>
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


    <!-- tabla de resultados de busqueda -->

    <div class="table-responsive table-responsive-fixed">

        <table class="table table-hover mx-2">
            <thead class="table-dark">
                <tr>
                    <th>DPI</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Telefono Movil</th>
                    <th>Email</th>
                    <th>Municipio</th>
                    <th class="table-info">Editar Registro</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($datos = mysqli_fetch_assoc($ejecutar)) {
                    ?>
                    <tr>
                        <td><?php echo $datos["dpi"]; ?></td>
                        <td><?php echo $datos["nombre"]; ?></td>
                        <td><?php echo $datos["apellido"]; ?></td>
                        <td><?php echo $datos["tel_movil"]; ?></td>
                        <td><?php echo $datos["email"]; ?></td>
                        <td><?php echo $datos["cod_muni"]; ?></td>
                        <td class="d-flex flex-row">
                            <form action="../ediciones/editarCiudadano.php" method="post">
                                <input type="hidden" name="h_codigo_editar" id="h_codigo_editar"
                                    value="<?php echo $datos["dpi"]; ?>">
                                <button type="submit" name="btn_editar" id="btn_editar"
                                    class="btn btn-outline-primary me-1"><i class="bi bi-pencil-square"></i></button>
                            </form>
                            <form action="../main/functions.php" method="post">
                                <input type="hidden" name="h_codigo_borrar" id="h_codigo_borrar"
                                    value="<?php echo $datos["dpi"]; ?>">
                                <button type="submit" name="btn_eliminar" id="btn_eliminar"
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