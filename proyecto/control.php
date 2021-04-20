<?php

    if (isset($_REQUEST['btn_guardar'])) { //cuando el usuario da click en guardar, los inserta en la base de datos, dentro de la tabla especificada
        include ("../conexion/conexion.php"); //incluye la conexion

        $fecha=$_POST['fecha'];                       //ingresa los datos del formulario dentro de su respectiva variable
        $nombre=$_POST['nombre'];                       //se lee: DENTRO DE LA VARIABLE $nombre, POSTEAR EL DATO QUE SE ENCENTRA DENTRO DEL INPUT LLAMADO nombre
        $apellidos=$_POST['apellidos'];
        $edad=$_POST['edad'];
        $grado=$_POST['grado'];
        $turno=$_POST['turno'];

        $sql="INSERT INTO alumnos (fecha, nombre, apellidos, edad, grado, turno) VALUES ('$fecha', '$nombre', '$apellidos', '$edad', '$grado', '$turno')";
        $ejecutar=mysqli_query($conexion, $sql);
    
        if ($ejecutar) {
            header("Location:index.php");
    }
    }
    if (isset($_REQUEST['btn_actualizar'])) {
        include ("../conexion/conexion.php"); 

        $id=$_POST['id'];  //usando de referencia al 'id' logramos ejecutar la sentencia del update en campo indicado. 
        $fecha=$_POST['fecha'];                       
        $nombre=$_POST['nombre'];                       
        $apellidos=$_POST['apellidos'];
        $edad=$_POST['edad'];
        $grado=$_POST['grado'];
        $turno=$_POST['turno'];

        $sql="UPDATE alumnos SET fecha='$fecha', nombre='$nombre', apellidos='$apellidos', edad='$edad', grado='$grado', turno='$turno' WHERE id_alumno='$id'";
        $ejecutar=mysqli_query($conexion, $sql);
    
        if ($ejecutar) {
            header("Location:index.php");
    }
    }

    if (isset($_REQUEST['btn_eliminar'])) {
        include ("../conexion/conexion.php"); 

        $id=$_POST['id'];

        $sql="DELETE FROM alumnos WHERE id_alumno='$id'";
        $ejecutar=mysqli_query($conexion, $sql);
        
        if ($ejecutar) {
            header("Location:index.php");
    }
    }
?>