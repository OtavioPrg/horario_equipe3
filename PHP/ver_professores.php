<?php
$conn = new mysqli("localhost", "root", "", "escola_horario");
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$sql = "SELECT * FROM professor";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Nome</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>{$row['id_professor']}</td><td>{$row['nome_professor']}</td></tr>";
    }
    echo "</table>";
} else {
    echo "<p>Nenhum professor encontrado.</p>";
}
$conn->close();
?>
