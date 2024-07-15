<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrarse</title>
  <link rel="stylesheet" type="text/css" href="Estilos/style1.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
<header> 
<div class="left-actions">
    <a href="http://127.0.0.1:3000/index.html" class="btn-cancel">
      <img src="https://cdn-icons-png.flaticon.com/128/17/17699.png" alt="Volver">
    </a>
  </div>
</header>

  <div class="container">
    <div class="form-box box">


      <header>Registrarse</header>
      <hr>

      <form action="#" method="POST">


        <div class="form-box">

          <?php

          session_start();

          include "connection.php";

          if (isset($_POST['register'])) {

            $name = $_POST['username'];
            $email = $_POST['email'];
            $pass = $_POST['password'];
            $cpass = $_POST['cpass'];


            $check = "select * from users where email='{$email}'";

            $res = mysqli_query($conn, $check);

            $passwd = password_hash($pass, PASSWORD_DEFAULT);

            $key = bin2hex(random_bytes(12));




            if (mysqli_num_rows($res) > 0) {
              echo "<div class='message'>
        <p>Este correo electrónico está en uso. ¡Pruebe con otro, por favor!</p>
        </div><br>";

              echo "<a href='javascript:self.history.back()'><button class='btn'>Regresar</button></a>";


            } else {

              if ($pass === $cpass) {

                $sql = "insert into users(username,email,password) values('$name','$email','$passwd')";

                $result = mysqli_query($conn, $sql);

                if ($result) {

                  echo "<div class='message'>
      <p>¡Te registrarste correctamente!</p>
      </div><br>";

                  echo "<a href='login.php'><button class='btn'>Inicia sesión ahora</button></a>";

                } else {
                  echo "<div class='message'>
        <p>Este correo electrónico está en uso. ¡Pruebe con otro, por favor!</p>
        </div><br>";

                  echo "<a href='javascript:self.history.back()'><button class='btn'>Regresar</button></a>";
                }

              } else {
                echo "<div class='message'>
      <p>Las contraseñas no coinciden.</p>
      </div><br>";

                echo "<a href='signup.php'><button class='btn'>Regresar</button></a>";
              }
            }
          } else {

            ?>

            <div class="input-container">
              <i class="fa fa-user icon"></i>
              <input class="input-field" type="text" placeholder="Nombre" name="username" required>
            </div>

            <div class="input-container">
              <i class="fa fa-envelope icon"></i>
              <input class="input-field" type="email" placeholder="Correo Electrónico" name="email" required>
            </div>

            <div class="input-container">
              <i class="fa fa-lock icon"></i>
              <input class="input-field password" type="password" placeholder="Contraseña" name="password" required>
              <i class="fa fa-eye icon toggle"></i>
            </div>

            <div class="input-container">
              <i class="fa fa-lock icon"></i>
              <input class="input-field" type="password" placeholder="Confirmar contraseña" name="cpass" required>
              <i class="fa fa-eye icon"></i>
            </div>

          </div>


          <center><input type="submit" name="register" id="submit" value="Registrarse" class="btn"></center>


          <div class="links">
          ¿Ya tienes una cuenta? <a href="login.php">Inicia Sesión</a>
          </div>

        </form>
      </div>
      <?php
          }
          ?>
  </div>

  <script>
    const toggle = document.querySelector(".toggle"),
      input = document.querySelector(".password");
    toggle.addEventListener("click", () => {
      if (input.type === "password") {
        input.type = "text";
        toggle.classList.replace("fa-eye-slash", "fa-eye");
      } else {
        input.type = "password";
      }
    })
  </script>
</body>

</html>