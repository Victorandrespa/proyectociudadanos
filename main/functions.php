<?php

//utiliza region existente
require_once("conexion.php");



// Procesos Eliminar / Delete --------------------------------------------------------



// Proceso eliminar - Ciudadanos

if (isset($_POST["btn_eliminar"])) {
    $codigo = $_POST["h_codigo_borrar"];
    $sql = "delete from ciudadanos where dpi = " . $codigo;

    try {
        $ejecutar = mysqli_query($conexion, $sql);
        echo "<br>Datos almacenados";
        header("Location:../vistas/ciudadanos.php");
        exit;
    } catch (Exception $th) {
        echo "<br>Datos no fueron guardados<br>" . $th;
    }
}

// Proceso eliminar - Departamentos

if (isset($_POST["btn_eliminar_depto"])) {
    $codigo = $_POST["h_codigo_borrar_depto"];
    $sql = "delete from departamentos where cod_depto = " . $codigo;

    try {
        $ejecutar = mysqli_query($conexion, $sql);
        echo "<br>Datos almacenados";
        header("Location:../vistas/departamentos.php");
        exit;
    } catch (Exception $th) {
        echo "<br>Datos no fueron guardados<br>" . $th;
    }
}


// Proceso eliminar - Municipios

if (isset($_POST["btn_eliminar_muni"])) {
    $codigo = $_POST["h_codigo_borrar_muni"];
    $sql = "delete from municipios where cod_muni = " . $codigo;

    try {
        $ejecutar = mysqli_query($conexion, $sql);
        echo "<br>Datos almacenados";
        header("Location:../vistas/departamentos.php");
        exit;
    } catch (Exception $th) {
        echo "<br>Datos no fueron guardados<br>" . $th;
    }
}


// Proceso eliminar - Niveles Academicos

if (isset($_POST["btn_eliminar_na"])) {
    $codigo = $_POST["h_codigo_borrar_na"];
    $sql = "delete from nivelesacademicos where cod_nivel_acad = " . $codigo;

    try {
        $ejecutar = mysqli_query($conexion, $sql);
        echo "<br>Datos almacenados";
        header("Location:../vistas/nivelesAcademicos.php");
        exit;
    } catch (Exception $th) {
        echo "<br>Datos no fueron guardados<br>" . $th;
    }
}



// Proceso eliminar - Regiones

if (isset($_POST["btn_eliminar_region"])) {
    $codigo = $_POST["h_codigo_borrar_region"];
    $sql = "delete from regiones where cod_region = " . $codigo;

    try {
        $ejecutar = mysqli_query($conexion, $sql);
        echo "<br>Datos almacenados";
        header("Location:../vistas/departamentos.php");
        exit;
    } catch (Exception $th) {
        echo "<br>Datos no fueron guardados<br>" . $th;
    }
}


// Procesos Insertar / Insert --------------------------------------------------------



// Proceso insertar Ciudadano

if (isset($_POST["btn_insertar"])) {

    //recibo datos de formulario
    $dpi = $_POST["txt_dpi"];
    $nombre = $_POST["txt_nombre"];
    $apellido = $_POST["txt_apellido"];
    $direccion = $_POST["txt_direccion"];
    $tel_casa = $_POST["txt_tel_casa"];
    $tel_movil = $_POST["txt_tel_movil"];
    $email = $_POST["txt_email"];
    $fechanac = $_POST["txt_fechanac"];
    $nivel_acad = $_POST["txt_cod_nivel_acad"];
    $cod_muni = $_POST["txt_cod_muni"];
    $contra = $_POST["txt_contra"];


    require_once("conexion.php");
    $sql = "insert into ciudadanos (dpi,nombre,apellido,direccion,tel_casa,tel_movil,email,fechanac,cod_nivel_acad,cod_muni,contra) 
    values (" . $dpi . ",
    '" . $nombre . "',
    '" . $apellido . "',
    '" . $direccion . "',
    '" . $tel_casa . "',
    '" . $tel_movil . "',
    '" . $email . "',
    '" . $fechanac . "',
    '" . $cod_nivel_acad . "',
    '" . $cod_muni . "',
    '" . $contra . "');";


    try {
        $ejecutar = mysqli_query($conexion, $sql);
        echo "<br>Datos almacenados";
        header("Location: ../vistas/ciudadanos.php");
        exit;
    } catch (Exception $th) {
        echo "<br>Datos no fueron guardados<br>" . $th;
    }
}


