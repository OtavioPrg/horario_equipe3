<?php
$conn = new mysqli("localhost", "root", "", "escola_horario");
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$sql = "SELECT * FROM horario";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>ID Disciplina</th><th>ID Professor</th><th>Início</th><th>Fim</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>{$row['id_horario']}</td><td>{$row['id_disciplina']}</td><td>{$row['id_professor']}</td><td>{$row['inicio_horario']}</td><td>{$row['final_horario']}</td></tr>";
    }
    echo "</table>";
} else {
    echo "<p>Nenhum horário encontrado.</p>";
}
$conn->close();
?>
