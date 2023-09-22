<?php $this->layout('template', ['title' => 'Login']) ?>

<div class="form-login">
    <form action="/verify-access" method="POST" target="_self">
        <label for="usuario">Usuario
            <input type="text" name="usuario" id="usuario" placeholder="Usuario aqui">
        </label>
        <label for="clave">Contraseña
            <input type="text" name="clave" id="clave" placeholder="Contraseña aqui">
        </label>
        <input type="submit" value="Iniciar sesion">
    </form>
</div>