// Proceso insertar Departamento

if (isset($_POST["btn_insertar_depto"])) {

    //recibo datos de formulario
    $codigo = $_POST["txt_cod_depto"];
    $nombre = $_POST["txt_nombre_depto"];
    $cod_region = $_POST["txt_cod_region"];

    require_once("conexion.php");
    $sql = "insert into departamentos (cod_depto, nombre_depto, cod_region) 
    values (" . $codigo . ",
    '" . $nombre . "',
    '" . $cod_region . "');";


    try {
        $ejecutar = mysqli_query($conexion, $sql);
        echo "<br>Datos almacenados";
        header("Location: ../vistas/departamentos.php");
        exit;
    } catch (Exception $th) {
        echo "<br>Datos no fueron guardados<br>" . $th;
    }
}


// Proceso insertar Municipalidad

if (isset($_POST["btn_insertar_municipio"])) {

    //recibo datos de formulario
    $codigo = $_POST["txt_cod_muni"];
    $nombre = $_POST["txt_nombre_municipio"];
    $cod_depto = $_POST["txt_cod_depto"];

    require_once("conexion.php");
    $sql = "insert into municipios (cod_muni, nombre_municipio, cod_depto) 
    values (" . $codigo . ",
    '" . $nombre . "',
    '" . $cod_depto . "');";


    try {
        $ejecutar = mysqli_query($conexion, $sql);
        echo "<br>Datos almacenados";
        header("Location: ../vistas/municipios.php");
        exit;
    } catch (Exception $th) {
        echo "<br>Datos no fueron guardados<br>" . $th;
    }
}


// Proceso insertar Nivel Academico

if (isset($_POST["btn_insertar_na"])) {

    //recibo datos de formulario
    $codigo = $_POST["txt_cod_nivel_acad"];
    $nombre = $_POST["txt_nombre_na"];
    $descripcion = $_POST["txt_descripcion_na"];

    require_once("conexion.php");
    $sql = "insert into nivelesacademicos (cod_nivel_acad, nombre, descripcion) 
    values (" . $codigo . ",
    '" . $nombre . "',
    '" . $descripcion . "');";


    try {
        $ejecutar = mysqli_query($conexion, $sql);
        echo "<br>Datos almacenados";
        header("Location: ../vistas/nivelesAcademicos.php");
        exit;
    } catch (Exception $th) {
        echo "<br>Datos no fueron guardados<br>" . $th;
    }
}

// Proceso insertar Region

if (isset($_POST["btn_insertar_region"])) {

    //recibo datos de formulario
    $codigo = $_POST["txt_cod_region"];
    $nombre = $_POST["txt_nombre_region"];
    $descripcion = $_POST["txt_descripcion_region"];

    require_once("conexion.php");
    $sql = "insert into regiones(cod_region, nombre , descripcion) 
    values (" . $codigo . ",
    '" . $nombre . "',
    '" . $descripcion . "');";


    try {
        $ejecutar = mysqli_query($conexion, $sql);
        echo "<br>Datos almacenados";
        header("Location: ../vistas/region.php");
        exit;
    } catch (Exception $th) {
        echo "<br>Datos no fueron guardados<br>" . $th;
    }
}






// Procesos Modificar / Update --------------------------------------------------------



// Proceso Modificar Ciudadano

