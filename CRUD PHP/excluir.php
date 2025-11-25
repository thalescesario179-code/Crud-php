<?php
include 'conexao.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "DELETE FROM alunos WHERE id = $id";

    if ($conexao->query($sql) === TRUE) {
        header("Location: index.php");
        exit;
    } else {
        echo "<p style='color:red; text-align:center;'>Erro ao excluir: " . $conexao->error . "</p>";
    }
} else {
    echo "<p style='color:red; text-align:center;'>ID não informado.</p>";
}
?>
