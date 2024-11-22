<?php
include ('../conexao/db.php');

if (isset($_POST['registrar'])) {
    $disciplina_id = $_POST['disciplina'];
    $professor_id = $_POST['professor'];
    $dia = $_POST['dia'];
    $horario = $_POST['horario'];

    $stmt = $pdo->prepare("INSERT INTO horarios (disciplina_id, professor_id, dia, horario) VALUES (:disciplina_id, :professor_id, :dia, :horario)");
    $stmt->bindParam(':disciplina_id', $disciplina_id);
    $stmt->bindParam(':professor_id', $professor_id);
    $stmt->bindParam(':dia', $dia);
    $stmt->bindParam(':horario', $horario);
    $stmt->execute();

    header('Location: horarios.php?status=sucesso');
    exit;
}
?>
