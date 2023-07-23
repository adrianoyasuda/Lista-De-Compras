<?php
// Conectar ao banco de dados (substitua com suas credenciais)
$servername = "localhost";
$username = "Testes";
$password = "Testes";
$dbname = "lista_de_compras_yasuda";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Verificar se os dados do formulário foram enviados
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receber o índice do item a ser removido
    $index = $_POST['index'];

    // Deletar o item com o índice especificado da tabela "lista"
    $sql = "DELETE FROM lista WHERE id = $index";

    if ($conn->query($sql) === TRUE) {
        echo "Item removido da lista com sucesso!";
    } else {
        echo "Erro ao remover o item: " . $conn->error;
    }
}

$conn->close();
?>