<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Professor</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f9f9f9; }
        .container { max-width: 500px; margin: 0 auto; padding: 20px; background-color: white; border: 1px solid #ddd; }
        h2 { color: #2a7d2e; }
        label { color: #333; }
        input[type="text"], input[type="password"] { width: 100%; padding: 8px; margin: 10px 0 20px; border: 1px solid #ccc; border-radius: 4px; }
        button { background-color: #2a7d2e; color: white; padding: 10px; border: none; border-radius: 4px; cursor: pointer; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Cadastro de Professor</h2>
        <form action="salvar_professor.php" method="post">
            <label for="nome_professor">Nome do Professor:</label>
            <input type="text" id="nome_professor" name="nome_professor" required>

            <label for="senha_professor">Senha do Professor:</label>
            <input type="password" id="senha_professor" name="senha_professor" required>

            <button type="submit">Cadastrar Professor</button>
        </form>
    </div>
</body>
</html>
