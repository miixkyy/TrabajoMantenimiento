<!DOCTYPE html>
<html>
<head>
  <!-- font awesome cdn link  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="Public/css/style-sesion.css">
</head>
<body>
  <div class="container">
    <div class="icon">
      <h2>Login</h2>
    </div>
    <div class="form">
      <form action="index.php?m=login" method="POST">
        <div class="form-group">
          <label for="username">Nombre</label>
          <input type="text" id="username" name="txtusuario" placeholder="Nombre">
        </div>
        <div class="form-group">
          <label for="username">Apellido Paterno</label>
          <input type="text" id="username" name="txtapellido" placeholder="Apellido paterno">
        </div>
        <div class="form-group">
          <label for="password">Contraseña</label>
          <input type="password" id="password" name="txtcontraseña" placeholder="Contraseña">
        </div>
        <button type="submit" name="submit"> Iniciar sesión</button>
      </form>
      
    </div>
    
  </div>
</body>
</html>
