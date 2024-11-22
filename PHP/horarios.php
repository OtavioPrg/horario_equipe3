<?php 
include ('../conexao/db.php');

$stmtHorarios = $pdo->query("
    SELECT h.id, h.dia, h.horario, d.nome AS disciplina, p.nome AS professor 
    FROM horarios h
    JOIN disciplinas d ON h.disciplina_id = d.id
    JOIN professores p ON h.professor_id = p.id
");
$horarios = $stmtHorarios->fetchAll(PDO::FETCH_ASSOC);

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
    <title>Registrar Horários</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <nav>
            <a href="cadastro.php" class="btn">Cadastro</a>
            <a href="horarios.php" class="btn">Horários</a>
        </nav>
        <button class="toggle-sidebar" onclick="toggleSidebar()">☰ Horários</button>
    </header>

    <h1>Registrar Horários</h1>

    <?php if (isset($_GET['status']) && $_GET['status'] == 'sucesso'): ?>
        <p class="mensagem-sucesso">Cadastro de horário concluído com sucesso!</p>
    <?php endif; ?>

    <form method="POST" action="salvar_horario.php">
        <label for="disciplina">Disciplina:</label>
        <select name="disciplina" required>
            <option value="">Selecione uma disciplina</option>
            <?php foreach ($disciplinas as $disciplina): ?>
                <option value="<?= $disciplina['id'] ?>"><?= htmlspecialchars($disciplina['nome']) ?></option>
            <?php endforeach; ?>
        </select>

        <label for="professor">Professor:</label>
        <select name="professor" required>
            <option value="">Selecione um professor</option>
            <?php foreach ($professores as $professor): ?>
                <option value="<?= $professor['id'] ?>"><?= htmlspecialchars($professor['nome']) ?></option>
            <?php endforeach; ?>
        </select>

        <label for="dia">Dia da Semana:</label>
        <select name="dia" required>
            <option value="">Selecione o dia</option>
            <option value="Segunda-feira">Segunda-feira</option>
            <option value="Terça-feira">Terça-feira</option>
            <option value="Quarta-feira">Quarta-feira</option>
            <option value="Quinta-feira">Quinta-feira</option>
            <option value="Sexta-feira">Sexta-feira</option>
        </select>

        <label for="horario">Horário:</label>
        <select name="horario" required>
            <option value="">Selecione o horário</option>
            <option value="07:00-08:00">07:00 - 08:00</option>
            <option value="08:00-09:00">08:00 - 09:00</option>
            <option value="09:00-10:00">09:00 - 10:00</option>
            <option value="10:00-11:00">10:00 - 11:00</option>
            <option value="11:00-12:00">11:00 - 12:00</option>
            <option value="13:00-14:00">13:00 - 14:00</option>
            <option value="14:00-15:00">14:00 - 15:00</option>
            <option value="15:00-16:00">15:00 - 16:00</option>
            <option value="16:00-17:00">16:00 - 17:00</option>
        </select>

        <button type="submit" name="registrar">Registrar Horário</button>
    </form>

    <div id="sidebar" class="sidebar">
        <h2>Horários Cadastrados</h2>
        <table>
            <thead>
                <tr>
                    <th>Dia</th>
                    <th>Horário</th>
                    <th>Disciplina</th>
                    <th>Professor</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($horarios)): ?>
                    <?php foreach ($horarios as $horario): ?>
                        <tr>
                            <td><?= htmlspecialchars($horario['dia']) ?></td>
                            <td><?= htmlspecialchars($horario['horario']) ?></td>
                            <td><?= htmlspecialchars($horario['disciplina']) ?></td>
                            <td><?= htmlspecialchars($horario['professor']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4">Nenhum horário cadastrado.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('open');
        }
    </script>
</body>
</html>
