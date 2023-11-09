<?php
    if(!isset($_SESSION)) {
        session_start();
    }

    $id_user = $_SESSION['id'];

    if(!isset($_SESSION['id'])) {
        header('Location: ../login/login.php');
    }

    require_once('../evento/conexao.php');
    date_default_timezone_set('America/Sao_Paulo');

    $database = new Database();
    $db = $database->conectar();

    $query = "SELECT id, nome, email FROM usuarios WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id', $id_user, PDO::PARAM_INT);
    $stmt->execute();
    $user_data = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user_data) {
        header('Location: erro.php');
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="../css/evento.css"> 
    <title>Registro de Evento</title>
</head>
<body>
    <div class="geral">
        <h2>Registro de Evento</h2>
        <form action="../evento/processar_evento.php" method="post">
            <label for="nome">Nome do Evento:</label>
            <input type="text" name="nome" id="nome" required><br><br>
            
            <label for="email">Email para Contato:</label>
            <input type="email" name="email" id="email" required><br><br>
            
            <label for="telefone">Telefone para Contato:</label>
            <input type="tel" name="telefone" id="telefone" required><br><br>
            
            <label for="data_inicio">Data e Hora de Início:</label>
            <input type="datetime-local" name="data_inicio" id="data_inicio" required><br><br>
            
            <label for="data_termino">Data e Hora de Término:</label>
            <input type="datetime-local" name="data_termino" id="data_termino" required><br><br>
            
            <label for="valor_ingresso">Valor do Ingresso (sem R$):</label>
            <input type="text" name="valor_ingresso" id="valor_ingresso" placeholder="0.00" required><br><br>
            
            <button type="submit">Registrar Evento</button>
        </form>
        <a href="../">Voltar</a>
    </div>
    <?php include '../menu/nav.php'; ?>
</body>
</html>
