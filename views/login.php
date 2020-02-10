<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
 <title>Login</title>
 <link rel="stylesheet" href="<?=BASE_URL?>/assets/css/login.css" type="text/css">
   <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
</head>

<body>

  
  

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="https://www.b-cube.in/wp-content/uploads/2014/05/aditya-300x177.jpg" id="icon" alt="User Icon" />
      <h1>Sushi</h1>
    </div>

    <!-- Login Form -->
    <form method="POST" action="">
      <input type="text" id="login" class="fadeIn second" name="usuario" placeholder="Usuario">
      <input type="text" id="password" class="fadeIn third" name="senha" placeholder="Senha">
      <input type="submit" class="fadeIn fourth" value="Entrar">
       </br>
            <?php if(isset($error)&& !empty($error)){      ?>
            <div class="warning">   <?php echo $error; ?></div>
                <?php  } ?>
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Go to the Site</a>
    </div>

  </div>
</div>
    
</body>
</html>