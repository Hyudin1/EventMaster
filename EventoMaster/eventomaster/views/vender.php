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

    $queryEventos = "SELECT id, nome_evento, valor_ingresso FROM eventos"; 
    $stmtEventos = $db->query($queryEventos);
    $eventos = $stmtEventos->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="../css/venda_ingresso.css"> 
    <title>Registro de Venda de Ingresso</title>
</head>
<body>
    <div class="geral">
        <h2>Registro de Venda de Ingresso</h2>
        <form action="../evento/processar_venda.php" method="post">
            <label for="evento">Evento:</label>
            <select name="evento" id="evento" required>
                <option value="">Selecione o Evento</option>
                <?php foreach ($eventos as $evento): ?>
                    <option value="<?php echo $evento['id']; ?>" data-valor="<?php echo $evento['valor_ingresso']; ?>"><?php echo $evento['nome_evento']; ?></option>
                <?php endforeach; ?>
            </select><br><br>
            
            <label for="valor_ingresso">Valor do Ingresso (sem R$):</label>
            <input type="text" name="valor_ingresso" id="valor_ingresso" readonly><br><br>
            
            <label for="meia_entrada">Meia Entrada:</label>
            <input type="checkbox" name="meia_entrada" id="meia_entrada"><br><br>
            
            <label for="vip">VIP:</label>
            <select name="vip" id="vip">
                <option value="0">Não</option>
                <option value="1">Sim</option>
            </select><br><br>
            
            <div id="valor_vip" style="display: none;">
    <label for="valor_extra_vip">Valor Extra do VIP:</label>
    <input type="text" name="valor_extra_vip" id="valor_extra_vip">
    <button type="button" onclick="calculateVIP()">Calcular VIP</button>
    <br><br>
</div>

            
            <label for="metodo_pagamento">Método de Pagamento:</label>
            <select name="metodo_pagamento" id="metodo_pagamento">
                <option value="PIX">PIX</option>
                <option value="Cartão">Cartão</option>
                <option value="Boleto">Boleto</option>
            </select><br><br>
            
            <button type="submit">Registrar Venda</button>
        </form>
        <a href="../">Voltar</a>
    </div>
    <?php include '../menu/nav.php'; ?>
    <script>
        document.getElementById('evento').addEventListener('change', function() {
            var valor = this.options[this.selectedIndex].getAttribute('data-valor');
            document.getElementById('valor_ingresso').value = valor;
        });
        
        document.getElementById('meia_entrada').addEventListener('change', function() {
            if (this.checked) {
                var valorIngresso = parseFloat(document.getElementById('valor_ingresso').value);
                var valorMeia = valorIngresso / 2;
                document.getElementById('valor_ingresso').value = valorMeia;
            } else {
                var valor = document.getElementById('evento').options[document.getElementById('evento').selectedIndex].getAttribute('data-valor');
                document.getElementById('valor_ingresso').value = valor;
            }
        });

        function calculateVIP() {
    var valorIngresso = parseFloat(document.getElementById('valor_ingresso').value);
    var valorExtraVIP = parseFloat(document.getElementById('valor_extra_vip').value);

    if (!isNaN(valorExtraVIP)) {
        var valorTotalVIP = valorIngresso + valorExtraVIP - (valorIngresso ? 0 : valorIngresso);
        document.getElementById('valor_ingresso').value = valorTotalVIP;
    }
}


        document.getElementById('vip').addEventListener('change', function() {
            if (this.value === '1') {
                document.getElementById('valor_vip').style.display = 'block';
            } else {
                document.getElementById('valor_vip').style.display = 'none';
                document.getElementById('valor_extra_vip').value = '';
                var valor = document.getElementById('evento').options[document.getElementById('evento').selectedIndex].getAttribute('data-valor');
                document.getElementById('valor_ingresso').value = valor;
            }
        });
    </script>
</body>
</html>
