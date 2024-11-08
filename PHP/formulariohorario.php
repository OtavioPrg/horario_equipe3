<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Horário</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f9f9f9; }
        .container { max-width: 500px; margin: 0 auto; padding: 20px; background-color: white; border: 1px solid #ddd; }
        h2 { color: #2a7d2e; }
        label { color: #333; }
        input[type="time"], input[type="text"], select { width: 100%; padding: 8px; margin: 10px 0 20px; border: 1px solid #ccc; border-radius: 4px; }
        button { background-color: #2a7d2e; color: white; padding: 10px; border: none; border-radius: 4px; cursor: pointer; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Cadastro de Horário</h2>
        <form action="salvar_horario.php" method="post">
            <label for="id_disciplina">ID da Disciplina:</label>
            <input type="text" id="id_disciplina" name="id_disciplina" required>

            <label for="id_professor">ID do Professor:</label>
            <input type="text" id="id_professor" name="id_professor">

            <label for="inicio_horario">Início do Horário:</label>
            <input type="time" id="inicio_horario" name="inicio_horario" required>

            <label for="final_horario">Final do Horário:</label>
            <input type="time" id="final_horario" name="final_horario" required>

            <button type="submit">Cadastrar Horário</button>
        </form>
    </div>
</body>
</html>
