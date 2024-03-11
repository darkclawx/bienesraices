<?php
    require 'includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Contacto</h1>

        <picture>
            <source srcset="build/img/destacada3." type="imagen/jpeg">
            <source srcset="build/img/destacada3.webp" type="imagen/webp">
            <img loading="lazy" width="200" height="300" src="build/img/destacada3.jpg" alt="Imagen contacto">
        </picture>

        <h2>Llene el formulario de Contacto</h2>

        <form class="formulario">
            <fieldset>
                <legend>Información Personal</legend>

                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" placeholder="Ingrese su Nombre">

                <label for="email">E-mail</label>
                <input type="email" id="email" placeholder="Ingrese su Email">

                <label for="telefono">Teléfono</label>
                <input type="tel" id="telefono" placeholder="Ingrese su Nombre">

                <label for="mensaje">mensaje</label>
                <textarea name="mensaje" id="mensaje" cols="30" rows="10"></textarea>

            </fieldset>

            <fieldset>
                <legend>Información Sobre la Propiedad</legend>

                <label for="opciones">Vende o Compra:</label>
                    <select name="opciones" id="opciones">
                        <option value="" disabled selected>--Seleccione--</option>
                        <option value="compra">Compra</option>
                        <option value="vende">Vende</option>
                    </select>

                    <label for="presupuesto">Precio o Presupuesto</label>
                    <input type="number" id="presupuesto" placeholder="Ingrese su Precio o Presupuesto" min="1">
            </fieldset>

            <fieldset>
                <legend>Contacto</legend>

                <p>¿Cómo desea ser contactado?</p>
                <div class="forma-contacto">
                    <label for="contactar-telefono">Teléfono</label>
                    <input name="contacto" type="radio" value="telefono" id="contactar-telefono">

                    <label for="contactar-email">E-mail</label>
                    <input name="contacto" type="radio" value="email" id="contactar-email">
                </div>

                <p>Si eligió teléfono, elija la fecha y hora.</p>

                <label for="fecha">Fecha</label>
                <input type="date" id="fecha">

                <label for="hora">Hora</label>
                <input type="time" id="hora" min="9:00" max="18:00">
            </fieldset>

            <input type="submit" value="Enviar" class="boton-verde">
        </form>
    </main>

    <?php
    incluirTemplate('footer');
   ?>