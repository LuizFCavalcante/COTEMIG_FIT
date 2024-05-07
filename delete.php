<?php
    require ('conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $idAluno = $_GET["id"];

    // Função para deletar o registro no banco de dados
    function excluirRegistro($conexao, $idAluno) {
        $sql = "DELETE FROM alunos WHERE idAluno = $idAluno";
        $stmt = $conexao->prepare($sql);
        return $stmt->execute();
    }
}
if (excluirRegistro($conexao, $idAluno)) {
    echo "Registro excluído com sucesso!<br>" . "<a href='index.php'>HOME</a>";
} else {
    echo 'Erro ao excluir o registro.';
}
?>