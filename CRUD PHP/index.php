<?php
include 'conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Lista de Alunos</title>
<style>
body { font-family: Arial, sans-serif; margin: 40px; background:#f4f4f9; color:#333; }
h1 { text-align:center; color:#444; }
table { border-collapse: collapse; width: 90%; margin: 20px auto; background:#fff; box-shadow:0 0 10px rgba(0,0,0,0.1); }
th, td { padding: 12px 15px; border: 1px solid #ddd; text-align:center; }
th { background:#6c7ae0; color:#fff; }
tr:nth-child(even) { background:#f9f9f9; }
a { color:#6c7ae0; font-weight:bold; text-decoration:none; }
a:hover { text-decoration:underline; }
.add-btn {
    display:block; width:180px; margin: 20px auto; padding: 10px;
    background:#6c7ae0; color:#fff; text-align:center; border-radius:5px; text-decoration:none; font-weight:bold;
}
.add-btn:hover { background:#5663c1; }
</style>
</head>
<body>

<h1>Lista de Alunos</h1>
<a href="cadastro.php" class="add-btn">Adicionar Novo Aluno</a>

<?php
$sql = "SELECT * FROM alunos ORDER BY id DESC";
$result = $conexao->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>Nome</th><th>Sobrenome</th><th>Sexo</th><th>Ano Matrícula</th><th>Curso</th><th>Ações</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>" . htmlspecialchars($row['nome']) . "</td>";
        echo "<td>" . htmlspecialchars($row['sobrenome']) . "</td>";
        echo "<td>" . htmlspecialchars($row['sexo']) . "</td>";
        echo "<td>" . htmlspecialchars($row['ano_matricula']) . "</td>";
        echo "<td>" . htmlspecialchars($row['curso']) . "</td>";
        echo "<td>
            <a href='alterar.php?id={$row['id']}'>Editar</a> |
            <a href='excluir.php?id={$row['id']}' onclick=\"return confirm('Confirma exclusão?');\">Excluir</a>
        </td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<p style='text-align:center;'>Nenhum registro encontrado.</p>";
}
?>

</body>
</html>
