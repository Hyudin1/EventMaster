<?php
session_start();

if (!isset($_SESSION['id'])) {
    header('Location: ../login/login.php');
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_usuario = $_SESSION['id'];
    $id_evento = $_POST['evento']; 

    $valor_ingresso = $_POST['valor_ingresso'];
    $meia_entrada = isset($_POST['meia_entrada']) ? 1 : 0; 
    $vip = $_POST['vip'];
    $valor_extra_vip = $_POST['valor_extra_vip'];
    $metodo_pagamento = $_POST['metodo_pagamento'];

    require_once('../evento/conexao.php');
    $database = new Database();
    $db = $database->conectar();

    $query = "INSERT INTO vendas (id_evento, id_usuario, valor_ingresso, meia_entrada, vip, valor_extra_vip, metodo_pagamento) 
              VALUES (:id_evento, :id_usuario, :valor_ingresso, :meia_entrada, :vip, :valor_extra_vip, :metodo_pagamento)";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id_evento', $id_evento);
    $stmt->bindParam(':id_usuario', $id_usuario);
    $stmt->bindParam(':valor_ingresso', $valor_ingresso);
    $stmt->bindParam(':meia_entrada', $meia_entrada);
    $stmt->bindParam(':vip', $vip);
    $stmt->bindParam(':valor_extra_vip', $valor_extra_vip);
    $stmt->bindParam(':metodo_pagamento', $metodo_pagamento);

    if ($stmt->execute()) {

        header('Location: ../');
        exit;
    } else {
        // Tratar erro na inserção
        echo "Erro ao registrar a venda. Por favor, tente novamente.";
    }
}
?>
