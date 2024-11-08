<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Gerenciamento de Cadastros</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f9f9f9; }
        .container { max-width: 800px; margin: 0 auto; padding: 20px; background-color: white; border: 1px solid #ddd; }
        h2 { color: #2a7d2e; }
        .nav { margin-bottom: 20px; }
        .nav a { margin-right: 15px; text-decoration: none; color: #2a7d2e; font-weight: bold; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #2a7d2e; color: white; }
        .button { background-color: #2a7d2e; color: white; padding: 10px; border: none; border-radius: 4px; cursor: pointer; text-decoration: none; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Gerenciamento de Cadastros</h2>
        <div class="nav">
            <a href="formulariodisciplina.php" class="button">Cadastrar Disciplina</a>
            <a href="formulariohorario.php" class="button">Cadastrar Horário</a>
            <a href="formularioprofessor.php" class="button">Cadastrar Professor</a>
            <a href="index.php" class="button">Visualizar Registros</a>
        </div>

        <!-- Conteúdo da Página -->
        <h3>Registros de Disciplinas</h3>
        <?php include 'ver_disciplinas.php'; ?>

        <h3>Registros de Horários</h3>
        <?php include 'ver_horarios.php'; ?>

        <h3>Registros de Professores</h3>
        <?php include 'ver_professores.php'; ?>
    </div>
</body>
</html>
