<?php
    date_default_timezone_set("America/Costa_Rica");
    $fecha_actual=date("Y-m-d H:i:s");
    include "../conexion/conexion.php";
    @$id_alumno=$_GET['id'];
    $consulta="SELECT * FROM alumnos WHERE id_alumno='$id_alumno'";
    $ejecutar=mysqli_query($conexion, $consulta);

    while ($row=mysqli_fetch_array($ejecutar)) {
        $id=$row[0];
        $fecha=$row[1];
        $nombre=$row[2];
        $apellidos=$row[3];
        $edad=$row[4];
        $grado=$row[5];
        $turno=$row[6];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../librerias/materialize/jquery-3.4.0.min.js"></script>
    <script src="../librerias/materialize/js/materialize.min.js"></script>
    <link rel="stylesheet" href="../librerias/materialize/css/materialize.min.css">
    <title>Crud alumnos</title>
    <script>
        $(document).ready(function(){
          id= $("#id_alumnos").val();

          if (id>0) {
              $("#form_registrar").hide();
          }

          if (id=="") {
              $("#form_actualizar").hide();
          }

        });
    </script>

</head>
<body>
    


<input type="hidden" name="id_alumnos" id="id_alumnos" value="<?php echo $id_alumno;?>">
    <div class="row">

        <!--formulario registro-->
        <div class="col l4" style="position: absolute; top: 15%;" id="form_registrar">

            <h5 class="blue-text">REGISTRO DE ALUMNOS</h5> <br><br>

            <form action="control.php" method="POST" accept-charset="utf-8">

                <div class="input-field col l5">
                    <input type ="text" name="fecha" value="<?php echo $fecha_actual?>" placeholder="">
                    <label for="fecha">Fecha</label>
                </div>

                <div class="input-field col l12">
                    <input type ="text" name="nombre" value="" placeholder="">
                    <label for="nombre">Nombre</label>
                </div>

                <div class="input-field col l12">
                    <input type ="text" name="apellidos" value="" placeholder="">
                    <label for="apellidos">Apellidos</label>
                </div>

                <div class="input-field col l4">
                    <input type ="text" name="edad" value="" placeholder="">
                    <label for="edad">Edad</label>
                </div>

                <div class="input-field col l4">
                    <input type ="text" name="grado" value="" placeholder="">
                    <label for="grado">Grado</label>
                </div>

                <div class="input-field col l4">
                    <input type ="text" name="turno" value="" placeholder="">
                    <label for="turno">Turno</label>
                </div>

                <div class="input-field col l12">
                    <button type="submit" class="blue btn-small" name="btn_guardar">guardar</button>
                </div>
            </form>

        </div>

        <!--tabla-->
        <div class="col l7 offset-l5" style="position: absolute; top: 15%;">
        
            <table>
            <h5 class="blue-text">LISTA DE ALUMNOS</h5> <br><br>
                <thead>
                <tr>
                    <th>Id</th>
                    <th>fecha</th>
                    <th>nombre</th>
                    <th>apellidos</th>
                    <th>edad</th>
                    <th>grado</th>
                    <th>turno</th>
                    <th></th>
                </tr>
            </thead>
            <?php
                include ("../conexion/conexion.php");
                $sql="SELECT * FROM alumnos";
                $ejecutar=mysqli_query($conexion, $sql);
                while ($fila=mysqli_fetch_array($ejecutar)) {
                    # code...
                
            ?>
            <tbody>
                <tr>
                    <th><?php echo $fila[0];?></th>
                    <th><?php echo $fila[1];?></th>
                    <th><?php echo $fila[2];?></th>
                    <th><?php echo $fila[3];?></th>
                    <th><?php echo $fila[4];?></th>
                    <th><?php echo $fila[5];?></th>
                    <th><?php echo $fila[6];?></th>
                    <th><a href="index.php?id=<?php echo $fila[0];?>" class="btn btn-small">editar</a></th>
                </tr>
            </tbody>
            <?php
            }
            ?>
            </table>
           
        </div>
    </div>
    
    <div class="row">

        <!--formulario editar-->
        <div class="col l4" style="position: absolute; top: 15%;" id="form_actualizar">

            <h5 class="blue-text">EDICION DE ALUMNOS</h5> <br><br>

            <form action="control.php" method="POST" accept-charset="utf-8">

                <div class="input-field col l5">
                    <input type ="text" name="fecha" value="<?php echo $fecha;?>" placeholder="">
                    <label for="fecha">Fecha</label>
                </div>

                <div class="input-field col l12">
                    <input type ="text" name="id" value="<?php echo $id;?>" placeholder="">
                    <label for="id">Id</label>
                </div>

                <div class="input-field col l12">
                    <input type ="text" name="nombre" value="<?php echo $nombre;?>" placeholder="">
                    <label for="nombre">Nombre</label>
                </div>

                <div class="input-field col l12">
                    <input type ="text" name="apellidos" value="<?php echo $apellidos;?>" placeholder="">
                    <label for="apellidos">Apellidos</label>
                </div>

                <div class="input-field col l4">
                    <input type ="text" name="edad" value="<?php echo $edad;?>" placeholder="">
                    <label for="edad">Edad</label>
                </div>

                <div class="input-field col l4">
                    <input type ="text" name="grado" value="<?php echo $grado;?>" placeholder="">
                    <label for="grado">Grado</label>
                </div>

                <div class="input-field col l4">
                    <input type ="text" name="turno" value="<?php echo $turno;?>" placeholder="">
                    <label for="turno">Turno</label>
                </div>

                <div class="input-field col l4">
                    <button type="submit" class="blue btn-small" name="btn_actualizar">actualizar</button>
                </div>

                <div class="input-field col l4">
                    <button type="submit" class="red accent-darken-4 btn-small" name="btn_eliminar">eliminar</button>
                </div>

                <div class="input-field col l4">
                    <a href="index.php" type="submit" class="blue btn-small" name="btn_regresar">regresar</a>
                </div>
            </form>

        </div>
    </div>
</body>
</html>