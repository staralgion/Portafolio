<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login page</title>
  <link rel="stylesheet" href="<?= media() ?>/css/login.css" />
  <script src="https://kit.fontawesome.com/7b39153ed3.js" crossorigin="anonymous"></script>
  <!-- Responsive Loader  -->
  <link href="<?= media() ?>/css/loader.css" rel="stylesheet" type="text/css" />
  <script src="<?= media() ?>/js/loader.js"></script>

  <!-- Sweet Alert-->
  <link href="<?= media() ?>/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
  <!-- Select2-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.4.2/zxcvbn.js"></script>

  
</head>

<body>
  <div id="load_screen">
    <div class="loader">
      <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
      </div>
    </div>
  </div>



  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">

        <form  class="sign-in-form" name="formlogin" id="formlogin">
          <h2 class="title">Iniciar Sesión</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input id="txtemail" name="txtemail" type="text" placeholder="Email" autofocus>
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input id="txtpassword" name="txtpassword" class="form-control" type="password" placeholder="Contraseña">
          </div>

          <p style="margin-bottom: 10px; margin-top:10px;">
            <a style="text-decoration: none;" href="<?= base_url() ?>/Login/forgotpassword">   ¿Olvidaste tu contraseña?</a>
          </p>

          <input type="submit" value="Iniciar Sesión" class="btn solid" />
          <!-- <p class="social-text">Or Sign in with social platforms</p>
          <div class="social-media">
            <a href="#" class="social-icon">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-google"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div> -->

        </form>

        <form name="formregister" id="formregister" class="sign-up-form">  
          <h2 class="title">Registrate</h2>


          <div class="input-field">
            <i class="fas fa-user"></i>
            <input id="txtnombre" name="txtnombre" type="text" placeholder="Nombre" autofocus>
          </div>

          <div class="input-field">
            <i class="fas fa-user"></i>
            <input id="txtapellido" name="txtapellido" type="text" placeholder="Apellidos" autofocus>
          </div>

          <div class="input-field">
            <i class="fas fa-user"></i>
            <input id="txtemailregister" name="txtemailregister" type="text" placeholder="Email" autofocus>
          </div>

          <p class="social-text">Accede al servicio de atención al cliente</p>

          <input type="submit" value="Crear Cuenta" class="btn solid" />

          
          <!-- <div class="social-media">
            <a href="#" class="social-icon">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-google"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div> -->

        </form>
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>Crea una cuenta</h3><br>
          <p>
            Estamos encantados de tenerte como parte de nuestra comunidad. Tu registro es el primer paso hacia una experiencia única y personalizada.
          </p><br>
          <button class="btn transparent" id="sign-up-btn">
            Registrate
          </button>
        </div>
        <img src="<?= media() ?>/images/loginimg/log.svg" class="image" alt="" />
      </div>
      <div class="panel right-panel">
        <div class="content">
          <h3>¿Ya tienes una cuenta?</h3>
          <p>
            Ingresa y obten información de tu producto deseado
          </p><br>
          <button class="btn transparent" id="sign-in-btn">
            Iniciar Sesión
          </button>
        </div>
        <img src="<?= media() ?>/images/loginimg/register.svg" class="image" alt="" />
      </div>
    </div>

    
  </div>




  <script>
    const baseurl = "<?= base_url(); ?>";
  </script>

  <!-- Sweet Alerts js -->
  <script src="<?= media() ?>/libs/sweetalert2/sweetalert2.min.js"></script>

  <script src="<?= media() ?>/js/login.js "></script>


  <script src="<?= media() ?>/js/functions/<?= $data['page_functions_js'] ?>"></script>

</body>

</html>