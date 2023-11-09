<?php
if(isset($_GET['id'])) {
    $evento_id = $_GET['id'];

    require_once('../evento/conexao.php');
    $database = new Database();
    $db = $database->conectar();

    $delete_vendas = "DELETE FROM vendas WHERE id_evento = :evento_id";
    $stmt = $db->prepare($delete_vendas);
    $stmt->bindParam(':evento_id', $evento_id, PDO::PARAM_INT);
    $stmt->execute();

    $delete_evento = "DELETE FROM eventos WHERE id = :evento_id";
    $stmt = $db->prepare($delete_evento);
    $stmt->bindParam(':evento_id', $evento_id, PDO::PARAM_INT);
    $stmt->execute();

    header('Location: ../views/ver_eventos.php');
    exit;
}
?>
