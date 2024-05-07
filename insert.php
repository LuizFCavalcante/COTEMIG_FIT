<?php
echo "Inserindo os dados abaixo... <br><br>";
require ('conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "Nome: ";
    echo $nome = $_POST["nome"];
    echo "<br>";
    echo "Email: ";
    echo $email = $_POST["email"];
    echo "<br>";
    echo "Sexo: ";
    echo $sexo = $_POST["sexo"];
    echo "<br>";
    echo "Endereço: ";
    echo $endereco = $_POST["endereco"];
    echo "<br>";
    echo "Número: ";
    echo $numero = $_POST["numero"];
    echo "<br>";
    echo "Complemento: ";
    echo $complemento = $_POST["complemento"];
    echo "<br>";
    echo "Bairro: ";
    echo $bairro = $_POST["bairro"];
    echo "<br>";
    echo "Cidade: ";
    echo $cidade = $_POST["cidade"];
    echo "<br>";
    echo "UF: ";
    echo $uf = $_POST["uf"];
    echo "<br>";
    echo "Modalidade: ";
    echo $modalidade = $_POST["modalidade"];
    echo "<hr>";

    // Função para inserir um novo registro no banco de dados
    function inserirRegistro($conexao, $nome, $email, $sexo, $endereco, $numero, $complemento, $bairro, $cidade, $uf, $modalidade) {
        $sql = "INSERT INTO alunos (nome, email, sexo, endereco, numero, complemento, bairro, cidade, uf, modalidade) VALUES (:nome, :email, :sexo, :endereco, :numero, :complemento, :bairro, :cidade, :uf, :modalidade)";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':sexo', $sexo, PDO::PARAM_STR);
        $stmt->bindParam(':endereco', $endereco, PDO::PARAM_STR);
        $stmt->bindParam(':numero', $numero, PDO::PARAM_STR);
        $stmt->bindParam(':complemento', $complemento, PDO::PARAM_STR);
        $stmt->bindParam(':bairro', $bairro, PDO::PARAM_STR);
        $stmt->bindParam(':cidade', $cidade, PDO::PARAM_STR);
        $stmt->bindParam(':uf', $uf, PDO::PARAM_STR);
        $stmt->bindParam(':modalidade', $modalidade, PDO::PARAM_STR);
        return $stmt->execute();
    }
}
if (inserirRegistro($conexao, $nome, $email, $sexo, $endereco, $numero, $complemento, $bairro, $cidade, $uf, $modalidade)) {
    echo "Registro inserido com sucesso!<br>" . "<a href='index.php'>HOME</a>";
} else {
    echo 'Erro ao inserir o registro.';
}
?>