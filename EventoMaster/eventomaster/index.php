<?php
	if(!isset($_SESSION)){
    	session_start();
	}

	$id_user = $_SESSION['id'];

	if(!isset ($_SESSION['id'])) {
    	header('Location: login/login.php');
	}

	require_once('evento/conexao.php');
	date_default_timezone_set('America/Sao_Paulo');

	$database = new Database();
	$db = $database->conectar();
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/head.css">

    <title>Index</title>
</head>
<body>




<div class="geral">
<a href="views/balanço.php">Balanço das Vendas</a>
<a href="views/ver_vendas.php">Ver Vendas</a>
<a href="views/vender.php">Vender Ingresso</a>
<a href="views/ver_eventos.php">Ver Eventos</a>
<a href="views/evento.php">Registrar Evento</a>

</div>
<?php include 'menu/menu-index/nav.php'; ?>
</body>
</html>