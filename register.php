<?php

    require 'config/newdatabase.php';

    $message = '';

    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $sql = "INSERT INTO propietarios (email, password, nombre, cedula, numero) VALUES (:email, :password, :nombre, :cedula, :numero)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $_POST['email']);
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':nombre', $_POST['nombre']);
        $stmt->bindParam(':cedula', $_POST['cedula']);
        $stmt->bindParam(':numero', $_POST['numero']);

        try {
            $stmt->execute();
            $message = 'Successfully created new user';
        } catch (\Throwable $th) {
            $message = 'Sorry there must have been an issue creating your account';
        }

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Panel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!--bootstrap4 library linked-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

  <!--custom style-->
  <style type="text/css">
   .registration-form{
      background: #f7f7f7;
      padding: 20px;
     
      margin: 100px 0px;
    }
    .err-msg{
      color:red;
    }
    .registration-form form{
      border: 1px solid #e8e8e8;
      padding: 10px;
      background: #f3f3f3;
    }
  </style>
</head>
<body>

<div class="container-fluid">
 <div class="row">
   <div class="col-sm-4">
   </div>
   <div class="col-sm-4">
    
    <!--====registration form====-->
    <div class="registration-form">
      <h4 class="text-center">Registro</h4>
      <p class="text-success text-center"></p>

      <?php if(!empty($message)): ?>
        <p> <?= $message ?></p>
    <?php endif; ?>


      <form action="register.php" method="post">
        
        <!--// Email//-->
        <div class="form-group">
            <label>Email:</label>
            <input type="text" class="form-control"  placeholder="Correo" name="email" required>
        </div>
        
        <!--//Password//-->
        <div class="form-group">
            <label>Contraseña:</label>
            <input type="password" class="form-control"  placeholder="Contraseña" name="password" required>
        </div>

         <!--// name//-->
         <div class="form-group">
            <label>Nombre:</label>
            <input type="text" class="form-control"  placeholder="Nombre" name="nombre" required>
        </div>

         <!--// cedula//-->
         <div class="form-group">
            <label>Cedula:</label>
            <input type="text" class="form-control"  placeholder="Cedula" name="cedula" required>
        </div>

        <!--// # de vivienda//-->
        <div class="form-group">
            <label># de vivienda:</label>
            <input type="text" class="form-control"  placeholder="# de vivienda" name="numero" required>
        </div>

        
        <button type="submit" class="btn btn-secondary" name="login">Guardar</button>
      </form>
    </div>
   </div>
   <div class="col-sm-4">
   </div>
 </div>
  
</div>

</body>
</html>