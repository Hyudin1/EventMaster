<?php
    session_start();

    if (!isset($_SESSION['id'])) {
        header('Location: ../login/login.php');
        exit;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (
            isset($_POST['nome'], $_POST['email'], $_POST['telefone'], $_POST['data_inicio'], $_POST['data_termino'], $_POST['valor_ingresso'])
        ) {
            require_once('../evento/conexao.php');

            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];
            $data_inicio = $_POST['data_inicio'];
            $data_termino = $_POST['data_termino'];
            $valor_ingresso = $_POST['valor_ingresso'];

            $query = "INSERT INTO eventos (nome_evento, email_contato, telefone_contato, data_inicio, data_termino, valor_ingresso) VALUES (:nome, :email, :telefone, :data_inicio, :data_termino, :valor_ingresso)";

            $database = new Database();
            $db = $database->conectar();

            $stmt = $db->prepare($query);

            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':telefone', $telefone);
            $stmt->bindParam(':data_inicio', $data_inicio);
            $stmt->bindParam(':data_termino', $data_termino);
            $stmt->bindParam(':valor_ingresso', $valor_ingresso);

            if ($stmt->execute()) {
                header('Location: ../');
                exit;
            } else {
                header('Location: erro.php');
                exit;
            }
        } else {
            header('Location: erro.php');
            exit;
        }
    }
?>
