<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar bg-info">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><img src="" alt="" width="150px"></a>
        </div>
    </nav> 
    <div class="container mt-4 text-center">
        <div class= "mt-5 mb-3">
            <img src="" alt="" width= "" >
        </div>

        <div>
            <h3>Tela de Login</h3>

            <?php
                //if (!empty($_SESSION['ok'])) {
               //     echo $_SESSION['ok'];
                //    unset($_SESSION['ok']);
                //}
            ?>
            <form action="" method="post">
    

                <label class="form-label  for="usuario>Usuário</label>
                <input class="form-control" type="email" name="user" id="usuario" placeholder="Nome do usuário" required>

                <label class="form-label" for="pass">Senha</label>
                <input class="form-control" type="password" name="senha" id="pass" placeholder="Senha" required><br>

                <input class="btn btn-success btn-lg" type="submit" value="Logar">
                <a class="btn btn-primary btn-lg" href="Web/registerr.php">Cadastrar</a>


            </form>
        
        </div>




    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
