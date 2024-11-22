<?php
include ('../conexao/db.php');

if (isset($_POST['cadastrar'])) {
    $tipo = $_POST['tipo'];
    $nome = $_POST['nome'];

    if ($tipo === 'professor') {
        $stmt = $pdo->prepare("INSERT INTO professores (nome) VALUES (:nome)");
    } elseif ($tipo === 'disciplina') {
        $stmt = $pdo->prepare("INSERT INTO disciplinas (nome) VALUES (:nome)");
    } else {
        die("Tipo inválido!");
    }

    $stmt->bindParam(':nome', $nome);
    $stmt->execute();

    header('Location: cadastro.php?status=sucesso');
    exit;
}
?>
