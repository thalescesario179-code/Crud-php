<?php
include 'conexao.php';

$msg = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $nome = isset($_POST['nome']) ? $conexao->real_escape_string($_POST['nome']) : '';
    $sobrenome = isset($_POST['sobrenome']) ? $conexao->real_escape_string($_POST['sobrenome']) : '';
    $sexo = isset($_POST['sexo']) ? $conexao->real_escape_string($_POST['sexo']) : '';
    $ano_matricula = isset($_POST['ano_matricula']) ? intval($_POST['ano_matricula']) : null;
    $curso = isset($_POST['curso']) ? $conexao->real_escape_string($_POST['curso']) : '';

    if (empty($nome) || empty($sobrenome) || empty($sexo) || empty($curso)) {
        $msg = "<p style='color:red; text-align:center;'>Preencha todos os campos.</p>";
    } else {
        $sql = "UPDATE alunos SET nome='$nome', sobrenome='$sobrenome', sexo='$sexo', ano_matricula=$ano_matricula, curso='$curso' WHERE id=$id";
        if ($conexao->query($sql) === TRUE) {
            header("Location: index.php");
            exit;
        } else {
            $msg = "<p style='color:red; text-align:center;'>Erro ao atualizar: " . $conexao->error . "</p>";
        }
    }
} else if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM alunos WHERE id = $id";
    $result = $conexao->query($sql);

    if ($result->num_rows == 0) {
        die("<p style='text-align:center; color:red;'>Registro não encontrado.</p>");
    }

    $row = $result->fetch_assoc();
} else {
    die("<p style='text-align:center; color:red;'>ID não informado.</p>");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8"/>
<title>Alterar Aluno</title>
<style>
body { font-family: Arial, sans-serif; margin: 40px; background:#f4f4f9; color:#333; }
h2 { text-align:center; color:#444; }
form { max-width: 400px; margin: 20px auto; background:#fff; padding:20px; box-shadow:0 0 10px rgba(0,0,0,0.1); border-radius:5px; }
label { display:block; margin-bottom:6px; font-weight:bold; }
input[type=text], select, input[type=number] {
    width: 100%; padding: 8px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 3px; box-sizing: border-box;
}
input[type=submit] {
    background:#6c7ae0; border:none; color:#fff; padding:10px; width:100%; font-weight:bold; border-radius:5px; cursor:pointer;
}
input[type=submit]:hover { background:#5663c1; }
a {
    display:block; width:180px; margin: 20px auto; text-align:center; color:#6c7ae0; font-weight:bold; text-decoration:none;
}
a:hover { text-decoration:underline; }
</style>
</head>
<body>

<h2>Alterar Cadastro de Aluno</h2>

<?php echo $msg; ?>

<form method="POST" action="alterar.php">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />

    <label for="nome">Nome:</label>
    <input type="text" name="nome" id="nome" value="<?php echo htmlspecialchars($row['nome']); ?>" required />

    <label for="sobrenome">Sobrenome:</label>
    <input type="text" name="sobrenome" id="sobrenome" value="<?php echo htmlspecialchars($row['sobrenome']); ?>" required />

    <label for="sexo">Sexo:</label>
    <select name="sexo" id="sexo" required>
        <option value="Masculino" <?php if ($row['sexo']=='Masculino') echo "selected"; ?>>Masculino</option>
        <option value="Feminino" <?php if ($row['sexo']=='Feminino') echo "selected"; ?>>Feminino</option>
        <option value="Outro" <?php if ($row['sexo']=='Outro') echo "selected"; ?>>Outro</option>
    </select>

    <label for="ano_matricula">Ano da Matrícula:</label>
    <input type="number" name="ano_matricula" id="ano_matricula" min="1900" max="2100" value="<?php echo htmlspecialchars($row['ano_matricula']); ?>" required />

    <label for="curso">Curso:</label>
    <input type="text" name="curso" id="curso" value="<?php echo htmlspecialchars($row['curso']); ?>" required />

    <input type="submit" value="Salvar Alteração" />
</form>

<a href="index.php">Voltar para lista</a>

</body>
</html>
