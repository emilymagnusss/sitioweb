<?php
session_start();

include("connection.php");

if (!isset($_SESSION['username'])) {
    header("location:login.php");
}




?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wonderwold</title>
    <link rel="stylesheet" type="text/css" href="/Estilos/style.css">
<style> 
#page-navigation {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  align-items: center;
}

.navigation-content {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  align-items: center;
}

nav ul {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  align-items: center;
  list-style: none;
  margin: 0;
  padding: 0;
}

nav li {
  margin-right: 20px;
}

nav a {
  text-decoration: none;
  color: #333;
}

.actions {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  align-items: center;
}

.user-balance {
  margin-right: 20px;
}

.btn-white {
  background-color: #fff;
  border: none;
  padding: 10px 20px;
  font-size: 16px;
  cursor: pointer;
}

.btn-white:hover {
  background-color: #f7f7f7;
}

.fa-settings {
  margin-right: 10px;
}
</style>

</head>

<body>
    <header>
        <nav>
          <ul>
            <li><a href="http://127.0.0.1:3000/index.html"><img src="/Imagenes/icono.png" alt="Logo de la página" width="150" height="90"></a></li>
            <li style="margin-top: 35px;"><a href="http://127.0.0.1:3000/index.html"><strong>Inicio</strong></a></li>
            <li style="margin-top: 35px;"><a href="http://127.0.0.1:3000/explorar.html"><strong>Explorar</strong></a></li>
            <li style="margin-top: 35px;"><a href="http://127.0.0.1:3000/comunidad.html"><strong>Comunidad</strong></a></li>
            <li class="dropdown" style="margin-top: 35px;">
                <a href="http://127.0.0.1:3000/escribir.html"><strong>Escribir</strong></a>
                <ul class="dropdown-menu1">
                  <li><a href="http://127.0.0.1:3000/escribir.html">Crear historia</a></li>
                  <li><a href="#">Mis historias</a></li>
                </ul>
              </li>
            <li style="margin-top: 35px;"><a href="http://localhost:3000/login.php"><strong>Iniciar Sesión</strong></a></li>
            <li style="margin-top: 35px;"><a href="http://localhost:3000/signup.php"><strong>Registrarse</strong></a></li>
            <li style="margin-top: 35px;">
              <a href="#" class="dropdown-toggle">
                <img src="Imagenes/usuario.png" alt="usuario" width="30" height="30" style="border-radius: 50%; margin-right: 10px;">
              <ul class="dropdown-menu">
                <li><a href="#">Perfil</a></li>
                <li><a href="#">Configuración</a></li>
                <li><a href="#">Cerrar sesión</a></li>
              </ul>
            </li>
          </ul>
        </nav>
      </header>


<div class="name">
<div class="name">
    <center style="color: red;">Bienvenido <?php echo $_SESSION['username']; ?>!</center>
</div>
    </div>

    <div id="page-navigation" class="sub-navigation">
      <div id="edit-navblock" class="edit-profile hidden faded"></div>

      <div class="container">
        <div class="navigation-content">

          <nav>
            <ul>
              <li data-section="about" class="active">
                <a href="/user/NaNa_147" class="on-nav-item">Info</a>
              </li>
              <li data-section="conversations" class="">
                <a href="/user/NaNa_147/conversations" class="on-nav-item">Conversaciones</a>
              </li>
              <li data-section="following" class="">
                <a href="/user/NaNa_147/following" class="on-nav-item">Siguiendo</a>
              </li>
            </ul>
          </nav>

          <div class="actions" role="menu">

            <button class="btn btn-white on-edit-profile" role="menuitem">
              <span class="fa fa-settings fa-wp-neutral-2 " aria-hidden="true" style="font-size:16px;"></span> <span class="hidden-xs">Edita tu perfil</span>
            </button>

          </div>
        </div>
      </div>
    </div>