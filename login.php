<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Iniciar Sesión</title>
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

      <?php
      include "connection.php";

      if (isset($_POST['login'])) {

        $email = $_POST['email'];
        $pass = $_POST['password'];

        $sql = "select * from users where email='$email'";

        $res = mysqli_query($conn, $sql);

        if (mysqli_num_rows($res) > 0) {

          $row = mysqli_fetch_assoc($res);

          $password = $row['password'];

          $decrypt = password_verify($pass, $password);


          if ($decrypt) {
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            header("location:index.html");


          } else {
            echo "<div class='message'>
                    <p>Contraseña incorrecta</p>
                    </div><br>";

            echo "<a href='login.php'><button class='btn'>Regresar</button></a>";
          }

        } else {
          echo "<div class='message'>
                    <p>Correo o contraseña equivocada</p>
                    </div><br>";

          echo "<a href='login.php'><button class='btn'>Regresar</button></a>";

        }


      } else {


        ?>

        <header>Iniciar Sesión</header>
        <hr>
        <form action="#" method="POST">

          <div class="form-box">


            <div class="input-container">
              <i class="fa fa-envelope icon"></i>
              <input class="input-field" type="email" placeholder="Correo Electrónico" name="email">
            </div>

            <div class="input-container">
              <i class="fa fa-lock icon"></i>
              <input class="input-field password" type="password" placeholder="Contraseña" name="password">
              <i class="fa fa-eye toggle icon"></i>
            </div>

            <div class="remember">
              <input type="checkbox" class="check" name="remember_me">
              <label for="remember">Recuerdame</label>
              <span><a href="forgot.php">Has olvidado tu contraseña</a></span>
            </div>

          </div>



          <input type="submit" name="login" id="submit" value="Iniciar Sesión" class="button">

          <div class="links">
            ¿No tienes una cuenta? <a href="signup.php">Regístrate ahora</a>
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