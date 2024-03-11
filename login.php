<?php
    //Conectar con la BD
    require 'includes/config/database.php';
    $db=conectarDB();

    $errores=[];
    //Autentificar el usuario
    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        $email= mysqli_real_escape_string($db, filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL));
        $password=mysqli_real_escape_string($db, $_POST['password']);

        if(!$email){
            $errores[]="El Email es obligatorio";
        }
        if(!$password){
            $errores[]="El Password es obligatorio";
        }

        if(empty($errores)){
            //REvisar si el usuario existe.
            $query="SELECT * FROM usuarios WHERE email = '$email'";
            $resultado=mysqli_query($db, $query);

             if( $resultado->num_rows){
                $usuario=mysqli_fetch_assoc($resultado);

                //Verificar si el password es correcto o no
                $auth=password_verify($password, $usuario['password']);
                    if($auth){

                        //El Usuario esta autentificado
                        session_start();

                        //LEnar el arreglo de la sesion 
                        $_SESSION['usuario']=$usuario['email'];
                        $_SESSION['login']=true;

                        header('Location: /bienesraices/admin');
                    }else{
                        $errores[]='El Password es incorrecto';
                    }
             }else{
                 $errores[]='El Usuario no Existe';
             }
        }
    }

    require 'includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Iniciar Sesión</h1>

        <form class="formulario" method="POST" novalidate>
            <fieldset>
                    <legend>Email y Password</legend>

        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email" placeholder="Ingrese su Email">

                    <label for="password">Teléfono</label>
                    <input type="password" name="password" id="password" placeholder="Ingrese su Password" >
            </fieldset>

            <input type="submit" value="Iniciar Sesión" class="boton boton-verde">
        </form>
    </main>

    <?php
    incluirTemplate('footer');
   ?>