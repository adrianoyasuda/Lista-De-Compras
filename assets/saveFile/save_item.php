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
    // Receber os dados enviados pelo formulário
    $item = $_POST['item'];
    $quantidade = $_POST['quantidade'];
    $valor = $_POST['valor'];

    // Inserir os dados na tabela "lista"
    $sql = "INSERT INTO lista (item, quantidade, valor) VALUES ('$item', $quantidade, $valor)";

    if ($conn->query($sql) === TRUE) {
        echo "Item adicionado à lista com sucesso!";
    } else {
        echo "Erro ao adicionar o item à lista: " . $conn->error;
    }
}

$conn->close();
?>