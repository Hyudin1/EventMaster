<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="../css/login.css">
    <title>Document</title>
</head>
<body>
        <div class="container-center">
            <a class="navbar-brand" href="index.php"><img src="..\Recursos/EventLog.png" alt="" width="250px"></a>
        </div>


<div class="geral">
    <form action="logar.php" method="post">

            <input type="email" name="email" id="" placeholder="Insira Seu E-mail">
                    <input type="password" name="senha" id="" placeholder="Insira Sua Senha"> 
                    <button  type="submit">Login</button>


    </form> 
    <a href="cadastro.php">Cadastre-se</a>
                 
                </div>
  <?php include '../menu/nav.php'; ?> 
</body>
</html>