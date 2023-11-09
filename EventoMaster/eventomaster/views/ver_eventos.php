<?php
session_start();

if (!isset($_SESSION['id'])) {
    header('Location: ../login/login.php');
    exit;
}

require_once('../evento/conexao.php');
$database = new Database();
$db = $database->conectar();

$query = "SELECT * FROM eventos"; 
$stmt = $db->query($query);
$eventos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/ver_eventos.css"> 
    <title>Eventos Registrados</title>
</head>
<body>

<div class="geral">
        <h2>Eventos Registrados</h2>
        <a href="../">Voltar</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome do Evento</th>
                    <th>Email para Contato</th>
                    <th>Telefone para Contato</th>
                    <th>Data de Início</th>
                    <th>Data de Término</th>
                    <th>Valor do Ingresso</th>
                    <th>Ações</th> 
                </tr>
            </thead>
            <tbody>
                <?php foreach ($eventos as $evento): ?>
                    <tr>
                        <td><?php echo $evento['id']; ?></td>
                        <td><?php echo $evento['nome_evento']; ?></td>
                        <td><?php echo $evento['email_contato']; ?></td>
                        <td><?php echo $evento['telefone_contato']; ?></td>
                        <td><?php echo $evento['data_inicio']; ?></td>
                        <td><?php echo $evento['data_termino']; ?></td>
                        <td><?php echo 'R$ ' . number_format($evento['valor_ingresso'], 2); ?></td>
                        <td>
                            <a href="../evento/excluir_evento.php?id=<?php echo $evento['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir o evento?')">Excluir Evento</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php include '../menu/nav.php'; ?> 
</body>
</html>
