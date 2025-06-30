<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Iniciar Sesion </title>
  @vite(['resources/css/iniciar_sesion/style.css', 'resources/js/iniciar_sesion/script.js'])
</head>
<body>
  <div class="contenedor__sesion">
    <form class="sesion" method="post" action="{{ route('login') }}">
      @csrf
      <h1 class="sesion__titulo">Iniciar Sesion</h1>
      <div class="sesion__logo">
        <img class="logo" src="{{ asset('imagenes/EscudoSF.PNG') }}" alt="Logo">
      </div>
      <label for="nombreUsuario" class="sesion__campo">Nombre de usuario</label>
      <input id="nombreUsuario" name="nombre_usuario" class="sesion__entrada" type="text" placeholder="Nombre de usuario" required>

      <label for="contrasena" class="sesion__campo">Contraseña</label>
      <input id="contrasena" name="contrasena" class="sesion__entrada" type="password" placeholder="Contraseña" required >
      <div class="sesion__boton">
        <button class="boton" type="submit">Iniciar Sesion</button>
      </div>
    </form>
  </div>
</body>
</html>