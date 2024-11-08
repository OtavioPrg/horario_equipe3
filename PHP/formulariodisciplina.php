<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Disciplina</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f9f9f9; }
        .container { max-width: 500px; margin: 0 auto; padding: 20px; background-color: white; border: 1px solid #ddd; }
        h2 { color: #2a7d2e; }
        label { color: #333; }
        input[type="text"], select { width: 100%; padding: 8px; margin: 10px 0 20px; border: 1px solid #ccc; border-radius: 4px; }
        button { background-color: #2a7d2e; color: white; padding: 10px; border: none; border-radius: 4px; cursor: pointer; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Cadastro de Disciplina</h2>
        <form action="salvar_disciplina.php" method="post">
            <label for="nome_disciplina">Nome da Disciplina:</label>
            <input type="text" id="nome_disciplina" name="nome_disciplina" required>

            <label for="id_professor">ID do Professor:</label>
            <input type="text" id="id_professor" name="id_professor">

            <button type="submit">Cadastrar Disciplina</button>
        </form>
    </div>
</body>
</html>
