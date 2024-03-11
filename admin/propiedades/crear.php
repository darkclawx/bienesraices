<?php

    require '../../includes/funciones.php';
    $auth=estaAutentificado();

    if(!$auth){
        header('Location: /bienesraices');
    }

    //Base de Datos
    require '../../includes/config/database.php';
    $db=conectarDB();    

    //Consultar para obtener los vendedores
    $consulta="SELECT * FROM vendedores";
    $resultado=mysqli_query($db, $consulta);

    //Arreglo con mensajes de errores
    $errores=[];

    $titulo='';
    $precio='';   
    $descripcion='';
    $habitaciones='';
    $wc='';
    $estacionamiento='';
    $vendedores_id='';

    //Ejecutar el codigo despues de que el usuario envia el formulario
    if($_SERVER["REQUEST_METHOD"]==='POST'){
  
    $titulo= mysqli_real_escape_string($db, $_POST['titulo']);
    $precio= mysqli_real_escape_string($db, $_POST['precio']);
    $descripcion= mysqli_real_escape_string($db, $_POST['descripcion']);
    $habitaciones= mysqli_real_escape_string($db, $_POST['habitaciones']);
    $wc= mysqli_real_escape_string($db, $_POST['wc']);
    $estacionamiento= mysqli_real_escape_string($db, $_POST['estacionamiento']);
    $vendedores_id=mysqli_real_escape_string($db, $_POST['vendedor']);
    $creado=date('Y/m/d');

    //Asignar files hacia una variable
    $imagen=$_FILES['imagen'];

    if(!$titulo){
        $errores[]="Debes añadir un titulo";
    }

    if(!$precio){
        $errores[]="El Precio es Obligatorio";
    }

    if(strlen($descripcion)<50){
        $errores[]="La descripcion es Obligatoria y debe tener al menos 50 caracteres";
    }

    if(!$habitaciones){
        $errores[]="El número de habitaciones es Obligatorio";
    }

    if(!$wc){
        $errores[]="El número de wc es Obligatorio";
    }

    if(!$estacionamiento){
        $errores[]="El número de estacionamiento es Obligatorio";
    }
    
    if(!$vendedores_id){
        $errores[]="Elige un vendedor";
    }

    if(!$imagen['name'] || $imagen['error']){
        $errores[]="La imagen es obligatoria";
    }

    //validar por tamaño (1Mb maximo)
    $medida =1000*1000;

    if($imagen['size']>$medida){
        $errores[]="La imagen es muy pesada";
    }

    //Revisar que el arreglo de errores este vacio
    if(empty($errores)){

        //**Subida de Archivos **/

        //Crear carpeta
        $carpetaImagenes='../../imagenes/';

        if(!is_dir($carpetaImagenes)){
            mkdir($carpetaImagenes);
        }

        //Generar un nombre único
        $nombreImagen =md5(uniqid(rand(),true)). ".jpg";

        //Subir la imagen
        move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen  );

        //Insertar en la base de datos
        $query="INSERT INTO propiedades (titulo, precio, imagen, descripcion, habitaciones, wc, estacionamiento, creado, vendedores_Id) 
        VALUES ('$titulo','$precio','$nombreImagen','$descripcion', '$habitaciones', '$wc', '$estacionamiento', '$creado', '$vendedores_id')";

        $resultado=mysqli_query($db, $query);
        if($resultado){
            //Redireccionar al usuario
            header('Location: /bienesraices/admin?resultado=1');
        }
    }    
}

    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Crear</h1>

        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

        <a class="boton boton-verde" href="/bienesraices/admin">Volver</a>

        <form class="formulario" method="POST" action="/bienesraices/admin/propiedades/crear.php" enctype="multipart/form-data">
            <fieldset>
                <legend>Información General</legend>

                <label for="titulo">Titulo:</label>
                <input type="text" name="titulo" id="titulo" placeholder="Titulo Propiedad" value="<?php echo $titulo; ?>">

                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="precio" placeholder="Precio Propiedad" min=1 value="<?php echo $precio; ?>">

                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">

                <label for="descripcion">Descripción:</label>
                <textarea name="descripcion" id="descripcion" ><?php echo $descripcion; ?></textarea>
            </fieldset>

            <fieldset>
                <legend>Información Propiedad</legend>

                <label for="habitaciones">Habitaciones:</label>
                <input 
                    type="number" 
                    min="1"
                    max="9" 
                    id="habitaciones" 
                    name="habitaciones" 
                    placeholder="Ej: 3" 
                    value="<?php echo $habitaciones; ?>">

                <label for="wc">Baños:</label>
                <input 
                    type="number" 
                    min="1" 
                    max="9" 
                    id="wc" 
                    name="wc" 
                    placeholder="Ej: 3" 
                    value="<?php echo $wc; ?>">

                <label for="estacionamiento">Estacionamientos:</label>
                <input 
                    type="number" 
                    min="1" 
                    max="9" 
                    id="estacionamiento" 
                    name="estacionamiento" 
                    placeholder="Ej: 3" 
                    value="<?php echo $estacionamiento; ?>">
            </fieldset>

            <fieldset>
                <legend>Vendedor</legend>
            
                <select name="vendedor">
                    <option value="">--Seleccione--</option>               
                    <?php while ($vendedor = mysqli_fetch_assoc($resultado)) : ?>
                        <option <?php echo $vendedorId === $vendedor['id'] ? 'selected' : ''; ?> value="<?php echo $vendedor['id']; ?>"> <?php echo $vendedor['nombre'] . " " . $vendedor['apellido']; ?> </option>
            
                    <?php endwhile; ?>
                </select>
            </fieldset>
            <input type="submit" value="Crar Propiedad" class="boton boton-verde">
        </form>
    </main>

    <?php
    incluirTemplate('footer');
   ?>