<?php
session_start();

if (!isset($_SESSION['id'])) {
    header('Location: ../login/login.php');
    exit;
}

require_once('../evento/conexao.php');
$database = new Database();
$db = $database->conectar();

$query = "SELECT * FROM vendas"; 
$stmt = $db->query($query);
$vendas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/ver_eventos.css"> 
    <title>Vendas Realizadas</title>
</head>
<body>

<div class="geral">
    <h2>Vendas Realizadas</h2>
    <a href="../">Voltar</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>ID do Evento</th>
                <th>ID do Usuário</th>
                <th>Valor do Ingresso</th>
                <th>Meia Entrada</th>
                <th>VIP</th>
                <th>Valor Extra do VIP</th>
                <th>Método de Pagamento</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vendas as $venda): ?>
                <tr>
                    <td><?php echo $venda['id']; ?></td>
                    <td><?php echo $venda['id_evento']; ?></td>
                    <td><?php echo $venda['id_usuario']; ?></td>
                    <td><?php echo 'R$ ' . number_format($venda['valor_ingresso'], 2); ?></td>
                    <td><?php echo $venda['meia_entrada'] ? 'Sim' : 'Não'; ?></td>
                    <td><?php echo $venda['vip'] ? 'Sim' : 'Não'; ?></td>
                    <td><?php echo 'R$ ' . number_format($venda['valor_extra_vip'], 2); ?></td>
                    <td><?php echo $venda['metodo_pagamento']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php include '../menu/nav.php'; ?> 
</body>
</html>
