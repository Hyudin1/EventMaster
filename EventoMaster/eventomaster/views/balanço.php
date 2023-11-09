<?php
session_start();

if (!isset($_SESSION['id'])) {
    header('Location: ../login/login.php');
    exit;
}

require_once('../evento/conexao.php');
$database = new Database();
$db = $database->conectar();

$query = "SELECT SUM(valor_ingresso) AS total_vendas FROM vendas"; 
$stmt = $db->query($query);
$result = $stmt->fetch(PDO::FETCH_ASSOC);

$total_vendas = $result['total_vendas'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="../css/balanço.css">
    <title>Total de Vendas</title>
</head>
<body>

<div class="geral">
    <h2>Total de Vendas Realizadas</h2>
    <p>O valor total de todas as vendas realizadas é: R$ <?php echo number_format($total_vendas, 2); ?></p>
    <a href="../">Voltar</a>
</div>

<?php include '../menu/nav.php'; ?> 
</body>
</html>
