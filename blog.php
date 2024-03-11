<?php
    require 'includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Nuestro Blog</h1>

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
        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog3.jpg" type="imagen/jpeg">
                    <source srcset="build/img/blog3.webp" type="imagen/webp">
                    <img loading="lazy" width="200" height="300" src="build/img/blog3.jpg" alt=" blog1">
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
                    <source srcset="build/img/blog4.jpg" type="imagen/jpeg">
                    <source srcset="build/img/blog4.webp" type="imagen/webp">
                    <img loading="lazy" width="200" height="300" src="build/img/blog4.jpg" alt=" blog1">
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
    </main>

    <?php
    include  './includes/templates/footer.php'
   ?>