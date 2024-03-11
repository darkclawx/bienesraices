<?php
    require 'includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Conoce Sobre Nosotros</h1>

        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.jpg" type="imagen/jpeg">
                    <source srcset="build/img/nosotros.webp" type="imagen/webp">
                    <img loading="lazy" width="200" height="300" src="build/img/nosotros.jpg" alt="nosotros">
                </picture>
            </div>
            <div class="texto-nosotros">
                <blockquote>25 años de Experiecia</blockquote>

                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora atque quis rerum, veritatis voluptatibus ad vitae similique molestiae, hic quibusdam corporis, aut fugit quaerat consectetur magni cupiditate itaque voluptatum! Dolore.</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora atque quis rerum, veritatis voluptatibus ad vitae similique molestiae, hic quibusdam corporis, aut fugit quaerat consectetur magni cupiditate itaque voluptatum! Dolore.</p>
            </div>
        </div>
    </main>

    <section class="contenedor seccion">
        <h1>Más sobre nosotros</h1>

        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="icono seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eligendi quam quaerat vero, nisi dolore libero quo laboriosam architecto veritatis, enim voluptatum. Fugit, magni eum. Nemo, facilis corporis? Assumenda, in repellat?</p>
            </div><!--.icono-->

            <div class="icono">
                <img src="build/img/icono2.svg" alt="icono precio" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eligendi quam quaerat vero, nisi dolore libero quo laboriosam architecto veritatis, enim voluptatum. Fugit, magni eum. Nemo, facilis corporis? Assumenda, in repellat?</p>
            </div><!--.icono-->

            <div class="icono">
                <img src="build/img/icono3.svg" alt="icono tiempo" loading="lazy">
                <h3>A Tiempo</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eligendi quam quaerat vero, nisi dolore libero quo laboriosam architecto veritatis, enim voluptatum. Fugit, magni eum. Nemo, facilis corporis? Assumenda, in repellat?</p>
            </div><!--.icono-->
        </div><!--.iconos-nosotros-->
    </section>

    <?php
    incluirTemplate('footer');
   ?>