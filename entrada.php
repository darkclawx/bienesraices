<?php
    require 'includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Guía para la decoración de tu hogar</h1>

        <picture>
            <source srcset="build/img/destacada2.jpg" type="imagen/jpeg">
            <source srcset="build/img/destacada2.webp" type="imagen/webp">
            <img loading="lazy" width="200" height="300" src="build/img/destacada2.jpg" alt="">
        </picture>

        <p class="informacion-meta">Escrito el: <span>23/02/2024</span> por: <span>Admin</span></p>

        <div class="resumen-propiedad">
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fugiat sed officia recusandae facere debitis, voluptatibus nam, cum quo harum accusamus quidem blanditiis sit culpa. Tenetur ab consequuntur dignissimos eos error. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic perferendis corrupti voluptates qui maxime natus consectetur impedit quia odio minus beatae explicabo neque totam porro, necessitatibus sed accusantium nulla exercitationem!</p>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fugiat sed officia recusandae facere debitis, voluptatibus nam, cum quo harum accusamus quidem blanditiis sit culpa. Tenetur ab consequuntur dignissimos eos error. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic perferendis corrupti voluptates qui maxime natus consectetur impedit quia odio minus beatae explicabo neque totam porro, necessitatibus sed accusantium nulla exercitationem!</p>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fugiat sed officia recusandae facere debitis, voluptatibus nam, cum quo harum accusamus quidem blanditiis sit culpa. Tenetur ab consequuntur dignissimos eos error. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic perferendis corrupti voluptates qui maxime natus consectetur impedit quia odio minus beatae explicabo neque totam porro, necessitatibus sed accusantium nulla exercitationem!</p>

        </div>
    </main>

    <?php
    incluirTemplate('footer');
   ?>