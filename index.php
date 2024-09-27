
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Horários dos Alunos</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function switchTab(tabId) {
            document.getElementById('registroTab').style.display = 'none';
            document.getElementById('gerenciarTab').style.display = 'none';
            document.getElementById(tabId).style.display = 'block';
        }
    </script>
</head>
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 20px;
}

h1, h2 {
    color: #333;
}

.nav button {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin-right: 10px;
}

.nav button:hover {
    background-color: #45a049;
}

form {
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    max-width: 500px;
    margin-top: 20px;
}

label {
    display: block;
    margin: 10px 0 5px;
}

input[type="text"], input[type="time"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

button[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button[type="submit"]:hover {
    background-color: #45a049;
}


table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    background-color: #fff;
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 12px;
    text-align: center;
}

th {
    background-color: #4CAF50;
    color: white;
}

table input[type="text"], table input[type="time"] {
    width: 90%;
    padding: 5px;
}


button[type="submit"][name="edit"], button[type="submit"][name="delete"] {
    background-color: #f44336;
    color: white;
    border: none;
    border-radius: 4px;
    padding: 5px 10px;
    cursor: pointer;
}

button[type="submit"][name="edit"] {
    background-color: #4CAF50;
}

button[type="submit"][name="edit"]:hover {
    background-color: #45a049;
}

button[type="submit"][name="delete"]:hover {
    background-color: #d32f2f;
}

</style>
<?php

function carregarRegistros() {
    if (file_exists('registros.json')) {
        $jsonData = file_get_contents('registros.json');
        $registros = json_decode($jsonData, true);
        if (is_array($registros)) {
            return $registros;
        }
    }
    return [];
}

function salvarRegistros($registros) {
    $jsonData = json_encode($registros, JSON_PRETTY_PRINT);
    file_put_contents('registros.json', $jsonData);
}

$registros = carregarRegistros();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['registrar'])) {
    $nome = $_POST['nome'];
    $chegada = $_POST['chegada'];
    $saida = $_POST['saida'] ? $_POST['saida'] : "Ainda não saiu";

    $registros[] = [
        'nome' => $nome,
        'chegada' => $chegada,
        'saida' => $saida
    ];

    salvarRegistros($registros);
}

if (isset($_POST['delete'])) {
    $id = $_POST['delete'];
    unset($registros[$id]);
    $registros = array_values($registros);
    salvarRegistros($registros);
}

if (isset($_POST['edit'])) {
    $id = $_POST['edit'];
    $registros[$id]['nome'] = $_POST['edit_nome'];
    $registros[$id]['chegada'] = $_POST['edit_chegada'];
    $registros[$id]['saida'] = $_POST['edit_saida'];
    salvarRegistros($registros);
}
?>

<body>
    <h1>Controle de Horários</h1>
    <div class="nav">
        <button onclick="switchTab('registroTab')">Registrar Horário</button>
        <button onclick="switchTab('gerenciarTab')">Gerenciar Registros</button>
    </div>
    <div id="registroTab">
        <h2>Registrar Novo Horário</h2>
        <form action="index.php" method="post">
            <label for="nome">Nome do Aluno:</label>
            <input type="text" id="nome" name="nome" required><br><br>

            <label for="chegada">Horário de Chegada:</label>
            <input type="time" id="chegada" name="chegada" required><br><br>

            <label for="saida">Horário de Saída:</label>
            <input type="time" id="saida" name="saida"><br><br>

            <button type="submit" name="registrar">Registrar Horário</button>
        </form>
    </div>
    <div id="gerenciarTab" style="display: none;">
        <h2>Gerenciar Registros</h2>
        <?php if (!empty($registros)): ?>
            <table border="1">
                <tr>
                    <th>Nome</th>
                    <th>Chegada</th>
                    <th>Saída</th>
                    <th>Ações</th>
                </tr>
                <?php foreach ($registros as $id => $registro): ?>
                    <tr>
                        <form method="post" action="index.php">
                            <td><input type="text" name="edit_nome" value="<?php echo htmlspecialchars($registro['nome']); ?>"></td>
                            <td><input type="time" name="edit_chegada" value="<?php echo $registro['chegada']; ?>"></td>
                            <td><input type="time" name="edit_saida" value="<?php echo $registro['saida']; ?>"></td>
                            <td>
                                <button type="submit" name="edit" value="<?php echo $id; ?>">Editar</button>
                                <button type="submit" name="delete" value="<?php echo $id; ?>">Apagar</button>
                            </td>
                        </form>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>Nenhum registro encontrado.</p>
        <?php endif; ?>
    </div>

    <script>
        switchTab('registroTab');
    </script>
</body>
</html>
