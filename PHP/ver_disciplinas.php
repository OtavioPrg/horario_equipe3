<?php
// Conexão com o banco de dados
$conn = new mysqli("localhost", "root", "", "escola_horario");
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Consulta SQL para disciplinas
$sql = "SELECT * FROM disciplina";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Nome</th><th>ID Professor</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>{$row['id_disciplina']}</td><td>{$row['nome_disciplina']}</td><td>{$row['id_professor']}</td></tr>";
    }
    echo "</table>";
} else {
    echo "<p>Nenhuma disciplina encontrada.</p>";
}
$conn->close();
?>
