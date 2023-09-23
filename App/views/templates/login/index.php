<?php $this->layout('template', ['title' => 'Login']) ?>

<div class="container-form">
    <form action="/verify-access" method="POST" target="_self" class="form">
        <div class="form-group">
            <label for="usuario">Usuario</label>
            <input type="text" name="usuario" id="usuario" placeholder="Usuario aqui">
        </div>
        <div class="form-group">
            <label for="clave">Contraseña</label>
            <input type="text" name="clave" id="clave" placeholder="Contraseña aqui">
        </div>
        <button class="btn" type="submit">Iniciar Sesion</button>
    </form>
</div>

