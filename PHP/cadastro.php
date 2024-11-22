<?php 
include ('../conexao/db.php');

$stmtProfessores = $pdo->query("SELECT * FROM professores");
$professores = $stmtProfessores->fetchAll(PDO::FETCH_ASSOC);

$stmtDisciplinas = $pdo->query("SELECT * FROM disciplinas");
$disciplinas = $stmtDisciplinas->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Professor e Disciplina</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <nav>
            <a href="cadastro.php" class="btn">Cadastro</a>
            <a href="horarios.php" class="btn">Horários</a>
        </nav>
    </header>

    <h1>Cadastro de Professor e Disciplina</h1>

    <?php if (isset($_GET['status']) && $_GET['status'] == 'sucesso'): ?>
        <p class="mensagem-sucesso">Cadastro concluído com sucesso!</p>
    <?php endif; ?>

    <form method="POST" action="salvar.php">
        <label for="tipo">O que deseja cadastrar?</label>
        <select name="tipo" required>
            <option value="">Selecione uma opção</option>
            <option value="professor">Professor</option>
            <option value="disciplina">Disciplina</option>
        </select>

        <label for="nome">Nome ou Disciplina:</label>
        <input type="text" name="nome" placeholder="Digite aqui" required>

        <button type="submit" name="cadastrar">Cadastrar</button>
    </form>

    <h2>Professores Cadastrados</h2>
    <ul>
        <?php foreach ($professores as $professor): ?>
            <li><?= htmlspecialchars($professor['nome']); ?></li>
        <?php endforeach; ?>
        <?php if (empty($professores)): ?>
            <li>Nenhum professor cadastrado.</li>
        <?php endif; ?>
    </ul>

    <h2>Disciplinas Cadastradas</h2>
    <ul>
        <?php foreach ($disciplinas as $disciplina): ?>
            <li><?= htmlspecialchars($disciplina['nome']); ?></li>
        <?php endforeach; ?>
        <?php if (empty($disciplinas)): ?>
            <li>Nenhuma disciplina cadastrada.</li>
        <?php endif; ?>
    </ul>
</body>
</html>
