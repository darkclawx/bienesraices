<?php
    require 'includes/funciones.php';
    incluirTemplate('header', $inicio=true);
?>

    <main class="contenedor seccion">
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
    </main>

    <section class="seccion contenedor">
        <h2>Casas y Departamentos en venta</h2>

            <?php
                $limite=3;
                include 'includes/templates/anuncios.php';
            ?>

        <div class="alinear-derecha">
            <a class="boton-verde" href="anuncios.php">Ver todas</a>
        </div>
    </section>

    <section class="imagen-contacto">
        <h2>Encuentra la casa de tus Sueños</h2>
        <p>Llena el formulario de contacto y un asesor se pondra en contacto contigo a la brevedad</p>
        <a class="boton-amarillo" href="contacto.php">Contactanos</a>
    </section>

    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestro Blog</h3>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog1.jpg" type="imagen/jpeg">
                        <source srcset="build/img/blog1.webp" type="imagen/webp">
                        <img loading="lazy" width="200" height="300" src="build/img/blog1.jpg" alt=" blog1">
                    </picture>
                </div><!--.imagen-->

                <div class="texto-entrada">
                    <a href="entrada.html">
                        <h4>Terraza en el techo de tu casa</h4>
                        <p class="informacion-meta">Escrito el: <span>23/02/2024</span> por: <span>Admin</span></p>

                        <p>
                            Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero
                        </p>
                    </a>
                </div><!--.texto-entrada-->
            </article><!--.entrada-blog-->

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog2.jpg" type="imagen/jpeg">
                        <source srcset="build/img/blog2.webp" type="imagen/webp">
                        <img loading="lazy" width="200" height="300" src="build/img/blog2.jpg" alt=" blog1">
                    </picture>
                </div><!--.imagen-->

                <div class="texto-entrada">
                    <a href="entrada.html">
                        <h4>Guia para la decoración del Hogar</h4>
                        <p class="informacion-meta">Escrito el: <span>23/02/2024</span> por: <span>Admin</span></p>

                        <p>
                            Maximiza el espacio en tu hogar con esta guia, aprende a combinar muebles y colores para 
                            darle vida a tu espacio
                        </p>
                    </a>
                </div><!--.texto-entrada-->
            </article><!--.entrada-blog-->
        </section><!--.blog-->

        <section class="testimoniales">
            <h3>testimoniales</h3>

            <div class="testimonial">
                <blockquote>
                    El personal se comportó de una excelente forma, muy buena atención y la casa que me ofrecieron
                    cumple con todas mis expectativas.
                </blockquote>
                <p>- Mario Rodríguez</p>
            </div>
        </section>
    </div>

   <?php
    incluirTemplate('footer');
   ?>