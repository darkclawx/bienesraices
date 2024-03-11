<?php

    require '../../includes/funciones.php';
    $auth=estaAutentificado();

    if(!$auth){
        header('Location: /bienesraices');
    }

    //Validar la URL por ID válido
    $id=$_GET['id'];
    $id=filter_var($id, FILTER_VALIDATE_INT);

    if(!$id){
        header('Location: /bienesraices/admin');
    }

    //Base de Datos
    require '../../includes/config/database.php';
    $db=conectarDB();    

    //Obtener los datos de la propiedad
    $consulta="SELECT * FROM propiedades where id={$id}";
    $resultado=mysqli_query($db, $consulta);
    $propiedad =mysqli_fetch_assoc($resultado);
    
    //Consultar para obtener los vendedores
    $consulta="SELECT * FROM vendedores";
    $resultado=mysqli_query($db, $consulta);

    //Arreglo con mensajes de errores
    $errores=[];

    $titulo=$propiedad['titulo'];
    $precio=$propiedad['precio'];  
    $descripcion=$propiedad['descripcion'];
    $habitaciones=$propiedad['habitaciones'];
    $wc=$propiedad['wc'];
    $estacionamiento=$propiedad['estacionamiento'];
    $vendedores_id=$propiedad['vendedores_id'];
    $imagenPropiedad=$propiedad['imagen'];

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

    //validar por tamaño (1Mb maximo)
    $medida =1000*1000;

    if($imagen['size']>$medida){
        $errores[]="La imagen es muy pesada";
    }

    //Revisar que el arreglo de errores este vacio
    if(empty($errores)){

        // //Crear carpeta
        $carpetaImagenes='../../imagenes/';

        if(!is_dir($carpetaImagenes)){
            mkdir($carpetaImagenes);
            }

            $nombreImagen='';

        // //**Subida de Archivos **/
        
        if($imagen['name']){
           //Eliminar imagen previa
            unlink($carpetaImagenes . $propiedad['imagen']);

            // //Generar un nombre único
         $nombreImagen =md5(uniqid(rand(),true)). ".jpg";

            //Subir la imagen
         move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);
        }else{
            $nombreImagen=$propiedad['imagen'];
        }
        
        //Insertar en la base de datos
        $query="UPDATE propiedades SET titulo= '{$titulo}', precio= '{$precio}',imagen='{$nombreImagen}', descripcion= '{$descripcion}',
        habitaciones= {$habitaciones}, wc= {$wc}, estacionamiento= {$estacionamiento}, vendedores_Id={$vendedores_id} WHERE id={$id}";
        
        $resultado=mysqli_query($db, $query);
        if($resultado){
            //Redireccionar al usuario
            header('Location: /bienesraices/admin?resultado=2');
        }
    }    
}
   
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Actualizar Propiedad</h1>

        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

        <a class="boton boton-verde" href="/bienesraices/admin">Volver</a>

        <form class="formulario" method="POST" enctype="multipart/form-data">
            <fieldset>
                <legend>Información General</legend>

                <label for="titulo">Titulo:</label>
                <input type="text" name="titulo" id="titulo" placeholder="Titulo Propiedad" value="<?php echo $titulo; ?>">

                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="precio" placeholder="Precio Propiedad" min=1 value="<?php echo $precio; ?>">

                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">

                <img class="imagen-small" src="/bienesraices/imagenes/<?php echo $imagenPropiedad; ?>" >

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
                        <option <?php echo $vendedores_id === $vendedor['id'] ? 'selected' : ''; ?> value="<?php echo $vendedor['id']; ?>"> <?php echo $vendedor['nombre'] . " " . $vendedor['apellido']; ?> </option>
            
                    <?php endwhile; ?>
                </select>
            </fieldset>

            <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">
        </form>
    </main>

    <?php
    incluirTemplate('footer');
   ?>