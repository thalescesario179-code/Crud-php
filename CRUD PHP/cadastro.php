<?php
include 'conexao.php';

$msg = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $conexao->real_escape_string($_POST['nome']);
    $sobrenome = $conexao->real_escape_string($_POST['sobrenome']);
    $sexo = $conexao->real_escape_string($_POST['sexo']);
    $ano_matricula = intval($_POST['ano_matricula']);
    $curso = $conexao->real_escape_string($_POST['curso']);

    if (empty($nome) || empty($sobrenome) || empty($sexo) || empty($curso)) {
        $msg = "<p style='color:red; text-align:center;'>Preencha todos os campos.</p>";
    } else {
        $sql = "INSERT INTO alunos (nome, sobrenome, sexo, ano_matricula, curso) VALUES ('$nome', '$sobrenome', '$sexo', $ano_matricula, '$curso')";
        if ($conexao->query($sql) === TRUE) {
            header("Location: index.php");
            exit;
        } else {
            $msg = "<p style='color:red; text-align:center;'>Erro ao cadastrar: " . $conexao->error . "</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8" />
<title>Cadastro de Aluno</title>
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

<h2>Cadastro de Novo Aluno</h2>

<?php echo $msg; ?>

<form method="POST" action="cadastro.php">
    <label for="nome">Nome:</label>
    <input type="text" name="nome" id="nome" required />

    <label for="sobrenome">Sobrenome:</label>
    <input type="text" name="sobrenome" id="sobrenome" required />

    <label for="sexo">Sexo:</label>
    <select name="sexo" id="sexo" required>
        <option value="" disabled selected>Selecione</option>
        <option value="Masculino">Masculino</option>
        <option value="Feminino">Feminino</option>
        <option value="Outro">Outro</option>
    </select>

    <label for="ano_matricula">Ano da Matrícula:</label>
    <input type="number" name="ano_matricula" id="ano_matricula" required />

    <label for="curso">Curso:</label>
    <input type="text" name="curso" id="curso" required />

    <input type="submit" value="Cadastrar" />
</form>

<a href="index.php">Voltar para lista</a>

</body>
</html>
