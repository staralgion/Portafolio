<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
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
      <div class="signin-signup extrastylesignin" style>

        <form  class="sign-in-form" id="formcambiarpass" name="formcambiarpass">
              <input type="hidden" id="iduser" name="iduser" value="<?= $data['idusuario'] ?>" required>
              <input type="hidden" id="txtemail" name="txtemail" value="<?= $data['correo'] ?>" required>
              <input type="hidden" id="txttoken" name="txttoken" value="<?= $data['token'] ?>" required>

          <h2 class="title">Cambiar Contraseña</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input id="txtpasswordcam" name="txtpasswordcam" class="form-control" type="password" placeholder="Nueva Contraseña">
          </div>
   
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input id="txtpasswordconfirm" name="txtpasswordconfirm" class="form-control" type="password" placeholder="Confirmar Contraseña">
          </div>

          <input type="submit" value="Enviar" class="btn solid" />


        </form>

      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>      Verifica tu Correo Electrónico</h3><br>
          <p>
          Elige una contraseña segura y única. Asegúrate de que sea lo suficientemente fuerte para proteger tu cuenta.
          </p><br>
      
        </div>
        <img src="<?= media() ?>/images/loginimg/log.svg" class="image" alt="" />
      </div>
   
    </div>
  </div>








  <script>
    const baseurl = "<?= base_url(); ?>";
  </script>

  <!-- Sweet Alerts js -->
  <script src="<?= media() ?>/libs/sweetalert2/sweetalert2.min.js"></script>



  <script src="<?= media() ?>/js/login.js"></script>

  <script src="<?= media() ?>/js/functions/<?= $data['page_functions_js'] ?>"></script>

</body>

</html>