if (isset($_POST["btn_modificar"])) {

    // recibo datos formulario
    $dpi = $_POST["txt_dpi"];
    $nombre = $_POST["txt_nombre"];
    $apellido = $_POST["txt_apellido"];
    $direccion = $_POST["txt_direccion"];
    $tel_casa = $_POST["txt_tel_casa"];
    $tel_movil = $_POST["txt_tel_movil"];
    $email = $_POST["txt_email"];
    $fechanac = $_POST["txt_fechanac"];
    $nivel_acad = $_POST["txt_nivel_acad"];
    $cod_muni = $_POST["txt_cod_muni"];
    $contra = $_POST["txt_contra"];

    $sql = 'UPDATE ciudadanos SET 
        nombre = "' . $nombre . '", 
        apellido = "' . $apellido . '" ,
        direccion = "' . $direccion . '" ,
        tel_casa = "' . $tel_casa . '" ,
        tel_movil = "' . $tel_movil . '" ,
        email = "' . $email . '" ,
        fechanac = "' . $fechanac . '" ,
        cod_nivel_acad = "' . $nivel_acad . '" ,
        cod_muni = "' . $cod_muni . '" ,
        contra ="' . $contra . '" 
        
        WHERE dpi = ' . $dpi . ';';

    echo $sql;

    try {
        $ejecutar = mysqli_query($conexion, $sql);
        header('Location: ../vistas/ciudadanos.php');
    } catch (Exception $th) {
        echo '<br> Datos no fueron actualizados' . $th;
    }
}


// Proceso Modificar Departamento

if (isset($_POST["btn_modificar_depto"])) {

    // recibo datos formulario
    $cod_depto = $_POST["txt_cod_depto"];
    $nombre = $_POST["txt_nombre_depto"];
    $cod_region = $_POST["txt_cod_region"];
    

    $sql = 'UPDATE departamentos SET 
        nombre_depto = "' . $nombre . '", 
        cod_region = "' . $cod_region . '" 
        
        WHERE cod_depto = ' . $cod_depto . ';';

    echo $sql;

    try {
        $ejecutar = mysqli_query($conexion, $sql);
        header('Location: ../vistas/departamentos.php');
    } catch (Exception $th) {
        echo '<br> Datos no fueron actualizados' . $th;
    }
}


// Proceso Modificar Municipios

if (isset($_POST["btn_modificar_muni"])) {

    // recibo datos formulario
    $cod_muni = $_POST["txt_cod_muni"];
    $nombre = $_POST["txt_nombre_municipio"];
    $cod_depto = $_POST["txt_cod_depto"];
    

    $sql = 'UPDATE municipios SET 
        nombre_municipio = "' . $nombre . '", 
        cod_depto = "' . $cod_depto . '" 
        
        WHERE cod_muni = ' . $cod_muni . ';';

    echo $sql;

    try {
        $ejecutar = mysqli_query($conexion, $sql);
        header('Location: ../vistas/municipios.php');
    } catch (Exception $th) {
        echo '<br> Datos no fueron actualizados' . $th;
    }
}


// Proceso Modificar Niveles Academicos

if (isset($_POST["btn_modificar_na"])) {

    // recibo datos formulario
    $cod_nivel_acad = $_POST["txt_cod_nivel_acad"];
    $nombre = $_POST["txt_nombre_na"];
    $descripcion = $_POST["txt_descripcion_na"];
    

    $sql = 'UPDATE nivelesacademicos SET 
        nombre = "' . $nombre . '", 
        descripcion = "' . $descripcion . '" 
        
        WHERE cod_nivel_acad = ' . $cod_nivel_acad . ';';

    echo $sql;

    try {
        $ejecutar = mysqli_query($conexion, $sql);
        header('Location: ../vistas/nivelesAcademicos.php');
    } catch (Exception $th) {
        echo '<br> Datos no fueron actualizados' . $th;
    }
}


// Proceso Modificar Regiones

if (isset($_POST["btn_modificar_region"])) {

    // recibo datos formulario
    $cod_region = $_POST["txt_cod_region"];
    $nombre = $_POST["txt_nombre_region"];
    $descripcion = $_POST["txt_descripcion_region"];
    

    $sql = 'UPDATE regiones SET 
        nombre = "' . $nombre . '", 
        descripcion = "' . $descripcion . '" 
        
        WHERE cod_region = ' . $cod_region . ';';

    echo $sql;

    try {
        $ejecutar = mysqli_query($conexion, $sql);
        header('Location: ../vistas/region.php');
    } catch (Exception $th) {
        echo '<br> Datos no fueron actualizados' . $th;
    }
}